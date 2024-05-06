<x-app-layout>
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h5 class="card-title">{{ __('Quản lý nhân sự') }}</h5>
                @can('users.create')
                <a href="{{ route('users.create') }}" class="btn btn-primary"><i class="icon-plus-circle2 mr-1"></i> {{ __('Create') }}</a>
                @endcan
            </div>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Email') }}</th>
                        <th>{{ __('Department') }}</th>
                        <th>{{ __('Date Create') }}</th>
                        <th class="text-center">{{ __('Action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ optional($user->department)->name ?? '--' }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td class="text-center">
                            <div class="d-inline-flex justify-content-center">
                                @if(auth()->user()->can('users.edit') && ($user->id == 1 && auth()->id() == 1 || $user->id != 1))
                                    <a href="{{ route('users.edit', $user) }}" class="dropdown-item px-2 rounded" title="{{ __('Edit') }}">
                                        <i class="fa fa-pencil mr-1"></i>
                                    </a>
                                @endif
                                @if($user->id != 1 && auth()->id() != $user->id && auth()->user()->can('users.delete'))
                                    <a href="javascript:void(0)" data-action-url="{{ route('users.destroy', $user) }}" 
                                        data-behavior="delete-resource" class="dropdown-item px-2 rounded" title="{{ __('Delete') }}">
                                        <i class="fa fa-trash mr-1"></i>
                                    </a>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $users->links('vendor.pagination.bootstrap-4BK') }}
        </div>
    </div>
</x-app-layout>