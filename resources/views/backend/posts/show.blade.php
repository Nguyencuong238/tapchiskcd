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
            size: landscape;
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
                                    <span class="mr-1">Ông (bà): </span>
                                    <input readonly value="{{@$item['left']['name']}}" class="flex-1">
                                </div>
                                <div class="mt-1 d-flex fs-11pt">
                                    <span class="mr-1">Chức vụ: </span>
                                    <input readonly value="{{@$item['left']['position']}}" class="flex-1">
                                </div>
                                <div class="d-flex mt-1">
                                    <span class="fs-11pt mr-1">Được cử đến: </span>
                                    <div class="flex-1">
                                        <input readonly value="{{@$item['left']['arrival_address_1']}}" class="fs-11pt w-100">
                                        <input readonly value="{{@$item['left']['arrival_address_2']}}" class="fs-11pt w-100">
                                        <input readonly value="{{@$item['left']['arrival_address_3']}}" class="fs-11pt w-100">
                                    </div>
                                </div>
                                <div class="d-flex d-print-inline mt-1 fs-11pt">
                                    <span class="mr-1">Về việc: </span>
                                    <pre class="d-none print-show fs-11pt">{{@$item['left']['propose']}}</pre>
                                    <textarea rows="3" class="print-hide flex-1" readonly>{{@$item['left']['propose']}}</textarea>
                                </div>
                                <div class="fs-11pt mt-1">
                                    Đề nghị Quý cơ quan tạo điều kiện để ông (bà): 
                                    <input readonly value="{{@$item['left']['suggest']}}" class="print-hide">
                                    <span class="d-none print-show"></span>
                                    hoàn thành nhiệm vụ.
                                </div>
                                <div class="fs-11pt mt-1">
                                    Giấy giới thiệu có giá trị đến hết ngày 
                                    <input readonly value="{{@$item['left']['expire_date']}}" style="width: 20px;">
                                    tháng  
                                    <input readonly value="{{@$item['left']['expire_month']}}" style="width: 20px;">
                                    năm 
                                    <input readonly value="{{@$item['left']['expire_year']}}" style="width: 35px;">
                                </div>
                                <div class="text-right mt-4 mb-4">
                                    <div class="d-inline-block text-center">
                                        <div class="fs-11pt font-italic">
                                            Hà Nội, ngày <input readonly value="{{@$item['left']['signature_date']}}" class="font-italic" style="width: 20px;">
                                            tháng <input readonly value="{{@$item['left']['signature_month']}}" class="font-italic" style="width: 20px;">
                                            năm <input readonly value="{{@$item['left']['signature_year']}}" class="font-italic" style="width: 35px;">
                                        </div>
                                        <div class="fw-600 fs-11pt mt-1 mb-4">TỔNG BIÊN TẬP</div>
                                        <input readonly value="{{@$item['left']['signature']}}" class="fs-12pt mt-3 text-center">
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
                                            Hà Nội, ngày <input readonly value="{{@$item['right']['signature_date']}}" class="fs-11pt font-italic" style="width: 20px;">
                                                tháng <input readonly value="{{@$item['right']['signature_month']}}" class="fs-11pt font-italic" style="width: 20px;">
                                                năm <input readonly value="{{@$item['right']['signature_year']}}" class="fs-11pt font-italic" style="width: 35px;">
                                        </div>
                                    </div>
                                </div>
                                <div class="fs-18pt text-center fw-600 mt-4">GIẤY GIỚI THIỆU</div>
                                <div class="fs-12pt text-center pt-2 pb-2">BAN BIÊN TẬP TRÂN TRỌNG GIỚI THIỆU</div>
                                <div class="d-flex mt-1 fs-12pt5">
                                    <span class="mr-1 font-italic">Ông (bà): </span>
                                    <input readonly value="{{@$item['right']['name']}}" class="flex-1">
                                </div>
                                <div class="mt-1 d-flex fs-12pt5">
                                    <span class="mr-1 font-italic">Chức vụ: </span>
                                    <input readonly value="{{@$item['right']['position']}}" class="flex-1">
                                </div>
                                <div class="d-flex mt-1 fs-12pt5">
                                    <span class="mr-1 font-italic">Được cử đến: </span>
                                    <div class="flex-1">
                                        <input readonly value="{{@$item['right']['arrival_address_1']}}" class="w-100">
                                        <input readonly value="{{@$item['right']['arrival_address_2']}}" class="w-100">
                                        <input readonly value="{{@$item['right']['arrival_address_3']}}" class="w-100">
                                    </div>
                                </div>
                                <div class="d-flex d-print-inline mt-2 fs-12pt5">
                                    <span class="font-italic mr-1">Về việc: </span>
                                    <pre class="d-none print-show fs-11pt">{{@$item['right']['propose']}}</pre>
                                    <textarea rows="3" class="print-hide flex-1" readonly>{{@$item['right']['propose']}}</textarea>
                                </div>
                                <div class="fs-12pt5 mt-1">
                                    Đề nghị Quý cơ quan tạo điều kiện để ông (bà): 
                                    <input readonly value="{{@$item['right']['suggest']}}" class="print-hide">
                                    <span class="d-none print-show"></span>
                                    hoàn thành nhiệm vụ.
                                </div>
                                <div class="fs-12pt5 mt-1">
                                    Giấy giới thiệu có giá trị đến hết ngày 
                                    <input readonly value="{{@$item['right']['expire_date']}}" style="width: 20px;">
                                    tháng  
                                    <input readonly value="{{@$item['right']['expire_month']}}" style="width: 20px;">
                                    năm 
                                    <input readonly value="{{@$item['right']['expire_year']}}" style="width: 40px;">
                                </div>
                                <div class="row mt-4">
                                    <div class="col-6">
                                        <div class="fs-12pt fw-600 font-italic mb-2">Nơi nhận:</div>
                                        <div class="fs-10pt mb-2">- Như trên;</div>
                                        <div class="fs-10pt">- Lưu: Văn phòng</div>
                                    </div>
                                    <div class="col-6 text-center">
                                        <div class="fw-600 fs-13pt mb-5">TỔNG BIÊN TẬP</div>
                                        <input readonly value="{{@$item['right']['signature']}}" class="fs-13pt text-center">
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
                                <span class="mr-1">Ông (bà): </span>
                                <input readonly class="flex-1">
                            </div>
                            <div class="mt-1 d-flex fs-11pt">
                                <span class="mr-1">Chức vụ: </span>
                                <input readonly class="flex-1">
                            </div>
                            <div class="d-flex mt-1">
                                <span class="fs-11pt mr-1">Được cử đến: </span>
                                <div class="flex-1">
                                    <input readonly class="fs-11pt w-100">
                                    <input readonly class="fs-11pt w-100">
                                    <input readonly class="fs-11pt w-100">
                                </div>
                            </div>
                            <div class="d-flex d-print-inline mt-1 fs-11pt">
                                <span class="mr-1">Về việc: </span>
                                <pre class="d-none print-show fs-11pt">{{@$item['left']['propose']}}</pre>
                                <textarea rows="3" class="print-hide flex-1" readonly></textarea>
                            </div>
                            <div class="fs-11pt mt-1">
                                Đề nghị Quý cơ quan tạo điều kiện để ông (bà): 
                                <input readonly class="print-hide">
                                <span class="d-none print-show"></span>
                                    hoàn thành nhiệm vụ.
                            </div>
                            <div class="fs-11pt mt-1">
                                Giấy giới thiệu có giá trị đến hết ngày 
                                <input readonly style="width: 20px;">
                                    tháng  
                                    <input readonly style="width: 20px;">
                                    năm 
                                    <input readonly style="width: 35px;">
                            </div>
                            <div class="text-right mt-4 mb-4">
                                <div class="d-inline-block text-center">
                                    <div class="fs-11pt font-italic">
                                        Hà Nội, ngày <input readonly class="font-italic" style="width: 20px;">
                                            tháng <input readonly class="font-italic" style="width: 20px;">
                                            năm <input readonly class="font-italic" style="width: 35px;">
                                    </div>
                                    <div class="fw-600 fs-11pt mt-1 mb-4">TỔNG BIÊN TẬP</div>
                                    <input readonly class="fs-12pt mt-3 text-center">
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
                                        Hà Nội, ngày <input readonly class="fs-11pt font-italic" style="width: 20px;">
                                            tháng <input readonly class="fs-11pt font-italic" style="width: 20px;">
                                            năm <input readonly class="fs-11pt font-italic" style="width: 35px;">
                                    </div>
                                </div>
                            </div>
                            <div class="fs-18pt text-center fw-600 mt-4">GIẤY GIỚI THIỆU</div>
                            <div class="fs-12pt text-center pt-2 pb-2">BAN BIÊN TẬP TRÂN TRỌNG GIỚI THIỆU</div>
                            <div class="d-flex mt-1 fs-12pt5">
                                <span class="mr-1 font-italic">Ông (bà): </span>
                                <input readonly class="flex-1">
                            </div>
                            <div class="mt-1 d-flex fs-12pt5">
                                <span class="mr-1 font-italic">Chức vụ: </span>
                                <input readonly class="flex-1">
                            </div>
                            <div class="d-flex mt-1 fs-12pt5">
                                <span class="mr-1 font-italic">Được cử đến: </span>
                                <div class="flex-1">
                                    <input readonly class="w-100">
                                    <input readonly class="w-100">
                                    <input readonly class="w-100">
                                </div>
                            </div>
                            <div class="d-flex d-print-inline mt-2 fs-12pt5">
                                <span class="font-italic mr-1">Về việc: </span>
                                <pre class="d-none print-show fs-11pt"></pre>
                                <textarea rows="3" class="print-hide flex-1" readonly></textarea>
                            </div>
                            <div class="fs-12pt5 mt-1">
                                Đề nghị Quý cơ quan tạo điều kiện để ông (bà): 
                                <input readonly class="print-hide">
                                <span class="d-none print-show"></span>
                                    hoàn thành nhiệm vụ.
                            </div>
                            <div class="fs-12pt5 mt-1">
                                Giấy giới thiệu có giá trị đến hết ngày 
                                <input readonly style="width: 20px;">
                                    tháng  
                                    <input readonly style="width: 20px;">
                                    năm 
                                    <input readonly style="width: 40px;">
                            </div>
                            <div class="row mt-4">
                                <div class="col-6">
                                    <div class="fs-12pt fw-600 font-italic mb-2">Nơi nhận:</div>
                                    <div class="fs-10pt mb-2">- Như trên;</div>
                                    <div class="fs-10pt">- Lưu: Văn phòng</div>
                                </div>
                                <div class="col-6 text-center">
                                    <div class="fw-600 fs-13pt mb-5">TỔNG BIÊN TẬP</div>
                                    <input readonly class="fs-13pt text-center">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
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
                <i class="icon-printer2 mr-2"></i>{{ __('In GGT') }} 
            </a>
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