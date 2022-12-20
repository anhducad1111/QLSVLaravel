@extends('layout.master')
@section('title','Danh sách môn học')
@section('content')
    

    <div class="page-heading">
      <div class="page-title">
          <div class="row">
              <div class="col-12 col-md-6 order-md-1 order-last">
                  <h3>Danh sách</h3>
                  <p class="text-subtitle text-muted">Who does not love tables</p>
              </div>
              <div class="col-12 col-md-6 order-md-2 order-first">
                  <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                      <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                          <li class="breadcrumb-item active" aria-current="page">Danh sách môn học</li>
                      </ol>
                  </nav>
              </div>
          </div>
      </div>
  
      <!-- Basic Tables start -->
      <section class="section ">
          <div class="row" id="basic-table">
              <div class="col-12 col-md-12">
                  <div class="card">
                      <div class="card-header">
                          <h4 class="card-title">Môn học</h4>
                          
                          
                      </div>
                      <div class="card-content">
                        @if (Session::has('delete'))
                              
                                  <div class="alert alert-success alert-dismissible show fade m-4">
                                      {{ Session::get('delete') }}
                                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                  </div>
                               @endif
                          <div class="card-body">
                             
                              
                              <!-- Table with outer spacing -->
                              <div class="table-responsive">
                                  <table class="table table-lg table-hover">
                                    <thead>
                                      <tr>
                                        <th>Mã môn học</th>
                                        <th>Tên môn học</th>
                                        <th>Số tín chỉ</th>
                                        <th>Số tiết</th>
                                        <th>Khoa</th>
                                        <th class="text-center">Hành động</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($monhocs as $monhoc)
                                        <tr>
                                          <td>#{{ $monhoc->id }}</td>
                                          <td>{{ $monhoc->tenmon }}</td>
                                          <td>{{ $monhoc->sotinchi }}</td>
                                          <td>{{ $monhoc->sotiet }}</td>
                                          <td>{{ $monhoc->getKhoa->tenkhoa }}</td>
                                          <td class="text-center">
                                            <a href="{{  route('monhoc.edit',$monhoc->id) }}" class="btn btn-hover-shine btn-outline-primary border-0 btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                            
                                            <form class="d-inline" action="{{  route('monhoc.destroy',$monhoc->id) }}" method="post">
                                              @csrf
                                              @method('DELETE')
                                              
                                              <button type="submit" value="Xóa" class="btn btn-hover-shine btn-outline-danger border-0 btn-sm">
                                                <i class="fa-solid fa-trash"></i>
                                              </button>
                                              
                                            </form>
                                          </td>
                                        </tr>
                                      @endforeach
                                      
                                    </tbody>
                                  </table>
                              </div>
                          </div>
                          <div class="card-body">
                            {{ $monhocs->links('pagination') }}
                          </div>
                          
                      </div>
                  </div>
              </div>
             
          </div>
      </section>
      
      <!-- Basic Tables end -->
  
  
      
  </div>
@endsection