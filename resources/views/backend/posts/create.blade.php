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
            @page {
                size: auto;
            }
            @media print {
                .section-ggt {
                    border: 0;
                    width: 100%;
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
            <div class="col-md-9 w-print-100">
                <div class="card print-hide">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title">{{ __('Thêm Đề tài') }}</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>{{ __('Title') }}:</label>
                            <input type="text" name="title" value="{{ old('title') }}" class="form-control @error('title')is-invalid @enderror" placeholder="Thêm tiêu đề">
                            @error('title')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Mô tả:</label>
                            <textarea name="excerpt" class="form-control @error('excerpt')is-invalid @enderror" placeholder="Thêm mô tả">{{ old('excerpt') }}</textarea>
                            @error('excerpt')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>{{ __('Image') }}:</label>
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

                    </div>
                </div>

                <div class="card section-ggt">
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
                                    <input name="ggt[left][name]" class="flex-1">
                                </div>
                                <div class="mt-1 d-flex fs-11pt">
                                    <span class="mr-1">Chức vụ: </span>
                                    <input name="ggt[left][position]" class="flex-1">
                                </div>
                                <div class="d-flex mt-1">
                                    <span class="fs-11pt mr-1">Được cử đến: </span>
                                    <div class="flex-1">
                                        <input name="ggt[left][arrival_address_1]" class="fs-11pt w-100">
                                        <input name="ggt[left][arrival_address_2]" class="fs-11pt w-100">
                                        <input name="ggt[left][arrival_address_3]" class="fs-11pt w-100">
                                    </div>
                                </div>
                                <div class="d-flex d-print-inline mt-1 fs-11pt">
                                    <span class="mr-1">Về việc: </span>
                                    <pre class="d-none print-show fs-11pt"></pre>
                                    <textarea rows="3" class="print-hide flex-1" name="ggt[left][propose]"></textarea>
                                </div>
                                <div class="fs-11pt mt-1">
                                    Đề nghị Quý cơ quan tạo điều kiện để ông (bà): 
                                    <input name="ggt[left][suggest]" class="print-hide">
                                    <span class="d-none print-show"></span>
                                      hoàn thành nhiệm vụ.
                                </div>
                                <div class="fs-11pt mt-1">
                                    Giấy giới thiệu có giá trị đến hết ngày 
                                    <input name="ggt[left][expire_date]" style="width: 20px;">
                                     tháng  
                                     <input name="ggt[left][expire_month]" style="width: 20px;">
                                     năm 
                                     <input name="ggt[left][expire_year]" style="width: 35px;">
                                </div>
                                <div class="text-right mt-4 mb-4">
                                    <div class="d-inline-block text-center">
                                        <div class="fs-11pt font-italic">
                                            Hà Nội, ngày <input name="ggt[left][signature_date]" class="font-italic" style="width: 20px;">
                                             tháng <input name="ggt[left][signature_month]" class="font-italic" style="width: 20px;">
                                              năm <input name="ggt[left][signature_year]" class="font-italic" style="width: 35px;">
                                        </div>
                                        <div class="fw-600 fs-11pt mt-1 mb-4">TỔNG BIÊN TẬP</div>
                                        <input name="ggt[left][signature]" class="fs-12pt mt-3 text-center">
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
                                            Hà Nội, ngày <input name="ggt[right][signature_date]" class="fs-11pt font-italic" style="width: 20px;">
                                                tháng <input name="ggt[right][signature_month]" class="fs-11pt font-italic" style="width: 20px;">
                                                năm <input name="ggt[right][signature_year]" class="fs-11pt font-italic" style="width: 35px;">
                                        </div>
                                    </div>
                                </div>
                                <div class="fs-18pt text-center fw-600 mt-4">GIẤY GIỚI THIỆU</div>
                                <div class="fs-12pt text-center pt-2 pb-2">BAN BIÊN TẬP TRÂN TRỌNG GIỚI THIỆU</div>
                                <div class="d-flex mt-1 fs-12pt5">
                                    <span class="mr-1 font-italic">Ông (bà): </span>
                                    <input name="ggt[right][name]" class="flex-1">
                                </div>
                                <div class="mt-1 d-flex fs-12pt5">
                                    <span class="mr-1 font-italic">Chức vụ: </span>
                                    <input name="ggt[right][position]" class="flex-1">
                                </div>
                                <div class="d-flex mt-1 fs-12pt5">
                                    <span class="mr-1 font-italic">Được cử đến: </span>
                                    <div class="flex-1">
                                        <input name="ggt[right][arrival_address_1]" class="w-100">
                                        <input name="ggt[right][arrival_address_2]" class="w-100">
                                        <input name="ggt[right][arrival_address_3]" class="w-100">
                                    </div>
                                </div>
                                <div class="d-flex d-print-inline mt-2 fs-12pt5">
                                    <span class="font-italic mr-1">Về việc: </span>
                                    <pre class="d-none print-show fs-11pt"></pre>
                                    <textarea rows="3" class="print-hide flex-1" name="ggt[right][propose]"></textarea>
                                </div>
                                <div class="fs-12pt5 mt-1">
                                    Đề nghị Quý cơ quan tạo điều kiện để ông (bà): 
                                    <input name="ggt[right][suggest]" class="print-hide">
                                    <span class="d-none print-show"></span>
                                      hoàn thành nhiệm vụ.
                                </div>
                                <div class="fs-12pt5 mt-1">
                                    Giấy giới thiệu có giá trị đến hết ngày 
                                    <input name="ggt[right][expire_date]" style="width: 20px;">
                                     tháng  
                                     <input name="ggt[right][expire_month]" style="width: 20px;">
                                     năm 
                                     <input name="ggt[right][expire_year]" style="width: 40px;">
                                </div>
                                <div class="row mt-4">
                                    <div class="col-6">
                                        <div class="fs-12pt fw-600 font-italic mb-2">Nơi nhận:</div>
                                        <div class="fs-10pt mb-2">- Như trên;</div>
                                        <div class="fs-10pt">- Lưu: Văn phòng</div>
                                    </div>
                                    <div class="col-6 text-center">
                                        <div class="fw-600 fs-13pt mb-5">TỔNG BIÊN TẬP</div>
                                        <input name="ggt[right][signature]" class="fs-13pt text-center">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 print-hide">
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
                            <a href="{{ route('posts.index') }}" class="btn btn btn-light ml-2"><i class="icon-backward mr-2"></i>{{ __('Back') }} </a>
                            <a class="btn btn btn-primary ml-2" title="In giấy giới thiệu" onclick="window.print()">
                                <i class="icon-printer2 mr-2"></i>{{ __('In GGT') }} </a>
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
                            @include('backend.posts._categories', ['categories' => $categories, 'selected' => old('categories', [])])
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="sidebar-section-header">
                        <span class="font-weight-semibold">{{ __('Thời gian') }}</span>
                        <div class="list-icons ml-auto">
                            <a href="#timer" class="list-icons-item" data-toggle="collapse" aria-expanded="true">
                                <i class="icon-arrow-down12"></i>
                            </a>
                        </div>
                    </div>

                    <div class="collapse show" id="timer">
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
                </div>
            </div>
        </div>
    </form>

    @push('js')
	    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script>
            $(function() {
                $(".start_date").flatpickr({
                    enableTime: true,
                    altInput: true,
                    dateFormat: "Y-m-d H:i",
                    altFormat: 'd/m/Y H:i'
                })

                $(".end_date").flatpickr({
                    enableTime: true,
                    altInput: true,
                    dateFormat: "Y-m-d H:i",
                    altFormat: 'd/m/Y H:i'
                })
            })
            $('textarea.print-hide, input.print-hide').on('change', function() {
                $(this).siblings('.print-show').html($(this).val());
            })
        </script>
    @endpush
    
</x-app-layout>