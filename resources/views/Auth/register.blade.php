
<!DOCTYPE html>
<html lang="en">
<head>
    @include('head')
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>Đăng ký</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Nhập thông tin để đăng ký</p>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="input-group mb-3">
                        <input id="name" class="form-control" type="text" name="name" placeholder="Name" value="{{ old('name') }}" required autofocus>
                        @error('name')
                            <p>{{ $message }}</p>
                        @enderror
                        <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input id="email" class="form-control" type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                        <div>
                            @error('email')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input id="password" class="form-control" type="password" name="password" placeholder="Nhập mật khẩu" required autocomplete="new-password">
                        <div>
                            @error('password')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">

                        <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" placeholder="Nhập lại mật khẩu" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                {{-- <label for="agreeTerms">Tôi đồng ý với <a href="#">điều khoản</a></label> --}}
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Đăng ký</button>
                        </div>

                        <!-- /.col -->
                    </div>
                    @csrf <!-- token sinh ra khi co form moi -->
                </form>
            </div>
        </div>
    </div>
    <!-- /.login-box -->

    @include('admin.footer')
</body>
</html>

