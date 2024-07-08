@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th>Tên Khách Hàng</th>
            <th>Số Điện Thoại</th>
            <th>Ngày Đặt hàng</th>
            <th>Cập nhật</th>
            <th>Trạng thái</th>
            <th style="width: 130px">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        @foreach($customers as $key => $customer)
            <tr>
                <td>{{ $customer->id }}</td>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->phone }}</td>
                <td>{{ $customer->created_at }}</td>
                <td>{{$customer->updated_at}}</td>
                <td style="color: #0aa0b7">{{  $customer->status }}</td>
                <td>
                    <a class="btn bg-warning btn-sm" href="/admin/customers/view/{{ $customer->id }}">
                        <i class="fas fa-eye"></i>
                    </a>

                    <a class="btn btn-primary btn-sm" href="/admin/customers/edit/{{ $customer->id }}">
                        <i class="fas fa-edit"></i>
                    </a>

                    <a href="#" class="btn btn-danger btn-sm"
                       onclick="removeRow({{ $customer->id }},'/admin/customers/destroy')">
                       <!-- {{ $customer->id }},  -->
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="card-footer clearfix">
        {!! $customers->links() !!}
    </div>
@endsection


