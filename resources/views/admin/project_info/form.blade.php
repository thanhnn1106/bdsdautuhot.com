@extends('admin.layout')
@section('content')
<!-- Breadcrumb-->
<div class="breadcrumb-holder">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.projects') }}">Danh sách thông tin dự án</a></li>
            <li class="breadcrumb-item active">{{ $title }}</li>
        </ul>
    </div>
</div>
<?php
$status = config('site.user_status.value');
$menuStatus = config('site.menu_status.value');
$homePageStatus = config('site.homepage_status.value');
?>
<section>
    <div class="container-fluid">
        @include('notifications')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h4>{{ $title }}</h4>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal" action="{{ $actionForm }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">Dự án <span class="text-danger">(*)</span></label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="project_id">
                                        <option value=""></option>
                                        @foreach ($projectsFilter as $item)
                                        <option @if ($project_id != '' && (int)$item->id === (int)$project_id) selected="selected" @endif value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">Tiêu đề <span class="text-danger">(*)</span></label>
                                <div class="col-sm-10">
                                    <input type="text" id="title" name="title" class="form-control @if ($errors->has('title'))is-invalid @endif"
                                           value="{{ old('title', isset($projectInfo->title) ? $projectInfo->title : '') }}">
                                    @if ($errors->has('title'))
                                    <div class="invalid-feedback">{{ $errors->first('title') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">Nội dung <span class="text-danger">(*)</span></label>
                                <div class="col-sm-10">
                                    <textarea id="froala-editor" name="content" class="form-control border-corner editor-content  @if ($errors->has('content'))is-invalid @endif" rows="3">{{ old('content', isset($projectInfo->content) ? $projectInfo->content : '') }}</textarea>
                                    @if ($errors->has('content'))
                                    <div class="invalid-feedback">{{ $errors->first('content') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">Trạng thái</label>
                                <div class="col-sm-10">
                                    <div class="i-checks">
                                        <input id="status_1" type="radio" value="{{ $status['active'] }}" @if (old('status', isset($projectInfo->status) ? $projectInfo->status : '') == 1) checked="checked" @endif name="status" class="form-control-custom radio-custom">
                                               <label for="status_1">Active</label>
                                    </div>
                                    <div class="i-checks">
                                        <input id="status_0" type="radio" value="{{ $status['inactive'] }}" @if (old('status', isset($projectInfo->status) ? $projectInfo->status : '') == 0) checked="checked" @endif name="status" class="form-control-custom radio-custom">
                                               <label for="status_0">Inactive</label>
                                    </div>
                                </div>
                                @if ($errors->has('status'))
                                <div class="invalid-feedback">{{ $errors->first('status') }}</div>
                                @endif
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">Sắp xếp <span class="text-danger">(*)</span></label>
                                <div class="col-sm-10">
                                    <input type="number" id="ordering" name="ordering" class="form-control @if ($errors->has('ordering'))is-invalid @endif"
                                           value="{{ old('ordering', isset($projectInfo->ordering) ? $projectInfo->ordering : '') }}">
                                    @if ($errors->has('ordering'))
                                    <div class="invalid-feedback">{{ $errors->first('ordering') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="line"></div>
                            <div class="form-group row">
                                <div class="col-sm-4 offset-sm-2">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('footer_script')
<!-- Include CSS for icons. -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

<!-- Include Editor style. -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.5.1/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.5.1/css/froala_style.min.css" rel="stylesheet" type="text/css" />

<!-- Include Editor JS files. -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.5.1//js/froala_editor.pkgd.min.js"></script>

<!-- Initialize the editor. -->
<script>
  $(function() {
    $('textarea').froalaEditor({
        height: 500
    })
  });
</script>
@endsection
