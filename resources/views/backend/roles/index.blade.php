<x-app-layout>
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h5 class="card-title">{{ __('Roles') }}</h5>
                @can('roles.create')
                <a href="{{ route('roles.create') }}" class="btn btn-primary"><i class="icon-plus-circle2 mr-1"></i> {{ __('Create') }}</a>
                @endcan
            </div>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('Role') }}</th>
                        <th>{{ __('Date Create') }}</th>
                        <th class="text-center">{{ __('Action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $role)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->created_at }}</td>
                        <td class="text-center">
                            <div class="list-icons">
                                @if($role->id != 1)
                                <div class="d-inline-flex justify-content-center">
                                    @can('roles.edit')
                                    <a href="{{ route('roles.edit', $role) }}" class="dropdown-item px-2 rounded">
                                        <i class="fa fa-pencil mr-1"></i> {{ __('Edit') }}
                                    </a>
                                    @endcan
                                    @can('roles.delete')
                                    <a href="javascript:void(0)" data-action-url="{{ route('roles.destroy', $role) }}" 
                                        data-behavior="delete-resource" class="dropdown-item px-2 rounded">
                                        <i class="fa fa-trash mr-1"></i> {{ __('Delete') }}
                                    </a>
                                    @endcan
                                </div>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $roles->links('vendor.pagination.bootstrap-4BK') }}
        </div>
    </div>
</x-app-layout>