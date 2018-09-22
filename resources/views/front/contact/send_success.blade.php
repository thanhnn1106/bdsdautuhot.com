@extends('front.layout')
@section('content')
<!-- main start -->
<div id="main" class="under">
    <div id="content" class="clearfix">
        <div class="inner clearfix">
            <h3>Tin nhắn của quý khách đã được gửi thành công. Chúc tôi sẽ liên hệ quý khách trong thời gian sớm nhất. Cám ơn quý khách.</h3>
            <p><a href="/">Nhấn vào đây để về trang chủ</a></p>
        </div>
    </div>
</div>

<script>
    setTimeout("location.href = '/';" , 5000);
</script>

@endsection
