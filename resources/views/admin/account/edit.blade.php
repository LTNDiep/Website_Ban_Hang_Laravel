@extends('admin.main')

@section('content')

    <form action="" method="POST">
        @csrf
        <div class="card-body">

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Tên tài khoản</label>
                        <input id="name" type="text" name="name" class="form-control"  placeholder="Nhập username" value="{{ old('name', $user->name) }}" required autofocus>
                        @error('name')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Email</label>
                        <input id="email" type="email" name="email" class="form-control"  placeholder="Nhập email" value="{{ old('email', $user->email) }}" required>
                        @error('email')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Địa chỉ</label>
                        <input id="address" type="text" name="address" class="form-control" placeholder="Nhập địa chỉ" value="{{ old('address', $user->address) }}">
                        @error('address')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Số điện thoại</label>
                        <input id="phone" type="text" name="phone" class="form-control" placeholder="Nhập số điện thoại" value="{{ old('phone', $user->phone) }}">
                        @error('phone')
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

            <div class="form-group">
                <label for="menu">Ảnh đại diện</label>
                <input type="file"  class="form-control" id="upload">
                <div id="image_show" >
                    <a href="{{ $user->thumb }}" target="_blank">
                        <img src="{{ $user->thumb }}" width="100px">
                    </a>
                </div>
                <input type="hidden"  name="thumb" value="{{ $user->thumb }}" id="thumb">
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập nhật</button>
            <a href="/admin/accounts/list"  class="btn btn-secondary" >Huỷ</a>
        </div>

    </form>
@endsection


