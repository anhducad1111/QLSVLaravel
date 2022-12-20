@extends('layout.master')
@section('title','Sửa sinh viên')
@section('content')

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Sửa sinh viên {{ $sinhvien->id }}</h3>
                    <p class="text-subtitle text-muted">Multiple form layouts, you can use</p>
      
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Sửa sinh viên</li>
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
                            <h4 class="card-title">Sửa thông tin</h4>
                            
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
                             
                                <form class="form" method="post" action="{{ route('sinhvien.store') }}" enctype="multipart/form-data">
                                  @csrf
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                          <fieldset class="form-group">
                                            <label for="lop" style="font-weight: bold">Lớp</label>
                                            <select class="form-select" name="lop" id="basicSelect">
                                               
                                                @foreach ($lops as $lop)
                                                    <option {{ $sinhvien->lop_id == $lop->id ? 'selected' : '' }} value="{{ $lop->id }}">
                                                        {{ $lop->tenlop }}
                                                    </option>
                                                @endforeach
                                            </select>
                                          </fieldset>
                                            
                                        </div>
                                        <div class="col-md-6 col-12">
                                          <div class="form-group">
                                            <label for="hovaten">Họ và tên</label>
                                            <input type="text"  id="first-name-column" value="{{ $sinhvien->hovaten }}" class="form-control"
                                                placeholder="Họ và tên" name="hovaten">
                                          </div>
                                        </div>
                                      <div class="col-md-6 col-12">
                                              <fieldset class="form-group">
                                                  <label for="gioitinh">Giới tính</label>
                                                  <select class="form-select" name="gioitinh" id="basicSelect">
                                                    <option {{ $sinhvien->gioitinh == 'Nam' ? 'selected' : '' }} value="Nam">Nam</option>
                                                    <option {{ $sinhvien->gioitinh == 'Nữ' ? 'selected' : '' }} value="Nữ">Nữ</option>
                                                  </select>
                                              </fieldset>
                                            
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="ngaysinh">Ngày sinh</label>
                                                <input type="date" id="city-column" name="ngaysinh" class="form-control" placeholder="Ngày sinh"
                                                   value="{{ $sinhvien->ngaysinh }}" >
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="diachi">Địa chỉ</label>
                                                <input type="text" id="country-floating" name="diachi" class="form-control"
                                                     placeholder="Địa chỉ" value="{{ $sinhvien->quequan }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                          <div class="form-group">
                                              <label for="anhdaidien" class="form-label">Ảnh đại diện</label>
                                              <br>
                                              <img style="width: 100px; height:100px; margin-bottom:10px; border-radius:50%"
                                                    src="{{ URL::to('public/upload/' . $sinhvien->anhdaidien) }}" alt="">
                                                <input type="file" name="anhdaidien" id="formFile" class="form-control">
                                                <input type="hidden" name="image_old" value="{{ $sinhvien->anhdaidien }}">
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
