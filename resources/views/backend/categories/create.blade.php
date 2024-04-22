<x-app-layout>
    <form action="{{ route('categories.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title">{{ __('Create Category') }}</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>{{ __('Category') }}:</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name')is-invalid @enderror" >
                            @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>{{ __('Parent') }}:</label>
                            <select name="parent_id" data-placeholder="{{ __('Danh mục cha') }}" class="form-control form-control-select2 @error('type')is-invalid @enderror" data-fouc>
                                <option {{ old('parent_id') == 'root' ? 'selected' : null }} value="root">{{ __('- Danh mục cha') }}</option>
                                @foreach($parentCategories as $pc)
                                    <option {{ old('parent_id') == $pc->id ? 'selected' : null }} value="{{ $pc->id }}">{!! $pc->selectText() !!}</option>
                                @endforeach
                            </select>
                            @error('parent_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>{{ __('Type') }}:</label>
                            <select name="type" data-placeholder="{{ __('Loại danh mục') }}" class="form-control form-control-select2 @error('type')is-invalid @enderror" data-fouc>
                                <option></option>
                                <option {{ old('type') == 'post' ? 'selected' : null }} value="post">Đề tài</option>
                                <option {{ old('type') == 'document' ? 'selected' : null }} value="document">Văn bản - Tài liệu</option>
                                <option {{ old('type') == 'official_dispatch' ? 'selected' : null }} value="official_dispatch">Công văn</option>
                            </select>
                            @error('type')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    {{--  @include('backend.posts._meta', ['model' => new \App\Models\Category])  --}}
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
                            <a href="{{ route('categories.index') }}" class="btn btn btn-light ml-2"><i class="icon-backward mr-2"></i>{{ __('Back') }} </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

</x-app-layout>
