@extends('admin.layout')
@section('content')
<!-- Breadcrumb-->
<div class="breadcrumb-holder">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.news') }}">Danh sách tin tức</a></li>
            <li class="breadcrumb-item active">{{ $title }}</li>
        </ul>
    </div>
</div>
<?php
    $status = config('site.user_status.value');
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
                                <label class="col-sm-2 form-control-label">Tên bài viết <span class="text-danger">(*)</span></label>
                                <div class="col-sm-10">
                                    <input type="text" id="title" name="title" class="form-control @if ($errors->has('title'))is-invalid @endif"
                                           value="{{ old('title', isset($new->title) ? $new->title : '') }}">
                                    @if ($errors->has('title'))
                                    <div class="invalid-feedback">{{ $errors->first('title') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">Dự án</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="project_id">
                                        <option value="0">All</option>
                                        @foreach ($projects as $item)
                                        <option @if (!empty($new->project_id) && $new->project_id != '' && (int)$item->id === (int)$new->project_id) selected="selected" @endif value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">Hình đại diện <span class="text-danger">(*)</span></label>
                                <div class="col-sm-10">
                                    <input type="text" id="thumbnail" name="thumbnail" class="form-control @if ($errors->has('thumbnail'))is-invalid @endif"
                                           value="{{ old('thumbnail', isset($new->thumbnail) ? $new->thumbnail : '') }}">
                                    @if ($errors->has('thumbnail'))
                                    <div class="invalid-feedback">{{ $errors->first('thumbnail') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">Mô tả ngắn <span class="text-danger">(*)</span></label>
                                <div class="col-sm-10">
                                    <input type="text" id="short_des" name="short_des" class="form-control @if ($errors->has('short_des'))is-invalid @endif"
                                           value="{{ old('short_des', isset($new->short_des) ? $new->short_des : '') }}">
                                    @if ($errors->has('short_des'))
                                    <div class="invalid-feedback">{{ $errors->first('short_des') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">Nội dung <span class="text-danger">(*)</span></label>
                                <div class="col-sm-10">
                                    <textarea name="content" class="form-control border-corner editor-content  @if ($errors->has('content'))is-invalid @endif" rows="3">{{ old('content', isset($new->content) ? $new->content : '') }}</textarea>
                                    @if ($errors->has('content'))
                                    <div class="invalid-feedback">{{ $errors->first('content') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">Trạng thái</label>
                                <div class="col-sm-10">
                                    <div class="i-checks">
                                        <input id="status_1" type="radio" value="{{ $status['active'] }}" @if (old('status', isset($new->status) ? $new->status : '') == 1) checked="checked" @endif name="status" class="form-control-custom radio-custom">
                                        <label for="status_1">Active</label>
                                    </div>
                                    <div class="i-checks">
                                        <input id="status_0" type="radio" value="{{ $status['inactive'] }}" @if (old('status', isset($new->status) ? $new->status : '') != 1) checked="checked" @endif name="status" class="form-control-custom radio-custom">
                                        <label for="status_0">Inactive</label>
                                    </div>
                                </div>
                                @if ($errors->has('status'))
                                <div class="invalid-feedback">{{ $errors->first('status') }}</div>
                                @endif
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
<link href="{{ asset('plugins/bootstrap-tagsinput/tagsinput.css') }}" rel="stylesheet"/>
<script src="{{ asset('plugins/bootstrap-tagsinput/tagsinput.js') }}"></script>
<!-- TinyMCE -->
<script type="text/javascript" src="{{ asset('/plugins/tinymce/tinymce.min.js') }}"></script>
<script>
$(function() {
    tinymce.init({
        selector: ".editor-content", 
        theme: "modern", 
        height: 400,
        subfolder:"",
        plugins: [ 
        "advlist autolink link image lists charmap print preview hr anchor pagebreak", 
        "searchreplace wordcount visualblocks visualchars code insertdatetime media nonbreaking", 
        "table contextmenu directionality emoticons paste textcolor filemanager" 
        ], 
        image_advtab: true, 
        toolbar: "sizeselect | fontselect | fontsizeselect | undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect forecolor backcolor | link unlink anchor | image media | print preview code"
    });
});
</script>
@endsection

