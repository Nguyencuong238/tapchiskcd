<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Post\Store;
use App\Http\Requests\Backend\Post\Update;
use App\Models\Category;
use App\Models\Note;
use App\Models\Post;
use App\Models\PostHistory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! auth()->user()->can('posts.view')) {
            abort(403);
        }

        $posts = Post::query()
            ->latest()
            ->with('author', 'categories')
            ->when(request('search'), function ($q) {
                $q->where('title', 'like', '%' . request('search') . '%')
                ->orWhereHas('author', function ($q) {
                    $q->where('name', 'like', '%' . request('search') . '%');
                });
            })
            ->when(request('category'), function ($q) {
                $q->whereHas('categories', function ($q) {
                    $q->where('slug', request('category'));
                });
            })
            ->when(request('author'), function ($q) {
                $q->where('author_id', request('author'));
            })
            ->when(request()->filled('status'), function ($q) {
                $q->where('status', request('status'));
            })
            ->when(auth()->user()->position == 'staff', function($q) {
                $q->where('author_id', auth()->id());
            })
            ->when(auth()->user()->position == 'manager' && !auth()->user()->hasRole(1), function($q) {
                $q->whereHas('author', function($subQ) {
                    $subQ->where('department_id', auth()->user()->department_id);
                });
            })
            ->paginate();

        return view('backend.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! auth()->user()->can('posts.create')) {
            abort(403);
        }

        $categories = Category::where(function ($query) {
            $query->where('type', 'post');
        })->tree()->get()->toTree();


        return view('backend.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request)
    {
        if (! auth()->user()->can('posts.create')) {
            abort(403);
        }

        $post = Post::create([
            'title'         => $request->title,
            'excerpt'       => $request->excerpt,
            'body'          => $request->body,
            'start_date'    => $request->start_date,
            'end_date'      => $request->end_date,
            'author_id'     => $request->user()->id,
            'status'        => auth()->user()->position == 'staff' ? 0 : (auth()->user()->position == 'manager' ? 1 : 2),
            'ggt'           => array_values($request->input('ggt', []))  
        ]);

        PostHistory::create([
            'post_id' => $post->id,
            'user_id' => auth()->id(),
            'type' => 'create',
            'new_record' => $post
        ]);

        $post
            ->addFromMediaLibraryRequest($request->media)
            ->toMediaCollection('media');

        $post
            ->addFromMediaLibraryRequest($request->attachments)
            ->toMediaCollection('attachments');

        $post->categories()->sync($request->categories);

        flash(__('Record ":model" created', ['model' => $post->title]), 'success');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! auth()->user()->can('posts.view')) {
            abort(403);
        }

        $post = Post::with('media')->findOrFail($id);

        return view('backend.posts.show', compact('post'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::with('media')->findOrFail($id);

        if (! auth()->user()->can('posts.edit') && $post->author_id != auth()->id()) {
            abort(403);
        }

        $categories = Category::where('type', 'post')->tree()->get()->toTree();

        return view('backend.posts.edit', compact('categories', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Update $request, $id)
    {
        $oldPost = $post = Post::findOrFail($id);

        if (! auth()->user()->can('posts.edit') && $post->author_id != auth()->id()) {
            abort(403);
        }

        $changeFields = [];
        $fields = [
            'title'      => 'Tiêu đề',
            'excerpt'    => 'Mô tả',
            'body'       => 'Nội dung',
            'ggt'        => 'Giấy giới thiệu'
        ];

        foreach ($fields as $key => $value) {
            if($post->{$key} != request($key)) {
                $changeFields[] = $value;
            }
        }

        if($post->start_date->format('Y-m-d') != $request->start_date) {
            $changeFields[] = 'Ngày bắt đầu';
        }

        if($post->end_date->format('Y-m-d') != $request->end_date) {
            $changeFields[] = 'Ngày kết thúc';
        }

        $intersect = $post->categories->pluck('id')->intersect($request->categories);
        if($intersect != $post->categories->pluck('id') || $intersect->count() != count($request->categories ?? []) ) {
            $changeFields[] = 'Danh mục';
        }

        $post->fill([
            'title'   => $request->title,
            'excerpt' => $request->excerpt,
            'body'    => $request->body,
            'ggt'     => array_values($request->input('ggt', [])),
            'status'  => 0
        ])->save();

        if(!empty($changeFields)) {
            PostHistory::create([
                'post_id'    => $post->id,
                'user_id'    => auth()->id(),
                'type'       => 'update',
                'old_record' => $oldPost,
                'new_record' => $post,
                'note'       => implode(', ', $changeFields),
            ]);
        }

        $post
            ->syncFromMediaLibraryRequest($request->media)
            ->toMediaCollection('media');

        $post
            ->syncFromMediaLibraryRequest($request->attachments)
            ->toMediaCollection('attachments');

        $post->categories()->sync($request->categories);

        flash(__('Record ":model" updated', ['model' => $post->title]), 'success');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! auth()->user()->can('posts.delete')) {
            abort(403);
        }

        $post = Post::findOrFail($id);

        $post->delete();

        $post->categories()->sync([]);

        flash(__('Record ":model" deleted', ['model' => $post->title]), 'success');

        return redirect()->back();
    }

    public function search(Request $request)
    {
        if ($request->filled('id')) {
            $ids = explode(',', $request->id);

            return Post::whereIn('id', $ids)
                ->select('id', 'title as text')
                ->get();
        }
        return Post::where('title', 'like', '%'.$request->query('q').'%')
            ->select('id', 'title as text')
            ->paginate();
    }

    public function updateStatus(Request $request) {
        $post = Post::findOrFail($request->id);

        $post->status = $request->status;
        $post->save();

        $labels = [
            -1 => 'Trả lại',
            1 => 'Trưởng ban phê duyệt',
            2 => 'Tổng thư ký phê duyệt',
            3 => 'Tổng biên tập phê duyệt'
        ];

        PostHistory::create([
            'post_id' => $post->id,
            'user_id' => auth()->id(),
            'type' => 'change_status',
            'note' => $labels[$post->status]
        ]);

        if($post->status == 1)
            flash(__('Đề tài "'. $post->title.'" đã được duyệt!'), 'success');
        else {
            flash(__('Đề tài "'. $post->title.'" đã bị từ chối!'), 'success');
        }
        

        return redirect()->back();
    }

    public function createNote(Request $request) {
        $post = Post::findOrFail($request->post_id);

        $note = new Note();
        $note->content = $request->content;
        $note->user_id = auth()->id();
        $note->post_id = $request->post_id;
        $note->save();

        return [
            'status' => 'success',
            'data' => [
                'first_character' => substr($note->user->name, 0, 1),
                'name' => $note->user->name,
                'content' => $note->content,
                'date' => $note->created_at->format('H:i d/m/Y')
            ]
        ];
    }
}
