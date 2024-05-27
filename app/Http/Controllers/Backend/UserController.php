<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Spatie\MediaLibraryPro\Rules\Concerns\ValidatesMedia;

class UserController extends Controller
{
    use ValidatesMedia;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! auth()->user()->can('users.view')) {
            abort(403);
        }

        $users = User::when(request()->search, function($q) {
                $q->where('name', 'like', '%'.request()->search.'%');
            })
            ->when(request()->filled('gender'), function($q) {
                $q->where('gender', request()->gender);
            })
            ->when(request()->filled('age'), function($q) {
                $before25years = date('Y-m-d', strtotime('-25 years', strtotime(now())));
                $before35years = date('Y-m-d', strtotime('-35 years', strtotime(now())));
                $before45years = date('Y-m-d', strtotime('-45 years', strtotime(now())));
                if(request('age') == '0-25') {
                    $q->where('birthday', '>', $before25years);
                } elseif(request('age') == '25-35') {
                    $q->where('birthday', '<=', $before25years)->where('birthday', '>', $before35years);
                } elseif(request('age') == '35-45') {
                    $q->where('birthday', '<=', $before35years)->where('birthday', '>', $before45years);
                } else {
                    $q->where('birthday', '<', $before45years);
                }
            })
            ->when(request()->filled('journalist_code'), function($q) {
                $q->where('journalist_code', request()->journalist_code);
            })
            ->when(request()->filled('hnb_code'), function($q) {
                $q->where('hnb_code', request()->hnb_code);
            })
            ->when(request()->filled('certificate_type'), function($q) {
                $q->where('certificate_type', request()->certificate_type);
            })
            ->when(request()->filled('department_id'), function($q) {
                $q->where('department_id', request()->department_id);
            })
            ->paginate();
        $departments = Department::get();

        return view('backend.users.index', compact('users', 'departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! auth()->user()->can('users.create')) {
            abort(403);
        }

        $roles = Role::get();
        $departments = Department::get();

        $jsonContents = file_get_contents(storage_path('app/listNation.json'));
        $listNation = json_decode($jsonContents, true);

        return view('backend.users.create', compact('roles', 'departments', 'listNation'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (! auth()->user()->can('users.create')) {
            abort(403);
        }

        $request->validate([
            'email'    => ['required', 'email', 'string', 'max:255'],
            'name'     => ['required', 'string', 'max:255'],
            'password' => ['required', Password::default()],
            'roles'    => ['required'],
            'position'    => ['required'],
            'hnb_code_start'    => ['nullable', 'date'],
            'hnb_code_end'      => ['nullable', 'date', 'after:hnb_code_start'],
            'labor_contract_start'    => ['nullable', 'date'],
            'labor_contract_end'      => ['nullable', 'date', 'after:labor_contract_start'],
        ]);

        $data = $request->except(['_token', 'roles', 'media', 'certificate']);
        $data['password'] = bcrypt($request->password);
        $data['siblings_info'] = array_values($request->input('siblings_info', []));
        $data['children_info'] = array_values($request->input('children_info', []));

        $user = User::create($data);

        $user
            ->addFromMediaLibraryRequest($request->media)
            ->toMediaCollection('media');

        $user
            ->addFromMediaLibraryRequest($request->certificate)
            ->toMediaCollection('certificate');

        $user->assignRole($request->roles);

        flash(__('Record ":model" created', ['model' => $user->name]), 'success');

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
        if (! auth()->user()->can('users.edit')) {
            abort(403);
        }

        $user = User::where('id', $id)->with('media')->firstOrFail();

        $roles = Role::get();
        $departments = Department::get();

        $jsonContents = file_get_contents(storage_path('app/listNation.json'));
        $listNation = json_decode($jsonContents, true);

        return view('backend.users.edit', compact('roles', 'user', 'departments', 'listNation'));
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
        if (! auth()->user()->can('users.edit')) {
            abort(403);
        }

        $user = User::findOrFail($id);

        $request->validate([
            'email'    => ['required', 'email', 'string', 'max:255'],
            'name'     => ['required', 'string', 'max:255'],
            'password' => ['nullable', Password::default()],
            'roles'    => ['required'],
            'position'    => ['required'],
            'hnb_code_start'    => ['nullable', 'date'],
            'hnb_code_end'      => ['nullable', 'date', 'after:hnb_code_start'],
            'labor_contract_start'    => ['nullable', 'date'],
            'labor_contract_end'      => ['nullable', 'date', 'after:labor_contract_start'],
        ]);

        $data = $request->except(['_token', '_method', 'roles', 'media', 'certificate']);
        $data['siblings_info'] = array_values($request->input('siblings_info', []));
        $data['children_info'] = array_values($request->input('children_info', []));

        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);

        $user
            ->syncFromMediaLibraryRequest($request->media)
            ->toMediaCollection('media');

        $user
            ->syncFromMediaLibraryRequest($request->certificate)
            ->toMediaCollection('certificate');

        $user->syncRoles($request->roles);

        flash(__('Record ":model" updated', ['model' => $user->name]), 'success');

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
        if (! auth()->user()->can('users.delete')) {
            abort(403);
        }

        $user = User::findOrFail($id);

        $user->delete();

        flash(__('Record ":model" deleted', ['model' => $user->name]), 'success');

        return redirect()->back();
    }
}
