<!DOCTYPE html>
<html lang="en">
<head>
    @include('head')
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>Đăng Nhập</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Điền thông tin đăng nhập</p>
                @include('admin.alert')
                <form action="/Auth/login/store" method="post">
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Mật khẩu">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" name="remember" id="remember">
                                <label for="remember">
                                    Ghi nhớ tôi
                                </label>
                            </div>

                            <label for="" style="margin-top: 15px">Chưa có tài khoản?
                                <a href="{{ route('register') }} ">Đăng ký</a>
                            </label>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-block btn-info btn-sm">Đăng nhập</button>
                        </div>

                        <!-- /.col -->
                    </div>
                    @csrf
                </form>
            </div>
        </div>
    </div>
    <!-- /.login-box -->

    @include('admin.footer')
</body>
</html>
