@extends('layout.master')
@section('title','Thêm tải khoản sinh viên')
@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Thêm tài khoản sinh viên</h3>
                <p class="text-subtitle text-muted">Multiple form layouts, you can use</p>
  
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Thêm tài khoản sinh viên</li>
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
                          @if (Session::has('warning'))
                            <div class="alert alert-warning alert-dismissible show fade m-4">
                                {{ Session::get('warning') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif
                            @include('notification')
                        <div class="card-body">
                          
                            <form method="post" action="{{ route('accountStudent.store') }}" enctype="multipart/form-data">
                                @csrf
                                
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                      <fieldset class="form-group">
                                        <label for="name">Tên</label>
                                        <select name="name" id="name" class="form-control">
                                            <option value="">-- Chọn --</option>
                                            @foreach($sinhviens as $sinhvien)
                                                <option value="{{ $sinhvien->hovaten }} ">{{ $sinhvien->hovaten }}</option>  
                                                
                                            @endforeach
                                            
                
                                        </select>
                                      </fieldset>
                                        
                                    </div>
                                    <div class="col-md-6 col-12">
                                      <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" id="email" placeholder="Nhập email" name="email"
                                            >
                                      </div>
                                    </div>
                                  
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="password">Mật khẩu</label>
                                            <input type="password" class="form-control" id="password" placeholder="Nhập mật khẩu" name="password"
                                                >
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <fieldset class="form-group">
                                            <label for="quyen" style="font-weight: bold">Quyền</label>
                                            
                                            <select name="quyen" id="quyen" class="form-control">
                                                
                                                <option selected value="student">Student</option>
                                                

                                            </select>
                                        </fieldset>
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
  


    
</div>
<style>
    .card:hover{
        transform: translateY(-5px);
        transition: linear 0.4s;
        box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
    }
</style>
@endsection
