<!Doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="format-detection" content="telephone=no">
        <title>Bất động sản</title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta http-equiv="Content-Style-Type" content="text/css" />
        <meta http-equiv="Content-Script-Type" content="text/javascript" />
        <link  href="{{ asset_front('css/styles.css') }}" rel="stylesheet" type="text/css" />
        <link  href="{{ asset_front('css/under.css') }}" rel="stylesheet" type="text/css" />
        <link  href="{{ asset_front('css/responsive.css') }}" rel="stylesheet" type="text/css" />
        <script src="{{ asset_front('js/jquery.js') }}" type="text/javascript"></script>
        <script src="{{ asset_front('js/jquery.scroll.js') }}" type="text/javascript"></script>
        <script src="{{ asset_front('js/rollover.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset_front('js/common.js') }}" type="text/javascript"></script>
        <link  href="{{ asset_front('css/slick.css') }}" rel="stylesheet" type="text/css" />
        <script src="{{ asset_front('js/slick.js') }}" type="text/javascript"></script>
        <script src="{{ asset_front('js/top.js') }}" type="text/javascript"></script>
    </head>

    <body id="index">
        <div id="wrapper">
            <div id="header" class="clearfix">
                <div id="header_top">
                    <div class="inner clearfix">
                        <div id="header_info">
                            <p id="logo">
                                <a href="http://www.nakamura-dc.jp/">
                                    <img src="{{ asset_front('images/logo.png') }}" width="195" alt="">
                                </a>
                            </p>
                            <div id="icon_menu" class=""><span></span> <span></span> <span></span></div>
                            <div class="header_contact">
                                <ul class="header_cal">
                                    <li><span>T2 - T7</span>9:00～12:30 / 14:00～19:00</li>
                                    <li><span>CN</span>9:00～12:30 / 14:00～16:30</li>
                                </ul>
                                <p class="header_tel"><a href="tel:{{ str_replace('.', '', $pageInfo->phone) }}">{{ $pageInfo->phone }}</a></p>
                                <dl class="header_f">
                                    <dt></dt>
                                    <dd>
                                        <ul>
                                            <li class="active">EN</li>
                                            <li class="">VN</li>
                                        </ul>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="top_info" class="clearfix">
                    <div class="inner clearfix">
                        <div id="slider">
                            <div>
                                <div class="h2_info"> </div>
                                <p class="slider_img">
                                    <img src="{{ asset_front('images/index_mainning01.jpg') }}" alt="" class="box_pc">
                                    <img src="{{ asset_front('images/index_mainning01_sp.jpg') }}" alt="" class="box_sp">
                                </p>
                            </div>
                            <div>
                                <div class="h2_info"> </div>
                                <p class="slider_img">
                                    <img src="{{ asset_front('images/index_mainning02.jpg') }}" alt="" class="box_pc">
                                    <img src="{{ asset_front('images/index_mainning02_sp.jpg') }}" alt="" class="box_sp"></p>
                            </div>
                            <div>
                                <div class="h2_info"> </div>
                                <p class="slider_img">
                                    <img src="{{ asset_front('images/index_mainning03.jpg') }}" alt="" class="box_pc">
                                    <img src="{{ asset_front('images/index_mainning03_sp.jpg') }}" alt="" class="box_sp"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="menu" class="clearfix">
                    <div class="inner clearfix">
                        <ul id="gnavi">
                            <li><a href="">ホーム</a></li>
                            @if (!empty($menu))
                                @foreach ($menu as $item)
                                <li><a href="/du-an/{{ $item->slug }}">{{ $item->short_name }}</a></li>
                                @endforeach
                            @endif
                            <li><a href="#">Tin tức</a>
<!--                                <div class="sub_menu">
                                    <ul>
                                        <li><a href="">Vinhomes</a></li>
                                        <li><a href="">Sunrise</a></li>
                                        <li><a href="">Mobihouse</a></li>
                                        <li><a href="">Vĩnh Xuân</a></li>
                                        <li><a href="">Hồng Lạc</a></li>
                                        <li><a href="">Rivera Park</a></li>
                                        <li><a href="">Rivera Park 2</a></li>
                                        <li><a href="">Rivera Park 3</a></li>
                                        <li><a href="">Rivera Park 4</a></li>
                                        <li><a href="">Rivera Park 5</a></li>
                                    </ul>
                                </div>-->
                            </li>
                            <li class="i_contact"><a href="" target="_blank"><span class="gnavi_en">LIÊN HỆ</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- main start -->
            @yield('content')
            <!-- main end -->

            <div id="footer">
                <div id="index_box05" class="clearfix">
                    <p class="main_img">
                        <img src="{{ asset_front('images/index_img_04.jpg') }}" alt="">
                    </p>
                    <div class="inner clearfix">
                        <div class="index_box05_cont">
                            <h5>Liên hệ ngay để được tư vấn</h5>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
                        </div>
                    </div>
                </div>
                <!-- index_box05 end --> 
                <!-- index_box06 start -->
                <div id="index_box06" class="clearfix">
                    <div class="inner clearfix">
                        <div class="box_tiny clearfix">
                            <p class="box06_title">Tin tức về bất động sản</p>
                            <div class="clearfix">
                                <ul class="news clearfix">
                                    <li>
                                        <h4 class="ellipsis"><a href="">Kinh nghiệm mua đất dự án mà bạn cần quan tâm</a></h4>
                                        <p><img src="{{ asset_front('images/img.jpg') }}" alt=""></p>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p></li>
                                    <li>
                                        <h4 class="ellipsis"><a href="">Nhà đầu cơ bất động sản đang dịch chuyển về tỉnh lẻ</a></h4>
                                        <p><img src="{{ asset_front('images/img_1.jpg') }}" alt=""></p>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p></li>
                                    <li>
                                        <h4 class="ellipsis"><a href="">Đến cuối năm, thị trường bất động sản còn ảm đạm hơn nữa?</a></h4>
                                        <p><img src="{{ asset_front('images/img_2.jpg') }}" alt=""></p>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p></li>
                                    <li>
                                        <h4 class="ellipsis"><a href="">Thị trường địa ốc xuất hiện nhiều dấu hiệu giảm tốc</a></h4>
                                        <p><img src="{{ asset_front('images/img_3.jpg') }}" alt=""></p>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p></li>
                                </ul>
                            </div>
                        </div>
                        <div class="idx_bnr_tel">
                            <dl>
                                <dt><span class="fs_24">Hotline:</span><br class="box_sp"><a href="tel:{{ str_replace('.', '', $pageInfo->phone) }}">{{ $pageInfo->phone }}</a></dt>
                            </dl>
                        </div>
                    </div>
                </div>
                <div id="footer_contact">
                    <div class="inner">
                        <div class="footer_info clearfix">
                            <p id="footer_logo">
                                <a href="">
                                    <img src="{{ asset_front('images/logo.png') }}" width="195" alt="logo">
                                </a>
                            </p>
                            <div class="frm clearfix">
                                <ul class="clearfix login_frm">
                                    <li>
                                        <p class="mb0">Họ và tên</p>
                                        <input type="text" class="iput" placeholder="">
                                    </li>
                                    <li>
                                        <p class="mb0">Số điện thoại</p>
                                        <input type="number" class="iput" placeholder="">
                                    </li>
                                    <li>
                                        <p class="mb0">Email</p>
                                        <input type="email" class="iput" placeholder="">
                                    </li>
                                    <li>
                                        <p class="mb0">Nhu cầu</p>
                                        <textarea rows="4" class="iput_area"></textarea>
                                    </li>
                                    <li class="center">
                                        <button type="button" class="bg_link">
                                            <a href="">Gửi thông tin</a>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="footer_link" class="clearfix">
                    <address>
                        Copyright &copy; 2018 bdsdautuhot.com <br class="box_sp">
                        All Rights Reserved.
                    </address>
                </div>
                <p id="totop">
                    <a href="#wrapper">
                        <img src="{{ asset_front('images/totop_off.png') }}" width="70" alt="TOP">
                    </a>
                </p>
            </div>
        </div>
    </body>
</html>
