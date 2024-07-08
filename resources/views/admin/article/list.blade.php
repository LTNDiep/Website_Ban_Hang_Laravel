@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th>Tiêu Đề</th>
                <th>Ảnh</th>
                <th>Trang Thái</th>
                <th>Cập Nhật</th>
                <th style="width: 100px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach($articles as $key => $article)
                <tr>
                    <td>{{ $article->id }}</td>
                    <td>{{ $article->name }}</td>
                    <td>
                        <a href="{{ $article->thumb }}" target="_blank">
                            <img src="{{ $article->thumb }}" height="40px">
                        </a>
                    </td>
                    <td>{!! \App\Helpers\Helper::active($article->active) !!}</td>
                    <td>{{ $article->updated_at }}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/admin/articles/edit/{{ $article->id }}">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="#" class="btn btn-danger btn-sm"
                            onclick="removeRow({{ $article->id }},'/admin/articles/destroy/')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="card-footer clearfix">
        <!-- Phan trang bai viet -->
        {!! $articles->links() !!}
    </div>
@endsection


