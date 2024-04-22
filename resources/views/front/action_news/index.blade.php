@extends('layouts.front')

@push('css')
    <link rel="stylesheet" href="/front/dependencies/toastr/toastr.min.css" type="text/css">

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
            .form_search {
                width: 100%;
                margin-bottom: 15px;
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
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-4">{{ __('Tin Hoạt Động') }}</h5>

                            <div class="d-flex flex-wrap justify-content-between mt-2">
                                <form action="" class="form_search">
                                    <input type="search" class="form-control search-input" name="search" 
                                        value="{{ request('search') }}" placeholder="Tìm kiếm . . .">
                                </form>
                                <a href="{{ route('action-news.create') }}" class="btn btn-primary">
                                    <i class="icon-plus-circle2 mr-1"></i> {{ __('Thêm') }}</a>
                            </div>
                        </div>
                
                        <div class="card-body table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ __('Tiêu đề') }}</th>
                                        <th>{{ __('Ngày tạo') }}</th>
                                        <th>{{ __('Hành động') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($posts as $key => $post)
                                    <tr>
                                        <td>{{ ($posts->currentpage()-1) * $posts->perpage() + $key+1 }}</td>
                                        <td><a href="{{ $post->showUrl() }}" target="_blank">{{ $post->title }}</a></td>
                                        <td>{{ formatDate($post->created_at) }}</td>
                                        <td class="td-action">
                                            <a href="{{ route('action-news.edit', $post->id) }}" class="dropdown-item btn-edit me-3" title="{{ __('Sửa') }}">
                                                <i class="fa fa-pencil"></i> {{ __('Sửa') }}</a>
                                            <a href="javascript:void(0)" title="{{ __('Xóa') }}" class="dropdown-item btn-delete"
                                                data-action-url="{{ route('action-news.delete', $post) }}" 
                                                data-behavior="delete-resource">
                                                <i class="fa fa-trash"></i> {{ __('Xóa') }}</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                
                            {{ $posts->appends(request()->except('page'))->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop

@section('custom-js')
    <script src="/front/dependencies/toastr/toastr.min.js"></script>

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
    <script>
        $('.btn-edit').on('click', function() {
            var item = $(this).data('item');
            
            $('#edit_modal').modal('show');
            $('#edit_modal').find('[name=id]').val(item.id);
            $('#edit_modal').find('[name=name]').val(item.name);
            $('#edit_modal').find('[name=position]').val(item.position);
        });
    </script>
@endsection