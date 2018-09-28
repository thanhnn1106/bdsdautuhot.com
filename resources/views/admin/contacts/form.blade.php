@extends('admin.layout')
@section('content')
<!-- Breadcrumb-->
<div class="breadcrumb-holder">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.contacts') }}">Danh sách tin nhắn</a></li>
            <li class="breadcrumb-item active">{{ $title }}</li>
        </ul>
    </div>
</div>
<?php
    $contactStatus = config('site.contact_status.label');
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
                                <label class="col-sm-2 form-control-label">Tên người gửi</label>
                                <label class="col-sm-5 form-control-label">{{ $contact->name }}</label>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">Số điện thoại</label>
                                <label class="col-sm-2 form-control-label">{{ $contact->phone }}</label>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">Địa chỉ email</label>
                                <label class="col-sm-2 form-control-label">{{ $contact->email }}</label>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">Nội dung</label>
                                <div class="col-sm-10">
                                    <textarea disabled="disabled" name="message" class="form-control border-corner @if ($errors->has('message'))is-invalid @endif" rows="3">{{ old('message', isset($contact->message) ? $contact->message : '') }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">Ghi chú</label>
                                <div class="col-sm-10">
                                    <textarea name="note" class="form-control border-corner @if ($errors->has('note'))is-invalid @endif" rows="3">{{ old('note', isset($contact->note) ? $contact->message : '') }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">Trạng thái</label>
                                <div class="col-sm-10">
                                    <select name="status" class="form-control @if ($errors->has('status'))is-invalid @endif">
                                        @foreach ($contactStatus as $key => $value)
                                        <option @if ((int)$contact->status === (int)$key) selected="selected" @endif value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('status'))
                                    <div class="invalid-feedback">{{ $errors->first('status') }}</div>
                                    @endif
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

