@extends('layout.master')
@section('title','Thêm điểm')
@section('content')
        
<div class="page-heading">
  <div class="page-title">
      <div class="row">
          <div class="col-12 col-md-6 order-md-1 order-last">
              <h3>Thêm điểm</h3>
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
                  <h4 class="card-title">Điền điểm</h4>
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
                      <form action="{{ route('diem.store') }}" method='post' class="form form-horizontal">
                        @csrf
                          <div class="form-body">
                              <div class="row">
                                    <div class="col-md-4">
                                      <label for="tensinhvien">Tên sinh viên</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                    <fieldset class="form-group">
                                      <select class="form-select" name="tensinhvien" id="basicSelect">
                                        <option value="">-- Chọn --</option>
                                        @foreach ($sinhviens as $sinhvien)
                                            <option value="{{ $sinhvien->id }}">
                                                {{ $sinhvien->hovaten}}
                                                || 
                                                #{{ $sinhvien->id }}
                                            </option>
                                        @endforeach
                                      </select>
                                    </fieldset>
                                  </div>
                                  <div class="col-md-4">
                                      <label for="monhoc">Môn học</label>
                                  </div>
                                  <div class="col-md-8 form-group">
                                    <fieldset class="form-group">
                                      <select class="form-select" name="monhoc" id="basicSelect">
                                        <option value="">-- Chọn --</option>
                                        @foreach ($monhocs as $monhoc)
                                            <option value="{{ $monhoc->id }}">
                                                {{ $monhoc->tenmon }}
                                                
                                            </option>
                                        @endforeach
                                      </select>
                                    </fieldset>
                                  </div>
                                  <div class="col-md-4">
                                      <label for="diemcc">Điểm chuyên cần</label>
                                  </div>
                                  <div class="col-md-8 form-group">
                                   
                                      <input type="text" name="diemcc" class="form-control" id="diemcc" placeholder="Nhập điểm chuyên cần">
                                  </div>
                                  <div class="col-md-4">
                                    <label for="diemtx">Điểm bài tập</label>
                                  </div>
                                  <div class="col-md-8 form-group">
                                    
                                    <input type="text" name="diemtx" class="form-control" id="diemcc" placeholder="Nhập điểm thường xuyên">
                                  </div>
                                  <div class="col-md-4">
                                    <label for="diemgk">Điểm giữa kỳ</label>
                                  </div>
                                  <div class="col-md-8 form-group">
                                    
                                    <input type="text" name="diemgk" class="form-control" id="diemcc" placeholder="Nhập điểm giữa kỳ">
                                  </div>
                                  <div class="col-md-4">
                                    <label for="diemck">Điểm cuối kỳ</label>
                                  </div>
                                  <div class="col-md-8 form-group">
                                    
                                    <input type="text" name="diemck" class="form-control" id="diemcc" placeholder="Nhập điểm cuối kỳ">
                                  </div>
                                  <div class="col-md-4">
                                    <label for="hocky">Học kỳ</label>
                                  </div>
                                  <div class="col-md-8 form-group">
                                    
                                    
                                   <input type="text" name="hocky" class="form-control" id="hocky" placeholder="Nhập học kỳ">
                                  </div>
                                  
                                  <div class="col-sm-12 d-flex justify-content-end">
                                      <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                      <button type="reset"
                                          class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                  </div>
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