@extends('layout.master')
@section('title', 'Danh sách sinh viên')
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
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Danh sách</li>
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
                            <h4 class="card-title">Sinh viên</h4>
                            <form action="">
                                <input style="padding: 5px;border-radius: 10px 0px 0px 10px" type="text" id="search" name="search" placeholder="Nhập tên cần tìm ...."
                                    value="{{ request('search') }}">
                                <button style="border-radius: 0px 10px 10px 0px" class="btn btn-primary" type="submit">Tìm</button>
                            </form>

                        </div>
                        <div class="card-content">
                            @if (Session::has('delete'))
                                <div class="alert alert-success alert-dismissible show fade m-4">
                                    {{ Session::get('delte') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <div class="card-body">

                                <!-- Table with outer spacing -->
                                <div class="table-responsive">
                                    <table class="table table-lg table-hover">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Ảnh</th>

                                                <th>Họ và tên</th>

                                                <th>Giới tính</th>
                                                <th>Ngày sinh</th>
                                                <th>Địa chỉ</th>
                                                {{-- <th>Lớp</th> --}}
                                                <th>Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($sinhviens as $sinhvien)
                                                <tr>
                                                    <td>#{{ $sinhvien->id }}</td>
                                                    <td>
                                                        <img style="height: 50px; width:50px"
                                                            src="{{ URL::to('public/upload/' . $sinhvien->anhdaidien) }}"
                                                            alt="">
                                                    </td>

                                                    <td>{{ $sinhvien->hovaten }}</td>

                                                    <td>{{ $sinhvien->gioitinh }}</td>
                                                    <td>{{ $sinhvien->ngaysinh }}</td>
                                                    <td>{{ $sinhvien->quequan }}</td>
                                                    {{-- <td>{{ $sinhvien->getLop->tenlop }}</td> --}}
                                                    <td class="text-center">
                                                        <a href="{{ route('sinhvien.edit', $sinhvien->id) }}"
                                                            class="btn btn-hover-shine btn-outline-primary border-0 btn-sm"><i
                                                                class="fa-solid fa-pen-to-square"></i></a>
                                                        <a href="{{ route('sinhvien.show', $sinhvien->id) }}"
                                                            class="btn btn-hover-shine btn-outline-dark border-0 btn-sm"><i
                                                                class="fa-solid fa-eye"></i></a>
                                                        <form class="d-inline"
                                                            action="{{ route('sinhvien.destroy', $sinhvien->id) }}"
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
                                        <tbody id="content-search">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-body">
                                {{ $sinhviens->links('pagination') }}

                              
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- Basic Tables end -->



    </div>
  
    
@endsection
