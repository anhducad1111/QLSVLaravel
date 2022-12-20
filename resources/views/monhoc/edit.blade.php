@extends('layout.master')
@section('title','Sửa môn học')
@section('content')
        



<div class="page-heading">
  <div class="page-title">
      <div class="row">
          <div class="col-12 col-md-6 order-md-1 order-last">
              <h3>Sửa môn học</h3>
              <p class="text-subtitle text-muted">Multiple form layouts, you can use</p>

          </div>
          <div class="col-12 col-md-6 order-md-2 order-first">
              <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Sửa môn học</li>
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
                      <form method="post" action="{{ route('monhoc.update',$monhoc->id) }}" class="form form-horizontal">
                        @csrf
                        @method('PUT')
                          <div class="form-body">
                              <div class="row">
                                    <div class="col-md-4">
                                      <label for="tenmon">Tên môn</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                      
                                      <input type="text" class="form-control" id="tenmon" placeholder="Nhập tên môn" name="tenmon" value="{{ $monhoc->tenmon }}">
                                  </div>
                                  <div class="col-md-4">
                                    <label for="sotinchi">Số tín chỉ</label>
                                  </div>
                                  <div class="col-md-8 form-group">
                                   
                                    <input type="text" class="form-control" id="sotinchi" placeholder="Nhập số tín chỉ" name="sotinchi" value="{{ $monhoc->sotinchi }}">
                                  </div>
                                  <div class="col-md-4">
                                    <label for="sotiet">Số tiết</label>
                                  </div>
                                  <div class="col-md-8 form-group">
                                   
                                    
                                    <input type="text" class="form-control" id="sotiet" placeholder="Nhập số tiết" name="sotiet" value="{{ $monhoc->sotiet }}">
                                  </div>
                                  <div class="col-md-4">
                                    <label for="khoa">Khoa</label>
                                  </div>
                                  <div class="col-md-8 form-group">
                                   
                                    
                                    <select name="khoa" id="khoa" class="form-control">
                                      @foreach ($khoas as $khoa)
                                            <option {{$khoa->id == $monhoc->khoa_id ? 'selected' : ''}} value="{{ $khoa->id }}">
                                                {{ $khoa->tenkhoa }}
                                            </option>
                                        @endforeach
                                    </select>
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