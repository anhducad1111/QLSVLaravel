@extends('layout.master')
@section('title','Danh sách giảng viên')
@section('content')

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Danh sách</h3>
                    <p class="text-subtitle text-muted">Bootstrap’s cards provide a flexible and extensible content
                        container with multiple variants and options.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Danh sách giảng viên</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <form action="" class="row">
                <input  style="padding: 6px;border-radius:10px 0px 0px 10px" class="col-xl-10 col-md-4 col-sm-10"  type="text" name="search" placeholder="Nhập tên cần tìm ...." value="{{ request('search') }}">
                <button class="col-xl-2 col-md-2 col-sm-2 btn btn-primary" style="border-radius:0px 10px 10px 0px" type="submit">Tìm</button>
            </form>
        </div>
        
        <!-- Basic card section start -->
        <section id="content-types" class="mt-10">
            @if (Session::has('delete'))
                                
                <div class="alert alert-success alert-dismissible show fade">
                    {{ Session::get('delete') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                 @endif 
            <div class="row">
                

                @foreach ($giangviens as $giangvien)
                    <div class="col-xl-3 col-md-6 col-sm-12">
                        <div class="card" >
                            <div class="card-content">
                                <img src="{{ URL::to('public/upload/' . ($giangvien->avatar ?? 'default-avatar.png')) }}" class="card-img-top img-fluid"
                                    alt="Ảnh đại diện giảng viên">
                                <div class="card-body">
                                    <h6 style="font-size: 17px" class="card-title">{{ $giangvien->tengv }}</h6>
                                    
                                </div>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><b>Giới tính:</b> <a class="float-right">{{ $giangvien->gioitinh }}</a></li>
                                <li class="list-group-item"><b>Ngày sinh:</b> <a class="float-right">{{ $giangvien->ngaysinh }}</a></li>
                                <li class="list-group-item"><b>Số điện thoại:</b> <a class="float-right">{{ $giangvien->sodienthoai }}</a></li>
                                <li class="list-group-item"><b>Khoa:</b> <a class="float-right">{{ $giangvien->khoa->tenkhoa }}</a></li>
                                <li class="list-group-item"><b>Chức danh:</b> <a class="float-right">{{ $giangvien->chucdanh }}</a></li>
                            </ul>
                            <form action="{{ route('giangvien.destroy', $giangvien->id) }}"
                                method="post" class="d-inline mt-2">
                                @csrf
                                 @method('DELETE')
                                 
                                <button type="submit" value="Xóa"
                                    class="btn btn-hover-shine btn-outline-danger border-0 btn-sm" style="border-radius: 0px 10px 0px 10px ">
                                    <i class="fa-solid fa-trash"></i>
                                </button>     
                                <a style="float: right; border-radius: 10px 0px 10px 0px" href="{{ route('giangvien.edit', $giangvien->id) }}"
                                    class="btn btn-hover-shine btn-outline-primary border-0 btn-sm"><i
                                        class="fa-solid fa-pen-to-square"></i></a>                         
                            </form>
                        </div>
                        
                    </div>
                @endforeach
                
            </div>
        </section>
        <!-- Basic Card types section end -->
    
    
        
    </div>
    <style>
        .card:hover{
            transform: translateY(-5px);
            transition: linear 0.4s;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
        }
    </style>
@endsection
