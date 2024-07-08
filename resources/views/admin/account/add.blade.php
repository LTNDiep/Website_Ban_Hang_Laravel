@extends('admin.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')

    <form action="" method="POST">
        @csrf
        <div class="card-body">

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Tên tài khoản</label>
                        <input id="name" type="text" name="name" class="form-control"  placeholder="Nhập username" value="{{ old('name') }}" required autofocus>
                        @error('name')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Email</label>
                        <input id="email" type="email" name="email" class="form-control"  placeholder="Nhập email" value="{{ old('email') }}" required>
                        @error('email')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Password</label>
                        <input id="password" type="password" name="password" class="form-control"  placeholder="Nhập password" required autocomplete="new-password">
                        @error('password')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Nhập lại Password</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" class="form-control"  placeholder="Nhập lại password" required>
                    </div>

                </div>
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Tạo tài khoản</button>
        </div>

    </form>
@endsection


