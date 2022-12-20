@extends('layout.master')
@section('title','Danh sách tài khoản')
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
                            <li class="breadcrumb-item active" aria-current="page">Danh sách tài khoản</li>
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
                            <h4 class="card-title">Tài khoản</h4>
                            <form action="">
                                <input  type="text" name="search" placeholder="Nhập tên cần tìm ...." value="{{ request('search') }}">
                                <button class="btn btn-primary" type="submit">Tìm</button>
                            </form>
                            
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
                                                <th>ID</th>
        
        
                                                <th>Tên</th>
                                                <th>Email</th>
        
                                                <th>Quyền</th>
                                                <th class="text-center">Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td>#{{ $user->id }}</td>
        
        
                                                    <td>{{ $user->name }}</td>
        
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $user->typeuser }}</td>
                                                    <td class="text-center">
                                                        <a href="{{ route('user.edit', $user->id) }}"
                                                            class="btn btn-hover-shine btn-outline-primary border-0 btn-sm"><i
                                                                class="fa-solid fa-pen-to-square"></i></a>
                                                        <form class="d-inline" action="{{ route('user.destroy', $user->id) }}"
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
                                {{ $users->links('pagination') }}
                            </div>
                            
                        </div>
                    </div>
                </div>
               
            </div>
        </section>
        
        <!-- Basic Tables end -->
    
    
        
    </div>
@endsection
