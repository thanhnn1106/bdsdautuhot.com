@extends('admin.layout')
@section('content')
<!-- Breadcrumb-->
<div class="breadcrumb-holder">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Teams</li>
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
                        <h1>Teams</h1>
                    </div>
                    <div class="card-header">
                        <form id="searchTeam" method="GET" action="{{ route('admin.teams') }}">
                            <div class="form-group row">
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <select class="form-control" name="filter_group" onchange="this.form.submit();">
                                                <option value="">All</option>
                                                @foreach ($listGroup as $key => $value)
                                                <option @if ($filterGroup != '' && (int)$key === (int)$filterGroup) selected="selected" @endif value="{{ $key }}">{{ $value }}</option>
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
                            @if (isset($groupA))
                            <!--Group A-->
                            <h1>Group A</h1>
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Team</th>
                                        <th>Played</th>
                                        <th>Win</th>
                                        <th>Draw</th>
                                        <th>Lose</th>
                                        <th>Goal for</th>
                                        <th>Goal against</th>
                                        <th>+/-</th>
                                        <th>Point</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($groupA->count() == 0)
                                        <tr><td colspan="10" align="center">Data not found</td></tr>
                                    @else
                                    <?php $i = 1 ?>
                                    @foreach($groupA as $team)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>
                                            <a href="{{ route('admin.teams.edit', ['teamId' => $team->id]) }}">
                                                {{ $team->name }}
                                            </a>
                                        </td>
                                        <td>{{ $team->play }}</td>
                                        <td>{{ $team->win }}</td>
                                        <td>{{ $team->draw }}</td>
                                        <td>{{ $team->lose }}</td>
                                        <td>{{ $team->goal_for }}</td>
                                        <td>{{ $team->goal_again }}</td>
                                        <td>{{ $team->goal_for - $team->goal_again }}</td>
                                        <td>{{ $team->point }}</td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                            @endif
                            @if (isset($groupB))
                            <!--Group B-->
                            <h1>Group B</h1>
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Team</th>
                                        <th>Played</th>
                                        <th>Win</th>
                                        <th>Draw</th>
                                        <th>Lose</th>
                                        <th>Goal for</th>
                                        <th>Goal against</th>
                                        <th>+/-</th>
                                        <th>Point</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($groupB->count() == 0)
                                        <tr><td colspan="10" align="center">Data not found</td></tr>
                                    @else
                                    <?php $i = 1; ?>
                                    @foreach($groupB as $team)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>
                                            <a href="{{ route('admin.teams.edit', ['teamId' => $team->id]) }}">
                                                {{ $team->name }}
                                            </a>
                                        </td>
                                        <td>{{ $team->play }}</td>
                                        <td>{{ $team->win }}</td>
                                        <td>{{ $team->draw }}</td>
                                        <td>{{ $team->lose }}</td>
                                        <td>{{ $team->goal_for }}</td>
                                        <td>{{ $team->goal_again }}</td>
                                        <td>{{ $team->goal_for - $team->goal_again }}</td>
                                        <td>{{ $team->point }}</td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                            @endif
                            @if (isset($groupC))
                            <!--Group C-->
                            <h1>Group C</h1>
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Team</th>
                                        <th>Played</th>
                                        <th>Win</th>
                                        <th>Draw</th>
                                        <th>Lose</th>
                                        <th>Goal for</th>
                                        <th>Goal against</th>
                                        <th>+/-</th>
                                        <th>Point</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($groupC->count() == 0)
                                        <tr><td colspan="10" align="center">Data not found</td></tr>
                                    @else
                                    <?php $i = 1; ?>
                                    @foreach($groupC as $team)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>
                                            <a href="{{ route('admin.teams.edit', ['teamId' => $team->id]) }}">
                                                {{ $team->name }}
                                            </a>
                                        </td>
                                        <td>{{ $team->play }}</td>
                                        <td>{{ $team->win }}</td>
                                        <td>{{ $team->draw }}</td>
                                        <td>{{ $team->lose }}</td>
                                        <td>{{ $team->goal_for }}</td>
                                        <td>{{ $team->goal_again }}</td>
                                        <td>{{ $team->goal_for - $team->goal_again }}</td>
                                        <td>{{ $team->point }}</td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                            @endif
                            @if (isset($groupD))
                            <!--Group D-->
                            <h1>Group D</h1>
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Team</th>
                                        <th>Played</th>
                                        <th>Win</th>
                                        <th>Draw</th>
                                        <th>Lose</th>
                                        <th>Goal for</th>
                                        <th>Goal against</th>
                                        <th>+/-</th>
                                        <th>Point</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($groupD->count() == 0)
                                        <tr><td colspan="10" align="center">Data not found</td></tr>
                                    @else
                                    <?php $i = 1; ?>
                                    @foreach($groupD as $team)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>
                                            <a href="{{ route('admin.teams.edit', ['teamId' => $team->id]) }}">
                                                {{ $team->name }}
                                            </a>
                                        </td>
                                        <td>{{ $team->play }}</td>
                                        <td>{{ $team->win }}</td>
                                        <td>{{ $team->draw }}</td>
                                        <td>{{ $team->lose }}</td>
                                        <td>{{ $team->goal_for }}</td>
                                        <td>{{ $team->goal_again }}</td>
                                        <td>{{ $team->goal_for - $team->goal_again }}</td>
                                        <td>{{ $team->point }}</td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                            @endif
                            @if (isset($groupE))
                            <!--Group E-->
                            <h1>Group E</h1>
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Team</th>
                                        <th>Played</th>
                                        <th>Win</th>
                                        <th>Draw</th>
                                        <th>Lose</th>
                                        <th>Goal for</th>
                                        <th>Goal against</th>
                                        <th>+/-</th>
                                        <th>Point</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($groupE->count() == 0)
                                        <tr><td colspan="10" align="center">Data not found</td></tr>
                                    @else
                                    <?php $i = 1; ?>
                                    @foreach($groupE as $team)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>
                                            <a href="{{ route('admin.teams.edit', ['teamId' => $team->id]) }}">
                                                {{ $team->name }}
                                            </a>
                                        </td>
                                        <td>{{ $team->play }}</td>
                                        <td>{{ $team->win }}</td>
                                        <td>{{ $team->draw }}</td>
                                        <td>{{ $team->lose }}</td>
                                        <td>{{ $team->goal_for }}</td>
                                        <td>{{ $team->goal_again }}</td>
                                        <td>{{ $team->goal_for - $team->goal_again }}</td>
                                        <td>{{ $team->point }}</td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                            @endif
                            @if (isset($groupF))
                            <!--Group F-->
                            <h1>Group F</h1>
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Team</th>
                                        <th>Played</th>
                                        <th>Win</th>
                                        <th>Draw</th>
                                        <th>Lose</th>
                                        <th>Goal for</th>
                                        <th>Goal against</th>
                                        <th>+/-</th>
                                        <th>Point</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($groupF->count() == 0)
                                        <tr><td colspan="10" align="center">Data not found</td></tr>
                                    @else
                                    <?php $i = 1; ?>
                                    @foreach($groupF as $team)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>
                                            <a href="{{ route('admin.teams.edit', ['teamId' => $team->id]) }}">
                                                {{ $team->name }}
                                            </a>
                                        </td>
                                        <td>{{ $team->play }}</td>
                                        <td>{{ $team->win }}</td>
                                        <td>{{ $team->draw }}</td>
                                        <td>{{ $team->lose }}</td>
                                        <td>{{ $team->goal_for }}</td>
                                        <td>{{ $team->goal_again }}</td>
                                        <td>{{ $team->goal_for - $team->goal_again }}</td>
                                        <td>{{ $team->point }}</td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                            @endif
                            @if (isset($groupG))
                            <!--Group G-->
                            <h1>Group G</h1>
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Team</th>
                                        <th>Played</th>
                                        <th>Win</th>
                                        <th>Draw</th>
                                        <th>Lose</th>
                                        <th>Goal for</th>
                                        <th>Goal against</th>
                                        <th>+/-</th>
                                        <th>Point</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($groupG->count() == 0)
                                        <tr><td colspan="10" align="center">Data not found</td></tr>
                                    @else
                                    <?php $i = 1; ?>
                                    @foreach($groupG as $team)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>
                                            <a href="{{ route('admin.teams.edit', ['teamId' => $team->id]) }}">
                                                {{ $team->name }}
                                            </a>
                                        </td>
                                        <td>{{ $team->play }}</td>
                                        <td>{{ $team->win }}</td>
                                        <td>{{ $team->draw }}</td>
                                        <td>{{ $team->lose }}</td>
                                        <td>{{ $team->goal_for }}</td>
                                        <td>{{ $team->goal_again }}</td>
                                        <td>{{ $team->goal_for - $team->goal_again }}</td>
                                        <td>{{ $team->point }}</td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                            @endif
                            @if (isset($groupH))
                            <!--Group H-->
                            <h1>Group H</h1>
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Team</th>
                                        <th>Played</th>
                                        <th>Win</th>
                                        <th>Draw</th>
                                        <th>Lose</th>
                                        <th>Goal for</th>
                                        <th>Goal against</th>
                                        <th>+/-</th>
                                        <th>Point</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($groupH->count() == 0)
                                        <tr><td colspan="10" align="center">Data not found</td></tr>
                                    @else
                                    <?php $i = 1; ?>
                                    @foreach($groupH as $team)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>
                                            <a href="{{ route('admin.teams.edit', ['teamId' => $team->id]) }}">
                                                {{ $team->name }}
                                            </a>
                                        </td>
                                        <td>{{ $team->play }}</td>
                                        <td>{{ $team->win }}</td>
                                        <td>{{ $team->draw }}</td>
                                        <td>{{ $team->lose }}</td>
                                        <td>{{ $team->goal_for }}</td>
                                        <td>{{ $team->goal_again }}</td>
                                        <td>{{ $team->goal_for - $team->goal_again }}</td>
                                        <td>{{ $team->point }}</td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                            @endif
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
