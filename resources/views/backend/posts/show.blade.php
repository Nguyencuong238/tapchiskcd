<x-app-layout>
    @push('css')
    <style>
        .border-content {
            padding: 7px 14px;
            border-radius: 4px;
        }
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
            outline: 0;
        }
        #category .custom-control-label {
            color: inherit;
        }
        #category .custom-control-label:before {
            opacity: 1;
        }
        .mw-100px {
            min-width: 100px;
        }
        .action-bar {
            position: fixed;
            bottom: 0;
            padding-top: 20px;
            background: whitesmoke;
            width: 100%;
            z-index: 10;
        }
        .text-avatar {
            width: 35px;
            height: 35px;
            background: #aaa;
            border-radius: 50%;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            margin-right: 8px;
        }
        .note-input {
            background: #f0f2f5;
            border: 0;
            border-radius: 6px;
            padding: 10px;
            margin-right: 10px;
            color: #333;
        }
        .note-input:focus {
            outline: 0;
        }
        .note-date {
            color: #666;
            font-size: 13px;
            line-height: 16px;
        }
        .btn-send-note .fa-check {
            font-size: 12px;
        }
        .btn-history {
            background: #333 !important;
            border-color: #333 !important;
        }
        .custom-checkbox .custom-control-label.error:before {
            border-color: red;
        }
        @page {
            size: {{$post->is_ggt ? 'landscape' : 'portrait'}};
        }
        @media print {
            .work_content {
                border: 0 !important;
                page-break-before: always;
            }
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
                display: block !important;
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
            .right-ggt {
                padding-left: 45px !important;
            }
        }
    </style>
    @endpush
    <div class="row">
        <div class="col-md-9 w-print-100">
            @php
                $pageTitles = [
                    0 => 'Đề tài chờ TB đơn vị duyệt',
                    1 => 'Đề tài chờ Tổng thư ký duyệt',
                    2 => 'Đề tài chờ TBT duyệt',
                    3 => 'Đề tài được duyệt',
                    -1 => 'Đề tài bị trả lại'
                ];
            @endphp
            <div class="card print-hide">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title">{{ $pageTitles[$post->status] }}</h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="font-weight-semibold">{{ __('Title') }}:</label>
                        <div class="border-content">{{ $post->title }}</div>
                    </div>

                    {{--  <div class="form-group">
                        <label class="font-weight-semibold">Mô tả:</label>
                        <div class="border-content">{{ $post->excerpt }}</div>
                    </div>  --}}

                    <div class="form-group">
                        <label class="font-weight-semibold">Hồ sơ, tư liệu phục vụ đề tài:</label><br>
                        <div class="border-content">
                            @if($post->getFirstMediaUrl('media'))
                            <img src="{{$post->getFirstMediaUrl('media')}}" alt="{{$post->title}}" height="250">
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="font-weight-semibold">{{ __('Content') }}:</label>
                        <div class="border-content">{!! $post->body !!}</div>
                    </div>
                    
                    <div class="row mb-4 dateline">
                        <div class="col-6">
                            <label class="font-weight-semibold">{{ __('Ngày bắt đầu') }}:</label>
                            <span class="border-content">{{ $post->start_date->format('d/m/Y') }}</span>
                        </div>
                        <div class="col-6">
                            <label class="font-weight-semibold">{{ __('Ngày kết thúc') }}:</label>
                            <span class="border-content">{{ $post->end_date->format('d/m/Y') }}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="font-weight-semibold">{{ __('Tệp đính kèm') }}:</label>
                        @foreach($post->getMedia('attachments') as $item)
                            <div>
                                <i class="fa fa-paperclip"></i>
                                <a href="{{ $item->getFullUrl() }}" class="ml-1" target="blank">{{ $item->name }}</a>
                            </div>
                        @endforeach
                    </div>

                    <div class="custom-control custom-checkbox pv-commit mb-4">
                        <input type="checkbox" class="custom-control-input" checked>
                        <label class="custom-control-label">Tôi cam kết đã thu thập đủ chứng cứ ban đầu, hồ sơ tài liêu để thực hiện đề tài.</label>
                    </div>
                    
                    <div class="custom-control custom-checkbox tb-commit">
                        <input type="checkbox" class="custom-control-input" id="tb-commit" @if($post->status >= 1) checked @endif>
                        <label class="custom-control-label" @if($post->status == 0 && in_array(auth()->user()->position, ['manager', 'director', 'secretary'])) for="tb-commit" @endif>
                            Tôi đã kiểm tra, rà soát hồ sơ chứng cứ, tư liệu và xác nhận đã đủ điều kiện để phóng viên thực hiện đề tài. Tôi sẽ chỉ đạo, quản lý chặt chẽ phóng viên trong quá trình tác nghiệp. Đề nghị TBT cấp giấy giới thiệu/công văn kèm theo.
                        </label>
                    </div>

                    {{--  <div class="form-group mt-2">
                        <label class="font-weight-semibold">{{ __('Danh mục') }}:</label>
                        <ul>
                            @foreach($post->categories as $c)
                            <li>{{$c->name}}</li>
                            @endforeach
                        </ul>
                    </div>  --}}
                </div>
            </div>
            <form action="{{ route('posts.updateGgt') }}" method="post" id="ggt-form">
                @csrf

                <input type="hidden" name="post_id" value="{{$post->id}}" class="print-hide">

                @if($post->is_ggt)
                <div class="ggt-container">
                    @if(count($post->ggt))
                        @foreach($post->ggt as $key => $item)
                        <div class="card section-ggt mb-5">
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
                                            <span class="mr-1">Ông/bà: </span>
                                            <input name="ggt[{{$key}}][name]" value="{{@$item['name']}}" class="flex-1">
                                        </div>
                                        <div class="mt-1 d-flex fs-11pt">
                                            <span class="mr-1">Chức vụ: </span>
                                            <input name="ggt[{{$key}}][position]" value="{{@$item['position']}}" class="flex-1">
                                        </div>
                                        <div class="d-flex mt-1 fs-11pt d-print-inline">
                                            <span class="mr-1">Được cử đến: </span>
                                            <pre class="d-none print-show fs-11pt">{{@$item['arrival_address']}}</pre>
                                            <textarea rows="3" class="print-hide flex-1" name="ggt[{{$key}}][arrival_address]">{{@$item['arrival_address']}}</textarea>
                                        </div>
                                        <div class="d-flex  mt-1 fs-11pt d-print-inline">
                                            <span class="mr-1">Về việc: </span>
                                            <pre class="d-none print-show fs-11pt">{{@$item['propose']}}</pre>
                                            <textarea rows="3" class="print-hide flex-1" name="ggt[{{$key}}][propose]">{{@$item['propose']}}</textarea>
                                        </div>
                                        <div class="fs-11pt mt-1">
                                            Đề nghị Quý cơ quan tạo điều kiện để ông/bà: 
                                            <input name="ggt[{{$key}}][suggest]" value="{{@$item['suggest']}}" class="print-hide">
                                            <span class="d-none print-show">{{@$item['suggest']}}</span>
                                            hoàn thành nhiệm vụ.
                                        </div>
                                        <div class="fs-11pt mt-1">
                                            Giấy giới thiệu có giá trị đến hết ngày 
                                            <input name="ggt[{{$key}}][expire_date]" value="{{@$item['expire_date']}}" style="width: 20px;">
                                            tháng  
                                            <input name="ggt[{{$key}}][expire_month]" value="{{@$item['expire_month']}}" style="width: 20px;">
                                            năm 
                                            <input name="ggt[{{$key}}][expire_year]" value="{{@$item['expire_year']}}" style="width: 35px;">
                                        </div>
                                        <div class="text-right mt-4">
                                            <div class="d-inline-block text-center">
                                                <div class="fs-11pt font-italic">
                                                    Hà Nội, ngày <input name="ggt[{{$key}}][signature_date]" value="{{@$item['signature_date']}}" class="font-italic" style="width: 20px;">
                                                    tháng <input name="ggt[{{$key}}][signature_month]" value="{{@$item['signature_month']}}" class="font-italic" style="width: 20px;">
                                                    năm <input name="ggt[{{$key}}][signature_year]" value="{{@$item['signature_year']}}" class="font-italic" style="width: 35px;">
                                                </div>
                                                <div class="fw-600 fs-11pt mt-1 mb-4 pb-2">TỔNG BIÊN TẬP</div>
                                                <input name="ggt[{{$key}}][signature]" value="{{@$item['signature'] ?? 'Vương Văn Việt'}}" class="fs-12pt mt-3 text-center">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-8 pl-4 right-ggt" style="border-left: 1px solid">
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
                                                    Hà Nội, ngày <input name="ggt[{{$key}}][signature_date]" value="{{@$item['signature_date']}}" class="fs-11pt font-italic" style="width: 20px;">
                                                        tháng <input name="ggt[{{$key}}][signature_month]" value="{{@$item['signature_month']}}" class="fs-11pt font-italic" style="width: 20px;">
                                                        năm <input name="ggt[{{$key}}][signature_year]" value="{{@$item['signature_year']}}" class="fs-11pt font-italic" style="width: 35px;">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="fs-18pt text-center fw-600 mt-4">GIẤY GIỚI THIỆU</div>
                                        <div class="fs-12pt text-center pt-2 pb-2">BAN BIÊN TẬP TRÂN TRỌNG GIỚI THIỆU</div>
                                        <div class="d-flex mt-1 fs-12pt5">
                                            <span class="mr-1 font-italic">Ông/bà: </span>
                                            <input name="ggt[{{$key}}][name]" value="{{@$item['name']}}" class="flex-1">
                                        </div>
                                        <div class="mt-1 d-flex fs-12pt5">
                                            <span class="mr-1 font-italic">Chức vụ: </span>
                                            <input name="ggt[{{$key}}][position]" value="{{@$item['position']}}" class="flex-1">
                                        </div>
                                        <div class="d-flex mt-1 fs-12pt5 d-print-inline">
                                            <span class="font-italic mr-1">Được cử đến: </span>
                                            <pre class="d-none print-show fs-12pt5">{{@$item['arrival_address']}}</pre>
                                            <textarea rows="3" class="print-hide flex-1" name="ggt[{{$key}}][arrival_address]">{{@$item['arrival_address']}}</textarea>
                                        </div>
                                        <div class="d-flex mt-1 fs-12pt5 d-print-inline">
                                            <span class="font-italic mr-1">Về việc: </span>
                                            <pre class="d-none print-show fs-12pt5">{{@$item['propose']}}</pre>
                                            <textarea rows="3" class="print-hide flex-1" name="ggt[{{$key}}][propose]">{{@$item['propose']}}</textarea>
                                        </div>
                                        <div class="fs-12pt5 mt-1">
                                            Đề nghị Quý cơ quan tạo điều kiện để ông/bà: 
                                            <input name="ggt[{{$key}}][suggest]" value="{{@$item['suggest']}}" class="print-hide">
                                            <span class="d-none print-show">{{@$item['suggest']}}</span>
                                            hoàn thành nhiệm vụ.
                                        </div>
                                        <div class="fs-12pt5 mt-1">
                                            Giấy giới thiệu có giá trị đến hết ngày 
                                            <input name="ggt[{{$key}}][expire_date]" value="{{@$item['expire_date']}}" style="width: 20px;">
                                            tháng  
                                            <input name="ggt[{{$key}}][expire_month]" value="{{@$item['expire_month']}}" style="width: 20px;">
                                            năm 
                                            <input name="ggt[{{$key}}][expire_year]" value="{{@$item['expire_year']}}" style="width: 40px;">
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-6">
                                                <div class="fs-12pt fw-600 font-italic mb-2">Nơi nhận:</div>
                                                <div class="fs-10pt mb-1">- Như trên;</div>
                                                <div class="fs-10pt">- Lưu: Văn phòng</div>
                                            </div>
                                            <div class="col-6 text-center">
                                                <div class="fw-600 fs-13pt mb-5 pb-2">TỔNG BIÊN TẬP</div>
                                                <input name="ggt[{{$key}}][signature]" value="{{@$item['signature'] ?? 'Vương Văn Việt'}}" class="fs-13pt text-center">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                    <div class="card section-ggt mb-5">
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
                                        <span class="mr-1">Ông/bà: </span>
                                        <input name="ggt[0][name]" class="flex-1">
                                    </div>
                                    <div class="mt-1 d-flex fs-11pt">
                                        <span class="mr-1">Chức vụ: </span>
                                        <input name="ggt[0][position]" class="flex-1">
                                    </div>
                                    <div class="d-flex mt-1 fs-11pt d-print-inline">
                                        <span class="mr-1">Được cử đến: </span>
                                        <pre class="d-none print-show fs-11pt"></pre>
                                        <textarea rows="3" class="print-hide flex-1" name="ggt[0][arrival_address]"></textarea>
                                    </div>
                                    <div class="d-flex mt-1 fs-11pt d-print-inline">
                                        <span class="mr-1">Về việc: </span>
                                        <pre class="d-none print-show fs-11pt">{{@$item['propose']}}</pre>
                                        <textarea rows="3" class="print-hide flex-1" name="ggt[0][propose]">{{@$item['propose']}}</textarea>
                                    </div>
                                    <div class="fs-11pt mt-1">
                                        Đề nghị Quý cơ quan tạo điều kiện để ông/bà: 
                                        <input name="ggt[0][suggest]" class="print-hide">
                                        <span class="d-none print-show"></span>
                                        hoàn thành nhiệm vụ.
                                    </div>
                                    <div class="fs-11pt mt-1">
                                        Giấy giới thiệu có giá trị đến hết ngày 
                                        <input name="ggt[0][expire_date]" style="width: 20px;">
                                        tháng  
                                        <input name="ggt[0][expire_month]" style="width: 20px;">
                                        năm 
                                        <input name="ggt[0][expire_year]" style="width: 35px;">
                                    </div>
                                    <div class="text-right mt-4">
                                        <div class="d-inline-block text-center">
                                            <div class="fs-11pt font-italic">
                                                Hà Nội, ngày <input name="ggt[0][signature_date]" class="font-italic" style="width: 20px;">
                                                tháng <input name="ggt[0][signature_month]" class="font-italic" style="width: 20px;">
                                                năm <input name="ggt[0][signature_year]" class="font-italic" style="width: 35px;">
                                            </div>
                                            <div class="fw-600 fs-11pt mt-1 mb-4 pb-2">TỔNG BIÊN TẬP</div>
                                            <input name="ggt[0][signature]" class="fs-12pt mt-3 text-center" value="Vương Văn Việt">
                                        </div>

                                    </div>
                                </div>
                                <div class="col-8 pl-4 right-ggt" style="border-left: 1px solid">
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
                                                Hà Nội, ngày <input name="ggt[0][signature_date]" class="fs-11pt font-italic" style="width: 20px;">
                                                    tháng <input name="ggt[0][signature_month]" class="fs-11pt font-italic" style="width: 20px;">
                                                    năm <input name="ggt[0][signature_year]" class="fs-11pt font-italic" style="width: 35px;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="fs-18pt text-center fw-600 mt-4">GIẤY GIỚI THIỆU</div>
                                    <div class="fs-12pt text-center pt-2 pb-2">BAN BIÊN TẬP TRÂN TRỌNG GIỚI THIỆU</div>
                                    <div class="d-flex mt-1 fs-12pt5">
                                        <span class="mr-1 font-italic">Ông/bà: </span>
                                        <input name="ggt[0][name]" class="flex-1">
                                    </div>
                                    <div class="mt-1 d-flex fs-12pt5">
                                        <span class="mr-1 font-italic">Chức vụ: </span>
                                        <input name="ggt[0][position]" class="flex-1">
                                    </div>
                                    <div class="d-flex mt-1 fs-12pt5 d-print-inline">
                                        <span class="font-italic mr-1">Được cử đến: </span>
                                        <pre class="d-none print-show fs-12pt5"></pre>
                                        <textarea rows="3" class="print-hide flex-1" name="ggt[0][arrival_address]"></textarea>
                                    </div>
                                    <div class="d-flex mt-1 fs-12pt5 d-print-inline">
                                        <span class="font-italic mr-1">Về việc: </span>
                                        <pre class="d-none print-show fs-12pt5"></pre>
                                        <textarea rows="3" class="print-hide flex-1" name="ggt[0][propose]"></textarea>
                                    </div>
                                    <div class="fs-12pt5 mt-1">
                                        Đề nghị Quý cơ quan tạo điều kiện để ông/bà: 
                                        <input name="ggt[0][suggest]" class="print-hide">
                                        <span class="d-none print-show"></span>
                                        hoàn thành nhiệm vụ.
                                    </div>
                                    <div class="fs-12pt5 mt-1">
                                        Giấy giới thiệu có giá trị đến hết ngày 
                                        <input name="ggt[0][expire_date]" style="width: 20px;">
                                        tháng  
                                        <input name="ggt[0][expire_month]" style="width: 20px;">
                                        năm 
                                        <input name="ggt[0][expire_year]" style="width: 40px;">
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-6">
                                            <div class="fs-12pt fw-600 font-italic mb-2">Nơi nhận:</div>
                                            <div class="fs-10pt mb-1">- Như trên;</div>
                                            <div class="fs-10pt">- Lưu: Văn phòng</div>
                                        </div>
                                        <div class="col-6 text-center">
                                            <div class="fw-600 fs-13pt mb-5 pb-2">TỔNG BIÊN TẬP</div>
                                            <input name="ggt[0][signature]" class="fs-13pt text-center" value="Vương Văn Việt">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>

                <div class="card work_content">
                    <div class="card-header print-hide">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title">Nội dung làm việc kèm GGT</h5>
                        </div>
                    </div>
                    <div class="card-body"> 
                        <div class="d-none print-show fs-13pt content-print"></div>
                        <textarea name="ggt_work_content" class="cv-editor form-control print-hide"></textarea>
                    </div>
                </div>

                @else
                <div class="cv-container">
                    @if(count($post->ggt))

                    @foreach($post->ggt as $key => $item)
                    <div class="card section-ggt mb-5">
                        <div class="card-body" style="font-family: 'Times New Roman';">
                            <div class="row">
                                <div class="col-5">
                                    <div class="fs-12pt text-center">HỘI GIÁO DỤC CHĂM SÓC SỨC KHỎE CỘNG ĐỒNG VIỆT NAM</div>
                                    <div class="fs-12pt text-center fw-600">TẠP CHÍ SỨC KHỎE CỘNG ĐỒNG</div>
                                    <hr class="mt-2 mb-1" style="width: 30%;">
                                    <div class="fs-12pt text-center">
                                        Số : ....../{{date('Y')}}/CV-SKCĐ
                                    </div>
                                </div>

                                <div class="col-5 offset-2 text-center">
                                    <div class="fs-12pt fw-600">CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</div>
                                    <div class="fs-13pt fw-600"> Độc lập – Tự do – Hạnh phúc</div>
                                    <hr style="width: 20%;" class="mt-2 mb-2">
                                    <div class="fs-13pt font-italic">
                                        <input name="ggt[{{$key}}][address]" value="{{@$item['address']}}" class="fs-13pt font-italic text-right" style="width: 100px;">
                                        , ngày <input name="ggt[{{$key}}][date]" value="{{@$item['date']}}" class="fs-13pt font-italic" style="width: 20px;">
                                            tháng <input name="ggt[{{$key}}][month]" value="{{@$item['month']}}" class="fs-13pt font-italic" style="width: 20px;">
                                            năm <input name="ggt[{{$key}}][year]" value="{{@$item['year']}}" class="fs-13pt font-italic" style="width: 35px;">
                                    </div>
                                </div>
                            </div>

                            <div class="fs-14pt text-center mt-4">
                                <span>Kính gửi: </span>
                                <input name="ggt[{{$key}}][sent_to]" value="{{@$item['sent_to']}}" class="flex-1 fs-14pt">
                            </div>
                            
                            <div class="mt-4 fs-13pt d-print-inline">
                                <div class="d-none print-show fs-13pt content-print"></div>
                                <textarea name="ggt[{{$key}}][content]" class="cv-editor form-control print-hide">{{@$item['content']}}</textarea>
                            </div>

                            <div class="row mt-4">
                                <div class="col-6">
                                    <div class="fs-12pt fw-600 font-italic mb-2">Nơi nhận:</div>
                                    <div class="fs-12pt mb-1">- Như trên;</div>
                                    <div class="fs-12pt">- Lưu: Văn phòng</div>
                                </div>
                                <div class="col-6 text-center">
                                    <div class="fw-600 fs-13pt mb-5 pb-2">TỔNG BIÊN TẬP</div>
                                    <input name="ggt[{{$key}}][signature]" value="{{@$item['signature']}}" class="fs-13pt text-center" value="Vương Văn Việt">
                                </div>
                            </div>

                            <div class="fs-11pt fw-600">Thông tin liên hệ:</div>
                            <div class="fs-11pt">Tạp chí Sức Khỏe Cộng Đồng</div>
                            <div class="fs-11pt">Tầng 4, Tòa nhà SaiGonbank, số 99 Nguyễn Phong Sắc, phường Dịch Vọng Hậu, quận Cầu Giấy, Thành phố Hà Nội.</div>
                            <div class="fs-11pt">Hotline: 0914946668</div>
                        </div>
                    </div>
                    @endforeach

                    @else
                    <div class="card section-ggt mb-5">
                        <div class="card-body" style="font-family: 'Times New Roman';">
                            <div class="row">
                                <div class="col-5">
                                    <div class="fs-12pt text-center">HỘI GIÁO DỤC CHĂM SÓC SỨC KHỎE CỘNG ĐỒNG VIỆT NAM</div>
                                    <div class="fs-12pt text-center fw-600">TẠP CHÍ SỨC KHỎE CỘNG ĐỒNG</div>
                                    <hr class="mt-2 mb-1" style="width: 30%;">
                                    <div class="fs-12pt text-center">
                                        Số : ....../{{date('Y')}}/CV-SKCĐ
                                    </div>
                                </div>

                                <div class="col-5 offset-2 text-center">
                                    <div class="fs-12pt fw-600">CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</div>
                                    <div class="fs-13pt fw-600"> Độc lập – Tự do – Hạnh phúc</div>
                                    <hr style="width: 20%;" class="mt-2 mb-2">
                                    <div class="fs-13pt font-italic">
                                        <input name="ggt[0][address]" class="fs-13pt font-italic text-right" style="width: 100px;">
                                        , ngày <input name="ggt[0][date]" class="fs-13pt font-italic" style="width: 20px;">
                                            tháng <input name="ggt[0][month]" class="fs-13pt font-italic" style="width: 20px;">
                                            năm <input name="ggt[0][year]" class="fs-13pt font-italic" style="width: 35px;">
                                    </div>
                                </div>
                            </div>

                            <div class="fs-14pt text-center mt-4">
                                <span>Kính gửi: </span>
                                <input name="ggt[0][sent_to]" class="flex-1 fs-14pt">
                            </div>
                            
                            <div class="mt-4 fs-13pt d-print-inline">
                                <div class="d-none print-show fs-13pt content-print"></div>
                                <textarea name="ggt[0][content]" class="cv-editor form-control print-hide"></textarea>
                            </div>

                            <div class="row mt-4">
                                <div class="col-6">
                                    <div class="fs-12pt fw-600 font-italic mb-2">Nơi nhận:</div>
                                    <div class="fs-12pt mb-1">- Như trên;</div>
                                    <div class="fs-12pt">- Lưu: Văn phòng</div>
                                </div>
                                <div class="col-6 text-center">
                                    <div class="fw-600 fs-13pt mb-5 pb-2">TỔNG BIÊN TẬP</div>
                                    <input name="ggt[0][signature]" class="fs-13pt text-center" value="Vương Văn Việt">
                                </div>
                            </div>

                            <div class="fs-11pt fw-600">Thông tin liên hệ:</div>
                            <div class="fs-11pt">Tạp chí Sức Khỏe Cộng Đồng</div>
                            <div class="fs-11pt">Tầng 4, Tòa nhà SaiGonbank, số 99 Nguyễn Phong Sắc, phường Dịch Vọng Hậu, quận Cầu Giấy, Thành phố Hà Nội.</div>
                            <div class="fs-11pt">Hotline: 0914946668</div>
                        </div>
                    </div>
                    @endif
                </div>
                @endif
            </form>
        </div>
        <div class="col-md-3 print-hide">
            <div class="card">
                <div class="sidebar-section-header">
                    <span class="font-weight-semibold">{{ __('Ý kiến') }}</span>
                </div>
                <div class="card-body pt-1">
                    <div class="note-box d-flex position-relative mb-4">
                        <textarea name="note_content" type="text" class="note-input flex-1" placeholder="Ý kiến . . ."></textarea>
                        <div>
                            <button class="btn btn-success py-1" id="btn-send-note">
                                <i class="fa fa-check"></i>
                            </button>
                        </div>
                        
                    </div>
                    <div class="list-notes">
                    @if($post->notes->count())
                        @php
                            $post_notes = $post->notes()->latest()->get();
                        @endphp
                        @foreach($post_notes as $note)
                        <div class="d-flex mb-3">
                            <span class="text-avatar mr-10">{{ substr($note->user->name, 0, 1) }}</span>
                            <div class="flex-1">
                                <div class="d-flex justify-content-between">
                                    <span class="reviewer fw-600 mr-5">{{$note->user->name}}</span>
                                </div>
                                <div class="note-content mt-1">{{$note->content}}</div>
                                <div class="note-date mt-1">{{ $note->created_at->format('H:i d/m/Y')}}</div>
                            </div>
                        </div>
                        @endforeach
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="action-bar print-hide pb-2">
        @php
            $allowPositions = [
                0 => ['manager', 'secretary', 'director'],
                1 => ['secretary', 'director'],
                2 => ['director']
            ];
            $nextStatus = [1, 2, 3];
        @endphp
        @if(in_array(auth()->user()->position, $allowPositions[$post->status] ?? []))
            <form action="{{route('posts.updateStatus')}}" method="post" class="d-inline-block mb-2">
                @csrf

                <input type="hidden" name="id" value="{{$post->id}}">
                <input type="hidden" name="status" value="{{$nextStatus[$post->status]}}">
                <button type="submit" class="btn btn-success px-2 mw-100px @if($post->status == 0) btn-approve @endif">Phê duyệt </button>
            </form>

            <form action="{{route('posts.updateStatus')}}" method="post" class="d-inline-block mb-2 ml-1">
                @csrf

                <input type="hidden" name="id" value="{{$post->id}}">
                <input type="hidden" name="status" value="-1">
                <button type="submit" class="btn btn-danger px-2 mw-100px">Trả lại </button>
            </form>
        @endif
        <div class="d-inline">
            <a class="btn btn btn-primary ml-2" title="In giấy giới thiệu" onclick="window.print()">
                <i class="icon-printer2 mr-2"></i>{{ $post->is_ggt ? 'In GGT' : 'In công văn' }} 
            </a>
            @unless($post->status > 0 && auth()->user()->position == 'staff')
            <a class="btn btn btn-success ml-2 btn-save-ggt">
                <i class="icon-paperplane mr-2"></i>{{ $post->is_ggt ? 'Lưu GGT' : 'Lưu công văn' }} 
            </a>
            @endunless
            <a class="btn btn btn-primary btn-history ml-2" data-toggle="modal" data-target="#exampleModal">
                <i class="icon-history mr-2"></i> Lịch sử
            </a>
        </div>
    </div>

    @php
        $typeLabels = [
            'update' => 'Cập nhật',
            'create' => 'Khởi tạo',
            'change_status' => 'Thay đổi trạng thái'
        ];
    @endphp
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Lịch sử thay đổi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Người tạo</th>
                            <th>Loại thay đổi</th>
                            <th>Ghi chú</th>
                            <th>Ngày</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($post->histories as $key => $h)
                        <tr>
                            <th>{{$key+1}}</th>
                            <th>{{$h->user->name}}</th>
                            <td>{{$typeLabels[$h->type]}}</td>
                            @if($h->note)
                            <td>{{$typeLabels[$h->type]}} {{$h->note}}</td>
                            @else
                            <td></td>
                            @endif
                            <td>{{$h->created_at->format('d/m/Y H:i:s')}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                  
            </div>
            
          </div>
        </div>
    </div>

    @push('js')
        <script>
            $(function() {
                tinymce.init({
                    selector: '.cv-editor',
                    plugins: ' paste  charmap hr   advlist lists ',
                    imagetools_cors_hosts: ['picsum.photos'],
                    menubar: 'edit insert format tools table help',
                    toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
                    toolbar_sticky: true,
                    autosave_ask_before_unload: true,
                    autosave_interval: '30s',
                    autosave_prefix: '{path}{query}-{id}-',
                    autosave_restore_when_empty: false,
                    autosave_retention: '2m',
                    image_advtab: true,
                    importcss_append: true,
                    templates: [
                        { title: 'New Table', description: 'creates a new table', content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>' },
                        { title: 'Starting my story', description: 'A cure for writers block', content: 'Once upon a time...' },
                        { title: 'New list with dates', description: 'New List with dates', content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>' }
                    ],
                    template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
                    template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
                    height: 600,
                    image_caption: true,
                    quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quicktable',
                    noneditable_noneditable_class: 'mceNonEditable',
                    toolbar_mode: 'sliding',
                    contextmenu: 'link image imagetools table',
                    skin: 'oxide',
                    content_css: 'default',
                    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
                    file_picker_callback: elFinderBrowser,
                    relative_urls : false,
                    remove_script_host : false,
                    convert_urls : true,
                    toolbar_mode: 'wrap',
                    language_url : "/plugins/tinymce_languages/langs/vi.js",
                    language: 'vi',
                    quickbars_insert_toolbar: 'quicktable image media codesample',
                    extended_valid_elements : "script[async|src|charset],iframe[src|title|width|height|allowfullscreen|frameborder],img[class|style|src|border=0|alt|title|hspace|vspace|width|height|align|onmouseover|onmouseout|name|loading=lazy]",
                    setup: function (editor) {
                        // Listen for change events
                        editor.on('change', function (e) {
                        $('.content-print').html(editor.getContent());
                        });

                        editor.on('init', function() {
                            $('.tox-tinymce').addClass('print-hide');
                        });
                    }
                });
            })

            function elFinderBrowser (callback, value, meta) {
                tinymce.activeEditor.windowManager.openUrl({
                    title: 'File Manager',
                    url: "{{ route('elfinder.tinymce5') }}",
                    /**
                    * On message will be triggered by the child window
                    *
                    * @param dialogApi
                    * @param details
                    * @see https://www.tiny.cloud/docs/ui-components/urldialog/#configurationoptions
                    */
                    onMessage: function (dialogApi, details) {
                        if (details.mceAction === 'fileSelected') {
                            const file = details.data.file;

                            // Make file info
                            const info = file.name;

                            console.log(file)

                            // Provide file and text for the link dialog
                            if (meta.filetype === 'file') {
                                callback(file.url, {text: info, title: info});
                            }

                            // Provide image and alt text for the image dialog
                            if (meta.filetype === 'image') {
                                callback(file.url, {alt: info});
                            }

                            // Provide alternative source and posted for the media dialog
                            if (meta.filetype === 'media') {
                                callback(file.url);
                            }

                            dialogApi.close();
                        }
                    }
                });
            }

            $('textarea.print-hide, input.print-hide').on('change', function() {
                $(this).siblings('.print-show').html($(this).val());
            })
            $('#post-status-{{$post->status}}').addClass('active');

            $('#btn-send-note').on('click', function() {
                $.ajax({
                    type: 'post',
                    url: '/backend/create-note',
                    data: {
                        post_id: '{{$post->id}}',
                        content: $('.note-input').val(),
                        _token: $('[name=csrf-token]').attr('content')
                    }
                }).then(function (res) {
                    if(res.status == 'success') {
                        var note_html = $('#add-note').html();

                        note_html = note_html.replaceAll('${first_character}', res.data.first_character)
                                    .replaceAll('${name}', res.data.name)
                                    .replaceAll('${content}', res.data.content)
                                    .replaceAll('${date}', res.data.date);

                        $('.list-notes').prepend(note_html);
                        $('.note-input').val('');
                    }
                });
            })
            $('.btn-approve').on('click', function(e) {
                e.preventDefault();

                if(!$('.tb-commit input').is(':checked')) {
                    $('.dateline').get(0).scrollIntoView({behavior: 'smooth'});
                    $('.tb-commit .custom-control-label').addClass('error');
                } else {
                    $(this).closest('form').submit();
                }
            });

            $('.tb-commit input').on('click', function() {
                if($(this).is(':checked')) {
                    $('.tb-commit .custom-control-label').removeClass('error');
                }
            });

            $('.btn-save-ggt').on('click', function() {
                $('#ggt-form').submit();
            });

            $('.ggt-container').on('change', '[name^="ggt"]', function() {
                var name = $(this).attr('name');
                var value = $(this).val();
                var element = '[name="' + name + '"]';

                $(element).val(value);

                if($(element).hasClass('print-hide')) {
                    $(element).siblings('.print-show').html(value);
                }
               
            })
        </script>
        <script type="text/template" id="add-note">
            <div class="d-flex mb-3">
                <span class="text-avatar mr-10">${first_character}</span>
                <div class="flex-1">
                    <div class="d-flex justify-content-between">
                        <span class="reviewer fw-600 mr-5">${name}</span>
                    </div>
                    <div class="note-content mt-1">${content}</div>
                    <div class="note-date mt-1">${date}</div>
                </div>
            </div>
        </script>
    @endpush
</x-app-layout>