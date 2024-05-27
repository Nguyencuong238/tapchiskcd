<x-app-layout>
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h5 class="card-title">Quản lý nhân sự</h5>
                @can('users.create')
                    <a href="{{ route('users.create') }}" class="btn btn-primary">
                        <i class="icon-plus-circle2 mr-1"></i> {{ __('Create') }}
                    </a>
                @endcan
            </div>

            <form action="" class="d-flex flex-wrap">
                <input type="search" style="width: 200px;" class="form-control mt-2 mr-2" 
                    name="search" value="{{ request('search') }}" placeholder="Tìm kiếm">
                
                <div style="width: 160px;" class="mr-2 mt-2">
                    <select class="form-control gender-select2" name="gender">
                        <option value="">-- Giới tính --</option>
                        <option @if(request('gender')) selected @endif value="1">Nam</option>
                        <option @if(request('gender') == '0') selected @endif value="0">Nữ</option>
                    </select>
                </div>
                
                <div style="width: 200px;" class="mr-2 mt-2">
                    <select class="form-control gender-select2" name="age">
                        <option value="">-- Độ tuổi --</option>
                        <option @if(request('age') == '0-25') selected @endif value="0-25">Dưới 25 tuổi</option>
                        <option @if(request('age') == '25-35') selected @endif value="25-35">Từ 25 đến dưới 35 tuổi</option>
                        <option @if(request('age') == '35-45') selected @endif value="35-45">Từ 25 đến dưới 35 tuổi</option>
                        <option @if(request('age') == '45-100') selected @endif value="45-100">Trên 45 tuổi</option>
                    </select>
                </div>

                <div style="width: 160px;" class="mr-2 mt-2">
                    <select class="form-control gender-select2" name="journalist_code">
                        <option value="">-- Thẻ nhà báo --</option>
                        <option @if(request('journalist_code')) selected @endif value="1">Có</option>
                        <option @if(request('journalist_code') == '0') selected @endif value="0">Không</option>
                    </select>
                </div>

                <div style="width: 160px;" class="mr-2 mt-2">
                    <select class="form-control gender-select2" name="hnb_code">
                        <option value="">-- Hội nhà báo --</option>
                        <option @if(request('hnb_code')) selected @endif value="1">Có</option>
                        <option @if(request('hnb_code') == '0') selected @endif value="0">Không</option>
                    </select>
                </div>
                
                <div style="width: 160px;" class="mr-2 mt-2">
                    <select class="form-control gender-select2" name="certificate_type">
                        <option value="">-- Bằng cấp --</option>
                        <option @if(request('certificate_type') == 'dh') selected @endif value="dh">Đại học</option>
                        <option @if(request('certificate_type') == 'cd') selected @endif value="cd">Cao đẳng</option>
                        <option @if(request('certificate_type') == 'ptth') selected @endif value="ptth">PTTH</option>
                    </select>
                </div>
                
                <div style="width: 250px" class="mr-2 mt-2">
                    <select class="form-control form-control-select2" name="department_id">
                        <option value="">-- Phòng ban --</option>
                        @foreach($departments as $d)
                            <option @if(request('department_id') == $d->id) selected @endif value="{{ $d->id }}">{{ $d->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mt-2 px-4"><i class="fa fa-search"></i></button>
            </form>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Email') }}</th>
                        <th>{{ __('Department') }}</th>
                        <th>{{ __('Date Create') }}</th>
                        <th class="text-center">{{ __('Action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ optional($user->department)->name ?? '--' }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td class="text-center">
                            <div class="d-inline-flex justify-content-center">
                                @if(auth()->user()->can('users.edit') && ($user->id == 1 && auth()->id() == 1 || $user->id != 1))
                                    <a href="{{ route('users.edit', $user) }}" class="dropdown-item px-2 rounded" title="{{ __('Edit') }}">
                                        <i class="fa fa-pencil mr-1"></i>
                                    </a>
                                @endif
                                @if($user->id != 1 && auth()->id() != $user->id && auth()->user()->can('users.delete'))
                                    <a href="javascript:void(0)" data-action-url="{{ route('users.destroy', $user) }}" 
                                        data-behavior="delete-resource" class="dropdown-item px-2 rounded" title="{{ __('Delete') }}">
                                        <i class="fa fa-trash mr-1"></i>
                                    </a>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $users->links('vendor.pagination.bootstrap-4BK') }}
        </div>
    </div>

    @push('js')
        <script>
            $('.gender-select2').select2({
                minimumResultsForSearch: -1
            });
        </script>
    @endpush
</x-app-layout>
