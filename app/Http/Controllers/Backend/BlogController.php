<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Post\Store;
use App\Http\Requests\Backend\Post\Update;
use App\Models\Category;
use App\Models\Blog;
use App\Models\Tag;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! auth()->user()->can('blogs.view')) {
            abort(403);
        }

        $blogs = Blog::query()
            ->latest()
            ->with('author', 'categories', 'tags')
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
                $q->whereHas('author', function ($q) {
                    $q->where('email', request('author'));
                });
            })
            ->when(request('tag'), function ($q) {
                $q->whereHas('tags', function ($q) {
                    $q->where('slug', request('tag'));
                });
            })
            ->paginate();

        return view('backend.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! auth()->user()->can('blogs.create')) {
            abort(403);
        }

        $categories = Category::where('type', 'post')->tree()->get()->toTree();

        $tags = Tag::whereType('post')->get();

        return view('backend.blogs.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request)
    {
        // if (! auth()->user()->can('blogs.create')) {
        //     abort(403);
        // }
        $blog = Blog::create([
            'title'       => request('title'),
            'excerpt'     => request('excerpt'),
            'is_featured' => request('is_featured'),
            'is_new' => request('is_new'),
            'order' => request('order'),
            'body'        => request('body'),
            'meta'        => [
                'meta_title'       => request('meta_tilte'),
                'meta_description' => request('meta_description'),
            ],
            'author_id' => $request->user()->id,
            'slug' => request('slug')
        ]);

        $blog
            ->addFromMediaLibraryRequest($request->media)
            ->toMediaCollection('media');

        if ($request->filled('projects')) {
            $blog->projects()->attach(request('projects'));
        }

        $blog->categories()->sync(request('categories'));

        $blog->attachTags(request('tags'), 'blog');

        flash(__('Record ":model" created', ['model' => $blog->title]), 'success');

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // if (! auth()->user()->can('blogs.edit')) {
        //     abort(403);
        // }

        $blog = Blog::with('media')->findOrFail($id);
        $categories = Category::where('type', 'blog')->tree()->get()->toTree();
        $tags = Tag::whereType('blog')->get();
        return view('backend.blogs.edit', compact('categories', 'tags', 'blog'));
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
        // if (! auth()->user()->can('blogs.edit')) {
        //     abort(403);
        // }

        $blog = Blog::findOrFail($id);

        $blog->fill([
            'title'       => request('title'),
            'excerpt'     => request('excerpt'),
            'is_featured' => request('is_featured'),
            'is_new' => request('is_new'),
            'order' => request('order'),
            'body'        => request('body'),
            'meta'        => [
                'meta_title'       => request('meta_tilte'),
                'meta_description' => request('meta_description'),
            ],
            'slug' => request('slug')
        ])->save();

        $blog
            ->syncFromMediaLibraryRequest($request->media)
            ->toMediaCollection('media');

        if ($request->filled('projects')) {
            $blog->projects()->sync(request('projects'));
        }

        $blog->categories()->sync(request('categories'));

        $blog->syncTagsWithType(request('tags'), 'blog');

        flash(__('Record ":model" updated', ['model' => $blog->title]), 'success');

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
        // if (! auth()->user()->can('blogs.delete')) {
        //     abort(403);
        // }

        $blog = Blog::findOrFail($id);

        $blog->delete();

        $blog->categories()->sync([]);

        $blog->tags()->sync([]);

        flash(__('Record ":model" deleted', ['model' => $blog->name]), 'success');

        return redirect()->back();
    }

    public function search(Request $request)
    {
        if ($request->filled('id')) {
            $ids = explode(',', $request->id);

            return Blog::whereIn('id', $ids)
                ->select('id', 'title as text')
                ->get();
        }
        return Blog::where('title', 'like', '%'.$request->query('q').'%')
            ->select('id', 'title as text')
            ->paginate();
    }
}
