<x-app-layout>
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">{{ __('Categories') }}</h5>
            <div class="d-flex justify-content-between mt-2">
                <form action="">
                <input type="search" style="width: 300px;" class="form-control" name="search" value="{{ request('search') }}" placeholder="{{ __('Search') }}">
                </form>
                @can('categories.create')
                <a href="{{ route('categories.create') }}" class="btn btn-primary"><i class="icon-plus-circle2 mr-1"></i> {{ __('Create') }}</a>
                @endcan
            </div>
        </div>
        @php
            $categoryTypes = [
                'post' => 'Đề tài',
                'document' => 'Văn bản - Tài liệu',
                'official_dispatch' => 'Công văn'
            ];
        @endphp
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('Category') }}</th>
                        <th>{{ __('Type') }}</th>
                        <th>{{ __('Date Create') }}</th>
                        <th class="text-center">{{ __('Action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $categoryTypes[$category->type] ?? '-' }}</td>
                        <td>{{ $category->created_at }}</td>
                        <td class="text-center">
                            <div class="d-inline-flex justify-content-center">
                                @can('categories.edit')
                                <a href="{{ route('categories.edit', $category) }}" class="dropdown-item px-2 rounded" title="{{ __('Edit') }}">
                                    <i class="fa fa-pencil mr-1"></i>
                                </a>
                                @endcan
                                @can('categories.delete')
                                <a href="javascript:void(0)" data-action-url="{{ route('categories.destroy', $category) }}" 
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
            {{ $categories->links('vendor.pagination.bootstrap-4BK') }}
        </div>
    </div>
</x-app-layout>