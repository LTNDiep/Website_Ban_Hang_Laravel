@extends('main')

@section('content')
    </form>
        <!-- Content Header (Page header) -->
        <section class="content-header" style="margin-top: 50px">
            <div class="container-fluid">
                <div class="row mb-2">

                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="/Auth/list">Thông tin tài khoản</a></li>
                        <li class="breadcrumb-item active">Thông tin đơn hàng</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>


        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">

                                <div class="text-center">
                                    <img  src="{{ $user->thumb }} " alt="User profile picture"  class="profile-user-img img-fluid img-circle">
                                </div>
                                <h3 class="profile-username text-center">{{ $user->name }}</h3>
                                <p class="text-muted text-center">{{ $user->email }}</p>


                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b style="margin-left: 10px">Đơn hàng</b> <a class="float-right" style="margin-right: 15px">{{$quantity_user_order}}</a>
                                    </li>

                                    <li class="list-group-item">
                                        <b style="margin-left: 10px">Đánh giá sản phẩm</b> <a class="float-right" style="margin-right: 15px"> {{$quantity_user_rw}}</a>
                                    </li>

                                </ul>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card">

                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="customer mt-3">
                                        <ul>
                                            <li>Tên: <strong>{{ $customer->name }}</strong></li>
                                            <li>Số điện thoại: <strong>{{ $customer->phone }}</strong></li>
                                            <li>Địa chỉ: <strong>{{ $customer->address }}</strong></li>
                                            <li>Thanh toán: <strong>{{ $customer->pay }}</strong></li>
                                            <li>Ngày đặt <strong> {{$customer->created_at}}</strong></li>
                                            <li>Ghi chú: <strong>{{ $customer->content }}</strong></li>
                                            <li>Trạng thái đơn: <strong>{{ $customer->status }} </strong></li>

                                        </ul>
                                    </div>

                                    <div class="carts">
                                        @php $total = 0; @endphp
                                        <table class="table">
                                            <tbody>
                                            <tr class="table_head">
                                                <th class="column-1">Ảnh</th>
                                                <th class="column-2">Sản phẩm</th>
                                                <th class="column-3">Giá tiền</th>
                                                <th class="column-4">Số lượng</th>
                                                <th class="column-5">Thành tiền</th>
                                            </tr>

                                            @foreach($carts as $key => $cart)
                                                @php
                                                    $price = $cart->price * $cart->pty;
                                                    $total += $price;
                                                @endphp
                                                <tr>
                                                    <td class="column-1">
                                                        <div class="how-itemcart1">
                                                            <img src="{{ $cart->product->thumb }}" alt="IMG" style="width: 100px">
                                                        </div>
                                                    </td>
                                                    <td class="column-2">{{ $cart->product->name }}</td>
                                                    <td class="column-3">{{ number_format($cart->price, 0, '', '.') }}</td>
                                                    <td class="column-4">{{ $cart->pty }}</td>
                                                    <td class="column-5">{{ number_format($price, 0, '', '.') }}</td>
                                                </tr>
                                            @endforeach
                                                <tr>
                                                    <td colspan="4" class="text-right">Tổng Tiền</td>
                                                    <td>{{ number_format($total, 0, '', '.') }}</td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>


                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </form>
@endsection
