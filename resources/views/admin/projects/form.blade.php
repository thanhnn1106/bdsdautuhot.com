@extends('admin.layout')
@section('content')
<!-- Breadcrumb-->
<div class="breadcrumb-holder">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.projects') }}">Danh sách dự án</a></li>
            <li class="breadcrumb-item active">{{ $title }}</li>
        </ul>
    </div>
</div>
<?php
    $status         = config('site.user_status.value');
    $menuStatus     = config('site.menu_status.value');
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
                                <label class="col-sm-2 form-control-label">Tên dự án <span class="text-danger">(*)</span></label>
                                <div class="col-sm-10">
                                    <input type="text" id="name" name="name" class="form-control @if ($errors->has('name'))is-invalid @endif"
                                           value="{{ old('name', isset($project->name) ? $project->name : '') }}">
                                    @if ($errors->has('name'))
                                    <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">Tên ngắn <span class="text-danger">(*)</span></label>
                                <div class="col-sm-10">
                                    <input type="text" id="short_name" name="short_name" class="form-control @if ($errors->has('short_name'))is-invalid @endif"
                                           value="{{ old('short_name', isset($project->short_name) ? $project->name : '') }}">
                                    @if ($errors->has('short_name'))
                                    <div class="invalid-feedback">{{ $errors->first('short_name') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">Mô tả ngắn <span class="text-danger">(*)</span></label>
                                <div class="col-sm-10">
                                    <input type="text" id="short_name" name="short_des" class="form-control @if ($errors->has('short_des'))is-invalid @endif"
                                           value="{{ old('short_des', isset($project->short_des) ? $project->short_des : '') }}">
                                    @if ($errors->has('short_des'))
                                    <div class="invalid-feedback">{{ $errors->first('short_des') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">Hình banner</label>
                                <div class="col-sm-10">
                                    <input type="text" id="cover_photo" name="cover_photo" class="form-control @if ($errors->has('cover_photo'))is-invalid @endif"
                                           value="{{ old('cover_photo', isset($project->cover_photo) ? $project->cover_photo : '') }}">
                                    @if ($errors->has('cover_photo'))
                                    <div class="invalid-feedback">{{ $errors->first('cover_photo') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">Hình dự án mới</label>
                                <div class="col-sm-10">
                                    <input type="text" id="home_photo_new" name="home_photo_new" class="form-control @if ($errors->has('home_photo_new'))is-invalid @endif"
                                           value="{{ old('home_photo_new', isset($project->home_photo_new) ? $project->home_photo_new : '') }}">
                                    @if ($errors->has('home_photo_new'))
                                    <div class="invalid-feedback">{{ $errors->first('home_photo_new') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">Hình dự án nổi bật</label>
                                <div class="col-sm-10">
                                    <input type="text" id="home_photo_highlight" name="home_photo_highlight" class="form-control @if ($errors->has('home_photo_highlight'))is-invalid @endif"
                                           value="{{ old('home_photo_highlight', isset($project->home_photo_highlight) ? $project->home_photo_highlight : '') }}">
                                    @if ($errors->has('home_photo_highlight'))
                                    <div class="invalid-feedback">{{ $errors->first('home_photo_highlight') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">Logo</label>
                                <div class="col-sm-10">
                                    <input type="text" id="logo" name="logo" class="form-control @if ($errors->has('logo'))is-invalid @endif"
                                           value="{{ old('logo', isset($project->logo) ? $project->logo : '') }}">
                                    @if ($errors->has('logo'))
                                    <div class="invalid-feedback">{{ $errors->first('logo') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">Chủ dự án</label>
                                <div class="col-sm-10">
                                    <input type="text" id="investor" name="investor" class="form-control @if ($errors->has('investor'))is-invalid @endif"
                                           value="{{ old('investor', isset($project->investor) ? $project->investor : '') }}">
                                    @if ($errors->has('investor'))
                                    <div class="invalid-feedback">{{ $errors->first('investor') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">Link Facebook</label>
                                <div class="col-sm-10">
                                    <input type="text" id="facebook" name="investor" class="form-control @if ($errors->has('facebook'))is-invalid @endif"
                                           value="{{ old('facebook', isset($project->facebook) ? $project->facebook : '') }}">
                                    @if ($errors->has('facebook'))
                                    <div class="invalid-feedback">{{ $errors->first('facebook') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">Link Instagram</label>
                                <div class="col-sm-10">
                                    <input type="text" id="instagram" name="instagram" class="form-control @if ($errors->has('instagram'))is-invalid @endif"
                                           value="{{ old('instagram', isset($project->instagram) ? $project->instagram : '') }}">
                                    @if ($errors->has('instagram'))
                                    <div class="invalid-feedback">{{ $errors->first('instagram') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">Trạng thái</label>
                                <div class="col-sm-10">
                                    <div class="i-checks">
                                        <input id="status_1" type="radio" value="{{ $status['active'] }}" @if (old('status', isset($project->status) ? $project->status : '') == 1) checked="checked" @endif name="status" class="form-control-custom radio-custom">
                                        <label for="status_1">Active</label>
                                    </div>
                                    <div class="i-checks">
                                        <input id="status_0" type="radio" value="{{ $status['inactive'] }}" @if (old('status', isset($project->status) ? $project->status : '') != 1) checked="checked" @endif name="status" class="form-control-custom radio-custom">
                                        <label for="status_0">Inactive</label>
                                    </div>
                                </div>
                                @if ($errors->has('status'))
                                <div class="invalid-feedback">{{ $errors->first('status') }}</div>
                                @endif
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">Hiển thị ở Menu</label>
                                <div class="col-sm-10">
                                    <div class="i-checks">
                                        <input id="menuStatus1" type="radio" value="{{ $menuStatus['yes'] }}" @if (old('is_menu', isset($project->is_menu) ? $project->is_menu : '') == 1) checked="checked" @endif name="is_menu" class="form-control-custom radio-custom">
                                        <label for="menuStatus1">Có</label>
                                    </div>
                                    <div class="i-checks">
                                        <input id="menuStatus0" type="radio" value="{{ $menuStatus['no'] }}" @if (old('is_menu', isset($project->is_menu) ? $project->is_menu : '') != 1) checked="checked" @endif name="is_menu" class="form-control-custom radio-custom">
                                        <label for="menuStatus0">Không</label>
                                    </div>
                                </div>
                                @if ($errors->has('is_menu'))
                                <div class="invalid-feedback">{{ $errors->first('is_menu') }}</div>
                                @endif
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">Dự án nổi bật</label>
                                <div class="col-sm-10">
                                    <div class="i-checks">
                                        <input id ="homePageStatus1" type="radio" value="{{ $homePageStatus['yes'] }}" @if (old('is_show_homepage', isset($project->is_show_homepage) ? $project->is_show_homepage : '') == 1) checked="checked" @endif name="is_show_homepage" class="form-control-custom radio-custom">
                                        <label for="homePageStatus1">Có</label>
                                    </div>
                                    <div class="i-checks">
                                        <input id="homePageStatus0" type="radio" value="{{ $homePageStatus['no'] }}" @if (old('is_show_homepage', isset($project->is_show_homepage) ? $project->is_show_homepage : '') != 1) checked="checked" @endif name="is_show_homepage" class="form-control-custom radio-custom">
                                        <label for="homePageStatus0">Không</label>
                                    </div>
                                </div>
                                @if ($errors->has('is_show_homepage'))
                                <div class="invalid-feedback">{{ $errors->first('is_show_homepage') }}</div>
                                @endif
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">Dự án mới</label>
                                <div class="col-sm-10">
                                    <div class="i-checks">
                                        <input id ="isNew1" type="radio" value="{{ $homePageStatus['yes'] }}" @if (old('is_new', isset($project->is_new) ? $project->is_new : '') == 1) checked="checked" @endif name="is_new" class="form-control-custom radio-custom">
                                        <label for="isNew1">Có</label>
                                    </div>
                                    <div class="i-checks">
                                        <input id="isNew0" type="radio" value="{{ $homePageStatus['no'] }}" @if (old('is_new', isset($project->is_new) ? $project->is_new : '') != 1) checked="checked" @endif name="is_new" class="form-control-custom radio-custom">
                                        <label for="isNew0">Không</label>
                                    </div>
                                </div>
                                @if ($errors->has('is_new'))
                                <div class="invalid-feedback">{{ $errors->first('is_new') }}</div>
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
@endsection
