<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\OfficialDispatch\Store;
use App\Http\Requests\Backend\OfficialDispatch\Update;
use App\Models\Category;
use App\Models\Department;
use App\Models\OfficialDispatch;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class OfficialDispatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! auth()->user()->can('official_dispatch.view')) {
            abort(403);
        }

        $officialDispatch = OfficialDispatch::query()
            ->latest()
            ->with('author', 'categories', 'receiver')
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
                    $q->where('id', request('author'));
                });
            })
            ->when(request('receiver'), function ($q) {
                $q->whereHas('receiver', function ($q) {
                    $q->where('id', request('receiver'));
                });
            })
            ->paginate();

        return view('backend.official_dispatch.index', compact('officialDispatch'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! auth()->user()->can('official_dispatch.create')) {
            abort(403);
        }

        $categories = Category::where(function ($query) {
            $query->where('type','official_dispatch')->orWhere('type', 'image')->orWhere('type', 'video');
        })->tree()->get()->toTree();

        $departments = Department::get();

        return view('backend.official_dispatch.create', compact('categories', 'departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request)
    {
        if (! auth()->user()->can('official_dispatch.create')) {
            abort(403);
        }

        $officialDispatch = OfficialDispatch::create([
            'title'         => request('title'),
            'code'          => request('code'),
            'sending_place' => request('sending_place'),
            'receive_code'  => request('receive_code'),
            'date_receive'  => request('date_receive'),
            'department_id' => request('department_id'),
            'date_handle'   => request('date_handle'),
            'body'          => request('body'),
            'author_id'     => $request->user()->id,
        ]);

        $officialDispatch
            ->addFromMediaLibraryRequest($request->media)
            ->toMediaCollection('media');

        $officialDispatch
            ->addFromMediaLibraryRequest($request->attachments)
            ->toMediaCollection('attachments');

        $officialDispatch->categories()->sync(request('categories'));
        $officialDispatch->receiver()->sync(request('receiver'));

        flash(__('Record ":model" created', ['model' => $officialDispatch->title]), 'success');

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
        $officialDispatch = OfficialDispatch::with('media')->findOrFail($id);

        if (! auth()->user()->can('official_dispatch.edit') && $officialDispatch->author_id != auth()->id()) {
            abort(403);
        }

        $categories = Category::where('type', 'official_dispatch')->tree()->get()->toTree();
        $departments = Department::get();

        return view('backend.official_dispatch.edit', compact('categories', 'officialDispatch', 'departments'));
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
        $officialDispatch = OfficialDispatch::findOrFail($id);

        if (! auth()->user()->can('official_dispatch.edit') && $officialDispatch->author_id != auth()->id()) {
            abort(403);
        }

        $officialDispatch->update([
            'title'         => request('title'),
            'code'          => request('code'),
            'sending_place' => request('sending_place'),
            'receive_code'  => request('receive_code'),
            'date_receive'  => request('date_receive'),
            'department_id' => request('department_id'),
            'date_handle'   => request('date_handle'),
            'body'          => request('body'),
            'author_id'     => $request->user()->id,
        ]);

        $officialDispatch
            ->syncFromMediaLibraryRequest($request->media)
            ->toMediaCollection('media');

        $officialDispatch
            ->syncFromMediaLibraryRequest($request->attachments)
            ->toMediaCollection('attachments');

        $officialDispatch->categories()->sync(request('categories'));

        flash(__('Record ":model" updated', ['model' => $officialDispatch->title]), 'success');

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
        if (! auth()->user()->can('official_dispatch.delete')) {
            abort(403);
        }

        $officialDispatch = OfficialDispatch::findOrFail($id);

        $officialDispatch->delete();

        $officialDispatch->categories()->sync([]);
        $officialDispatch->receiver()->sync([]);

        flash(__('Record ":model" deleted', ['model' => $officialDispatch->name]), 'success');

        return redirect()->back();
    }

    public function search(Request $request)
    {
        if ($request->filled('id')) {
            $ids = explode(',', $request->id);

            return OfficialDispatch::whereIn('id', $ids)
                ->select('id', 'title as text')
                ->get();
        }
        return OfficialDispatch::where('title', 'like', '%'.$request->query('q').'%')
            ->select('id', 'title as text')
            ->paginate();
    }
}
