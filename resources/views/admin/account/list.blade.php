@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Ngày tạo</th>
                <th>Ngày cập nhật</th>
                <th style="width: 100px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $key => $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>{{ $user->updated_at }}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/admin/accounts/edit/{{ $user->id }}">
                            <i class="fas fa-edit"></i>
                        </a>

                        <a href="#" class="btn btn-danger btn-sm"
                            onclick="removeRow({{ $user->id }},'/admin/accounts/destroy/')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Phan trang user -->
    <div class="card-footer clearfix">
        {!! $users->links() !!}
    </div>
@endsection


