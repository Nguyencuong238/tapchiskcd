<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Document\Store;
use App\Http\Requests\Backend\Document\Update;
use App\Models\Category;
use App\Models\Document;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! auth()->user()->can('documents.view')) {
            abort(403);
        }

        $documents = Document::query()
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
                    $q->where('id', request('author'));
                });
            })
            ->when(request('tag'), function ($q) {
                $q->whereHas('tags', function ($q) {
                    $q->where('slug', request('tag'));
                });
            })
            ->paginate();

        return view('backend.documents.index', compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! auth()->user()->can('documents.create')) {
            abort(403);
        }

        $categories = Category::where(function ($query) {
            $query->where('type', 'document')->orWhere('type', 'image')->orWhere('type', 'video');
        })->tree()->get()->toTree();


        return view('backend.documents.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request)
    {
        if (! auth()->user()->can('documents.create')) {
            abort(403);
        }

        $document = Document::create([
            'title'      => request('title'),
            'body'       => request('body'),
            'note'       => request('note'),
            'author_id'  => $request->user()->id,
        ]);

        $document
            ->addFromMediaLibraryRequest($request->media)
            ->toMediaCollection('media');

        $document
            ->addFromMediaLibraryRequest($request->attachments)
            ->toMediaCollection('attachments');

        $document->categories()->sync(request('categories'));

        flash(__('Record ":model" created', ['model' => $document->title]), 'success');

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
        $document = Document::with('media')->findOrFail($id);

        if (! auth()->user()->can('documents.edit') && $document->author_id != auth()->id()) {
            abort(403);
        }

        $categories = Category::where('type', 'document')->tree()->get()->toTree();

        return view('backend.documents.edit', compact('categories', 'document'));
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
        $document = Document::findOrFail($id);

        if (! auth()->user()->can('documents.edit') && $document->author_id != auth()->id()) {
            abort(403);
        }

        $document->fill([
            'title' => request('title'),
            'note'  => request('note'),
            'body'  => request('body'),
        ])->save();

        $document
            ->syncFromMediaLibraryRequest($request->media)
            ->toMediaCollection('media');

        $document
            ->syncFromMediaLibraryRequest($request->attachments)
            ->toMediaCollection('attachments');

        $document->categories()->sync(request('categories'));

        flash(__('Record ":model" updated', ['model' => $document->title]), 'success');

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
        if (! auth()->user()->can('documents.delete')) {
            abort(403);
        }

        $document = Document::findOrFail($id);

        $document->delete();

        $document->categories()->sync([]);

        flash(__('Record ":model" deleted', ['model' => $document->name]), 'success');

        return redirect()->back();
    }

    public function search(Request $request)
    {
        if ($request->filled('id')) {
            $ids = explode(',', $request->id);

            return Document::whereIn('id', $ids)
                ->select('id', 'title as text')
                ->get();
        }
        return Document::where('title', 'like', '%'.$request->query('q').'%')
            ->select('id', 'title as text')
            ->paginate();
    }
}
