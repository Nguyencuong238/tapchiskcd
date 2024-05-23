<x-app-layout>
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">{{ __('Department') }}</h5>

            <div class="d-flex justify-content-between mt-2">
                <form action="">
                    <input type="search" style="width: 300px;" class="form-control" name="search" value="{{ request('search') }}" placeholder="Search">
                </form>
                @can('departments.create')
                    <a href="{{ route('departments.create') }}" class="btn btn-primary"><i class="icon-plus-circle2 mr-1"></i> {{ __('Create') }}</a>
                @endcan
            </div>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Date') }}</th>   
                        <th class="text-center">{{ __('Action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($departments as $department)
                    <tr>
                        <td>{{  $loop->iteration }}</td>
                        <td>{{  $department->name }}</td>
                        <td>{{ formatDate($department->created_at) }}</td>
                        <td class="text-center">
                            <div class="d-inline-flex justify-content-center">
                                @can('departments.edit')
                                <a href="{{ route('departments.edit', $department) }}" class="dropdown-item px-2 rounded" title="{{ __('Edit') }}">
                                    <i class="fa fa-pencil mr-1"></i> 
                                </a>
                                @endcan
                                @can('departments.delete')
                                <a href="javascript:void(0)" data-action-url="{{ route('departments.destroy', $department) }}" 
                                    data-behavior="delete-resource" class="dropdown-item px-2 rounded" title="{{ __('Delete') }}"> 
                                    <i class="fa fa-trash mr-1"></i> 
                                </a>
                                @endcan
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $departments->appends(request()->except('page'))->links('vendor.pagination.bootstrap-4BK') }}
        </div>
    </div>
</x-app-layout>