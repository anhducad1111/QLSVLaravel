@extends('layout.master')
@section('title','Xem sinh viên')
@section('content')
        


<div class="page-heading">
  <div class="page-title">
      <div class="row">
          <div class="col-12 col-md-6 order-md-1 order-last">
              <h3>{{ $sinhvien->hovaten }}</h3>
              <p class="text-subtitle text-muted">Multiple form layouts, you can use</p>

          </div>
          <div class="col-12 col-md-6 order-md-2 order-first">
              <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Chi tiết sinh viên</li>
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
                      <h4 class="card-title">Thông tin</h4>
                      
                  </div>
                  <div class="card-content">
                      <div class="card-body">

                              <div class="row">
                                  <div class="col-md-4 col-12" style="justify-content: center; display: flex;align-items: center;" >
                                    
                                     
                                      <img  class="mb-10" style="width: 300px; height:300px;  border-radius:50%"
                                                    src="{{ URL::to('public/upload/' . $sinhvien->anhdaidien) }}" alt="">
                                  </div>
                                  <div class="col-md-8 col-12">
                                    <div class="form-group">
                                      <label for="masv" style="font-weight: bold">Mã sinh viên</label>
                                      <p>{{ $sinhvien->id }}</p>
                                    </div>
                                    <div class="form-group">
                                      <label for="lop" style="font-weight: bold">Lớp</label>
                                      <p>{{ $lop->tenlop }}</p>
                                    </div>
                                    <div class="form-group">
                                      <label for="hosv" style="font-weight: bold">Họ và tên</label>
                                      <p>{{ $sinhvien->hovaten }}</p>
                                    </div>
                                   
                                    
                                    
                                    <div class="form-group">
                                      <label for="gioitinh" style="font-weight: bold">Giới tính</label>
                            
                                      <p>{{ $sinhvien->gioitinh }}</p>
                                      
                                    </div>
                                    <div class="form-group">
                                      <label for="ngaysinh" style="font-weight: bold">Ngày sinh</label>
                                      <p>{{ $sinhvien->ngaysinh }}</p>
                                    </div>
                                    
                                    <div class="form-group">
                                      <label for="diachi" style="font-weight: bold">Địa chỉ</label>
                                      <p>{{  $sinhvien->quequan }}</p>
                                    </div>
                                      
                                  </div>
                              </div>
                          
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  
</div>
       


@endsection