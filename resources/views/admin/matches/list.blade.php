@extends('admin.layout')
@section('content')
<!-- Breadcrumb-->
<div class="breadcrumb-holder">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Matches</li>
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
                        <h1>Matches</h1>
                    </div>
                    <div class="card-header">
                        <form id="searchMatch" method="GET" action="{{ route('admin.matches') }}">
                            <div class="form-group row">
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <select class="form-control" name="filter_status" onchange="this.form.submit();">
                                                <option value="">All</option>
                                                @foreach ($status as $key => $value)
                                                <option @if ($filter_status != '' && (int)$key === (int)$filter_status) selected="selected" @endif value="{{ $key }}">{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <select class="form-control" name="filter_is_show" onchange="this.form.submit();">
                                                <option value="">All</option>
                                                @foreach ($is_show as $key => $value)
                                                <option @if ($filter_is_show != '' && (int)$key === (int)$filter_is_show) selected="selected" @endif value="{{ $key }}">{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{ csrf_field() }}
                        </form>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Round</th>
                                        <th>Group</th>
                                        <th>Match Date</th>
                                        <th>Home Team</th>
                                        <th>Away Team</th>
                                        <th>Status</th>
                                        <th>Show in front</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($matches->count() == 0)
                                        <tr><td colspan="9" align="center">Data not found</td></tr>
                                    @else
                                    <?php $i = ($matches->currentpage()-1) * $matches->perpage() + 1; ?>
                                    @foreach($matches as $match)
                                    <tr>
                                        <td style="width: 5%;" scope="row">{{ $i++ }}</td>
                                        <td style="width: 5%;">{{ $match->round }}</td>
                                        <td style="width: 10%;">{{ $match->group }}</td>
                                        <td style="width: 15%;">{{ $match->match_date }}</td>
                                        <td style="width: 10%;">{{ $match->home_team }}</td>
                                        <td style="width: 10%;">{{ $match->away_team }}</td>
                                        <td style="width: 10%;">
                                            <?php
                                                $matchColor = '';
                                                if ($match->status == 3) {
                                                    $matchColor = 'secondary';
                                                } else if ($match->status == 2) {
                                                    $matchColor = 'warning';
                                                } else if ($match->status == 1) {
                                                    $matchColor = 'success';
                                                } else if ($match->status == 0) {
                                                    $matchColor = 'info';
                                                }
                                            ?>
                                            <div class="badge badge-{{ $matchColor }}">
                                                {{ $status[$match->status] }}
                                            </div>
                                        </td>
                                        <td style="width: 10%;">
                                            <?php
                                                $isActiveColor = '';
                                                if ($match->is_show == 0) {
                                                    $isActiveColor = 'secondary';
                                                } else if ($match->is_show == 1) {
                                                    $isActiveColor = 'success';
                                                }
                                            ?>
                                            <div class="badge badge-{{ $isActiveColor }}">
                                                {{ $is_show[$match->is_show] }}
                                            </div>
                                        </td>
                                        <td style="width: 15%;">
                                            <a href="{{ route('admin.matches.edit', ['matchId' => $match->id]) }}" class="btn btn-warning btn-xs">
                                               Update
                                            </a>
                                            <a href="javascript:void(0);" onclick="return fncDeleteConfirm(this);"
                                               data-message="Are you sure delete this matches?"
                                               data-url="{{ route('admin.matches.delete', ['matchId' => $match->id]) }}"
                                               class="btn btn-danger btn-xs">
                                               Delete
                                            </a>
                                            @if ($match->status == 2)
                                                <a  href="{{ route('admin.matches.update_result', ['matchId' => $match->id]) }}" class="btn btn-success btn-xs">
                                                   Update result
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="dataTables_info" role="status" aria-live="polite">Showing {{ $matches->firstItem() }} to {{ $matches->count() }} of {{ $matches->total() }} entries</div>
                            </div>
                            <div class="col-sm-7">
                                <div class="dataTables_paginate paging_simple_numbers">
                                    {{ $matches->appends(request()->input())->links() }}
                                </div>
                            </div>
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