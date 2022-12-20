

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="{{ asset('public/assets/css/main/app.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/pages/auth.css') }}">
    <link rel="shortcut icon" href="{{ asset('public/assets/images/logo/favicon.svg') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('public/assets/images/logo/favicon.png') }}" type="image/png">
</head>

<body>
    <div id="auth">
        
<div class="row h-100">
    <div class="col-lg-5 col-12">
        <div id="auth-left">
            <div class="auth-logo">
                <a href="index.html"><img src="{{ asset('public/assets/images/logo/logo.svg') }}" alt="Logo"></a>
            </div>
            <h1 class="auth-title">Đăng nhập</h1>
            
            @if (Session::has('login'))
                    
                    <div class="alert alert-success"><i class="bi bi-check-circle"></i> {{ Session::get('login') }}</div>
                @endif
                @if (Session::has('warning'))
                    
                    <div class="alert alert-warning"><i class="bi bi-exclamation-triangle"></i>  {{ Session::get('warning') }}</div>
                @endif

             

            <form method="post" action="{{ route('login') }}">
                @csrf
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="email" name="email" class="form-control form-control-xl" placeholder="Email">
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="password" name="password" class="form-control form-control-xl" placeholder="Password">
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                </div>
                <div class="form-check form-check-lg d-flex align-items-end">
                    <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault" name="remember"
                        {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label text-gray-600" for="flexCheckDefault">
                        Giữ đăng nhập
                    </label>
                </div>
                <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Đăng nhập</button>
            </form>
            <div class="text-center mt-5 text-lg fs-4">
                {{-- <p class="text-gray-600">Không có tài khoản? <a href="{{ route('register') }}" class="font-bold">Đăng ký</a>.</p> --}}
                <p><a class="font-bold" href="{{ route('forgot.show') }}">Quên mật khẩu?</a>.</p>
            </div>
        </div>
    </div>
    <div class="col-lg-7 d-none d-lg-block">
        <div id="auth-right">

        </div>
    </div>
</div>

    </div>
</body>

</html>


