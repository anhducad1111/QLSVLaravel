@extends('layout.master')
@section('title','Danh sách điểm')
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
                            <li class="breadcrumb-item active" aria-current="page">Danh sách điểm</li>
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
                            <h4 class="card-title">Điểm</h4>
                            
                            
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
                                                <th>Tên sinh viên</th>
                                                <th>Môn học</th>
                                                <th>Điểm chuyên cần</th>
                                                <th>Điểm bài tập</th>
                                                <th>Điểm giữa kì</th>
                                                <th>Điểm cuối kỳ</th>
                                                <th>Điểm tổng</th>
                                                <th>Điểm chữ</th>
                                                <th>Học kỳ</th>
                                                <th>Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
        
                                            @foreach ($diems as $diem)
                                                <tr class="text-center">
                                                     <td>{{ $diem->sinhvien->hovaten }}</td> 
                                                     <td>{{ $diem->monhoc->tenmon ?? 'Không liên kết được' }}</td> 
                                                    <td>{{ $diem->diemcc }}</td>
                                                    <td>{{ $diem->diemtx }}</td>
                                                    <td>{{ $diem->diemgk }}</td>
                                                    <td>{{ $diem->diemck }}</td>
                                                    <td>{{ $diem->diemtong }}</td>
        
                                                    <td style="text-transform: uppercase">{{ $diem->diemchu }}</td>
                                                    <td>{{ $diem->hocky }}</td>
                                                    <td class="text-center">
                                                        <a href="{{ route('diem.edit', $diem->id) }}"
                                                            class="btn btn-hover-shine btn-outline-primary border-0 btn-sm"><i
                                                                class="fa-solid fa-pen-to-square"></i></a>
        
                                                        <form class="d-inline" action="{{ route('diem.destroy', $diem->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
        
                                                            <button type="submit" value="Xóa"
                                                                class="btn btn-hover-shine btn-outline-danger border-0 btn-sm">
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
                                {{ $diems->links('pagination') }}
                            </div>
                            
                        </div>
                    </div>
                </div>
               
            </div>
        </section>
        
        <!-- Basic Tables end -->
    
    
        
    </div>
@endsection
