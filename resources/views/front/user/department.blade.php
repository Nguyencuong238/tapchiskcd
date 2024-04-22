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
                    <form action="{{ route('user.department-save') }}" method="post">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between">
                                    <h5 class="card-title ">{{ __('Thông Tin Ban Ngành/ Cộng Đoàn') }}</h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>{{ __('Tên Ban ngành/Cộng đoàn') }}:</label>
                                    <input type="text" name="name" value="{{ old('name', $department->name) }}" class="form-control @error('name')is-invalid @enderror" required>
                                    @error('name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group d-flex">
                                    <div class="me-4">
                                        <input id="ban-nganh" name="type" type="radio" value="1" {{ old('type', $department->type) != 2 ? 'checked' : '' }}>
                                        <label for="ban-nganh">{{ __('Ban ngành') }}</label>
                                    </div>
                                    <div>
                                        <input id="cong-doan" name="type" type="radio" value="2" {{ old('type', $department->type) == 2 ? 'checked' : '' }}>
                                        <label for="cong-doan">{{ __('Cộng đoàn') }}</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>{{ __('Hình ảnh') }}:</label>
                                    <x-media-library-collection
                                        name="media"
                                        :model="$department"
                                        collection="media"
                                        rules="mimes:png,jpeg,pdf"
                                        max-items="1"
                                    />
                                </div>
        
                                <div class="form-group">
                                    <label>{{ __('Địa chỉ') }}:</label>
                                    <input name="address" class="form-control @error('address')is-invalid @enderror" value="{{ old('address', $department->address) }}" required>
                                    @error('address')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label>{{ __('Thông tin liên hệ') }}:</label>
                                    <input name="contact" class="form-control @error('contact')is-invalid @enderror" value="{{ old('contact', $department->contact) }}" required>
                                    @error('contact')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
        
                                <div class="form-group">
                                    <label>{{ __('Số lượng thành viên') }}:</label>
                                    <input name="amount" type="number" class="form-control @error('amount')is-invalid @enderror" value="{{ old('amount', $department->amount) }}" required>
                                    @error('amount')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
        
                                <div class="form-group mt-5">
                                    <label>{{ __('Giới thiệu') }}:</label>

                                    <textarea name="introduction" class="editor form-control @error('introduction')is-invalid @enderror" rows="4">{!! old('introduction', @$department->introduction) !!}</textarea>

                                    @error('introduction')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
        
                                <div class="form-group mt-5">
                                    <label>{{ __('Lịch sử hoạt động') }}:</label>
                                    <textarea name="activity" class="editor form-control @error('activity')is-invalid @enderror" rows="6">{{ old('activity',$department->activity) }}</textarea>
                                    @error('activity')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                <div class="pt-3">
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
@endsection