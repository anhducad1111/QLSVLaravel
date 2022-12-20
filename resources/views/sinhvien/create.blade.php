@extends('layout.master')
@section('content')
        


<div class="page-heading">
  <div class="page-title">
      <div class="row">
          <div class="col-12 col-md-6 order-md-1 order-last">
              <h3>Thêm sinh viên</h3>
              <p class="text-subtitle text-muted">Multiple form layouts, you can use</p>

          </div>
          <div class="col-12 col-md-6 order-md-2 order-first">
              <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Thêm danh sách</li>
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
                      <div class="card-body">
                        @if (Session::has('success'))
                        
                        <div class="alert alert-success alert-dismissible show fade m-2">
                          {{ Session::get('success') }}
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                      @endif
                      @include('notification')
                          <form class="form" method="post" action="{{ route('sinhvien.store') }}" enctype="multipart/form-data">
                            @csrf
                              <div class="row">
                                  <div class="col-md-6 col-12">
                                    <fieldset class="form-group">
                                      <label for="lop" style="font-weight: bold">Lớp</label>
                                      <select class="form-select" name="lop" id="basicSelect">
                                         
                                          @foreach ($lops as $lop)
                                          <option value="{{ $lop->id }}">
                                              {{ $lop->tenlop }}
                                          </option>
                                      @endforeach
                                      </select>
                                    </fieldset>
                                      
                                  </div>
                                  <div class="col-md-6 col-12">
                                    <div class="form-group">
                                      <label for="hovaten">Họ và tên</label>
                                      <input type="text"  id="first-name-column" class="form-control"
                                          placeholder="First Name" name="hovaten">
                                    </div>
                                  </div>
                                <div class="col-md-6 col-12">
                                        <fieldset class="form-group">
                                            <label for="gioitinh">Giới tính</label>
                                            <select class="form-select" name="gioitinh" id="basicSelect">
                                              <option value="Nam">Nam</option>
                                              <option value="Nữ">Nữ</option>
                                            </select>
                                        </fieldset>
                                      
                                  </div>
                                  <div class="col-md-6 col-12">
                                      <div class="form-group">
                                          <label for="ngaysinh">Ngày sinh</label>
                                          <input type="date" id="city-column" name="ngaysinh" class="form-control" placeholder="Ngày sinh"
                                              >
                                      </div>
                                  </div>
                                  <div class="col-md-6 col-12">
                                      <div class="form-group">
                                          <label for="diachi">Địa chỉ</label>
                                          <input type="text" id="country-floating" name="diachi" class="form-control"
                                               placeholder="Địa chỉ">
                                      </div>
                                  </div>
                                  <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" id="country-floating" name="email" class="form-control"
                                             placeholder="Nhập Email">
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