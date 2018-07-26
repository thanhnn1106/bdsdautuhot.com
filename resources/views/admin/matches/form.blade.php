@extends('admin.layout')
@section('content')
<!-- Breadcrumb-->
<div class="breadcrumb-holder">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.matches') }}">Matches</a></li>
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
                                <label class="col-sm-2 form-control-label">Round</label>
                                <div class="col-sm-10">
                                    <label>{{ $matchInfo->round }}</label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">Group</label>
                                <div class="col-sm-10">
                                    <label>{{ $matchInfo->group }}</label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">Time & Location</label>
                                <div class="col-sm-10">
                                    <label>{{ $matchInfo->match_date }} - {{ $matchInfo->location }}</label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">Match name</label>
                                <div class="col-sm-10">
                                    <label>{{ $matchInfo->home_team }} vs {{ $matchInfo->away_team }}</label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">{{ $matchInfo->home_team }} Score</label>
                                <div class="col-sm-10">
                                    <input type="number" id="home_score" name="home_score" class="form-control"
                                           value="{{ $matchInfo->home_score }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">{{ $matchInfo->away_team }} Score</label>
                                <div class="col-sm-10">
                                    <input type="number" id="away_score" name="away_score" class="form-control"
                                           value="{{ $matchInfo->away_score }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">Show</label>
                                <div class="col-sm-10">
                                  <div class="i-checks">
                                    <input id="is_show_1" type="radio" value="1" @if (old('is_show', isset($matchInfo->is_show) ? $matchInfo->is_show : '') == 1) checked="checked" @endif name="is_show" class="form-control-custom radio-custom">
                                    <label for="is_show_1">Yes</label>
                                  </div>
                                  <div class="i-checks">
                                    <input id="is_show_0" type="radio" value="0" @if (old('is_show', isset($matchInfo->is_show) ? $matchInfo->is_show : '') != 1) checked="checked" @endif name="is_show" class="form-control-custom radio-custom">
                                    <label for="is_show_0">No</label>
                                  </div>
                                </div>
                                @if ($errors->has('is_show'))
                                <div class="invalid-feedback">{{ $errors->first('is_show') }}</div>
                                @endif
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 form-control-label">Trạng thái</label>
                                <div class="col-sm-10 mb-3">
                                    <select name="status" class="form-control @if ($errors->has('status'))is-invalid @endif">
                                        @foreach ($status as $key => $value)
                                        <option @if ((int)$matchInfo->status === (int)$key) selected="selected" @endif value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('status'))
                                    <div class="invalid-feedback">{{ $errors->first('status') }}</div>
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

@endsection
