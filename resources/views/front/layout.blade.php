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
<link  href="./css/styles.css" rel="stylesheet" type="text/css" />
<link  href="./css/responsive.css" rel="stylesheet" type="text/css" />
<script src="./js/jquery.js" type="text/javascript"></script>
<script src="./js/jquery.scroll.js" type="text/javascript"></script>
<script src="./js/rollover.min.js" type="text/javascript"></script>
<script src="./js/common.js" type="text/javascript"></script>
<link  href="./css/slick.css" rel="stylesheet" type="text/css" />
<script src="./js/slick.js" type="text/javascript"></script>
<script src="./js/top.js" type="text/javascript"></script>
</head>

<body id="index">
<div id="wrapper">
  <div id="header" class="clearfix">
    <div id="header_top">
      <div class="inner clearfix">
        <div id="header_info">
          <p id="logo"><a href="http://www.nakamura-dc.jp/"><img src="images/logo.png" width="195" alt=""></a></p>
          <div id="icon_menu" class=""><span></span> <span></span> <span></span></div>
          <div class="header_contact">
            <ul class="header_cal">
              <li><span>T2 - T7</span>9:00～12:30 / 14:00～19:00</li>
              <li><span>CN</span>9:00～12:30 / 14:00～16:30</li>
            </ul>
            <p class="header_tel">03-9999-9999</p>
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
            <p class="slider_img"><img src="images/index_mainning01.jpg" alt="" class="box_pc"><img src="images/index_mainning01_sp.jpg" alt="" class="box_sp"></p>
          </div>
          <div>
            <div class="h2_info"> </div>
            <p class="slider_img"><img src="images/index_mainning02.jpg" alt="" class="box_pc"><img src="images/index_mainning02_sp.jpg" alt="" class="box_sp"></p>
          </div>
          <div>
            <div class="h2_info"> </div>
            <p class="slider_img"><img src="images/index_mainning03.jpg" alt="" class="box_pc"><img src="images/index_mainning03_sp.jpg" alt="" class="box_sp"></p>
          </div>
        </div>
      </div>
    </div>
    <div id="menu" class="clearfix">
      <div class="inner clearfix">
        <ul id="gnavi">
          <li><a href="">ホーム</a></li>
          <li><a href="vinhomes.html">Vinhomes</a></li>
          <li><a href="vinhomes.html">Vinhomes</a></li>
          <li><a href="vinhomes.html">Vinhomes</a></li>
          <li><a href="">RiverCity</a></li>
          <li><a href="">Green Star</a></li>
          <li class="sub"><a href="#">Dự án khác</a>
            <div class="sub_menu">
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
            </div>
          </li>
          <li class="i_contact"><a href="" target="_blank"><span class="gnavi_en">LIÊN HỆ</span></a></li>
        </ul>
      </div>
    </div>
  </div>
  
  <!-- main start -->
  <div id="main"> <!-- content start -->
    @yield('content')
  </div>
  <!-- main end -->
  
  <div id="footer">
    <div id="footer_contact">
      <div class="inner">
        <div class="footer_info clearfix">
          <p id="footer_logo"><a href=""><img src="images/logo.png" width="195" alt="logo"></a></p>
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
      Copyright &copy; 2018 <br class="box_sp">
      All Rights Reserved.
      </address>
    </div>
    <p id="totop"><a href="#wrapper"><img src="images/totop_off.png" width="70" alt="TOP"></a></p>
  </div>
</div>
</body>
</html>
