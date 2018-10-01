@extends('admin.layout')
@section('content')
<!-- Breadcrumb-->
<div class="breadcrumb-holder">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Danh sách dự án</li>
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
                        <h1>Danh sách dự án</h1>
                        <a class="btn btn-success btn-xs" href="{{ route('admin.projects.add') }}">Thêm mới</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tên dự án</th>
                                        <th>Trạng thái</th>
                                        <th>Ngày tạo</th>
                                        <th>Ngày cập nhật</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($projects->count() == 0)
                                        <tr><td colspan="8" align="center">Data not found</td></tr>
                                    @else
                                    <?php $i = 1; ?>
                                    @foreach($projects as $project)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{ $project->name }}</td>
                                        <td>{{ $project->status }}</td>
                                        <td>{{ $project->created_at }}</td>
                                        <td>{{ $project->updated_at }}</td>
                                        <td>
                                            <a href="{{ route('admin.projects.edit', ['id' => $project->id]) }}" class="btn btn-warning btn-xs">
                                                Cập nhật
                                            </a>
                                            <a href="javascript:void(0);" onclick="return fncDeleteConfirm(this);"
                                               data-message="Are you sure delete this project?"
                                               data-url="{{ route('admin.projects.delete', ['id' => $project->id]) }}"
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
