<x-app-layout>
    @push('css')
	    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <style>
            .siblings-info .row, .children-info .row {
                border: 1px solid #ccc;
                padding: 20px;
                margin-left: 0;
                margin-right: 0;
                position: relative;
            }
            .siblings-info .row .fa-times, .children-info .row .fa-times {
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
            .card-title {
                font-weight: 600;
                font-size: 16px;
            }
        </style>
    @endpush

    <form action="{{ route('users.update', $user) }}" method="post">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title">{{ __('Chỉnh sửa nhân sự') }}</h5>
                        </div>
                    </div>
                    <div class="card-body row">
                        <div class="form-group col-12">
                            <label>Ảnh 3x4:</label>
                            
                            <x-media-library-collection
                                name="media"
                                :model="$user"
                                collection="media"
                                rules="mimes:png,jpeg,jpg,webp"
                                max-items="1"
                            />
                        </div>

                        <div class="form-group col-md-4">
                            <label>Họ và tên:</label>
                            <input type="text" name="name" value="{{ old('name', $user->name) }}" 
                                class="form-control @error('name')is-invalid @enderror" required>
                            
                            @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-4">
                            <label>Bút danh:</label>
                            <input type="text" name="pen_name" value="{{ old('pen_name', $user->pen_name) }}" class="form-control">
                        </div>

                        <div class="form-group col-md-4">
                            <label>Giới tính:</label>
                            <select class="form-control form-control-select2" name="gender">
                                <option value="1">Nam</option>
                                <option value="0" @if(old('gender', $user->gender) === 0) selected @endif>Nữ</option>
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label>Ngày sinh:</label>
                            <div class="input-group mb-3">
                                <input type="text" name="birthday" value="{{ old('birthday', $user->birthday) }}" 
                                    class="form-control birthday @error('birthday')is-invalid @enderror" required>
                                <div class="input-group-append date-picker-icon cursor-pointer">
                                    <span class="input-group-text"><i class="icon-calendar"></i></span>
                                </div>
                            </div>

                            @error('birthday')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-4">
                            <label>Dân tộc:</label>
                            <select class="form-control form-control-select2" name="nation">
                                @foreach($listNation as $nation)
                                <option value="{{$nation}}" @if(old('nation', $user->nation) == $nation) selected @endif>{{$nation}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label>Số CCCD:</label>
                            <input type="text" name="cccd" value="{{ old('cccd', $user->cccd) }}" class="form-control">
                        </div>

                        <div class="form-group col-md-4">
                            <label>Mã số thuế cá nhân:</label>
                            <input type="text" name="tax_code" value="{{ old('tax_code', $user->tax_code) }}" class="form-control">
                        </div>

                        <div class="form-group col-md-4">
                            <label>Mã sổ BHXH:</label>
                            <input type="text" name="bhxh" value="{{ old('bhxh', $user->bhxh) }}" class="form-control">
                        </div>

                        <div class="form-group col-md-4">
                            <label>Số thẻ bảo hiểm y tế:</label>
                            <input type="text" name="bhyt" value="{{ old('bhyt', $user->bhyt) }}" class="form-control">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Số thẻ nhà báo:</label>
                            <input type="text" name="journalist_code" value="{{ old('journalist_code', $user->journalist_code) }}" class="form-control">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Thời hạn thẻ nhà báo:</label>
                            <div class="input-group mb-3">
                                <input type="text" name="journalist_code_date" value="{{ old('journalist_code_date', $user->journalist_code_date) }}" 
                                    class="form-control journalist_code_date">
                                <div class="input-group-append date-picker-icon cursor-pointer">
                                    <span class="input-group-text">
                                        <i class="icon-calendar"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label>Số thẻ Hội viên Hội nhà báo:</label>
                            <input type="text" name="hnb_code" value="{{ old('hnb_code', $user->hnb_code) }}" class="form-control">
                        </div>

                        <div class="form-group col-md-4">
                            <label>Ngày cấp thẻ Hội viên Hội nhà báo:</label>
                            <div class="input-group mb-3">
                                <input type="text" name="hnb_code_start" value="{{ old('hnb_code_start', $user->hnb_code_start) }}" class="form-control hnb_code_start">
                                <div class="input-group-append date-picker-icon cursor-pointer">
                                    <span class="input-group-text">
                                        <i class="icon-calendar"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label>Thời hạn thẻ Hội viên Hội nhà báo:</label>
                            <div class="input-group mb-3">
                                <input type="text" name="hnb_code_end" value="{{ old('hnb_code_end', $user->hnb_code_end) }}" class="form-control hnb_code_end">
                                <div class="input-group-append date-picker-icon cursor-pointer">
                                    <span class="input-group-text">
                                        <i class="icon-calendar"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label>Quê quán:</label>
                            <input type="text" name="home_town" value="{{ old('home_town', $user->home_town) }}" class="form-control @error('home_town')is-invalid @enderror">
                            @error('home_town')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-4">
                            <label>Hộ khẩu thường trú:</label>
                            <input type="text" name="hktt" value="{{ old('hktt', $user->hktt) }}" class="form-control @error('hktt')is-invalid @enderror">
                            @error('hktt')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-4">
                            <label>Tạm trú:</label>
                            <input type="text" name="staying_address" value="{{ old('staying_address', $user->staying_address) }}" class="form-control">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Bằng cấp: </label>
                            <select class="form-control form-control-select2" name="certificate_type">
                                <option value="">-- Bằng cấp --</option>
                                <option value="dh" @if(old('certificate_type', $user->certificate_type) == 'dh') selected @endif>Đại học</option>
                                <option value="cd" @if(old('certificate_type', $user->certificate_type) == 'cd') selected @endif>Cao đẳng</option>
                                <option value="ptth" @if(old('certificate_type', $user->certificate_type) == 'ptth') selected @endif>PTTH</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Ảnh bằng cấp:</label>

                            <x-media-library-collection
                                name="certificate"
                                :model="$user"
                                collection="certificate"
                                rules="mimes:png,jpeg,jpg,webp"
                                max-items="1"
                            />
                        </div>

                        <div class="form-group col-md-6">
                            <label>Ngày vào Đảng:</label>
                            <div class="input-group mb-3">
                                <input type="text" name="date_party" value="{{ old('date_party', $user->date_party) }}" class="form-control date_party">
                                <div class="input-group-append date-picker-icon cursor-pointer">
                                    <span class="input-group-text">
                                        <i class="icon-calendar"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Chức danh:</label>
                            <input type="text" name="title" value="{{ old('title', $user->title) }}" class="form-control">
                        </div>

                        <div class="form-group col-md-6">
                            <label>{{ __('Chức vụ') }}</label>
                            <select class="form-control form-control-select2" name="position">
                                <option value="staff" @if(old('position', $user->position) == 'staff') selected @endif>Phóng viên</option>
                                <option value="manager" @if(old('position', $user->position) == 'manager') selected @endif>Trưởng ban</option>
                                <option value="secretary" @if(old('position', $user->position) == 'secretary') selected @endif>Tổng thư ký</option>
                                <option value="director" @if(old('position', $user->position) == 'director') selected @endif>Tổng biên tập</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label>{{ __('Department') }}</label>
                            <select class="form-control form-control-select2" name="department_id">
                                <option value="">{{ __('-- Phòng ban --') }}</option>
                                @foreach($departments as $d)
                                    <option {{ $d->id == old('department_id', $user->department_id) ? 'selected' : null }} value="{{ $d->id }}">{{ $d->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Hợp đồng lao động:</label>
                            <input type="text" name="labor_contract" value="{{ old('labor_contract', $user->labor_contract) }}" class="form-control">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Loại HĐLĐ</label>
                            <select class="form-control form-control-select2" name="labor_contract_type">
                                <option value="">{{ __('-- Chọn --') }}</option>
                                <option value="kth" @if(old('labor_contract_type', $user->labor_contract_type) == 'kth') selected @endif>{{ __('Không thời hạn') }}</option>
                                <option value="cth" @if(old('labor_contract_type', $user->labor_contract_type) == 'cth') selected @endif>{{ __('Có thời hạn') }}</option>
                                <option value="tv" @if(old('labor_contract_type', $user->labor_contract_type) == 'tv') selected @endif>{{ __('Thử việc') }}</option>
                                <option value="ct" @if(old('labor_contract_type', $user->labor_contract_type) == 'ct') selected @endif>{{ __('Cộng tác') }}</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label>HĐLĐ từ ngày:</label>
                            <div class="input-group mb-3">
                                <input type="text" name="labor_contract_start" value="{{ old('labor_contract_start', $user->labor_contract_start) }}" class="form-control labor_contract_start">
                                <div class="input-group-append date-picker-icon cursor-pointer">
                                    <span class="input-group-text">
                                        <i class="icon-calendar"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label>HĐLĐ đến ngày:</label>
                            <div class="input-group mb-3">
                                <input type="text" name="labor_contract_end" value="{{ old('labor_contract_end', $user->labor_contract_end) }}" class="form-control labor_contract_end">
                                <div class="input-group-append date-picker-icon cursor-pointer">
                                    <span class="input-group-text">
                                        <i class="icon-calendar"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-12">
                            <label>Quá trình công tác: (thời gian  từ ngày tháng năm nào, đến ngày tháng năm nào, làm gì ở đâu, chức danh chức vụ)</label>
                            <textarea name="work_schedule" class="form-control" 
                                placeholder="Thêm mô tả" rows="5">{{ old('work_schedule', $user->work_schedule) }}</textarea>
                            @error('work_schedule')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-12">
                            <label>Thời gian bắt đầu làm nghề Báo chí ( Từ năm nào? Đến năm nào? Ở đâu? Phóng viên cộng tác hay chính thức đống BHXH)</label>
                            <textarea name="journalist_schedule" class="form-control" 
                                placeholder="Thêm mô tả" rows="5">{{ old('journalist_schedule', $user->journalist_schedule) }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title">Thông tin cha</h5>
                        </div>
                    </div>
                    <div class="card-body row">
                        <div class="form-group col-md-4">
                            <label>Họ và tên cha:</label>
                            <input type="text" name="parent_info[father_name]" value="{{ old('father_name', @$user->parent_info['father_name']) }}" class="form-control @error('father_name')is-invalid @enderror">
                            @error('father_name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-4">
                            <label>Năm sinh:</label>
                            <input type="number" name="parent_info[father_birthyear]" value="{{ old('father_birthyear', @$user->parent_info['father_birthyear']) }}" class="form-control @error('father_birthyear')is-invalid @enderror">
                            @error('father_birthyear')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-4 d-flex align-items-end">
                            <div class="form-control border-0">
                                <input type="radio" name="parent_info[father_status]" value="1" id="father_live" 
                                    @if(@$user->parent_info['father_status'] !== '0') checked @endif>
                            <label for="father_live">Còn sống:</label>
                            </div>
                            <div class="form-control border-0">
                                <input type="radio" name="parent_info[father_status]" value="1" id="father_dead"
                                @if(@$user->parent_info['father_status'] === '0') checked @endif> 
                                <label for="father_dead">Đã mất:</label>
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label>Nghề nghiệp:</label>
                            <input type="text" name="parent_info[father_career]" value="{{ old('father_career', @$user->parent_info['father_career']) }}" class="form-control @error('father_career')is-invalid @enderror">
                            @error('father_career')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-4">
                            <label>Nơi công tác:</label>
                            <input type="text" name="parent_info[father_company]" value="{{ old('father_company', @$user->parent_info['father_company']) }}" class="form-control @error('father_company')is-invalid @enderror">
                            @error('father_company')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-4">
                            <label>Địa chỉ thường trú:</label>
                            <input type="text" name="parent_info[father_permanent_address]" value="{{ old('father_permanent_address', @$user->parent_info['father_permanent_address']) }}" class="form-control @error('father_permanent_address')is-invalid @enderror">
                            @error('father_permanent_address')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title">Thông tin mẹ</h5>
                        </div>
                    </div>
                    <div class="card-body row">                        
                        <div class="form-group col-md-4">
                            <label>Họ và tên mẹ:</label>
                            <input type="text" name="parent_info[mother_name]" value="{{ old('mother_name', @$user->parent_info['mother_name']) }}" class="form-control @error('mother_name')is-invalid @enderror">
                            @error('mother_name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-4">
                            <label>Năm sinh:</label>
                            <input type="number" name="parent_info[mother_birthyear]" value="{{ old('mother_birthyear', @$user->parent_info['mother_birthyear']) }}" class="form-control @error('mother_birthyear')is-invalid @enderror">
                            @error('mother_birthyear')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-4 d-flex align-items-end">
                            <div class="form-control border-0">
                                <input type="radio" name="parent_info[mother_status]" value="1" id="mother_live"
                                    @if(@$user->parent_info['father_status'] !== '0') checked @endif>
                            <label for="mother_live">Còn sống:</label>
                            </div>
                            <div class="form-control border-0">
                                <input type="radio" name="parent_info[mother_status]" value="0" id="mother_dead"
                                    @if(@$user->parent_info['father_status'] === '0') checked @endif> 
                                <label for="mother_dead">Đã mất:</label>
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label>Nghề nghiệp:</label>
                            <input type="text" name="parent_info[mother_career]" value="{{ old('mother_career', @$user->parent_info['mother_career']) }}" class="form-control @error('mother_career')is-invalid @enderror">
                            @error('mother_career')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-4">
                            <label>Nơi công tác:</label>
                            <input type="text" name="parent_info[mother_company]" value="{{ old('mother_company', @$user->parent_info['mother_company']) }}" class="form-control @error('mother_company')is-invalid @enderror">
                            @error('mother_company')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-4">
                            <label>Địa chỉ thường trú:</label>
                            <input type="text" name="parent_info[mother_permanent_address]" value="{{ old('mother_permanent_address', @$user->parent_info['mother_permanent_address']) }}" class="form-control @error('mother_permanent_address')is-invalid @enderror">
                            @error('mother_permanent_address')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title">Thông tin anh/chị/em ruột</h5>
                        </div>
                    </div>
                    <div class="card-body siblings-info">   
                        @php
                            $user->siblings_info = $user->siblings_info ?? [];
                        @endphp
                        @foreach($user->siblings_info as $s)
                        <div class="row pb-2 mb-4">
                            <i class="fa fa-times text-danger" title="Xóa"></i>
                            <div class="form-group col-md-4">
                                <label>Họ và tên:</label>
                                <input type="text" name="siblings_info[{{$loop->index}}][name]" value="{{ old('siblings_info', $s['name']) }}" 
                                    class="form-control @error('siblings_info[{{$loop->index}}][name]')is-invalid @enderror">
                                @error('siblings_info[{{$loop->index}}][name]')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label>Ngày sinh:</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="siblings_info[{{$loop->index}}][birthday]" value="{{ old('siblings_info', $s['birthday']) }}" 
                                        class="form-control siblings_birthday @error('siblings_info[{{$loop->index}}][birthday]')is-invalid @enderror">
                                    <div class="input-group-append date-picker-icon cursor-pointer">
                                        <span class="input-group-text">
                                            <i class="icon-calendar"></i>
                                        </span>
                                    </div>
                                </div>
                                @error('siblings_info[{{$loop->index}}][birthday]')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label>Nghề nghiệp:</label>
                                <input type="text" name="siblings_info[{{$loop->index}}][career]" value="{{ old('siblings_info', $s['career']) }}" class="form-control @error('siblings_info[{{$loop->index}}][career]')is-invalid @enderror">
                                @error('siblings_info[{{$loop->index}}][career]')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label>Nơi công tác:</label>
                                <input type="text" name="siblings_info[{{$loop->index}}][company]" value="{{ old('siblings_info', $s['company']) }}" class="form-control @error('siblings_info[{{$loop->index}}][company]')is-invalid @enderror">
                                @error('siblings_info[{{$loop->index}}][company]')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label>Địa chỉ thường trú:</label>
                                <input type="text" name="siblings_info[{{$loop->index}}][address]" value="{{ old('siblings_info', $s['address']) }}" class="form-control @error('siblings_info[{{$loop->index}}][address]')is-invalid @enderror">
                                @error('siblings_info[{{$loop->index}}][address]')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="px-3 pb-3 text-right">
                        <button type="button" class="btn btn-primary btn-add-siblings px-3 py-1">Thêm</button>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title">Thông tin con ruột</h5>
                        </div>
                    </div>
                    <div class="card-body children-info">   
                        @php
                            $user->children_info = $user->children_info ?? [];
                        @endphp
                        @foreach($user->children_info as $c)
                        <div class="row pb-2 mb-4">
                            <i class="fa fa-times text-danger" title="Xóa"></i>                   
                            <div class="form-group col-md-4">
                                <label>Họ và tên:</label>
                                <input type="text" name="children_info[{{$loop->index}}][name]" value="{{ old('children_info', $c['name']) }}" class="form-control @error('children_info[{{$loop->index}}][name]')is-invalid @enderror">
                                @error('children_info[{{$loop->index}}][name]')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label>Năm sinh:</label>
                                <input type="number" name="children_info[{{$loop->index}}][birthyear]" value="{{ old('children_info', $c['birthyear']) }}"
                                    class="form-control children_info[{{$loop->index}}][birthyear] @error('children_info[{{$loop->index}}][birthyear]')is-invalid @enderror">
                                @error('children_info[{{$loop->index}}][birthyear]')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label>Trường học:</label>
                                <input type="text" name="children_info[{{$loop->index}}][school]" value="{{ old('children_info', $c['school']) }}" class="form-control @error('children_info[{{$loop->index}}][school]')is-invalid @enderror">
                                @error('children_info[{{$loop->index}}][school]')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label>Nghề nghiệp:</label>
                                <input type="text" name="children_info[{{$loop->index}}][career]" value="{{ old('children_info', $c['career']) }}" class="form-control @error('children_info[{{$loop->index}}][career]')is-invalid @enderror">
                                @error('children_info[{{$loop->index}}][career]')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label>Nơi công tác:</label>
                                <input type="text" name="children_info[{{$loop->index}}][company]" value="{{ old('children_info', $c['company']) }}" class="form-control @error('children_info[{{$loop->index}}][company]')is-invalid @enderror">
                                @error('children_info[{{$loop->index}}][company]')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label>Địa chỉ thường trú:</label>
                                <input type="text" name="children_info[{{$loop->index}}][address]" value="{{ old('children_info', $c['address']) }}" class="form-control @error('children_info[{{$loop->index}}][address]')is-invalid @enderror">
                                @error('children_info[{{$loop->index}}][address]')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="px-3 pb-3 text-right">
                        <button type="button" class="btn btn-primary btn-add-children px-3 py-1">Thêm</button>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title">Thông tin tài khoản</h5>
                        </div>
                    </div>
                    <div class="card-body row">
                        
                        <div class="form-group col-md-6">
                            <label>{{ __('Email') }}:</label>
                            <input type="text" name="email" value="{{ old('email', $user->email) }}" class="form-control @error('email')is-invalid @enderror" required autocomplete="off">
                            @error('email')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label>{{ __('Password') }}: (từ 8 ký tự trở lên)</label>
                            <input type="password" name="password" class="form-control @error('password')is-invalid @enderror" autocomplete="off">
                            @error('password')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-12">
                            <label>{{ __('Roles') }}</label>
                            <select class="form-control form-control-select2" name="roles[]">
                                @foreach($roles as $role)
                                    <option {{ $user->hasRole($role->id) ? 'selected' : null }} value="{{ $role->name }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
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
                            <a href="{{ route('users.index') }}" class="btn btn btn-light ml-2"><i class="icon-backward mr-2"></i>{{ __('Back') }} </a>
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
                $(".birthday").flatpickr({
                    altInput: true,
                    dateFormat: "Y-m-d",
                    altFormat: 'd/m/Y'
                })

                $(".journalist_code_date").flatpickr({
                    altInput: true,
                    dateFormat: "Y-m-d",
                    altFormat: 'd/m/Y'
                })

                $(".hnb_code_date").flatpickr({
                    altInput: true,
                    dateFormat: "Y-m-d",
                    altFormat: 'd/m/Y'
                })

                $(".siblings_birthday").flatpickr({
                    altInput: true,
                    dateFormat: "Y-m-d",
                    altFormat: 'd/m/Y'
                })

                $(".hnb_code_start").flatpickr({
                    altInput: true,
                    dateFormat: "Y-m-d",
                    altFormat: 'd/m/Y'
                })

                $(".hnb_code_end").flatpickr({
                    altInput: true,
                    dateFormat: "Y-m-d",
                    altFormat: 'd/m/Y'
                })

                $(".date_party").flatpickr({
                    altInput: true,
                    dateFormat: "Y-m-d",
                    altFormat: 'd/m/Y'
                })

                $(".labor_contract_start").flatpickr({
                    altInput: true,
                    dateFormat: "Y-m-d",
                    altFormat: 'd/m/Y'
                })

                $(".labor_contract_end").flatpickr({
                    altInput: true,
                    dateFormat: "Y-m-d",
                    altFormat: 'd/m/Y'
                })

                $('.date-picker-icon').on('click', function() {
                    $(this).siblings('input').trigger('click');
                })

                var i = {{count($user->children_info)}} ;
                $('.btn-add-children').on('click', function() {
                    var html = $('#list_children').html();
                    html = html.replaceAll('${i}', i);
                    $('.children-info').append(html);
                    i++;
                })

                $('.children-info').on('click', '.fa-times', function() {
                    $(this).closest('.row').remove('');
                })

                var j = {{count($user->siblings_info)}};
                $('.btn-add-siblings').on('click', function() {
                    var html = $('#list_siblings').html();
                    html = html.replaceAll('${j}', j);
                    $('.siblings-info').append(html);

                    $(".siblings_birthday_" + j).flatpickr({
                        altInput: true,
                        dateFormat: "Y-m-d",
                        altFormat: 'd/m/Y'
                    });
                    j++;
                });

                $('.siblings-info').on('click', '.fa-times', function() {
                    $(this).closest('.row').remove('');
                })
            })
        </script>
        <script type="text/template" id="list_siblings">
            <div class="row pb-2 mb-4">
                <i class="fa fa-times text-danger" title="Xóa"></i> 
                <div class="form-group col-md-4">
                    <label>Họ và tên:</label>
                    <input type="text" name="siblings_info[${j}][name]" value="{{ old('siblings_info') }}" class="form-control @error('siblings_info[${j}][name]')is-invalid @enderror">
                    @error('siblings_info[${j}][name]')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-md-4">
                    <label>Ngày sinh:</label>
                    <div class="input-group mb-3">
                        <input type="text" name="siblings_info[${j}][birthday]" value="{{ old('siblings_info') }}" class="form-control siblings_birthday_${j} @error('siblings_info[${j}][birthday]')is-invalid @enderror">
                        <div class="input-group-append date-picker-icon cursor-pointer">
                            <span class="input-group-text">
                                <i class="icon-calendar"></i>
                            </span>
                        </div>
                    </div>
                    @error('siblings_info[${j}][birthday]')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-md-4">
                    <label>Nghề nghiệp:</label>
                    <input type="text" name="siblings_info[${j}][career]" value="{{ old('siblings_info') }}" class="form-control @error('siblings_info[${j}][career]')is-invalid @enderror">
                    @error('siblings_info[${j}][career]')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label>Nơi công tác:</label>
                    <input type="text" name="siblings_info[${j}][company]" value="{{ old('siblings_info') }}" class="form-control @error('siblings_info[${j}][company]')is-invalid @enderror">
                    @error('siblings_info[${j}][company]')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label>Địa chỉ thường trú:</label>
                    <input type="text" name="siblings_info[${j}][address]" value="{{ old('siblings_info') }}" class="form-control @error('siblings_info[${j}][address]')is-invalid @enderror">
                    @error('siblings_info[${j}][address]')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </script>

        <script type="text/template" id="list_children">
            <div class="row pb-2 mb-4">
                <i class="fa fa-times text-danger" title="Xóa"></i> 
                <div class="form-group col-md-4">
                    <label>Họ và tên:</label>
                    <input type="text" name="children_info[${i}][name]" value="{{ old('children_info') }}" 
                        class="form-control @error('children_info[${i}][name]')is-invalid @enderror">
                    @error('children_info[${i}][name]')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-md-4">
                    <label>Năm sinh:</label>
                    <input type="number" name="children_info[${i}][birthyear]" value="{{ old('children_info') }}"
                        class="form-control children_info[${i}][birthyear] @error('children_info[${i}][birthyear]')is-invalid @enderror">
                    @error('children_info[${i}][birthyear]')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-md-4">
                    <label>Trường học:</label>
                    <input type="text" name="children_info[${i}][school]" value="{{ old('children_info') }}" class="form-control @error('children_info[${i}][school]')is-invalid @enderror">
                    @error('children_info[${i}][school]')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-md-4">
                    <label>Nghề nghiệp:</label>
                    <input type="text" name="children_info[${i}][career]" value="{{ old('children_info') }}" class="form-control @error('children_info[${i}][career]')is-invalid @enderror">
                    @error('children_info[${i}][career]')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-md-4">
                    <label>Nơi công tác:</label>
                    <input type="text" name="children_info[${i}][company]" value="{{ old('children_info') }}" class="form-control @error('children_info[${i}][company]')is-invalid @enderror">
                    @error('children_info[${i}][company]')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-md-4">
                    <label>Địa chỉ thường trú:</label>
                    <input type="text" name="children_info[${i}][address]" value="{{ old('children_info') }}" class="form-control @error('children_info[${i}][address]')is-invalid @enderror">
                    @error('children_info[${i}][address]')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </script>
    @endpush
        
</x-app-layout>