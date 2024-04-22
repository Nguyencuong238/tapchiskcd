<x-app-layout>
    @push('css')
    <style>
        .border-content {
            border: 1px solid #ddd;
            padding: 7px 14px;
            border-radius: 4px;
        }
    </style>
    @endpush
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title">Xem đề tài</h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>{{ __('Title') }}:</label>
                        <div class="border-content">{{ $post->title }}</div>
                    </div>

                    <div class="form-group">
                        <label>Mô tả:</label>
                        <div class="border-content">{{ $post->excerpt }}</div>
                    </div>

                    <div class="form-group">
                        <label>{{ __('Image') }}:</label>
                        <x-media-library-collection
                            name="media"
                            :model="$post"
                            collection="media"
                            rules="mimes:png,jpeg,jpg,webp"
                            max-items="1"
                        />
                    </div>

                    <div class="form-group">
                        <label>{{ __('Tệp đính kèm') }}:</label>
                        <x-media-library-collection
                            name="attachments"
                            :model="$post"
                            collection="attachments"
                            max-items="{{$post->getMedia()->count()}}"
                        />
                    </div>

                    <div class="form-group">
                        <label>{{ __('Content') }}:</label>
                        <div class="border-content">{!! $post->body !!}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="sidebar-section-header">
                    <span class="font-weight-semibold">{{ __('Publish') }}</span>
                    <div class="list-icons ml-auto">
                        <a href="#publish" class="list-icons-item" data-toggle="collapse" aria-expanded="true">
                            <i class="icon-arrow-down12"></i>
                        </a>
                    </div>
                </div>

                <div class="collapse show" id="publish">
                    <div class="card-body d-flex flex-wrap">
                        @if($post->author_id != auth()->id() && (
                            auth()->user()->position == 'director' || auth()->user()->position == 'manager' && $post->status != 2)
                        )
                        @if(auth()->user()->position == 'manager' && $post->status == 0 
                            || auth()->user()->position == 'director' && $post->status == 1)
                            <form action="{{route('posts.updateStatus')}}" method="post" class="d-inline-block mb-2">
                                @csrf

                                <input type="hidden" name="id" value="{{$post->id}}">
                                <input type="hidden" name="status" value="{{auth()->user()->position == 'director' ? 2 : 1}}">
                                <button type="submit" class="btn btn-success px-2"><i class="icon-check"></i> Phê Duyệt </button>
                            </form>

                            <form action="{{route('posts.updateStatus')}}" method="post" class="d-inline-block mb-2 ml-1">
                                @csrf

                                <input type="hidden" name="id" value="{{$post->id}}">
                                <input type="hidden" name="status" value="{{auth()->user()->position == 'director' ? -2 : -1}}">
                                <button type="submit" class="btn btn-danger px-2"><i class="icon-close2"></i> Từ chối </button>
                            </form>
                        @elseif($post->status > 0)
                            <form action="{{route('posts.updateStatus')}}" method="post" class="d-inline-block mb-2 ml-1">
                                @csrf

                                <input type="hidden" name="id" value="{{$post->id}}">
                                <input type="hidden" name="status" value="{{auth()->user()->position == 'director' ? -2 : -1}}">
                                <button type="submit" class="btn btn-danger px-2"><i class="icon-close2"></i> Từ chối </button>
                            </form>
                        @else
                            <form action="{{route('posts.updateStatus')}}" method="post" class="d-inline-block mb-2">
                                @csrf

                                <input type="hidden" name="id" value="{{$post->id}}">
                                <input type="hidden" name="status" value="{{auth()->user()->position == 'director' ? 2 : 1}}">
                                <button type="submit" class="btn btn-success px-2"><i class="icon-check"></i> Phê Duyệt </button>
                            </form>
                        @endif
                        @endif
                        <a href="{{ route('posts.index') }}" class="btn btn btn-light px-2 mb-2 ml-1"><i class="icon-backward"></i> {{ __('Back') }} </a>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="sidebar-section-header">
                    <span class="font-weight-semibold">{{ __('Categories') }}</span>
                    <div class="list-icons ml-auto">
                        <a href="#category" class="list-icons-item" data-toggle="collapse" aria-expanded="true">
                            <i class="icon-arrow-down12"></i>
                        </a>
                    </div>
                </div>
                <div class="collapse show" id="category">
                    <div class="card-body">
                        @include('backend.posts._categories', ['categories' => $categories, 'selected' => $selectedIds, 'disabled' => true])
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="sidebar-section-header">
                    <span class="font-weight-semibold">{{ __('Thời gian') }}</span>
                    <div class="list-icons ml-auto">
                        <a href="#category" class="list-icons-item" data-toggle="collapse" aria-expanded="true">
                            <i class="icon-arrow-down12"></i>
                        </a>
                    </div>
                </div>

                <div class="collapse show">
                    <div class="card-body">
                        <div class="form-group">
                            <label>{{ __('Ngày bắt đầu') }}:</label>
                            <div class="border-content">{{ $post->start_date }}</div>
                        </div>
                        <div class="form-group">
                            <label>{{ __('Ngày kết thúc') }}:</label>
                            <div class="border-content">{{ $post->end_date }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>