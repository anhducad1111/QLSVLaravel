@extends('layout.master')
@section('title','Sửa giảng viên')
@section('content')
        
       
<div class="page-heading">
  <div class="page-title">
      <div class="row">
          <div class="col-12 col-md-6 order-md-1 order-last">
              <h3>Sửa giảng viên {{ $giangvien->id }}</h3>
              <p class="text-subtitle text-muted">Multiple form layouts, you can use</p>

          </div>
          <div class="col-12 col-md-6 order-md-2 order-first">
              <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Sửa giảng viên</li>
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
                        
                          <form method="post" action="{{ route('giangvien.update',$giangvien->id) }}" enctype="multipart/form-data">
                              @csrf
                              @method('PUT')
                              <div class="row">
                                  <div class="col-md-6 col-12">
                                    <fieldset class="form-group">
                                      
                                      <label for="khoa" style="font-weight: bold">Khoa</label>
                                      <select name="khoa" id="khoa" class="form-control">
                                        
                                          @foreach ($khoas as $khoa)
                                              <option {{$giangvien->khoa_id == $khoa->id ? 'selected' : ''}} value="{{ $khoa->id }}">
                                                  {{ $khoa->tenkhoa }}
                                              </option>
                                          @endforeach
                                      </select>
                                    </fieldset>
                                      
                                  </div>
                                  <div class="col-md-6 col-12">
                                    <div class="form-group">
                                      <label for="tengv">Họ và tên</label>
                                      <input type="text" class="form-control" name="tengv" id="tengv" placeholder="Nhập tên" value="{{ $giangvien->tengv }}">
                                    </div>
                                  </div>
                                <div class="col-md-6 col-12">
                                        <fieldset class="form-group">
                                          <label for="gioitinh">Giới tính</label>
                                          <select name="gioitinh" id="gioitinh" class="form-control">
                                              <option {{ $giangvien->gioitinh == 'Nam' ? 'selected' : ''  }} value="Nam">Nam</option>
                                              <option {{ $giangvien->gioitinh == 'Nữ' ? 'selected' : ''  }} value="Nữ">Nữ</option>
                                            </select>
                                        </fieldset>
                                      
                                  </div>
                                  <div class="col-md-6 col-12">
                                      <div class="form-group">
                                          <label for="ngaysinh">Ngày sinh</label>
                                          <input type="date" class="form-control" name="ngaysinh" id="ngaysinh" placeholder="Nhập ngày sinh" value="{{ $giangvien->ngaysinh }}">
                                      </div>
                                  </div>
                                  <div class="col-md-6 col-12">
                                      <div class="form-group">
                                        <label for="sodienthoai">Số điện thoại</label>
                                        <input type="text" class="form-control" name="sodienthoai" id="sodienthoai" placeholder="Nhập số điện thoại" value="{{ $giangvien->sodienthoai }}">
                                      </div>
                                  </div>
                                  <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="anhdaidien" class="form-label">Ảnh đại diện</label>
                                        <br>
                                        <img style="width: 100px; height:100px; margin-bottom:10px; border-radius:50%"
                                              src="{{ URL::to('public/upload/' . $giangvien->avatar) }}" alt="">
                                          <input type="file" name="anhdaidien" id="formFile" class="form-control">
                                          <input type="hidden" name="image_old" value="{{ $giangvien->avatar }}">
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