<x-app-layout>
    @push('css')
	    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    @endpush

    <form action="{{ route('official_dispatch.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title">Thêm Công văn @if(request('type') == 'receive') đến @else đi @endif</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <input type="hidden" name="type" value="{{request('type')}}">

                        <div class="form-group">
                            <label>{{ __('Title') }}:</label>
                            <input type="text" name="title" value="{{ old('title') }}" class="form-control @error('title')is-invalid @enderror">
                            @error('title')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>{{ __('Số hiệu') }}:</label>
                            <input type="text" name="code" value="{{ old('code') }}" class="form-control @error('code')is-invalid @enderror">
                            @error('code')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        @if(request('type') == 'receive')
                        <div class="form-group">
                            <label>Nơi gửi:</label>
                            <input type="text" name="sending_place" value="{{ old('sending_place') }}" class="form-control @error('sending_place')is-invalid @enderror">
                            @error('sending_place')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Ngày nhận:</label>
                            <div class="input-group">
                                <input type="text" name="date_receive" value="{{ old('date_receive') }}" 
                                    class="form-control date_receive cursor-pointer @error('date_receive')is-invalid @enderror">
                                <div class="input-group-append date-picker-icon cursor-pointer">
                                    <span class="input-group-text">
                                        <i class="icon-calendar"></i>
                                    </span>
                                </div>
                            </div>
                            @error('date_receive')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Số công văn đến:</label>
                            <input type="text" name="count" value="{{ old('count') }}" class="form-control @error('count')is-invalid @enderror">
                            @error('count')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        @endif

                        <div class="form-group">
                            <label>Tóm tắt nội dung:</label>
                            <textarea name="body" class="editor form-control @error('body')is-invalid @enderror" placeholder="Tóm tắt nội dung">{{ old('body') }}</textarea>
                            @error('body')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>{{ __('Image') }}:</label>
                            @php
                                $officialDispatch = new \App\Models\OfficialDispatch;
                            @endphp
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
                            @php
                                $officialDispatch = new \App\Models\OfficialDispatch;
                            @endphp
                            <x-media-library-collection
                                name="attachments"
                                :model="$officialDispatch"
                                collection="attachments"
                            />
                        </div>

                        <div class="form-group">
                            @if(request('type') == 'receive')
                            <label>Phòng ban xử lý: </label>
                            @else
                            <label>Của phòng ban: </label>
                            @endif
                            <select class="form-control form-control-select2 w-100" name="department_id">
                                <option value="">{{ __('-- Phòng ban --') }}</option>
                                @foreach($departments as $d)
                                    <option {{ $d->id == old('department_id') ? 'selected' : null }} value="{{ $d->id }}">{{ $d->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        @if(request('type') == 'receive')
                        <div class="form-group">
                            <label>Thời gian xử lý:</label>
                            <div class="input-group">
                                <input type="text" name="date_handle" value="{{ old('date_handle') }}" 
                                    class="form-control date_handle cursor-pointer @error('date_handle')is-invalid @enderror">
                                <div class="input-group-append date-picker-icon cursor-pointer">
                                    <span class="input-group-text">
                                        <i class="icon-calendar"></i>
                                    </span>
                                </div>
                            </div>
                            @error('date_handle')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        @endif
                        
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
                            @include('backend.official_dispatch._categories', ['categories' => $categories, 'selected' => old('categories', [])])
                        </div>
                    </div>
                </div>
                </div>

            </div>
        </div>
    </form>
    
    @push('js')
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script>
            $(function() {
                $('#select-user').select2({
                    tags: true,
                    tokenSeparators: [',']
                });

                $('.dispatch-select2').select2({
                    minimumResultsForSearch: -1
                });

                $(".date_receive").flatpickr({
                    altInput: true,
                    dateFormat: "Y-m-d",
                    altFormat: 'd/m/Y'
                })

                $(".date_handle").flatpickr({
                    altInput: true,
                    dateFormat: "Y-m-d",
                    altFormat: 'd/m/Y'
                })

                $('.date-picker-icon').on('click', function() {
                    $(this).siblings('input').trigger('click');
                })
            })
        </script>
    @endpush
</x-app-layout>