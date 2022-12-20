<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>

    
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
   
    {{-- <link rel="stylesheet" href="{{ asset('public/plugins/fontawesome-free/css/all.min.css') }}"> --}}
   
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
   
    <link rel="stylesheet"
        href="{{ asset('public/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('public/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('public/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('public/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('public/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('public/plugins/summernote/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/font/fontawesome-free-6.2.0-web/css/all.min.css') }}">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('public/dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo"
                height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                @if (Auth::check() && Auth::user()->typeuser == 'student')
                    <li class="nav-item">
                        <form action="" class="form-control" >
                            <select name="hocky" id="hocky" style="width:150px;box-shadow: 0px 0px 10px rgba(0,0,0,0.1);">
                                <option  value="1">Học kỳ 1</option>
                                <option  value="2">Học kỳ 2</option>
                                <option  value="3">Học kỳ 3</option>
                                <option  value="4">Học kỳ 4</option>
                                <option  value="5">Học kỳ 5</option>
                                <option  value="6">Học kỳ 6</option>
                                <option value="7">Học kỳ 7</option>
                                <option  value="8">Học kỳ 8</option>
                                <option  value="9">Học kỳ 9</option>
                                <option value="10">Học kỳ 10</option>
                            </select>
                            <button type="submit" style="line-height: 10px;margin-bottom: 5px;" class="btn-outline-primary btn    btn--size-s">OK</button>
                        </form>
                    </li>
                @endif
            </ul>

            <!-- Right navbar links -->

        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ route('home') }}" class="brand-link">
                <img src="{{ asset('public/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Quản lý sinh viên</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex flex-wrap">
                    @if (Auth::check() && Auth::user()->typeuser == 'admin')
                        <div class="image">
                            <strong style="color: aliceblue">Quản trị</strong>
                        </div>
                        <div class="image">

                            <a  class="d-block">{{ Auth::user()->name }}</a>


                        </div>
                    @endif
                    @if (Auth::check() && Auth::user()->typeuser == 'teacher')
                        <div class="image">
                            <strong style="color: aliceblue">Giảng viên</strong>
                        </div>
                        <div class="image">

                            <a  class="d-block">{{ Auth::user()->name }}</a>


                        </div>
                    @endif
                    @if (Auth::check() && Auth::user()->typeuser == 'student')
                        <div class="image">
                            <strong style="color: aliceblue">Sinh viên</strong>
                        </div>
                        <div class="image">

                            <a  class="d-block">{{ Auth::user()->name }}</a>


                        </div>
                    @endif

                </div>

                    

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        @if (Auth::check() && Auth::user()->typeuser == 'teacher')
                            <li class="nav-item">
                                <a href="{{ route('sinhvien.index') }}"
                                    class="nav-link {{ request()->is('admin/sinhvien/create') || request()->is('admin/sinhvien') ? 'active' : '' }} ">
                                    <i class="nav-icon fa-sharp fa-solid fa-graduation-cap"></i>
                                    <p>
                                        Sinh viên
                                        <i class="nav-icon right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('sinhvien.create') }}"
                                            class="nav-link {{ request()->is('admin/sinhvien/create') ? 'active' : '' }} ">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Thêm sinh viên</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('sinhvien.index') }}"
                                            class="nav-link {{ request()->is('admin/sinhvien') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Danh sách</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#"
                                    class="nav-link {{ request()->is('admin/diem/create') || request()->is('admin/diem') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-copy"></i>
                                    <p>
                                        Điểm
                                        <i class="nav-icon right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('diem.create') }}"
                                            class="nav-link {{ request()->is('admin/diem/create') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Thêm điểm</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('diem.index') }}"
                                            class="nav-link {{ request()->is('admin/diem') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Danh sách</p>
                                        </a>
                                    </li>
                                </ul>

                            </li>
                        @endif

                        @if (Auth::check() && Auth::user()->typeuser == 'admin')
                            <li class="nav-item">
                                <a href="{{ route('home') }}"
                                    class="nav-link {{ request()->is('admin/home') ? 'active' : '' }}">
                                    <i class="nav-icon fa-solid fa-table-columns"></i>
                                    <p>
                                        Dashboard

                                    </p>
                                </a>

                            </li>
                            <li class="nav-item">
                                <a href="{{ route('sinhvien.index') }}"
                                    class="nav-link {{ request()->is('admin/sinhvien/create') || request()->is('admin/sinhvien') ? 'active' : '' }} ">
                                    <i class="nav-icon fa-sharp fa-solid fa-graduation-cap"></i>
                                    <p>
                                        Sinh viên
                                        <i class="nav-icon right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('sinhvien.create') }}"
                                            class="nav-link {{ request()->is('admin/sinhvien/create') ? 'active' : '' }} ">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Thêm sinh viên</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('sinhvien.index') }}"
                                            class="nav-link {{ request()->is('admin/sinhvien') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Danh sách</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#"
                                    class="nav-link {{ request()->is('admin/diem/create') || request()->is('admin/diem') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-copy"></i>
                                    <p>
                                        Điểm
                                        <i class="nav-icon right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('diem.create') }}"
                                            class="nav-link {{ request()->is('admin/diem/create') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Thêm điểm</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('diem.index') }}"
                                            class="nav-link {{ request()->is('admin/diem') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Danh sách</p>
                                        </a>
                                    </li>
                                    
                                </ul>

                            </li>

                            <li class="nav-item">
                                <a href=""
                                    class="nav-link {{ request()->is('admin/monhoc/create') || request()->is('admin/monhoc') ? 'active' : '' }}">
                                    <i class="nav-icon fa-sharp fa-solid fa-book"></i>

                                    <p>
                                        Môn học
                                        <i class="nav-icon right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('monhoc.create') }}"
                                            class="nav-link {{ request()->is('admin/monhoc/create') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Thêm môn</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('monhoc.index') }}"
                                            class="nav-link {{ request()->is('admin/monhoc') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Danh sách</p>
                                        </a>
                                    </li>
                                </ul>

                            </li>
                            <li class="nav-item">
                                <a href="{{ route('khoa.index') }}"
                                    class="nav-link {{ request()->is('admin/khoa/create') || request()->is('admin/khoa') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-tree"></i>

                                    <p>
                                        Khoa
                                        <i class="nav-icon right fas fa-angle-left"></i>
                                    </p>
                                </a>

                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('khoa.create') }}"
                                            class="nav-link {{ request()->is('admin/khoa/create') ? 'active' : '' }} ">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Thêm khoa</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('khoa.index') }}"
                                            class="nav-link {{ request()->is('admin/khoa') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Danh sách</p>
                                        </a>
                                    </li>
                                </ul>

                            </li>
                            <li class="nav-item">
                                <a href="{{ route('lop.index') }}"
                                    class="nav-link {{ request()->is('admin/lop/create') || request()->is('admin/lop') ? 'active' : '' }}">
                                    <i class="fa-solid fa-school nav-icon"></i>

                                    <p>
                                        Lớp
                                        <i class="nav-icon right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('lop.create') }}"
                                            class="nav-link {{ request()->is('admin/lop/create') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Thêm lớp</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('lop.index') }}"
                                            class="nav-link {{ request()->is('admin/lop') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Danh sách</p>
                                        </a>
                                    </li>
                                </ul>

                            </li>
                            <li class="nav-item">
                                <a href="{{ route('giangvien.index') }}"
                                    class="nav-link {{ request()->is('admin/giangvien/create') || request()->is('admin/giangvien') ? 'active' : '' }}">

                                    <i class="fa-solid fa-chalkboard-user nav-icon"></i>
                                    <p>
                                        Giảng viên
                                        <i class="nav-icon right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('giangvien.create') }}"
                                            class="nav-link {{ request()->is('admin/giangvien/create') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Thêm giảng viên</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('giangvien.index') }}"
                                            class="nav-link {{ request()->is('admin/giangvien') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Danh sách</p>
                                        </a>
                                    </li>
                                </ul>

                            </li>
                            <li class="nav-item">
                                <a href="{{ route('user.index') }}"
                                    class="nav-link {{ request()->is('admin/user/create') || request()->is('admin/user') || request()->is('admin/accountStudent/create') ? 'active' : '' }}">

                                    <i class="nav-icon fa-solid fa-user"></i>
                                    <p>
                                        User
                                        <i class="nav-icon right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('user.create') }}"
                                            class="nav-link {{ request()->is('admin/user/create') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Thêm user</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('accountStudent.create') }}"
                                            class="nav-link {{ request()->is('admin/accountStudent/create') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Thêm tài khoản sinh viên</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('user.index') }}"
                                            class="nav-link {{ request()->is('admin/user') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Danh sách</p>
                                        </a>
                                    </li>
                                </ul>

                            </li>
                        @endif

                        {{-- @if (Auth::check() && Auth::user()->typeuser == 'student')
                            
                            <li class="nav-item">
                                <a href=""
                                    class="nav-link {{ request()->is('admin/diem/' . $sinhvien->id) ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-copy"></i>
                                    <p>
                                        Điểm
                                        <i class="nav-icon right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('diem.show',$sinhvien->id) }}"
                                            class="nav-link {{ request()->is('admin/diem/' . $sinhvien->id) ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Xem điểm</p>
                                        </a>
                                    </li>
                                    
                                </ul>

                            </li>
                        @endif --}}

                        <li class="nav-item">
                            <a href="{{ route('logout') }}" class="nav-link ">

                                <i class="nav-icon fa-solid fa-right-from-bracket"></i>
                                <p>
                                    Logout

                                </p>
                            </a>

                        </li>


                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            @yield('content')

        </div>
        <!-- ./wrapper -->

        <!-- jQuery -->
        <script src="{{ asset('public/plugins/jquery/jquery.min.js') }}"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="{{ asset('public/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('public/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- ChartJS -->
        <script src="{{ asset('public/plugins/chart.js/Chart.min.js') }}"></script>
        <!-- Sparkline -->
        <script src="{{ asset('public/plugins/sparklines/sparkline.js') }}"></script>
        <!-- JQVMap -->
        <script src="{{ asset('public/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
        <script src="{{ asset('public/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
        <!-- jQuery Knob Chart -->
        <script src="{{ asset('public/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
        <!-- daterangepicker -->
        <script src="{{ asset('public/plugins/moment/moment.min.js') }}"></script>
        <script src="{{ asset('public/plugins/daterangepicker/daterangepicker.js') }}"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="{{ asset('public/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
        <!-- Summernote -->
        <script src="{{ asset('public/plugins/summernote/summernote-bs4.min.js') }}"></script>
        <!-- overlayScrollbars -->
        <script src="{{ asset('public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('public/dist/js/adminlte.js') }}"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{ asset('public/dist/js/demo.js') }}"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="{{ asset('public/dist/js/pages/dashboard.js') }}"></script>
</body>

</html>
