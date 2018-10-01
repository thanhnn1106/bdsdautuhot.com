@extends('front.layout')
@section('content')
<script type="text/javascript">
    $(document).ready(function() {
        var d = new Date();
        $("#newdate").text(d.getMonth() + '/' + d.getFullYear());
    });
</script>
<div id="main">
    <div id="content" class="clearfix fontResizerTarget"> 
        <!-- index_box01 start -->
        <div id="index_box01" class="clearfix">
            <div class="inner clearfix">
                <div class="index_box01_list">
                    <div class="index_box01_cont">
                        <h3><span>Dự án mới</span>Tháng <label id="newdate"></label><br class="box_pc">
                        </h3>
                        <!--<p class="h3_sub">Lorem Ipsum is imply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>-->
                    </div>
                    @if (!empty($projectListNew))
                        @foreach ($projectListNew as $item)
                        <dl class="index_box01_cont">
                            <dt class="img_over">
                                <a href="du-an/{{ $item->slug }}"><img src="{{ $item->home_photo_new }}" alt=""></a>
                                <span>{{ $item->short_name }}</span>
                            </dt>
                            <dd>
                                <p>{{ $item->short_des }}</p>
                            </dd>
                        </dl>
                        @endforeach
                    @endif
                </div>
                <p class="idx_btn01"><a href="">Xem thêm dự án khác</a></p>
            </div>
        </div>
        <!-- index_box01 end -->

        <!-- row start -->
        @if (!empty($projectList))
            <?php $i = 0; ?>
            @foreach ($projectList as $item)
            <?php
                $newProjectClass = '';
                if ($i % 2 == 0) {
                    $newProjectClass = 'img_left';
                } else {
                    $newProjectClass = 'img_right';
                }
            ?>
            <div class="clearfix {{ $newProjectClass }}">
                <p class="main_img_bg" style="background-image: url('{{ $item->home_photo_highlight }}');"></p>
                <div class="inner clearfix">
                    <div class="index_boxmain main_content">
                        <h3>{{ $item->name }}</h3>
                        <div class="box_section">
                            <p>{{ $item->short_des }}</p>
                        </div>
                        <p class="idx_btn01"><a href="du-an/{{ $item->slug }}">Xem thêm</a></p>
                    </div>
                </div>
            </div>
            <?php $i++; ?>
            @endforeach
        @endif
        <!-- row end -->
    </div>
</div>
<!-- content end --> 
@endsection
@section('footer_script')

@endsection

