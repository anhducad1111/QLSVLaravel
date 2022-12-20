@extends('layout.master')
@section('title','Thông tin sinh viên')
@section('content')


      <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Thông tin cá nhân</h3>
                    <p class="text-subtitle text-muted">Bootstrap’s cards provide a flexible and extensible content
                        container with multiple variants and options.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Danh sách giảng viên</li>
                        </ol>
                    </nav>
                </div>
            </div>
            
        </div>
        
        <!-- Basic card section start -->
        <section id="content-types" class="mt-10">
            @if (Session::has('delete'))
                                
                <div class="alert alert-success alert-dismissible show fade">
                    {{ Session::get('delete') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                 @endif 
            <div class="row">
                
                    <div class="col-xl-5 col-md-6 col-sm-12">
                        <div class="card" >
                            <div class="card-content">
                                <img src="{{ URL::to('public/upload/' . ($sinhvien->anhdaidien ?? 'default-avatar.png')) }}"
                                    alt="User profile picture" class="card-img-top img-fluid">
                                <div class="card-body">
                                    <h6 class="card-title">{{ $sinhvien->hovaten }}</h6>
                                    
                                </div>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><b>Lớp:</b> <a class="float-right">{{ $sinhvien->getLop->tenlop }}</a></li>
                                <li class="list-group-item"><b>Giới tính:</b> <a class="float-right">{{ $sinhvien->gioitinh }}</a></li>
                                <li class="list-group-item"><b>Ngày sinh:</b> <a class="float-right">{{ $sinhvien->ngaysinh }}</a></li>
                                <li class="list-group-item"><b>Quê quán:</b> <a class="float-right">{{ $sinhvien->quequan }}</a></li>
                                
                            </ul>
                            
                        </div>
                        
                    </div>
                    <div class="col-xl-7 col-md-6 col-sm-12">
                        
                       <div class="card">
                        <h5 style="padding: 20px">Sửa thông tin</h5>
                        <form action="{{ route('accountStudent.update', $sinhvien->id) }}"
                            class="form-horizontal" style="padding: 20px; height: 640px" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="hovaten" class="col-sm-2 col-form-label">Họ và tên</label>
                                <div class="col-sm-10">
                                    <input type="text" name="hovaten" class="form-control" id="hovaten"
                                        placeholder="Nhập họ và tên" value="{{ $sinhvien->hovaten }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Email" value="{{ Auth::user()->email }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="gioitinh" class="col-sm-2 col-form-label">Giới tính</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="gioitinh" id="">
                                        <option {{ $sinhvien->gioitinh == 'Nam' ? 'selected' : '' }}
                                            value="Nam">Nam</option>
                                        <option {{ $sinhvien->gioitinh == 'Nữ' ? 'selected' : '' }}
                                            value="Nữ">Nữ</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="ngaysinh" class="col-sm-2 col-form-label">Ngày sinh</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="ngaysinh" name="ngaysinh"
                                        placeholder="Nhập ngày sinh" value="{{ $sinhvien->ngaysinh }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="quequan" class="col-sm-2 col-form-label">Quê quán</label>
                                <div class="col-sm-10">
                                    <input type="text" name="quequan" class="form-control" id="quequan"
                                        placeholder="Nhập quê quán" value="{{ $sinhvien->quequan }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="new_password" class="col-sm-2 col-form-label">Mật khẩu mới</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="new_password"
                                        name="new_password" placeholder="Nhập mật khẩu mới">
                                </div>
                            </div>


                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary">Gửi
                                        đi</button>
                                </div>
                            </div>
                            @if (Session::has('success'))
                                <div class="alert alert-success alert-dismissible show fade">
                                    {{ Session::get('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                        </form>
                       </div>
                    </div>
                
                
            </div>
        </section>
        <!-- Basic Card types section end -->
         <!-- Basic Tables start -->
         <section class="section ">
            <div class="row" id="basic-table">
                <div class="col-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Điểm học phần</h4>
                            
                            
                        </div>
                        <div class="card-content">
                            @if (Session::has('delete'))
                                
                                    <div class="alert alert-success alert-dismissible show fade m-4">
                                        {{ Session::get('delete') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                 @endif
                            <div class="card-body">
                                <form action="">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h6>Tìm kiếm</h6>
                                            <div class="input-group mb-3">
                                                <button class="btn btn-primary" type="submit" id="button-addon1">Lọc</button>
                                                <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Nhập điểm chữ hoặc điểm tổng cần tìm"
                                                    aria-label="Example text with button addon"
                                                    aria-describedby="button-addon1" >
                                            </div>
                                        </div>
                                        <div class="col-md-6 ">
                                            <h6>Học kỳ</h6>
                                            
                                            <fieldset class="form-group">
                                                <select class="form-select" name="hocky" id="basicSelect">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 mb-5">
                                            <h6>Sắp xếp</h6>
                                            <div class="input-group mb-3">
                                                <label class="input-group-text" for="sapxep">Options</label>
                                                <select class="form-select" name="sapxep" id="inputGroupSelect01">
                                                    <option value="asc">Từ cao đến thấp</option>
                                                    <option value="desc">Từ thấp đến cao</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                
                                <!-- Table with outer spacing -->
                                <div class="table-responsive">
                                    <table class="table table-lg table-hover">
                                        <thead>
                                            <tr>
        
                                                <th>Môn học</th>
                                                <th>Tín chỉ</th>
                                                <th>Điểm chuyên cần</th>
                                                <th>Điểm bài tập</th>
                                                <th>Điểm giữa kì</th>
                                                <th>Điểm cuối kỳ</th>
                                                <th>Điểm tổng</th>
                                                <th>Điểm chữ</th>
                                                <th>Học kỳ</th>
        
                                            </tr>
                                        </thead>
                                        <tbody>
        
                                            @foreach ($diems as $diem)
                                                <tr class="text-center">
        
                                                    <td>{{ $diem->monhoc->tenmon ?? ' ' }}</td>
                                                    <td>{{ $diem->monhoc->sotinchi }}</td>
                                                    <td>{{ $diem->diemcc }}</td>
                                                    <td>{{ $diem->diemtx }}</td>
                                                    <td>{{ $diem->diemgk }}</td>
                                                    <td>{{ $diem->diemck }}</td>
                                                    <td>{{ $diem->diemtong }}</td>
        
                                                    <td style="text-transform: uppercase">{{ $diem->diemchu }}</td>
                                                    <td>{{ $diem->hocky }}</td>
        
                                                </tr>
                                            @endforeach
        
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                            
                        </div>
                    </div>
                </div>
               
            </div>
        </section>
        
        <!-- Basic Tables end -->
    
    
        
    </div>
    

    
@endsection
