@extends('layouts.front')

@push('css')
    <link rel="stylesheet" href="/front/dependencies/toastr/toastr.min.css" type="text/css">
	<link href="{{ asset('css/styles.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" type="text/css">
    
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @livewireStyles
    <style>
		.media-library-hidden {
			display: none !important;
		}
	</style>
    <style>
        :root {
            --text-red-color: #f44a4a;
            --background-white-bg-color: #fff;
            --text-black-color: #29303b;
        }
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
        .profile-item-block {
            padding: 40px 0;
            background-color: #F6F7FC;
        }
        .profile-info-block {
            padding: 30px 15px;
            background-color: var(--background-white-bg-color);
            margin-bottom: 41px;
            border-radius: 6px;
        }
        .profile-info-block .profile-heading {
            font-size: 20px;
            color: var(--text-black-color);
            padding-bottom: 20px;
            margin-bottom: 20px;
        }
        .card {
            border: 0;
        }
        .card-header {
            background: #fff;
            border-bottom: 0;
        }
        .card-title {
            font-size: 20px;
        }
        .font-size-base {
            font-size: 14px;
            color: #716E6E;
            font-weight: 400;
        }
        .btn.btn-primary {
            border-radius: 3px;
        }
        .form-group label {
            font-weight: 500;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        thead {
            background: #1e75b1;
            color: #fff;
        }
        tbody {
            color: #4c4848;
        }
        tbody tr:nth-child(even) {
            background: #dbeaf5;
        }
        .btn-edit:hover {
            color: #0070f7;
        }
        .btn-delete:hover {
            color: #e23149;
        }
        .search-form {
            width: 300px;
        }
        .media-library-button {
            z-index: 5;
        }
        @media(max-width: 1919px) {
            
        }
        @media(max-width: 1599px) {
            
        }
        @media(max-width: 1399px) {
            
        }
        @media(max-width: 1199px) {
            
        }
        @media(max-width: 991px) {
            
        }
        @media(max-width: 767px) {
            
        }
        @media(max-width: 575px) {
            .search-form {
                width: 250px;
            }
        }
        @media(max-width: 400px) {
            
        }
    </style>
@endpush
@section('page')
<section id="profile-item" class="profile-item-block">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4">
                @include('front.user._sidebar')
            </div>
            
            <div class="col-xl-9 col-lg-8">
                <div class="profile-info-block">
                    <form action="{{ route('action-news.update', $post->id) }}" method="post" id="create_form">
                        @csrf
                        <input type="hidden" name="is_featured" value="0">
                        <input type="hidden" name="is_new" value="0">
                        <input type="hidden" name="categories[]" value="{{$category->id}}">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between">
                                    <h5 class="card-title">{{ __('Chỉnh sửa bài viết') }}</h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>{{ __('Tiêu đề') }}:</label>
                                    <input type="text" name="title" value="{{ old('title', $post->title) }}" class="form-control @error('title')is-invalid @enderror" placeholder="Add title">
                                    @error('title')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
        
                                <div class="form-group">
                                    <label>{{ __('Mô tả ngắn') }}:</label>
                                    <textarea name="excerpt" class="form-control @error('excerpt')is-invalid @enderror" placeholder="Add excerpt" rows="6">{{ old('excerpt', $post->excerpt) }}</textarea>
                                    @error('excerpt')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
        
                                <div class="form-group">
                                    <label>{{ __('Hình ảnh') }}:</label>
                                    <x-media-library-collection
                                        name="media"
                                        :model="$post"
                                        collection="media"
                                        rules="mimes:png,jpeg,pdf,webp"
                                        max-items="1"
                                    />
                                </div>
        
                                <div class="form-group">
                                    <label>{{ __('Nội dung') }}:</label>
                                    <textarea name="body" class="editor form-control @error('body')is-invalid @enderror" placeholder="Add content" >{{ old('body', $post->body) }}</textarea>
                                    @error('body')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>{{ __('Tags') }}</label>
                                    <select multiple="multiple" class="form-control" id="select-tag" data-fouc name="tags[]">
                                        @foreach($tags as $tag)
                                            <option {{ in_array($tag->name, old('tags', $post->tags()->pluck('name')->toArray())) ? 'selected' : null }} value="{{ $tag->name }}">{{ $tag->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary"><i class="icon-paperplane mr-2"></i>{{ __('Lưu') }} </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@stop

@section('custom-js')
    <script src="/front/dependencies/toastr/toastr.min.js"></script>
    @livewireScripts
    @if(session()->has('success'))
        <script>
            toastr.success("{{ session('success') }}", 'Thành công')
        </script>
    @endif

    <script>
        $(function() {
            $('#select-tag').select2({
                tags: true,
                tokenSeparators: [',']
            });

            setSearchSelect2($('#select-projects'), "{{ route('projects.search') }}")
        })
    </script>
    <script>
        $('#create_form').on('submit', function() {
            $(this).find('[type=submit]').attr("disabled", true);
            return true;
        });
    </script>
@endsection