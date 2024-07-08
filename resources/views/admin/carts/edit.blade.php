@extends('admin.main')


@section('content')
    <form action="" method="POST">
        <div class="card-body">
            <div class="col-md-6">
                <div class="form-group">
                    <select class="form-control" name="status" >
                            <option value="Đang chờ xử lý" {{$customer->status == 'Đang chờ xử lý' ? 'selected' : '' }}>
                                Đang chờ xử lý
                            </option>

                            <option value="Đơn hàng đã huỷ" {{$customer->status == 'Đơn hàng đã huỷ' ? 'selected' : ''}}>
                                Huỷ đơn
                            </option>

                            <option value="Nhà bán hàng đang chuẩn bị hàng" {{$customer->status == 'Nhà bán hàng đang chuẩn bị hàng' ? 'selected' : ''}}>
                                Nhà bán hàng đang chuẩn bị hàng
                            </option>

                            <option value="Đang vận chuyển" {{$customer->status == 'Đang vận chuyển' ? 'selected' : ''}}>
                                Đang vận chuyển
                            </option>

                            <option value="Đang giao hàng" {{$customer->status == 'Đang giao hàng' ? 'selected' : ''}}>
                                Đang giao hàng
                            </option>

                            <option value="Giao hàng không thành công" {{$customer->status == 'Giao hàng không thành công' ? 'selected' : ''}}>
                                Giao hàng không thành công
                            </option>

                            <option value="Đã giao hàng thành công" {{$customer->status == 'Đã giao hàng thành công' ? 'selected' : ''}}>
                                Đã giao hàng thành công
                            </option>
                    </select>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Cập Nhật</button>
                <a href="/admin/customers"  class="btn btn-secondary"> Huỷ</a>
            </div>
        </div>

        @csrf
    </form>
@endsection
