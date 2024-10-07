<x-app-layout>
    @push('css')
    <style>
        .btn-purple {
            background: #7952b3;
            border-color: #7952b3;
        }
    </style>
    @endpush
    <div class="card">
        @php
            $pageTitles = [
                0 => 'Đề tài chờ TB đơn vị duyệt',
                        1 => 'Đề tài chờ Tổng thư ký duyệt',
                        2 => 'Đề tài chờ TBT duyệt',
                        3 => 'Đề tài được duyệt',
                        -1 => 'Đề tài bị trả lại'
            ];
        @endphp
        <div class="card-header">
            <h5 class="card-title">{{ $pageTitles[request('status', 0)] }}</h5>

            <div class="d-flex justify-content-between mt-2">
                <form action="">
                <input type="search" style="width: 300px;" class="form-control" name="search" value="{{ request('search') }}" placeholder="Tìm kiếm">
                </form>
                @can('posts.create')
                <a href="{{ route('posts.create') }}" class="btn btn-primary"><i class="icon-plus-circle2 mr-1"></i> {{ __('Thêm') }}</a>
                @endcan
            </div>
        </div>
        @php
            $statusNames = [
                0 => ['name' => 'Chờ trưởng phòng duyệt', 'color' => 'primary'],
                1 => ['name' => 'Chờ tổng biên tập duyệt', 'color' => 'success'],
                -1 => ['name' => 'Trưởng phòng đã từ chối', 'color' => 'danger'],
                2 => ['name' => 'Tổng biên tập đã duyệt', 'color' => 'purple'],
                -2 => ['name' => 'Tổng biên tập đã từ chối', 'color' => 'warning'],
            ];
        @endphp
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('Title') }}</th>
                        <th>{{ __('Author') }}</th>
                        <th>{{ __('Categories') }}</th>
                        {{--  <th>{{ __('Tags') }}</th>  --}}
                        <th>{{ __('Date') }}</th>
                        {{--  <th>Trạng thái</th>  --}}
                        <th class="text-center">{{ __('Action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            {{--  <a href="{{ $post->showUrl() }}" target="_blank" rel="noopener noreferrer">  --}}
                                {{ $post->title }}
                            {{--  </a>  --}}
                        </td>
                        <td>
                            <a href="{{ route('posts.index', ['author' => $post->author->id]) }}">
                                {{ $post->author_id == auth()->id() ? 'Tôi' : $post->author->name }}
                            </a>
                        </td>
                        <td>
                            @if($post->categories->isEmpty())
                                --
                            @else
                                @foreach($post->categories as $category)
                                    <a href="{{ route('posts.index', ['category' => $category->slug]) }}">{{ $category->name }}</a> @if(!$loop->last),  @endif 
                                @endforeach
                            @endif
                        </td>
                        <td>{{ formatDate($post->created_at) }}</td>
                        {{--  <td><span class="btn btn-{{$statusNames[$post->status]['color']}}">{{ $statusNames[$post->status]['name'] }}</span></td>  --}}
                        <td class="text-center">
                            <div class="d-inline-flex justify-content-center">
                                @can('posts.view')
                                <a href="{{ route('posts.show', $post) }}" class="dropdown-item px-1 rounded" title="{{ __('View') }}">
                                    <i class="icon-eye mr-1"></i>
                                </a>
                                @endcan

                                @if(auth()->user()->id == $post->author_id && $post->status <= 0 || auth()->id() == 1)
                                    <a href="{{ route('posts.edit', $post) }}" class="dropdown-item px-1 rounded" title="{{ __('Edit') }}">
                                        <i class="fa fa-pencil mr-1"></i>
                                    </a>
                                    <a href="javascript:void(0)" data-action-url="{{ route('posts.destroy', $post) }}" 
                                        data-behavior="delete-resource" class="dropdown-item px-1 rounded" title="{{ __('Delete') }}">
                                        <i class="fa fa-trash mr-1"></i> 
                                    </a>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $posts->appends(request()->except('page'))->links('vendor.pagination.bootstrap-4BK') }}
        </div>
    </div>
</x-app-layout>