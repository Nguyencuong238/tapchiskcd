<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Department;
use Illuminate\Http\Request;

class DEpartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! auth()->user()->can('departments.view')) {
            abort(403);
        }

        $departments = Department::paginate();

        return view('backend.departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! auth()->user()->can('departments.create')) {
            abort(403);
        }

        return view('backend.departments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (! auth()->user()->can('departments.create')) {
            abort(403);
        }

        $request->validate([
            'name' => ['required'],
        ]);

        $department = Department::create([
            'name' => request('name'),
        ]);

        flash(__('Record ":model" created', ['model' => $department->name]), 'success');

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
        if (! auth()->user()->can('departments.edit')) {
            abort(403);
        }

        $department = Department::findOrFail($id);

        return view('backend.departments.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (! auth()->user()->can('departments.edit')) {
            abort(403);
        }

        $department = Department::findOrFail($id);

        $request->validate([
            'name' => ['required'],
        ]);

        $department->fill([
            'name' => request('name'),
        ])->save();

        flash(__('Record ":model" updated', ['model' => $department->name]), 'success');

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
        if (! auth()->user()->can('departments.delete')) {
            abort(403);
        }

        $department = Department::findOrFail($id);

        $department->delete();

        flash(__('Record ":model" deleted', ['model' => $department->name]), 'success');

        return redirect()->back();
    }
}
