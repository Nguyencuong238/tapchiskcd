<x-app-layout>
    @push('css')
	    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <style>
            .fs-6pt {
                font-size: 6pt !important;
            }
            .fs-8pt {
                font-size: 8pt !important;
            }
            .fs-10pt {
                font-size: 10pt !important;
            }
            .fs-11pt {
                font-size: 11pt !important;
            }
            .fs-12pt {
                font-size: 12pt !important;
            }
            .fs-12pt5 {
                font-size: 12.5pt !important;
            }
            .fs-13pt {
                font-size: 12pt !important;
            }
            .fs-14pt {
                font-size: 14pt !important;
            }
            .fs-18pt {
                font-size: 18pt !important;
            }
            .fw-600 {
                font-weight: 600 !important;
            }
            .section-ggt input {
                height: 14pt;
                border: 0;
                border-bottom: 1px dashed;
                outline: 0;
            }
            hr {
                border-color: #888;
            }
            .section-ggt textarea {
                resize: none;
            }

            .section-ggt input, .section-ggt textarea {
                color: #333;
            }
            .action-bar {
                position: fixed;
                bottom: 0;
                padding-top: 20px;
                background: whitesmoke;
                width: 100%;
            }
            .fa-times {
                position: absolute;
                font-size: 15px;
                border: 1px solid #ccc;
                width: 26px;
                height: 26px;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                right: -12px;
                top: -12px;
                background: #fff;
                cursor: pointer;
            }

            .custom-checkbox .custom-control-label.error:before {
                border-color: red;
            }
            @page {
                size: auto;
            }
            @media print {
                .section-ggt {
                    border: 0;
                    width: 100%;
                    margin-bottom: 0 !important;
                    page-break-after: always;
                }
                .section-ggt:last-child {
                    page-break-after: auto;
                }
                .section-ggt input {
                    border: 0;
                    height: auto;
                }
                .print-hide {
                    display: none !important;
                }
                .print-show {
                    display: inline !important;
                }
                .d-print-inline {
                    display: inline !important;
                }
                .w-print-100 {
                    width: 100% !important;
                    flex: 0 0 100% !important;
                    max-width: 100% !important;
                    padding: 0 !important;
                }
                pre {
                    margin: 0;
                    padding: 0;
                    border: 0;
                    font-family: 'Times New Roman';
                }
                input, textarea {
                    color: #333;
                }
                .content {
                    padding: 0;
                }
            }
        </style>
    @endpush
    <form action="{{ route('posts.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-lg-12 w-print-100">
                <div class="card print-hide">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title">Đăng ký đề tài</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Tiêu đề:</label>
                            <input type="text" name="title" value="{{ old('title') }}" class="form-control @error('title')is-invalid @enderror" placeholder="Thêm tiêu đề">
                            @error('title')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        {{--  <div class="form-group">
                            <label>Mô tả:</label>
                            <textarea name="excerpt" class="form-control @error('excerpt')is-invalid @enderror" placeholder="Thêm mô tả">{{ old('excerpt') }}</textarea>
                            @error('excerpt')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>  --}}

                        <div class="form-group">
                            <label>{{ __('Hồ sơ, tư liệu phụ vụ đề tài') }}:</label>
                            @php
                                $post = new \App\Models\Post;
                            @endphp
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
                            @php
                                $post = new \App\Models\Post;
                            @endphp
                            <x-media-library-collection
                                name="attachments"
                                :model="$post"
                                collection="attachments"
                            />
                        </div>

                        <div class="form-group">
                            <label>Nội dung:</label>
                            <textarea name="body" class="editor form-control @error('body')is-invalid @enderror" placeholder="Thêm nội dung">{{ old('body') }}</textarea>
                            @error('body')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="row mb-4 dateline">
                            <div class="col-sm-6">
                                <label>{{ __('Ngày bắt đầu') }}:</label>
                                <input type="text" name="start_date" value="{{ old('start_date') }}" 
                                    class="form-control @error('start_date')is-invalid @enderror start_date">
                                @error('start_date')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label>{{ __('Ngày kết thúc') }}:</label>
                                <input type="text" name="end_date" value="{{ old('end_date') }}" 
                                    class="form-control @error('end_date')is-invalid @enderror end_date">
                                @error('end_date')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    
                        <div class="custom-control custom-checkbox pv-commit">
                            <input type="checkbox" class="custom-control-input" id="commit-checkbox">
                            <label class="custom-control-label" for="commit-checkbox">Tôi cam kết đã thu thập đủ chứng cứ ban đầu, hồ sơ tài liêu để thực hiện đề tài.</label>
                        </div>
                    </div>
                </div>

                <div class="card section-ggt mb-5">
                <i class="fa fa-times text-danger print-hide" title="Xóa"></i> 
                    <div class="card-body" style="font-family: 'Times New Roman';">
                        <div class="row">
                            <div class="col-4">
                                <div class="row">
                                    <div class="col-5">
                                        <div class="fs-6pt">HỘI GIÁO DỤC CHĂM SÓC SỨC KHỎE CỘNG ĐỒNG VIỆT NAM</div>
                                        <div class="fs-6pt text-center fw-600">TẠP CHÍ SỨC KHỎE<br>CỘNG ĐỒNG</div>
                                        <hr class="mt-2 mb-1" style="width: 60%;">
                                        <div class="fs-8pt">
                                            Số : ......Q....../GGT
                                        </div>
                                    </div>
                                    <div class="col-7 text-center">
                                        <div class="fs-6pt">CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</div>
                                        <div class="fs-8pt fw-600"> Độc lập – Tự do – Hạnh phúc</div>
                                        <hr style="margin-top: 10px; width: 75%;">
                                    </div>
                                </div>
                                <div class="fs-14pt text-center fw-600 mt-4">GIẤY GIỚI THIỆU</div>
                                <div class="fs-12pt text-center pt-2 pb-2">BAN BIÊN TẬP TRÂN TRỌNG GIỚI THIỆU</div>
                                <div class="d-flex mt-1 fs-11pt">
                                    <span class="mr-1">Ông (bà): </span>
                                    <input name="ggt[0][left][name]" class="flex-1">
                                </div>
                                <div class="mt-1 d-flex fs-11pt">
                                    <span class="mr-1">Chức vụ: </span>
                                    <input name="ggt[0][left][position]" class="flex-1">
                                </div>
                                <div class="d-flex mt-1">
                                    <span class="fs-11pt mr-1">Được cử đến: </span>
                                    <div class="flex-1">
                                        <input name="ggt[0][left][arrival_address_1]" class="fs-11pt w-100">
                                        <input name="ggt[0][left][arrival_address_2]" class="fs-11pt w-100">
                                        <input name="ggt[0][left][arrival_address_3]" class="fs-11pt w-100">
                                    </div>
                                </div>
                                <div class="d-flex d-print-inline mt-1 fs-11pt">
                                    <span class="mr-1">Về việc: </span>
                                    <pre class="d-none print-show fs-11pt"></pre>
                                    <textarea rows="3" class="print-hide flex-1" name="ggt[0][left][propose]"></textarea>
                                </div>
                                <div class="fs-11pt mt-1">
                                    Đề nghị Quý cơ quan tạo điều kiện để ông (bà): 
                                    <input name="ggt[0][left][suggest]" class="print-hide">
                                    <span class="d-none print-show"></span>
                                      hoàn thành nhiệm vụ.
                                </div>
                                <div class="fs-11pt mt-1">
                                    Giấy giới thiệu có giá trị đến hết ngày 
                                    <input name="ggt[0][left][expire_date]" style="width: 20px;">
                                     tháng  
                                     <input name="ggt[0][left][expire_month]" style="width: 20px;">
                                     năm 
                                     <input name="ggt[0][left][expire_year]" style="width: 35px;">
                                </div>
                                <div class="text-right mt-4 mb-4">
                                    <div class="d-inline-block text-center">
                                        <div class="fs-11pt font-italic">
                                            Hà Nội, ngày <input name="ggt[0][left][signature_date]" class="font-italic" style="width: 20px;">
                                             tháng <input name="ggt[0][left][signature_month]" class="font-italic" style="width: 20px;">
                                              năm <input name="ggt[0][left][signature_year]" class="font-italic" style="width: 35px;">
                                        </div>
                                        <div class="fw-600 fs-11pt mt-1 mb-4">TỔNG BIÊN TẬP</div>
                                        <input name="ggt[0][left][signature]" class="fs-12pt mt-3 text-center">
                                    </div>

                                </div>
                            </div>
                            <div class="col-8 pl-4" style="border-left: 1px solid">
                                <div class="row">
                                    <div class="col-5">
                                        <div class="fs-10pt text-center">HỘI GIÁO DỤC CHĂM SÓC SỨC KHỎE CỘNG ĐỒNG VIỆT NAM</div>
                                        <div class="fs-11pt text-center fw-600">TẠP CHÍ SỨC KHỎE CỘNG ĐỒNG</div>
                                        <hr class="mt-2 mb-1" style="width: 60%;">
                                        <div class="fs-11pt text-center">
                                            Số : ......Q....../GGT/SKCĐ
                                        </div>
                                    </div>
                                    <div class="col-7 text-center">
                                        <div class="fs-11pt fw-600">CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</div>
                                        <div class="fs-13pt"> Độc lập – Tự do – Hạnh phúc</div>
                                        <hr style="width: 33%;" class="mt-2 mb-2">
                                        <div class="fs-13pt font-italic">
                                            Hà Nội, ngày <input name="ggt[0][right][signature_date]" class="fs-11pt font-italic" style="width: 20px;">
                                                tháng <input name="ggt[0][right][signature_month]" class="fs-11pt font-italic" style="width: 20px;">
                                                năm <input name="ggt[0][right][signature_year]" class="fs-11pt font-italic" style="width: 35px;">
                                        </div>
                                    </div>
                                </div>
                                <div class="fs-18pt text-center fw-600 mt-4">GIẤY GIỚI THIỆU</div>
                                <div class="fs-12pt text-center pt-2 pb-2">BAN BIÊN TẬP TRÂN TRỌNG GIỚI THIỆU</div>
                                <div class="d-flex mt-1 fs-12pt5">
                                    <span class="mr-1 font-italic">Ông (bà): </span>
                                    <input name="ggt[0][right][name]" class="flex-1">
                                </div>
                                <div class="mt-1 d-flex fs-12pt5">
                                    <span class="mr-1 font-italic">Chức vụ: </span>
                                    <input name="ggt[0][right][position]" class="flex-1">
                                </div>
                                <div class="d-flex mt-1 fs-12pt5">
                                    <span class="mr-1 font-italic">Được cử đến: </span>
                                    <div class="flex-1">
                                        <input name="ggt[0][right][arrival_address_1]" class="w-100">
                                        <input name="ggt[0][right][arrival_address_2]" class="w-100">
                                        <input name="ggt[0][right][arrival_address_3]" class="w-100">
                                    </div>
                                </div>
                                <div class="d-flex d-print-inline mt-2 fs-12pt5">
                                    <span class="font-italic mr-1">Về việc: </span>
                                    <pre class="d-none print-show fs-11pt"></pre>
                                    <textarea rows="3" class="print-hide flex-1" name="ggt[0][right][propose]"></textarea>
                                </div>
                                <div class="fs-12pt5 mt-1">
                                    Đề nghị Quý cơ quan tạo điều kiện để ông (bà): 
                                    <input name="ggt[0][right][suggest]" class="print-hide">
                                    <span class="d-none print-show"></span>
                                      hoàn thành nhiệm vụ.
                                </div>
                                <div class="fs-12pt5 mt-1">
                                    Giấy giới thiệu có giá trị đến hết ngày 
                                    <input name="ggt[0][right][expire_date]" style="width: 20px;">
                                     tháng  
                                     <input name="ggt[0][right][expire_month]" style="width: 20px;">
                                     năm 
                                     <input name="ggt[0][right][expire_year]" style="width: 40px;">
                                </div>
                                <div class="row mt-4">
                                    <div class="col-6">
                                        <div class="fs-12pt fw-600 font-italic mb-2">Nơi nhận:</div>
                                        <div class="fs-10pt mb-2">- Như trên;</div>
                                        <div class="fs-10pt">- Lưu: Văn phòng</div>
                                    </div>
                                    <div class="col-6 text-center">
                                        <div class="fw-600 fs-13pt mb-5">TỔNG BIÊN TẬP</div>
                                        <input name="ggt[0][right][signature]" class="fs-13pt text-center">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{--  <div class="col-lg-3 print-hide">
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
                            @include('backend.posts._categories', ['categories' => $categories, 'selected' => old('categories', [])])
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label>{{ __('Ngày bắt đầu') }}:</label>
                            <input type="text" name="start_date" value="{{ old('start_date') }}" 
                                class="form-control @error('start_date')is-invalid @enderror start_date">
                            @error('start_date')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>{{ __('Ngày kết thúc') }}:</label>
                            <input type="text" name="end_date" value="{{ old('end_date') }}" 
                                class="form-control @error('end_date')is-invalid @enderror end_date">
                            @error('end_date')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

            </div>  --}}
        </div>

        <div class="action-bar print-hide pb-2">
            <button type="submit" class="btn btn-success"><i class="icon-paperplane mr-2"></i>Gửi </button>
            <a class="btn btn-primary mx-2" title="In giấy giới thiệu" onclick="window.print()">
                <i class="icon-printer2 mr-2"></i>{{ __('In GGT') }} 
            </a>

            <button type="button" class="btn btn-primary btn-add-ggt"><i class="icon-plus2 mr-1"></i>Thêm GGT</button>
        </div>
    </form>

    @push('js')
	    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script>
            $(function() {
                $(".start_date").flatpickr({
                    enableTime: false,
                    altInput: true,
                    dateFormat: "Y-m-d",
                    altFormat: 'd/m/Y'
                })

                $(".end_date").flatpickr({
                    enableTime: false,
                    altInput: true,
                    dateFormat: "Y-m-d",
                    altFormat: 'd/m/Y'
                })
            })
            $('textarea.print-hide, input.print-hide').on('change', function() {
                $(this).siblings('.print-show').html($(this).val());
            });

            var j = 1;
            $('.btn-add-ggt').on('click', function() {
                var html = $('#list_ggt').html();
                html = html.replaceAll('${j}', j);
                $('.w-print-100').append(html);
                j++;
            });


            $('.w-print-100').on('click', '.fa-times', function() {
                $(this).closest('.section-ggt').remove('');
            })

            $('.btn-success').on('click', function(e) {
                e.preventDefault();

                if(!$('.pv-commit input').is(':checked')) {
                    $('.dateline').get(0).scrollIntoView({behavior: 'smooth'});
                    $('.custom-control-label').addClass('error');
                } else {
                    $(this).closest('form').submit();
                }
            });

            $('.pv-commit input').on('click', function() {
                if($(this).is(':checked')) {
                    $('.custom-control-label').removeClass('error');
                }
            })
        </script>

        <script type="text/template" id="list_ggt">
            <div class="card section-ggt mb-5">
                <i class="fa fa-times text-danger print-hide" title="Xóa"></i>  
                <div class="card-body" style="font-family: 'Times New Roman';">
                    <div class="row">
                        <div class="col-4">
                            <div class="row">
                                <div class="col-5">
                                    <div class="fs-6pt">HỘI GIÁO DỤC CHĂM SÓC SỨC KHỎE CỘNG ĐỒNG VIỆT NAM</div>
                                    <div class="fs-6pt text-center fw-600">TẠP CHÍ SỨC KHỎE<br>CỘNG ĐỒNG</div>
                                    <hr class="mt-2 mb-1" style="width: 60%;">
                                    <div class="fs-8pt">
                                        Số : ......Q....../GGT
                                    </div>
                                </div>
                                <div class="col-7 text-center">
                                    <div class="fs-6pt">CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</div>
                                    <div class="fs-8pt fw-600"> Độc lập – Tự do – Hạnh phúc</div>
                                    <hr style="margin-top: 10px; width: 75%;">
                                </div>
                            </div>
                            <div class="fs-14pt text-center fw-600 mt-4">GIẤY GIỚI THIỆU</div>
                            <div class="fs-12pt text-center pt-2 pb-2">BAN BIÊN TẬP TRÂN TRỌNG GIỚI THIỆU</div>
                            <div class="d-flex mt-1 fs-11pt">
                                <span class="mr-1">Ông (bà): </span>
                                <input name="ggt[${j}][left][name]" class="flex-1">
                            </div>
                            <div class="mt-1 d-flex fs-11pt">
                                <span class="mr-1">Chức vụ: </span>
                                <input name="ggt[${j}][left][position]" class="flex-1">
                            </div>
                            <div class="d-flex mt-1">
                                <span class="fs-11pt mr-1">Được cử đến: </span>
                                <div class="flex-1">
                                    <input name="ggt[${j}][left][arrival_address_1]" class="fs-11pt w-100">
                                    <input name="ggt[${j}][left][arrival_address_2]" class="fs-11pt w-100">
                                    <input name="ggt[${j}][left][arrival_address_3]" class="fs-11pt w-100">
                                </div>
                            </div>
                            <div class="d-flex d-print-inline mt-1 fs-11pt">
                                <span class="mr-1">Về việc: </span>
                                <pre class="d-none print-show fs-11pt"></pre>
                                <textarea rows="3" class="print-hide flex-1" name="ggt[${j}][left][propose]"></textarea>
                            </div>
                            <div class="fs-11pt mt-1">
                                Đề nghị Quý cơ quan tạo điều kiện để ông (bà): 
                                <input name="ggt[${j}][left][suggest]" class="print-hide">
                                <span class="d-none print-show"></span>
                                  hoàn thành nhiệm vụ.
                            </div>
                            <div class="fs-11pt mt-1">
                                Giấy giới thiệu có giá trị đến hết ngày 
                                <input name="ggt[${j}][left][expire_date]" style="width: 20px;">
                                 tháng  
                                 <input name="ggt[${j}][left][expire_month]" style="width: 20px;">
                                 năm 
                                 <input name="ggt[${j}][left][expire_year]" style="width: 35px;">
                            </div>
                            <div class="text-right mt-4 mb-4">
                                <div class="d-inline-block text-center">
                                    <div class="fs-11pt font-italic">
                                        Hà Nội, ngày <input name="ggt[${j}][left][signature_date]" class="font-italic" style="width: 20px;">
                                         tháng <input name="ggt[${j}][left][signature_month]" class="font-italic" style="width: 20px;">
                                          năm <input name="ggt[${j}][left][signature_year]" class="font-italic" style="width: 35px;">
                                    </div>
                                    <div class="fw-600 fs-11pt mt-1 mb-4">TỔNG BIÊN TẬP</div>
                                    <input name="ggt[${j}][left][signature]" class="fs-12pt mt-3 text-center">
                                </div>

                            </div>
                        </div>
                        <div class="col-8 pl-4" style="border-left: 1px solid">
                            <div class="row">
                                <div class="col-5">
                                    <div class="fs-10pt text-center">HỘI GIÁO DỤC CHĂM SÓC SỨC KHỎE CỘNG ĐỒNG VIỆT NAM</div>
                                    <div class="fs-11pt text-center fw-600">TẠP CHÍ SỨC KHỎE CỘNG ĐỒNG</div>
                                    <hr class="mt-2 mb-1" style="width: 60%;">
                                    <div class="fs-11pt text-center">
                                        Số : ......Q....../GGT/SKCĐ
                                    </div>
                                </div>
                                <div class="col-7 text-center">
                                    <div class="fs-11pt fw-600">CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</div>
                                    <div class="fs-13pt"> Độc lập – Tự do – Hạnh phúc</div>
                                    <hr style="width: 33%;" class="mt-2 mb-2">
                                    <div class="fs-13pt font-italic">
                                        Hà Nội, ngày <input name="ggt[${j}][right][signature_date]" class="fs-11pt font-italic" style="width: 20px;">
                                            tháng <input name="ggt[${j}][right][signature_month]" class="fs-11pt font-italic" style="width: 20px;">
                                            năm <input name="ggt[${j}][right][signature_year]" class="fs-11pt font-italic" style="width: 35px;">
                                    </div>
                                </div>
                            </div>
                            <div class="fs-18pt text-center fw-600 mt-4">GIẤY GIỚI THIỆU</div>
                            <div class="fs-12pt text-center pt-2 pb-2">BAN BIÊN TẬP TRÂN TRỌNG GIỚI THIỆU</div>
                            <div class="d-flex mt-1 fs-12pt5">
                                <span class="mr-1 font-italic">Ông (bà): </span>
                                <input name="ggt[${j}][right][name]" class="flex-1">
                            </div>
                            <div class="mt-1 d-flex fs-12pt5">
                                <span class="mr-1 font-italic">Chức vụ: </span>
                                <input name="ggt[${j}][right][position]" class="flex-1">
                            </div>
                            <div class="d-flex mt-1 fs-12pt5">
                                <span class="mr-1 font-italic">Được cử đến: </span>
                                <div class="flex-1">
                                    <input name="ggt[${j}][right][arrival_address_1]" class="w-100">
                                    <input name="ggt[${j}][right][arrival_address_2]" class="w-100">
                                    <input name="ggt[${j}][right][arrival_address_3]" class="w-100">
                                </div>
                            </div>
                            <div class="d-flex d-print-inline mt-2 fs-12pt5">
                                <span class="font-italic mr-1">Về việc: </span>
                                <pre class="d-none print-show fs-11pt"></pre>
                                <textarea rows="3" class="print-hide flex-1" name="ggt[${j}][right][propose]"></textarea>
                            </div>
                            <div class="fs-12pt5 mt-1">
                                Đề nghị Quý cơ quan tạo điều kiện để ông (bà): 
                                <input name="ggt[${j}][right][suggest]" class="print-hide">
                                <span class="d-none print-show"></span>
                                  hoàn thành nhiệm vụ.
                            </div>
                            <div class="fs-12pt5 mt-1">
                                Giấy giới thiệu có giá trị đến hết ngày 
                                <input name="ggt[${j}][right][expire_date]" style="width: 20px;">
                                 tháng  
                                 <input name="ggt[${j}][right][expire_month]" style="width: 20px;">
                                 năm 
                                 <input name="ggt[${j}][right][expire_year]" style="width: 40px;">
                            </div>
                            <div class="row mt-4">
                                <div class="col-6">
                                    <div class="fs-12pt fw-600 font-italic mb-2">Nơi nhận:</div>
                                    <div class="fs-10pt mb-2">- Như trên;</div>
                                    <div class="fs-10pt">- Lưu: Văn phòng</div>
                                </div>
                                <div class="col-6 text-center">
                                    <div class="fw-600 fs-13pt mb-5">TỔNG BIÊN TẬP</div>
                                    <input name="ggt[${j}][right][signature]" class="fs-13pt text-center">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </script>
    @endpush
    
</x-app-layout>