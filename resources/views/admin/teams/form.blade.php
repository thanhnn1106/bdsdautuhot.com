@extends('admin.layout')
@section('content')
<!-- Breadcrumb-->
<div class="breadcrumb-holder">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.users') }}">Users</a></li>
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
                                <label class="col-sm-2 form-control-label">Team name</label>
                                <div class="col-sm-10">
                                    <label class="form-control-label">{{ $team->name }}</label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">Play</label>
                                <div class="col-sm-10">
                                    <input type="number" id="play" name="play" class="form-control @if ($errors->has('play'))is-invalid @endif"
                                           value="{{ old('play', isset($team->play) ? $team->play : '') }}">
                                    @if ($errors->has('play'))
                                    <div class="invalid-feedback">{{ $errors->first('play') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">Win</label>
                                <div class="col-sm-10">
                                    <input type="number" id="win" name="win" class="form-control @if ($errors->has('play'))is-invalid @endif"
                                           value="{{ old('win', isset($team->win) ? $team->win : '') }}">
                                    @if ($errors->has('win'))
                                    <div class="invalid-feedback">{{ $errors->first('win') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">Draw</label>
                                <div class="col-sm-10">
                                    <input type="number" id="play" name="draw" class="form-control @if ($errors->has('draw'))is-invalid @endif"
                                           value="{{ old('draw', isset($team->draw) ? $team->draw : '') }}">
                                    @if ($errors->has('draw'))
                                    <div class="invalid-feedback">{{ $errors->first('draw') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">Lose</label>
                                <div class="col-sm-10">
                                    <input type="number" id="play" name="lose" class="form-control @if ($errors->has('lose'))is-invalid @endif"
                                           value="{{ old('lose', isset($team->lose) ? $team->lose : '') }}">
                                    @if ($errors->has('lose'))
                                    <div class="invalid-feedback">{{ $errors->first('lose') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">Goal for</label>
                                <div class="col-sm-10">
                                    <input type="number" id="play" name="goal_for" class="form-control @if ($errors->has('goal_for'))is-invalid @endif"
                                           value="{{ old('goal_for', isset($team->goal_for) ? $team->goal_for : '') }}">
                                    @if ($errors->has('goal_for'))
                                    <div class="invalid-feedback">{{ $errors->first('goal_for') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">Goal against</label>
                                <div class="col-sm-10">
                                    <input type="number" id="goal_again" name="goal_again" class="form-control @if ($errors->has('goal_again'))is-invalid @endif"
                                           value="{{ old('goal_again', isset($team->goal_again) ? $team->goal_again : '') }}">
                                    @if ($errors->has('goal_again'))
                                    <div class="invalid-feedback">{{ $errors->first('goal_again') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">Point</label>
                                <div class="col-sm-10">
                                    <input type="number" id="play" name="point" class="form-control @if ($errors->has('point'))is-invalid @endif"
                                           value="{{ old('point', isset($team->point) ? $team->point : '') }}">
                                    @if ($errors->has('point'))
                                    <div class="invalid-feedback">{{ $errors->first('point') }}</div>
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
<link href="{{ asset('plugins/bootstrap-tagsinput/tagsinput.css') }}" rel="stylesheet"/>
<script src="{{ asset('plugins/bootstrap-tagsinput/tagsinput.js') }}"></script>
<!-- TinyMCE -->
<script type="text/javascript" src="{{ asset('/plugins/tinymce/tinymce.min.js') }}"></script>
@endsection
