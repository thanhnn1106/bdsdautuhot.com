@extends('front.layout')
@section('content')
<!-- main start -->
<div id="main" class="under"> <!-- content start -->
    <div id="content" class="clearfix">
        <div class="inner clearfix">
            @foreach ($projectInfo as $item)
            <h3>{{ $item->title }}</h3>
            <div class="section clearfix">
                {!! $item->content !!}
            </div>
            @endforeach
        </div>
    </div>
    <!-- content end --> 

</div>
<!-- main end -->
<!-- content end --> 
@endsection
