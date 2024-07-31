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
    <div class="row">
        <div class="col-md-9 w-print-100">
            <div class="card print-hide">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title">Xem đề tài</h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="font-weight-semibold">{{ __('Title') }}:</label>
                        <div class="border-content">{{ $post->title }}</div>
                    </div>

                    <div class="form-group">
                        <label class="font-weight-semibold">Mô tả:</label>
                        <div class="border-content">{{ $post->excerpt }}</div>
                    </div>

                    <div class="form-group">
                        <label class="font-weight-semibold">{{ __('Image') }}:</label><br>
                        @if($post->getFirstMediaUrl('media'))
                        <img src="{{$post->getFirstMediaUrl('media')}}" alt="{{$post->title}}" height="250">
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="font-weight-semibold">{{ __('Content') }}:</label>
                        <div class="border-content">{!! $post->body !!}</div>
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
                                <input readonly value="{{@$post->ggt['left']['name']}}" class="flex-1">
                            </div>
                            <div class="mt-1 d-flex fs-11pt">
                                <span class="mr-1">Chức vụ: </span>
                                <input readonly value="{{@$post->ggt['left']['position']}}" class="flex-1">
                            </div>
                            <div class="d-flex mt-1">
                                <span class="fs-11pt mr-1">Được cử đến: </span>
                                <div class="flex-1">
                                    <input readonly value="{{@$post->ggt['left']['arrival_address_1']}}" class="fs-11pt w-100">
                                    <input readonly value="{{@$post->ggt['left']['arrival_address_2']}}" class="fs-11pt w-100">
                                    <input readonly value="{{@$post->ggt['left']['arrival_address_3']}}" class="fs-11pt w-100">
                                </div>
                            </div>
                            <div class="d-flex d-print-inline mt-1 fs-11pt">
                                <span class="mr-1">Về việc: </span>
                                <pre class="d-none print-show fs-11pt">{{@$post->ggt['left']['propose']}}</pre>
                                <textarea rows="3" class="print-hide flex-1" readonly>{{@$post->ggt['left']['propose']}}</textarea>
                            </div>
                            <div class="fs-11pt mt-1">
                                Đề nghị Quý cơ quan tạo điều kiện để ông (bà): 
                                <input readonly value="{{@$post->ggt['left']['suggest']}}" class="print-hide">
                                <span class="d-none print-show"></span>
                                  hoàn thành nhiệm vụ.
                            </div>
                            <div class="fs-11pt mt-1">
                                Giấy giới thiệu có giá trị đến hết ngày 
                                <input readonly value="{{@$post->ggt['left']['expire_date']}}" style="width: 20px;">
                                 tháng  
                                 <input readonly value="{{@$post->ggt['left']['expire_month']}}" style="width: 20px;">
                                 năm 
                                 <input readonly value="{{@$post->ggt['left']['expire_year']}}" style="width: 35px;">
                            </div>
                            <div class="text-right mt-4 mb-4">
                                <div class="d-inline-block text-center">
                                    <div class="fs-11pt font-italic">
                                        Hà Nội, ngày <input readonly value="{{@$post->ggt['left']['signature_date']}}" class="font-italic" style="width: 20px;">
                                         tháng <input readonly value="{{@$post->ggt['left']['signature_month']}}" class="font-italic" style="width: 20px;">
                                          năm <input readonly value="{{@$post->ggt['left']['signature_year']}}" class="font-italic" style="width: 35px;">
                                    </div>
                                    <div class="fw-600 fs-11pt mt-1 mb-4">TỔNG BIÊN TẬP</div>
                                    <input readonly value="{{@$post->ggt['left']['signature']}}" class="fs-12pt mt-3 text-center">
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
                                        Hà Nội, ngày <input readonly value="{{@$post->ggt['right']['signature_date']}}" class="fs-11pt font-italic" style="width: 20px;">
                                            tháng <input readonly value="{{@$post->ggt['right']['signature_month']}}" class="fs-11pt font-italic" style="width: 20px;">
                                            năm <input readonly value="{{@$post->ggt['right']['signature_year']}}" class="fs-11pt font-italic" style="width: 35px;">
                                    </div>
                                </div>
                            </div>
                            <div class="fs-18pt text-center fw-600 mt-4">GIẤY GIỚI THIỆU</div>
                            <div class="fs-12pt text-center pt-2 pb-2">BAN BIÊN TẬP TRÂN TRỌNG GIỚI THIỆU</div>
                            <div class="d-flex mt-1 fs-12pt5">
                                <span class="mr-1 font-italic">Ông (bà): </span>
                                <input readonly value="{{@$post->ggt['right']['name']}}" class="flex-1">
                            </div>
                            <div class="mt-1 d-flex fs-12pt5">
                                <span class="mr-1 font-italic">Chức vụ: </span>
                                <input readonly value="{{@$post->ggt['right']['position']}}" class="flex-1">
                            </div>
                            <div class="d-flex mt-1 fs-12pt5">
                                <span class="mr-1 font-italic">Được cử đến: </span>
                                <div class="flex-1">
                                    <input readonly value="{{@$post->ggt['right']['arrival_address_1']}}" class="w-100">
                                    <input readonly value="{{@$post->ggt['right']['arrival_address_2']}}" class="w-100">
                                    <input readonly value="{{@$post->ggt['right']['arrival_address_3']}}" class="w-100">
                                </div>
                            </div>
                            <div class="d-flex d-print-inline mt-2 fs-12pt5">
                                <span class="font-italic mr-1">Về việc: </span>
                                <pre class="d-none print-show fs-11pt">{{@$post->ggt['right']['propose']}}</pre>
                                <textarea rows="3" class="print-hide flex-1" readonly>{{@$post->ggt['right']['propose']}}</textarea>
                            </div>
                            <div class="fs-12pt5 mt-1">
                                Đề nghị Quý cơ quan tạo điều kiện để ông (bà): 
                                <input readonly value="{{@$post->ggt['right']['suggest']}}" class="print-hide">
                                <span class="d-none print-show"></span>
                                  hoàn thành nhiệm vụ.
                            </div>
                            <div class="fs-12pt5 mt-1">
                                Giấy giới thiệu có giá trị đến hết ngày 
                                <input readonly value="{{@$post->ggt['right']['expire_date']}}" style="width: 20px;">
                                 tháng  
                                 <input readonly value="{{@$post->ggt['right']['expire_month']}}" style="width: 20px;">
                                 năm 
                                 <input readonly value="{{@$post->ggt['right']['expire_year']}}" style="width: 40px;">
                            </div>
                            <div class="row mt-4">
                                <div class="col-6">
                                    <div class="fs-12pt fw-600 font-italic mb-2">Nơi nhận:</div>
                                    <div class="fs-10pt mb-2">- Như trên;</div>
                                    <div class="fs-10pt">- Lưu: Văn phòng</div>
                                </div>
                                <div class="col-6 text-center">
                                    <div class="fw-600 fs-13pt mb-5">TỔNG BIÊN TẬP</div>
                                    <input readonly value="{{@$post->ggt['right']['signature']}}" class="fs-13pt text-center">
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
                    <div class="card-body d-flex flex-wrap">
                        @if($post->author_id != auth()->id() && (
                            auth()->user()->position == 'director' || auth()->user()->position == 'manager' && $post->status != 2)
                        )
                        @if(auth()->user()->position == 'manager' && $post->status == 0 
                            || auth()->user()->position == 'director' && $post->status == 1)
                            <form action="{{route('posts.updateStatus')}}" method="post" class="d-inline-block mb-2">
                                @csrf

                                <input type="hidden" name="id" value="{{$post->id}}">
                                <input type="hidden" name="status" value="{{auth()->user()->position == 'director' ? 2 : 1}}">
                                <button type="submit" class="btn btn-success px-2"><i class="icon-check"></i> Phê Duyệt </button>
                            </form>

                            <form action="{{route('posts.updateStatus')}}" method="post" class="d-inline-block mb-2 ml-1">
                                @csrf

                                <input type="hidden" name="id" value="{{$post->id}}">
                                <input type="hidden" name="status" value="{{auth()->user()->position == 'director' ? -2 : -1}}">
                                <button type="submit" class="btn btn-danger px-2"><i class="icon-close2"></i> Từ chối </button>
                            </form>
                        @elseif($post->status > 0)
                            <form action="{{route('posts.updateStatus')}}" method="post" class="d-inline-block mb-2 ml-1">
                                @csrf

                                <input type="hidden" name="id" value="{{$post->id}}">
                                <input type="hidden" name="status" value="{{auth()->user()->position == 'director' ? -2 : -1}}">
                                <button type="submit" class="btn btn-danger px-2"><i class="icon-close2"></i> Từ chối </button>
                            </form>
                        @else
                            <form action="{{route('posts.updateStatus')}}" method="post" class="d-inline-block mb-2">
                                @csrf

                                <input type="hidden" name="id" value="{{$post->id}}">
                                <input type="hidden" name="status" value="{{auth()->user()->position == 'director' ? 2 : 1}}">
                                <button type="submit" class="btn btn-success px-2"><i class="icon-check"></i> Phê Duyệt </button>
                            </form>
                        @endif
                        @endif
                        <a href="{{ route('posts.index') }}" class="btn btn btn-light px-2 mb-2 ml-1">
                            <i class="icon-backward"></i> {{ __('Back') }} </a>
                        <a class="btn btn btn-primary px-2 mb-2 ml-2" title="In giấy giới thiệu" onclick="window.print()">
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
                        @include('backend.posts._categories', ['categories' => $categories, 'selected' => $selectedIds, 'disabled' => true])
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="sidebar-section-header">
                    <span class="font-weight-semibold">{{ __('Thời gian') }}</span>
                    <div class="list-icons ml-auto">
                        <a href="#category" class="list-icons-item" data-toggle="collapse" aria-expanded="true">
                            <i class="icon-arrow-down12"></i>
                        </a>
                    </div>
                </div>

                <div class="collapse show">
                    <div class="card-body">
                        <div class="form-group">
                            <label>{{ __('Ngày bắt đầu') }}:</label>
                            <div class="border-content">{{ $post->start_date }}</div>
                        </div>
                        <div class="form-group">
                            <label>{{ __('Ngày kết thúc') }}:</label>
                            <div class="border-content">{{ $post->end_date }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('js')
        <script>
            $('textarea.print-hide, input.print-hide').on('change', function() {
                $(this).siblings('.print-show').html($(this).val());
            })
        </script>
    @endpush
</x-app-layout>