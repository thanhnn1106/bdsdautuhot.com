@extends('front.layout')
@section('content')
<!-- main start -->
<div id="main" class="under"> <!-- content start -->
    <div id="content" class="clearfix">
        <div class="inner clearfix">
            <h3>{{ $newsInfo->title }}</h3><br />
            <h5><strong>Ngày đăng: </strong>{{ $newsInfo->created_at }} -
                <strong>Xem:</strong> {{ $newsInfo->page_view }}
            </h5>
            <div class="section clearfix">
                {!! $newsInfo->content !!}
            </div>
        </div>
    </div>
    <!-- content end --> 

</div>
<!-- main end -->
<!-- content end --> 
@endsection
