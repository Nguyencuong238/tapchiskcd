@extends('layouts.front')

@push('css')
    <link rel="stylesheet" href="/front/dependencies/toastr/toastr.min.css" type="text/css">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" type="text/css">
    
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @livewireStyles
    <style>
		.media-library-hidden {
			display: none !important;
		}
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
            min-height: 400px;
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
        .td-action .dropdown-item {
            display: inline;
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
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex flex-wrap justify-content-between align-items-center">
                                <h5 class="card-title">{{ __('Video') }}</h5>

                                <button class="btn btn-primary" data-toggle="modal" data-target="#create_modal">
                                    <i class="icon-plus-circle2 mr-1"></i> {{ __('Thêm') }}
                                </button>
                            </div>
                        </div>
                
                        <div class="card-body table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ __('Tiêu đề') }}</th>
                                        <th>{{ __('Link') }}</th>
                                        <th>{{ __('Ngày tạo') }}</th>
                                        <th>{{ __('Hành động') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($videos as $video)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $video->title }}</td>
                                        <td><a href="{{ $video->link }}" target="_blank" rel="noopener noreferrer">{{ $video->link }}</a></td>
                                        <td>{{ $video->created_at }}</td>
                                        <td class="td-action">
                                            <a class="dropdown-item btn-edit me-3" href="{{route('user-video.edit', $video->id)}}">
                                                <i class="fa fa-pencil"></i> {{ __('Sửa') }}</a>
                                            <a href="javascript:void(0)" data-action-url="{{ route('user-video.delete', $video) }}" 
                                                data-behavior="delete-resource" class="dropdown-item btn-delete">
                                                <i class="fa fa-trash"></i> {{ __('Xóa') }}</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                
                            {{-- {{ $posts->appends(request()->except('page'))->links() }} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" tabindex="-1" role="dialog" id="create_modal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mt-0">Thêm hình video</h5>
                    </div>
                    <form action="{{ route('user-video.store') }}" method="post" id="create_form">
                        @csrf
                        <div class="modal-body">

                            <div class="form-group">
                                <label>{{ __('Tiêu đề') }}:</label>
                                <input type="text" name="title" value="{{ old('title') }}" class="form-control @error('title')is-invalid @enderror" required>
                                @error('title')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>{{ __('Link') }}:</label>
                                <input type="text" name="link" value="{{ old('link') }}" class="form-control @error('link')is-invalid @enderror" required>
                                @error('link')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>{{ __('Hình ảnh') }}:</label>
                                @php
                                    $video = new \App\Models\Video;
                                @endphp
                                <x-media-library-collection
                                    name="media"
                                    :model="$video"
                                    collection="media"
                                    rules="mimes:png,jpeg,jpg,webp"
                                    max-items="1"
                                />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" type="submit">Lưu</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
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

    @if(session()->has('error'))
        <script>
            toastr.success("{{ session('error') }}", 'Thất bại')
        </script>
    @endif

    @if($errors->any())
        <script>
            toastr.error("{{ implode(' ', $errors->all()) }}", 'Thất bại')
        </script>
    @endif
    <script>
        $('#create_form').on('submit', function() {
            $(this).find('[type=submit]').attr("disabled", true);
            return true;
        });
    </script>
@endsection