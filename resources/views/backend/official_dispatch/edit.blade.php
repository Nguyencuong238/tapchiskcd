<x-app-layout>
    <form action="{{ route('official_dispatch.update', $officialDispatch) }}" method="post">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title">Chỉnh sửa Công văn</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>{{ __('Title') }}:</label>
                            <input type="text" name="title" value="{{ old('title', $officialDispatch->title) }}" class="form-control @error('title')is-invalid @enderror" placeholder="Add title">
                            @error('title')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>{{ __('Image') }}:</label>
                            <x-media-library-collection
                                name="media"
                                :model="$officialDispatch"
                                collection="media"
                                rules="mimes:png,jpeg,jpg,webp"
                                max-items="1"
                            />
                        </div>

                        <div class="form-group">
                            <label>{{ __('Tệp đính kèm') }}:</label>
                            <x-media-library-collection
                                name="attachments"
                                :model="$officialDispatch"
                                collection="attachments"
                            />
                        </div>

                        <div class="form-group">
                            <label>{{ __('Content') }}:</label>
                            <textarea name="body" class="editor form-control @error('body')is-invalid @enderror" placeholder="Add content">{{ old('body', $officialDispatch->body) }}</textarea>
                            @error('body')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        {{--  <div class="form-group">
                            <label>Ghi chú:</label>
                            <textarea name="note" class="form-control @error('note')is-invalid @enderror" placeholder="Thêm ghi chú">{{ old('note', $officialDispatch->note) }}</textarea>
                            @error('note')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>  --}}
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
                        <div class="card-body">
                            <button type="submit" class="btn btn-success"><i class="icon-paperplane mr-2"></i>{{ __('Save') }} </button>
                            <a href="{{ route('official_dispatch.index') }}" class="btn btn btn-light ml-2"><i class="icon-backward mr-2"></i>{{ __('Back') }} </a>
                            {{--  <a href="{{ $officialDispatch->showUrl() }}" target="_blank" class="btn btn btn-primary ml-2">
                                <i class="icon-eye mr-2"></i>{{ __('View') }} </a>  --}}
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
                            @include('backend.official_dispatch._categories', ['categories' => $categories, 'selected' => old('categories', $officialDispatch->categories()->pluck('id')->toArray())])
                        </div>
                    </div>
                </div>


                <div class="card">
                    <div class="sidebar-section-header">
                        <span class="font-weight-semibold">{{ __('Nhười nhận') }}</span>
                        <div class="list-icons ml-auto">
                            <a href="#tag" class="list-icons-item" data-toggle="collapse" aria-expanded="true">
                                <i class="icon-arrow-down12"></i>
                            </a>
                        </div>
                    </div>

                    <div class="collapse show">
                        <div class="card-body">
                            <div class="form-group">
                                <select name="receiver[]" data-placeholder="{{ __('Chọn người nhận') }}"  multiple class="form-control form-control-select2 @error('receiver')is-invalid @enderror" data-fouc>
                                    <option></option>
                                    @foreach($otherUsers as $item)
                                        <option {{ in_array($item->id, old('receiver', $receiver_ids)) ? 'selected' : null }} value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('receiver')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    
</x-app-layout>