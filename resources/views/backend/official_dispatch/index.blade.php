<x-app-layout>
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">{{ __('Quản lý Công văn') }}</h5>

            <div class="d-flex justify-content-between mt-2">
                <form action="">
                <input type="search" style="width: 300px;" class="form-control" name="search" value="{{ request('search') }}" placeholder="Tìm kiếm">
                </form>
                @can('official_dispatch.create')
                <a href="{{ route('official_dispatch.create') }}" class="btn btn-primary"><i class="icon-plus-circle2 mr-1"></i> {{ __('Thêm') }}</a>
                @endcan
            </div>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('Title') }}</th>
                        <th>{{ __('Người gửi') }}</th>
                        <th>{{ __('Người nhận') }}</th>
                        <th>{{ __('Categories') }}</th>
                        <th>{{ __('Date') }}</th>
                        <th class="text-center">{{ __('Action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($officialDispatch as $item)
                    @continue(!auth()->user()->hasRole(1) && $item->author->id != auth()->id() && !$item->receiver->contains(auth()->id()))
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            {{--  <a href="{{ $item->showUrl() }}" target="_blank" rel="noopener noreferrer">  --}}
                                {{ $item->title }}
                            {{--  </a>  --}}
                        </td>
                        <td>
                            <a href="{{ route('official_dispatch.index', ['author' => $item->author->id]) }}">
                                {{ $item->author->id == auth()->id() ? 'Tôi' : $item->author->name }}
                            </a>
                        </td>
                        <td>
                            @foreach($item->receiver as $r)
                                <a href="{{ route('official_dispatch.index', ['receiver' => $r->id]) }}">
                                    {{ $r->id == auth()->id() ? 'Tôi' : $r->name }}
                                </a> @if(!$loop->last),  @endif 
                            @endforeach
                        </td>
                        <td>
                            @if($item->categories->isEmpty())
                                --
                            @else
                                @foreach($item->categories as $category)
                                    <a href="{{ route('official_dispatch.index', ['category' => $category->slug]) }}">{{ $category->name }}</a> @if(!$loop->last),  @endif 
                                @endforeach
                            @endif
                        </td>
                        <td>{{ formatDate($item->created_at) }}</td>
                        <td class="text-center">
                            <div class="d-inline-flex justify-content-center">
                                @if(auth()->user()->can('official_dispatch.edit') || $item->author_id == auth()->id())
                                <a href="{{ route('official_dispatch.edit', $item) }}" class="dropdown-item px-2 rounded">
                                    <i class="fa fa-pencil mr-1"></i> {{ __('Edit') }}
                                </a>
                                @endcan

                                @can('official_dispatch.delete')
                                <a href="javascript:void(0)" data-action-url="{{ route('official_dispatch.destroy', $item) }}" 
                                    data-behavior="delete-resource" class="dropdown-item px-2 rounded">
                                    <i class="fa fa-trash mr-1"></i> {{ __('Delete') }}
                                </a>
                                @endcan
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $officialDispatch->appends(request()->except('page'))->links('vendor.pagination.bootstrap-4BK') }}
        </div>
    </div>
</x-app-layout>