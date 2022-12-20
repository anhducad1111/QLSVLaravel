@extends('layout.master')
@section('title','Thêm giảng viên')
@section('content')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Thêm giảng viên</h3>
                <p class="text-subtitle text-muted">Multiple form layouts, you can use</p>
  
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Thêm giảng viên</li>
                    </ol>
                </nav>
            </div>
        </div>
  
    </div>
  
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Điền thông tin</h4>
                        
                    </div>
                    <div class="card-content">
                        @if (Session::has('success'))
                          
                          <div class="alert alert-success alert-dismissible show fade m-4">
                            {{ Session::get('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        @include('notification')
                        <div class="card-body">
                          
                            <form action="{{ route('giangvien.store') }}" method="post" enctype="multipart/form-data">
                              @csrf
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                      <fieldset class="form-group">
                                        <label for="khoa" style="font-weight: bold">Khoa</label>
                                        <select name="khoa" id="khoa" class="form-control">
                                            <option value="">-- Chọn --</option>
                                            @foreach ($khoas as $khoa)
                                                <option value="{{ $khoa->id }}">
                                                    {{ $khoa->tenkhoa }}
                                                </option>
                                            @endforeach
                                        </select>
                                      </fieldset>
                                        
                                    </div>
                                    <div class="col-md-6 col-12">
                                      <div class="form-group">
                                        <label for="tengv">Họ và tên</label>
                                        <input type="text" class="form-control" name="tengv" id="tengv" placeholder="Nhập họ và tên">
                                      </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                          <fieldset class="form-group">
                                              <label for="gioitinh">Giới tính</label>
                                              <select name="gioitinh" id="gioitinh" class="form-control">
                                                <option value="">-- Chọn --</option>
                                                <option value="Nam">Nam</option>
                                                <option value="Nữ">Nữ</option>
                                            </select>
                                          </fieldset>
                                        
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="ngaysinh">Ngày sinh</label>
                                            <input type="date" class="form-control" name="ngaysinh" id="ngaysinh" placeholder="Nhập ngày sinh">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="chucdanh">Chức danh</label> 
                                            <input type="text" class="form-control" name="chucdanh" id="ngaysinh" placeholder="Nhập chức danh">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="sodienthoai">Số điện thoại</label>
                                            <input type="text" class="form-control" name="sodienthoai" id="sodienthoai" placeholder="Nhập số điện thoại">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control" name="email" id="email" placeholder="Nhập Email">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                      <div class="form-group">
                                          <label for="anhdaidien" class="form-label">Ảnh đại diện</label>
                                          <input class="form-control"  name="anhdaidien" type="file" id="formFile">
                                      </div>
                                    </div>
                                    
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
  </div>
@endsection
