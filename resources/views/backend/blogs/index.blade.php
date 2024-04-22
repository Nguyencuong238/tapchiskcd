<x-app-layout>
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">{{ __('Blog bài viết') }}</h5>

            <div class="d-flex justify-content-between mt-2">
                <form action="">
                <input type="search" style="width: 300px;" class="form-control" name="search" value="{{ request('search') }}" placeholder="Search">
                </form>
                <a href="{{ route('blogs.create') }}" class="btn btn-primary"><i class="icon-plus-circle2 mr-1"></i> {{ __('Create') }}</a>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('Title') }}</th>
                        <th>{{ __('Author') }}</th>
                        <th>{{ __('Categories') }}</th>
                        <th>{{ __('Tags') }}</th>
                        <th>{{ __('Date') }}</th>
                        <th class="text-center">{{ __('Action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($blogs as $blog)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><a href="{{ $blog->showUrl() }}" target="_blank" rel="noopener noreferrer">{{ $blog->title }}</a></td>
                        <td><a href="{{ route('blogs.index', ['author' => $blog->author->email]) }}">{{ $blog->author->name }}</a></td>
                        <td>
                            @if($blog->categories->isEmpty())
                                --
                            @else
                                @foreach($blog->categories as $category)
                                    <a href="{{ route('blogs.index', ['category' => $category->slug]) }}">{{ $category->name }}</a> @if(!$loop->last),  @endif 
                                @endforeach
                            @endif
                        </td>
                        <td>
                            @if($blog->tags->isEmpty())
                                --
                            @else
                                @foreach($blog->tags as $tag)
                                    <a href="{{ route('blogs.index', ['tag' => $tag->slug]) }}">{{ $tag->name }}</a> @if(!$loop->last),  @endif 
                                @endforeach
                            @endif
                        </td>
                        <td>{{ formatDate($blog->created_at) }}</td>
                        <td class="text-center">
                            <div class="list-icons">
                                <div class="dropdown">
                                    <a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="{{ route('blogs.edit', $blog) }}" class="dropdown-item"><i class="icon-pencil7"></i> {{ __('Edit') }}</a>
                                        <a href="javascript:void(0)" data-action-url="{{ route('blogs.destroy', $blog) }}" data-behavior="delete-resource" class="dropdown-item"><i class="icon-gear"></i> {{ __('Delete') }}</a>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $blogs->appends(request()->except('page'))->links('vendor.pagination.bootstrap-4BK') }}
        </div>
    </div>
</x-app-layout>