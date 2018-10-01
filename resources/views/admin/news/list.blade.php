@extends('admin.layout')
@section('content')
<!-- Breadcrumb-->
<div class="breadcrumb-holder">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Danh sách Tin tức</li>
        </ul>
    </div>
</div>
<section>
    <div class="container-fluid">
        @include('notifications')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h1>Danh sách tin tức</h1>
                        <a class="btn btn-success btn-xs" href="{{ route('admin.news.add') }}">Thêm mới</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tên bài viết</th>
                                        <th>Trạng thái</th>
                                        <th>Dự án liên quan</th>
                                        <th>Ngày cập nhật</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($news->count() == 0)
                                        <tr><td colspan="8" align="center">Data not found</td></tr>
                                    @else
                                    <?php $i = 1; ?>
                                    @foreach($news as $new)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{ $new->title }}</td>
                                        <td>{{ $new->status }}</td>
                                        <td>{{ $new->project_name }}</td>
                                        <td>{{ $new->updated_at }}</td>
                                        <td>
                                            <a href="{{ route('admin.news.edit', ['id' => $new->id]) }}" class="btn btn-warning btn-xs">
                                                Cập nhật
                                            </a>
                                            <a href="javascript:void(0);" onclick="return fncDeleteConfirm(this);"
                                               data-message="Are you sure delete this new?"
                                               data-url="{{ route('admin.news.delete', ['id' => $new->id]) }}"
                                               class="btn btn-danger btn-xs">
                                               Xoá
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('footer_script')
@endsection
