
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quên mật khẩu</title>
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
            <h1 class="auth-title">Quên mật khẩu</h1>
            
            @if (Session::has('warning'))
                   
                    <div class="alert alert-warning"><i class="bi bi-exclamation-triangle"></i>  {{ Session::get('warning') }}</div>
                @endif
                @include('notification')

            <form action="{{ route('forgotpassword') }}" method="post">
                @csrf
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="email" name="email" class="form-control form-control-xl" placeholder="Email">
                    <div class="form-control-icon">
                        <i class="bi bi-envelope"></i>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Gửi</button>
            </form>
            <div class="text-center mt-5 text-lg fs-4">
                <p class='text-gray-600'>Nhớ tài khoản? <a href="{{ route('login') }}" class="font-bold">Đăng nhập</a>.
                </p>
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

