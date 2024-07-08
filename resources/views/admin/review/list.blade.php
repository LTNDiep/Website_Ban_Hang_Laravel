@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th style="width: 110px">Khách hàng</th>
                <th>Sản phẩm</th>
                <th>Ảnh</th>
                <th>Số sao</th>
                <th>Nội dung</th>
                <th style="width: 100px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reviews as $key => $review)
                <tr>
                    <td>{{ $review->id }}</td>
                    <td>{{ $review->user->name }}</td>
                    <td>{{ $review->product->name }}</td>
                    <td>
                        <a target="_blank">
                            <img src="{{ $review->product->thumb }}" height="50px">
                        </a>
                    </td>

                    <td>{{ $review->rating }}</td>
                    <td>{{ $review->comment }}</td>
                    <td>
                        <a href="#" class="btn btn-danger btn-sm"
                            onclick="removeRow({{ $review->id }},'/admin/reviews/destroy/')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Phan trang -->
    <div class="card-footer clearfix">
        {!! $reviews->links() !!}
    </div>
@endsection


