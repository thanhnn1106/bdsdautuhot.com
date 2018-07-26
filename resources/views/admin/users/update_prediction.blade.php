@extends('admin.layout')
@section('content')
<!-- Breadcrumb-->
<div class="breadcrumb-holder">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.user.predictions') }}">User predictions</a></li>
            <li class="breadcrumb-item active">{{ $title }}</li>
        </ul>
    </div>
</div>
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
                                <label class="col-sm-2 form-control-label">Is lucky star</label>
                                <div class="col-sm-10">
                                  <div class="i-checks">
                                    <input id="is_show_1" type="radio" value="1" @if (old('is_lucky_star', isset($userMatch->is_lucky_star) ? $userMatch->is_lucky_star : '') == 1) checked="checked" @endif name="is_lucky_star" class="form-control-custom radio-custom">
                                    <label for="is_show_1">Yes</label>
                                  </div>
                                  <div class="i-checks">
                                    <input id="is_show_0" type="radio" value="0" @if (old('is_lucky_star', isset($userMatch->is_lucky_star) ? $userMatch->is_lucky_star : '') != 1) checked="checked" @endif name="is_lucky_star" class="form-control-custom radio-custom">
                                    <label for="is_show_0">No</label>
                                  </div>
                                </div>
                                @if ($errors->has('is_lucky_star'))
                                <div class="invalid-feedback">{{ $errors->first('is_lucky_star') }}</div>
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

@endsection
