<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Gastro Pizza Sochy</title>
    <meta name="author" content="Vecuro">
    <meta name="description" content="Gastro Pizza Sochy — вкусные моменты каждый день!">
    <meta name="keywords" content="Gastro Pizza Sochy — вкусные моменты каждый день!"/>
    <meta name="robots" content="INDEX,FOLLOW">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--==============================
	   Google Web Fonts
	============================== -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cookie&family=Roboto:wght@300;400;500;700&family=Rufina:wght@400;700&display=swap"
          rel="stylesheet">

    <!-- Favicons - Place favicon.ico in the root directory -->
    <link rel="apple-touch-icon" sizes="57x57" href="assets/img/favicons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="assets/img/favicons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/img/favicons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/favicons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/img/favicons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="assets/img/favicons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="assets/img/favicons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="assets/img/favicons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="assets/img/favicons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicons/favicon-16x16.png">
    <link rel="manifest" href="assets/img/favicons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/img/favicons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!--==============================
	    All CSS File
	============================== -->
    <!-- Bootstrap -->
    <!-- <link rel="stylesheet" href="assets/css/app.min.css"> -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Flat Icon -->
    <link rel="stylesheet" href="assets/css/flaticon.min.css">
    <!-- Fontawesome Icon -->
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="assets/css/jquery.datetimepicker.min.css">
    <!-- Layer Slider -->
    <link rel="stylesheet" href="assets/css/layerslider.min.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="assets/css/magnific-popup.min.css">
    <!-- Nice Select -->
    <link rel="stylesheet" href="assets/css/nice-select.min.css">
    <!-- Slick Slider -->
    <link rel="stylesheet" href="assets/css/slick.min.css">
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Theme Color CSS -->
    <link rel="stylesheet" href="assets/css/theme-color1.css">
    <link rel="stylesheet" id="themeColor" href="#">

</head>

<body>
<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade
    your browser</a> to improve your experience and security.</p>
<![endif]-->

<!--********************************
       Code Start From Here
******************************** -->


<!--==============================
 Preloader
==============================-->
<div class="preloader  ">
    <button class="vs-btn mask-style1 preloaderCls">Отменить предзагрузку</button>
    <div class="preloader-inner">
        <div class="loader-logo">
            <img src="assets/img/logo-white.png" alt="Loader Image">
        </div>
        <div class="loader-wrap pt-4">
            <span class="loader"></span>
        </div>
    </div>
</div>
<!--==============================
Popup Search Box
============================== -->
<div class="popup-search-box d-none d-lg-block  ">
    <button class="searchClose border-theme text-theme"><i class="fal fa-times"></i></button>
    <form action="#">
        <input type="text" class="border-theme" placeholder="What are you looking for">
        <button type="submit"><i class="fal fa-search"></i></button>
    </form>
</div>
<!--========================
Sticky Header
========================-->
<div class="sticky-header-wrap sticky-header py-1 py-sm-2 py-lg-1">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-5 col-md-3">
                <div class="logo">
                    <a href="index.php"><img src="assets/img/logo.png" alt="logo"></a>
                </div>
            </div>
            <div class="col-7 col-md-9 text-right">
                <nav class="main-menu menu-sticky1 onepage-nav d-none d-lg-block link-inherit mobile-menu-active">
                    <ul>
                        <li><a href="#">Домой</a></li>
                        <li><a href="#menu">Меню</a></li>
                        <li><a href="#about">О нас</a></li>
                        <li><a href="#app">Приложение</a></li>
                        <li><a href="#blog">Блог</a></li>
                    </ul>
                </nav>
                <button class="vs-menu-toggle text-theme border-theme d-inline-block d-lg-none"><i
                            class="far fa-bars"></i></button>
            </div>
        </div>
    </div>
</div>
<!--==============================
Mobile Menu
============================== -->
<div class="vs-menu-wrapper" style="">
    <div class="vs-menu-area">
        <button class="vs-menu-toggle text-theme"><i class="fal fa-times"></i></button>
        <div class="mobile-logo">
            <a href="index.html"><img src="assets/img/logo.png" alt="logo"></a>
        </div>
        <div class="vs-mobile-menu link-inherit" style="">
            <ul>
                <li class="menu-item-has-children vs-item-has-children">
                    <a href="index.html" class="vs-mean-expand">Home</a>
                    <ul class="sub-menu vs-submenu" style="display: none;">
                        <li><a href="index.html">Home Style 1</a></li>
                        <li><a href="index-2.html">Home Style 2</a></li>
                        <li><a href="index-3.html">Home Style 3</a></li>
                        <li><a href="index-4.html">Home Style 4</a></li>
                        <li><a href="index-5.html">Home Style 5</a></li>
                        <li><a href="index-6.html">Home Style 6</a></li>
                        <li><a href="index-7.html">Home Style 7</a></li>
                        <li><a href="index-8.html">Home Style 8</a></li>
                        <li><a href="index-9.html">Home Style 9</a></li>
                        <li><a href="index-onepage.html">Home Style 1 (One Page)</a></li>
                        <li><a href="index-2-onepage.html">Home Style 2 (One Page)</a></li>
                        <li><a href="index-3-onepage.html">Home Style 3 (One Page)</a></li>
                        <li><a href="index-4-onepage.html">Home Style 4 (One Page)</a></li>
                        <li><a href="index-5-onepage.html">Home Style 5 (One Page)</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children vs-item-has-children">
                    <a href="about.html" class="vs-mean-expand">About</a>
                    <ul class="sub-menu vs-submenu" style="display: none;">
                        <li><a href="about.html">About One</a></li>
                        <li><a href="about-2.html">About Two</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children vs-item-has-children">
                    <a href="blog.html" class="vs-mean-expand">Blog</a>
                    <ul class="sub-menu vs-submenu" style="display: none;">
                        <li><a href="blog.html">Blog</a></li>
                        <li><a href="blog-sidebar.html">Blog Sidebar</a></li>
                        <li><a href="blog-left-sidebar.html">Blog Left Sidebar</a></li>
                        <li><a href="blog-grid.html">Blog Grid</a></li>
                        <li><a href="blog-grid-2.html">Blog Grid Two</a></li>
                        <li><a href="blog-grid-sidebar.html">Blog Grid Sidebar</a></li>
                        <li><a href="blog-grid-left-sidebar.html">Blog Grid Left Sidebar</a></li>
                        <li><a href="blog-details.html">Blog Details</a></li>
                        <li><a href="blog-details-sidebar.html">Blog Details Sidebar</a></li>
                        <li><a href="blog-details-left-sidebar.html">Blog Details Left Sidebar</a></li>
                    </ul>
                </li>
                <li class="mega-menu-wrap menu-item-has-children vs-item-has-children">
                    <a href="#" class="vs-mean-expand">Pages</a>
                    <ul class="mega-menu vs-submenu" style="display: none;">
                        <li class="vs-item-has-children"><a href="shop.html" class="vs-mean-expand">Pagelist 1</a>
                            <ul class="vs-submenu" style="display: none;">
                                <li><a href="index.html">Home Style 1</a></li>
                                <li><a href="index-2.html">Home Style 2</a></li>
                                <li><a href="index-3.html">Home Style 3</a></li>
                                <li><a href="index-4.html">Home Style 4</a></li>
                                <li><a href="index-5.html">Home Style 5</a></li>
                                <li><a href="index-6.html">Home Style 6</a></li>
                                <li><a href="index-7.html">Home Style 7</a></li>
                                <li><a href="index-onepage.html">Home Style 1 (One Page)</a></li>
                                <li><a href="index-2-onepage.html">Home Style 2 (One Page)</a></li>
                                <li><a href="index-3-onepage.html">Home Style 3 (One Page)</a></li>
                                <li><a href="index-4-onepage.html">Home Style 4 (One Page)</a></li>
                                <li><a href="index-5-onepage.html">Home Style 5 (One Page)</a></li>
                                <li><a href="about.html">About One</a></li>
                                <li><a href="about-2.html">About Two</a></li>
                            </ul>
                        </li>
                        <li class="vs-item-has-children"><a href="#" class="vs-mean-expand">Pagelist 2</a>
                            <ul class="vs-submenu" style="display: none;">
                                <li><a href="chef.html">Chef One</a></li>
                                <li><a href="chef-2.html">Chef Two</a></li>
                                <li><a href="chef-details.html">Chef Details</a></li>
                                <li><a href="menu.html">Menu One</a></li>
                                <li><a href="menu-2.html">Menu Two</a></li>
                                <li><a href="menu-3.html">Menu Three</a></li>
                                <li><a href="menu-4.html">Menu Four</a></li>
                                <li><a href="menu-details.html">Menu Details</a></li>
                                <li><a href="reservation.html">Reservation</a></li>
                                <li><a href="reservation-2.html">Reservation Two</a></li>
                                <li><a href="contact.html">Contact One</a></li>
                            </ul>
                        </li>
                        <li class="vs-item-has-children"><a href="#" class="vs-mean-expand">Pagelist 3</a>
                            <ul class="vs-submenu" style="display: none;">
                                <li><a href="contact-2.html">Contact Two</a></li>
                                <li><a href="blog.html">Blog</a></li>
                                <li><a href="blog-sidebar.html">Blog Sidebar</a></li>
                                <li><a href="blog-left-sidebar.html">Blog Left Sidebar</a></li>
                                <li><a href="blog-grid.html">Blog Grid</a></li>
                                <li><a href="blog-grid-2.html">Blog Grid Two</a></li>
                                <li><a href="blog-grid-sidebar.html">Blog Grid Sidebar</a></li>
                                <li><a href="blog-grid-left-sidebar.html">Blog Grid Left Sidebar</a></li>
                                <li><a href="blog-details.html">Blog Details</a></li>
                                <li><a href="blog-details-sidebar.html">Blog Details Sidebar</a></li>
                                <li><a href="blog-details-left-sidebar.html">Blog Details Left Sidebar</a></li>
                            </ul>
                        </li>
                        <li class="vs-item-has-children"><a href="#" class="vs-mean-expand">Pagelist 4</a>
                            <ul class="vs-submenu" style="display: none;">
                                <li><a href="shop.html">Shop</a></li>
                                <li><a href="shop-sidebar.html">Shop Sidebar</a></li>
                                <li><a href="shop-left-sidebar.html">Shop Left Sidebar</a></li>
                                <li><a href="shop-details.html">Shop Details</a></li>
                                <li><a href="shop-details-sidebar.html">Shop Details Sidebar</a></li>
                                <li><a href="shop-details-left-sidebar.html">Shop Details Left Sidebar</a></li>
                                <li><a href="checkout.html">Checkout</a></li>
                                <li><a href="cart.html">Cart</a></li>
                                <li><a href="login.html">Sign In</a></li>
                                <li><a href="sign-up.html">Sign Up</a></li>
                                <li><a href="error.html">Error Page</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="menu-item-has-children vs-item-has-children">
                    <a href="contact.html" class="vs-mean-expand">Contact</a>
                    <ul class="sub-menu vs-submenu" style="display: none;">
                        <li><a href="contact.html">Contact One</a></li>
                        <li><a href="contact-2.html">Contact Two</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- Menu Will Append With Javascript -->
    </div>
</div>
<!--==============================
    Header Area
==============================-->
<header class="header-wrapper header-layout2 position-absolute py-10 py-lg-30 px-xl-115">
    <div class="container-fluid position-relative">
        <div class="row align-items-center">
            <div class="col-6 col-md-3 col-lg-2 col-xl-2">
                <div class="header-logo">
                    <a href="index.php"><img src="assets/img/logo-white.png" alt="Logo" class="d-none d-lg-block"></a>
                    <a href="index.php"><img src="assets/img/logo.png" alt="Logo" class="d-block d-lg-none"></a>
                </div>
            </div>
            <div class="col-6 col-md-9 col-lg-7 col-xl-5 position-static">
                <nav class="main-menu menu-style4 link-inherit text-right text-xl-left mobile-menu-active onepage-nav">
                    <ul>
                        <li><a href="#">Домой</a></li>
                        <li><a href="#menu">Меню</a></li>
                        <li><a href="#about">О нас</a></li>
                        <li><a href="#app">Приложение</a></li>
                        <li><a href="#blog">Блог</a></li>
                    </ul>
                </nav>
                <button type="button" class="vs-menu-toggle ml-auto d-block text-theme border-theme d-lg-none"><i
                            class="far fa-bars"></i></button>
            </div>
            <div class="col-lg-3 col-xl-5">
                <div class="header-right d-none d-lg-flex align-items-center justify-content-end">
                    <div class="contact-info media align-items-center d-none d-xl-flex">
                        <div class="media-icon mr-15 pl-30" data-overlay="white" data-opacity="1">
                            <i class="fal fa-clock text-white fa-2x"></i>
                        </div>
                        <div class="media-body">
                            <span class="text-white-light">Заказ по телефону</span>
                            <p class="mb-0 h4 text-font1 text-white"><a href="tel:88005553535"><strong>8 800 555 35
                                        35</strong></a></p>
                        </div>
                    </div>
                    <div class="header-btn pl-lg-50">
                        <a href="#" class="icon-btn text-red mr-15 searchBoxTggler"><i class="fal fa-search"></i></a>
                        <a href="#" class="icon-btn text-red sideMenuToggler cart-btn getBasket"><span
                                    class="number bg-theme">9</span><i class="fal fa-shopping-cart"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!--==============================
    Hero Area
==============================-->
<section class="vs-hero-wrapper vs-hero-layout5  ">
    <div class="vs-hero-carousel  navprevnext-white navbuttons-white" data-height="860px" data-slidertype="fullwidth"
         data-container="1280" data-navprevnext="true">
        <div class="hero-shape1 ani-moving-x d-none d-xl-block"><img src="assets/img/hero/chille.png" alt="Chille">
        </div>
        <div class="vs-hero-slide ls-slide" data-ls="duration: 70000; transition2d: 5;">
            <img src="assets/img/hero/hero-img-5-bg-1.png" alt="Slide Image" class="ls-bg">
            <img src="assets/img/hero/hero-img-5-1.png" alt="Hero Image" class="ls-l" style="left: 670px; top: 220px;"
                 data-ls="offsetyin: top; durationin: 800; delayin: 0; easingin:easeOutQuint; offsetyout: bottom; durationout: 1000;">
            <p class="ls-l theme-font3 ls-responsive" data-ls-mobile="top: 150px; font-size: 82px;"
               data-ls-desktop="top: 317px; font-size: 48px;"
               style="left: 60px; font-family: 'Bonjour Mon Ami RUS', cursive; color: #ffe119;"
               data-ls="offsetxin: -200; durationin: 1000; delayin: 0; easingin:easeOutQuint; offsetxout: -50; durationout: 1000;">
                Вкусная еда</p>
            <h1 class="ls-l ls-responsive" data-ls-mobile="top: 250px; font-size: 100px;"
                data-ls-desktop="top: 372px; font-size: 80px;" style="left: 60px;  color: #fff; "
                data-ls="offsetxin: -200; durationin: 1000; delayin: 300; easingin:easeOutQuint; offsetxout: -50; durationout: 1000;">
                Для хорошего</h1>
            <h1 class="ls-l ls-responsive" data-ls-mobile="top: 380px; font-size: 100px;"
                data-ls-desktop="top: 462px; font-size: 80px;" style="left: 60px;  color: #fff; "
                data-ls="offsetxin: -200; durationin: 1000; delayin: 600; easingin:easeOutQuint; offsetxout: -50; durationout: 1000;">
                настроения</h1>
            <div class="hero-btn ls-l ls-responsive"
                 data-ls-mobile="top: 545px; width: 480px; height: 150px; line-height: 150px; font-size: 42px;"
                 data-ls-tablet="top: 582px; width: 280px; height: 80px; line-height: 80px; font-size: 22px;"
                 data-ls-desktop="top: 582px; width: 206px; height: 60px; line-height: 60px; font-size: 14px;"
                 style="left: 60px;  overflow: hidden; border-radius: 50px;  "
                 data-ls="delayin: 1100; showinfo:1; durationin:2000; easingin:easeOutExpo; scalexin:0.9; scaleyin:0.9; scalexout:1.1; scaleyout: 1.1; fadein:true; fadeout: true; transformoriginin:50% 143.8% 0;">
            </div>
        </div>
        <div class="vs-hero-slide ls-slide" data-ls="duration: 7000; transition2d: 5;">
            <img src="assets/img/hero/hero-img-5-bg-1.png" alt="Slide Image" class="ls-bg">
            <img src="assets/img/hero/hero-img-5-2.png" alt="Hero Image" class="ls-l" style="left: 620px; top: 250px;"
                 data-ls="offsetyin: top; durationin: 800; delayin: 0; easingin:easeOutQuint; offsetyout: bottom; durationout: 1000;">
            <p class="ls-l theme-font3 ls-responsive" data-ls-mobile="top: 150px; font-size: 82px;"
               data-ls-desktop="top: 317px; font-size: 48px;"
               style="left: 60px; font-family: 'Bonjour Mon Ami RUS', cursive; color: #ffe119;"
               data-ls="offsetxin: -200; durationin: 1000; delayin: 0; easingin:easeOutQuint; offsetxout: -50; durationout: 1000;">
                Вкусная еда</p>
            <h1 class="ls-l ls-responsive" data-ls-mobile="top: 250px; font-size: 100px;"
                data-ls-desktop="top: 372px; font-size: 80px;" style="left: 60px; color: #fff;"
                data-ls="offsetxin: -200; durationin: 1000; delayin: 300; easingin:easeOutQuint; offsetxout: -50; durationout: 1000;">
                Прямо</h1>
            <h1 class="ls-l ls-responsive" data-ls-mobile="top: 380px; font-size: 100px;"
                data-ls-desktop="top: 462px; font-size: 80px;" style="left: 60px; color: #fff;"
                data-ls="offsetxin: -200; durationin: 1000; delayin: 600; easingin:easeOutQuint; offsetxout: -50; durationout: 1000;">
                из печи</h1>
            <div class="hero-btn ls-l  ls-responsive"
                 data-ls-mobile="top: 545px; width: 480px; height: 150px; line-height: 150px; font-size: 42px;"
                 data-ls-tablet="top: 582px; width: 280px; height: 80px; line-height: 80px; font-size: 22px;"
                 data-ls-desktop="top: 582px; width: 206px; height: 60px; line-height: 60px; font-size: 14px;"
                 style="left: 60px;  overflow: hidden; border-radius: 50px;  "
                 data-ls="delayin: 1100; showinfo:1; durationin:2000; easingin:easeOutExpo; scalexin:0.9; scaleyin:0.9; scalexout:1.1; scaleyout: 1.1; fadein:true; fadeout: true; transformoriginin:50% 143.8% 0;">
            </div>
        </div>
        <div class="vs-hero-slide ls-slide" data-ls="duration: 7000; transition2d: 5;">
            <img src="assets/img/hero/hero-img-5-bg-1.png" alt="Slide Image" class="ls-bg">
            <img src="assets/img/hero/hero-img-5-3.png" alt="Hero Image" class="ls-l" style="left: 640px; top: 220px;"
                 data-ls="offsetyin: top; durationin: 800; delayin: 0; easingin:easeOutQuint; offsetyout: bottom; durationout: 1000;">
            <p class="ls-l theme-font3 ls-responsive" data-ls-mobile="top: 150px; font-size: 82px;"
               data-ls-desktop="top: 317px; font-size: 48px;"
               style="left: 60px; font-family: 'Bonjour Mon Ami RUS', cursive; color: #ffe119;"
               data-ls="offsetxin: -200; durationin: 1000; delayin: 0; easingin:easeOutQuint; offsetxout: -50; durationout: 1000;">
                Вкусная еда</p>
            <h1 class="ls-l ls-responsive" data-ls-mobile="top: 250px; font-size: 100px;"
                data-ls-desktop="top: 372px; font-size: 80px;" style="left: 60px; color: #fff;"
                data-ls="offsetxin: -200; durationin: 1000; delayin: 300; easingin:easeOutQuint; offsetxout: -50; durationout: 1000;">
                Натуральные</h1>
            <h1 class="ls-l ls-responsive" data-ls-mobile="top: 380px; font-size: 100px;"
                data-ls-desktop="top: 462px; font-size: 80px;" style="left: 60px; color: #fff;"
                data-ls="offsetxin: -200; durationin: 1000; delayin: 600; easingin:easeOutQuint; offsetxout: -50; durationout: 1000;">
                продукты</h1>
            <div class="hero-btn ls-l  ls-responsive"
                 data-ls-mobile="top: 545px; width: 480px; height: 150px; line-height: 150px; font-size: 42px;"
                 data-ls-tablet="top: 582px; width: 280px; height: 80px; line-height: 80px; font-size: 22px;"
                 data-ls-desktop="top: 582px; width: 206px; height: 60px; line-height: 60px; font-size: 14px;"
                 style="left: 60px;  overflow: hidden; border-radius: 50px;  "
                 data-ls="delayin: 1100; showinfo:1; durationin:2000; easingin:easeOutExpo; scalexin:0.9; scaleyin:0.9; scalexout:1.1; scaleyout: 1.1; fadein:true; fadeout: true; transformoriginin:50% 143.8% 0;">
            </div>
        </div>
    </div>
</section>
<!--==============================
Food Box Area
==============================-->
<section
        class="vs-food-box-wrapper position-relative food-box-layout1 link-inherit background-image pt-lg-150 pb-lg-120 pb-30"
        data-vs-img="assets/img/food-menu/food-menu-bg-img-1-1.jpg" data-overlay="white" data-opacity="8" id="menu"
        style="background-image: url(&quot;assets/img/food-menu/food-menu-bg-img-1-1.jpg&quot;);">
    <span class="shape1 position-absolute ani-moving"><i class="flaticon-berries icon-6x" data-opacity="1"></i></span>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11 col-lg-9 col-xl-7">
                <div class="section-title text-center ">
                    <span class="sec-subtitle text-theme h3 mt-3">Кто попробует, тот полюбит!</span>
                    <h2 class="sec-title1">Наше Меню</h2>
                    <p class="sec-text text-md">Спонсор хорошего настроения!</p>
                    <div class="sec-line">
                        <img src="assets/img/shape/sec-title-1.png" alt="Section Shape Icon">
                    </div>
                </div>
            </div>
        </div>
        <div class="food-menu-wrapper food-menu-style1 list-style-none text-center pb-lg-50 pb-20">
            <ul class="nav nav-tabs d-block border-0" role="tablist" id="categories">
            </ul>
        </div>
        <div class="tab-content" id="foodTabContent">
        </div>
    </div>
</section>
<!--==============================
About Area
==============================-->
<section class="vs-about-wrapper vs-about-layout7 position-relative pb-lg-130 pb-60 pt-5" id="about">
    <div class="vs-container">
        <div class="row">
            <div class="col-lg-8">
                <div class="section-title text-start">
                    <span class="sec-subtitle text-theme h3">О нас</span>
                    <h2 class="sec-title1">ТАМ, ГДЕ КАЧЕСТВЕННАЯ ЕДА СОЧЕТАЕТСЯ С ОТЛИЧНЫМ ОБСЛУЖИВАНИЕМ.</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 col-lg-6">
                <p class="about-text mb-xl-30">
                    Добро пожаловать в Gastro Pizza Sochy — новое место в центре Сочи, где вы можете насладиться вкусной
                    пиццей, сочными бургерами, хрустящей картошкой фри и нежными наггетсами. Мы также предлагаем
                    доставку через Яндекс.Еду, чтобы вы могли наслаждаться нашими блюдами где угодно.
                    Заходите к нам, чтобы провести время в приятной атмосфере с друзьями и семьёй, или заказывайте
                    доставку и наслаждайтесь нашей едой дома или в офисе. Мы всегда рады новым гостям и постоянным
                    клиентам!
                </p>
                <p class="about-text mb-xl-45">
                    Gastro Pizza Sochy — вкусные моменты каждый день!
                </p>
            </div>
            <div class="col-xl-4 col-lg-6">
                <div class="features-area pl-lg-20 pl-xl-40">
                    <div class="media align-items-center mb-40">
                        <div class="media-icon pr-15 pr-lg-20">
                                <span>
                                    <img src="assets/img/about/about-icon-1-1.svg" alt="about-icon">
                                </span>
                        </div>
                        <div class="media-body">
                            <h3 class="food-title">Быстрая еда</h3>
                            <p class="mb-0">Вкусные пиццы, бургеры, картошка фри и наггетсы готовятся быстро для вашего
                                удобства.</p>
                        </div>
                    </div>
                    <div class="media align-items-center mb-40">
                        <div class="media-icon pr-15 pr-lg-20">
                                <span>
                                    <img src="assets/img/about/about-icon-1-2.svg" alt="about-icon">
                                </span>
                        </div>
                        <div class="media-body">
                            <h3 class="food-title">Самые свежие продукты</h3>
                            <p class="mb-0">Мы используем только свежие ингредиенты для создания наших блюд.</p>
                        </div>
                    </div>
                    <div class="media align-items-center">
                        <div class="media-icon pr-15 pr-lg-20">
                                <span>
                                    <img src="assets/img/about/about-icon-1-3.svg" alt="about-icon">
                                </span>
                        </div>
                        <div class="media-body">
                            <h3 class="food-title">Онлайн Заказы</h3>
                            <p class="mb-0">Заказывайте легко через Яндекс.Еду и наслаждайтесь нашими блюдами где
                                угодно.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-5 col-lg-12">
                <div class="about-img pt-5">
                    <script type="text/javascript" charset="utf-8" async
                            src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Afe6016d880f89ad047a0f0e5bd6ca58ce55539fdd739c9d746e163f91ebae3f1&amp;width=100%25&amp;height=530&amp;lang=ru_RU&amp;scroll=true"></script>
                </div>
                <div class="about-shep2 ani-moving-y">
                    <img src="./assets/img/shape/dote-shep1.svg" alt="dote-shep">
                </div>
            </div>
        </div>
    </div>
</section>
<!--==============================
    Promotional Banner Area
==============================-->
<div class="vs-promotional-banner2 pt-lg-115 pt-60 pb-lg-120 pb-60" id="app">
    <div class="vs-container">
        <div class="banner-box">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <div class="banner-content">
                        <h2 class="banner-title">Скачайте наше приложение &amp; <span>Заказывайте онлайн</span> с
                            доставкой
                        </h2>
                        <p class="banner-text">мы мигом будем у вас!</p>
                        <div class="vs-btn-group">
                            <a class="vs-btn" href="#">
                                <img src="assets/img/banner/google-play.svg" alt="banner">
                            </a>
                            <a class="vs-btn" href="#">
                                <img src="assets/img/banner/app-store.svg" alt="banner">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="banner-img">
                        <img src="assets/img/banner/banner-img-1.png" alt="banner-img">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="food-box-shep3 ani-moving-y">
        <img src="./assets/img/bg/food-bg-2.png" alt="dote-shep">
    </div>
</div>
<!--==============================
    Promotional Banner
==============================-->
<div class="vs-promotional-banner position-relative pb-lg-130 pb-60" id="blog">
    <div class="vs-container background-image position-relative" data-vs-img="assets/img/bg/banner-bg1.png"
         style="background-image: url(&quot;assets/img/bg/banner-bg1.png&quot;);">
        <div class="row align-items-center">
            <div class="col-lg-4">
                <div class="banner-images">
                    <div class="banner-img mega-hover">
                        <a href="#" class="">
                            <img src="assets/img/banner/banner-img-1-1.jpg" alt="banner">
                        </a>
                    </div>
                    <div class="banner-img mega-hover">
                        <a href="#">
                            <img src="assets/img/banner/banner-img-1-2.jpg" alt="banner">
                        </a>
                    </div>
                </div>
                <div class="banner-images">
                    <div class="banner-img mega-hover">
                        <a href="#" class="">
                            <img src="assets/img/banner/banner-img-1-3.jpg" alt="banner">
                        </a>
                    </div>
                    <div class="banner-img mega-hover">
                        <a href="#">
                            <img src="assets/img/banner/banner-img-1-4.jpg" alt="banner">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="section-title text-center">
                    <div class="sec-line">
                        <img src="assets/img/shape/instagram.svg" alt="instagram">
                    </div>
                    <h2 class="sec-title1 text-white">Follow @domain.com</h2>
                    <!-- <h2 class="sec-title1 text-white">Our Best Deals To Choose</h2> -->
                </div>
            </div>
            <div class="col-lg-4">
                <div class="banner-images">
                    <div class="banner-img mega-hover">
                        <a href="#" class="">
                            <img src="assets/img/banner/banner-img-1-5.jpg" alt="banner">
                        </a>
                    </div>
                    <div class="banner-img mega-hover">
                        <a href="#">
                            <img src="assets/img/banner/banner-img-1-6.jpg" alt="banner">
                        </a>
                    </div>
                </div>
                <div class="banner-images">
                    <div class="banner-img mega-hover">
                        <a href="#" class="">
                            <img src="assets/img/banner/banner-img-1-7.jpg" alt="banner">
                        </a>
                    </div>
                    <div class="banner-img mega-hover">
                        <a href="#">
                            <img src="assets/img/banner/banner-img-1-8.jpg" alt="banner">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--==============================
        Footer Area
==============================-->
<footer class="footer-wrapper footer-layout1 dark-footer bg-black">
    <div class="footer-widget-wrapper footer-widget-layout1 pt-40 pt-lg-100 pb-10 pb-lg-60  background-image"
         data-vs-img="assets/img/bg/bg-3.jpg">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-4 col-xl-4">
                    <div class="widget pt-0">
                        <h3 class="widget_title text-20">О нас</h3>
                        <div class="vs-widget-about">
                            <p class="widget-about-text mb-30 lh-32 pr-xl-5">Gastro Pizza Sochy — вкусные моменты каждый
                                день!</p>
                            <div class="social-links links-has-border">
                                <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-4">
                    <div class="widget pt-0">
                        <h3 class="widget_title text-20">Наши контакты</h3>
                        <div class="vs-widget-about">
                            <p class="widget-about-text">Адрес: Краснодарский край, Сочи, микрорайон Бытха, улица Бытха,
                                41/30</p>
                            <p class="widget-about-text">Телефон: 8 800 555 35 35</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-copyright py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-5 text-center text-xl-left">
                    <p class="mb-0">Copyright <i class="fal fa-copyright"></i> 2022 <a href="index.php"
                                                                                       class="text-bold text-white">Grillino</a>
                        - All rights reserved by <a href="https://themeforest.net/user/vecuro_themes"
                                                    class="text-bold text-white">Vecuro</a>.</p>
                </div>
                <div class="col-xl-2 text-center d-none d-xl-block">
                    <div class="footer-logo">
                        <a href="index.php"><img src="assets/img/logo-white.png" alt="Logo"></a>
                    </div>
                </div>
                <div class="col-xl-5 text-right d-none d-xl-block">
                    <ul class="footer-bottom-menu list-style-none">
                        <li><a href="#">Terms & Conditions</a></li>
                        <li><a href="#">Refund Policy</a></li>
                        <li><a href="#">Support</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--==============================
Sidemenu
============================== -->
<div class="sidemenu-wrapper">
    <div class="sidemenu-content">
        <button class="closeButton border-theme text-theme bg-theme-hover sideMenuCls"><i class="far fa-times"></i>
        </button>
        <div class="widget woocommerce widget_shopping_cart">
            <h3 class="widget_title">Корзина</h3>
            <div class="widget_shopping_cart_content">
                <ul class="woocommerce-mini-cart cart_list product_list_widget" id="product_list_widget">
                    {{--                    <li class="woocommerce-mini-cart-item mini_cart_item">--}}
                    {{--                        <a href="#" class="remove remove_from_cart_button"><i class="far fa-times"></i></a href="#">--}}
                    {{--                        <a href="#"><img src="assets/img/cart/cart-img-1-1.jpg" alt="Cart Image">Hot Burger</a>--}}
                    {{--                        <span class="quantity">1 ×--}}
                    {{--                                <span class="woocommerce-Price-amount amount">--}}
                    {{--                                    <span class="woocommerce-Price-currencySymbol">$</span>40.00</span>--}}
                    {{--                            </span>--}}
                    {{--                    </li>--}}
                </ul>
                <p class="woocommerce-mini-cart__total total" id="total">
                    {{--                    <strong>Subtotal:</strong>--}}
                    {{--                    <span class="woocommerce-Price-amount amount">--}}
                    {{--                            <span class="woocommerce-Price-currencySymbol">$</span>318.00</span>--}}
                </p>
                <p class="woocommerce-mini-cart__buttons buttons">
                    <button class="vs-btn style1 wc-forward clear-basket">Очистить</button>
                    <button class="vs-btn style1 checkout wc-forward">Оплатить</button>
                </p>
            </div>
        </div>
    </div>
</div>
<!-- Модальное окно -->
<div class="modal fade bd-example-modal" id="exampleModalCenter" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h3 class="modal-title" id="exampleModalLongTitle">Варианты товара:</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body row d-flex justify-content-around" id="modal-body">
                <h5 id="compound"></h5>
                <div>
                    <nav>
                        <div class="nav nav-tabs justify-content-center food-menu-style3" id="nav-tab"
                             role="tablist"></div>
                    </nav>
                    <div class="tab-content d-flex justify-content-center" id="nav-tabContent"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--********************************
        Code End  Here
******************************** -->

<!-- Scroll Top Top Button -->
<a href="#" class="scrollToTop icon-btn bg-theme border-before-theme"><i class="far fa-angle-up"></i></a>

<!--==============================
    All Js File
============================== -->
<!-- Jquery -->
<script src="assets/js/vendor/jquery.min.js"></script>
<script src="assets/js/vendor/jquery-migrate-3.0.0.min.js"></script>
<!-- Slick Slider -->
<!-- <script src="assets/js/app.min.js"></script> -->
<script src="assets/js/slick.min.js"></script>
<!-- Bootstrap -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- Layer Slider -->
<script src="assets/js/greensock.min.js"></script>
<script src="assets/js/layerslider.kreaturamedia.jquery.js"></script>
<script src="assets/js/layerslider.transitions.js"></script>
<!-- Counter js -->
<script src="assets/js/jquery.counterup.min.js"></script>
<script src="assets/js/waypoints.min.js"></script>
<!-- Date Picker -->
<script src="assets/js/jquery.datetimepicker.min.js"></script>
<!-- Magnific Popup -->
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<!-- Nice Select -->
<script src="assets/js/jquery.nice-select.min.js"></script>
<!-- Custom Carousel -->
<script src="assets/js/vscustom-carousel.min.js"></script>
<!-- Mobile Menu -->
<script src="assets/js/vsmenu.min.js"></script>
<!-- Form Js -->
<script src="assets/js/ajax-mail.js"></script>
<!-- Google Map js -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDC3Ip9iVC0nIxC6V14CKLQ1HZNF_65qEQ "></script>
<!-- Main Js File -->
<script src="assets/js/main.js"></script>

{{--Отображение меню с разбивкой блюд по категориям--}}
<script>
    $(document).ready(function () {
        // Функция для обработки данных из AJAX ответа
        function handleResponse(response) {
            $.each(response.response, function (key, value) {
                // Добавление категорий в навигацию
                let categoryNavHtml = `
                    <li><a class="vs-btn mask-style3" id="category_${value.category.id}-tab" data-toggle="tab" href="#category_${value.category.id}" role="tab"
                       aria-controls="category_${value.category.id}" aria-selected="false">${value.category.name}</a></li>
                `;
                $('#categories').append(categoryNavHtml);

                // Добавление контейнеров для категорий
                let categoryContentHtml = `
                    <div class="tab-pane fade" id="category_${value.category.id}" aria-labelledby="category_${value.category.id}-tab">
                        <div class="row" id="items_category_${value.category.id}">
                        </div>
                    </div>
                `;
                $('#foodTabContent').append(categoryContentHtml);

                // Добавление элементов меню в соответствующие категории
                $.each(value.items, function (key2, item) {
                    let itemHtml = `
                        <div class="col-sm-6 vs-food-box">
                            <div class="media pt-40 align-items-stretch d-block d-lg-flex">
                                <div class="media-thumb">
                                    <img src="${item.picture}" alt="Food Menu Image">
                                </div>
                                <div class="media-body px-lg-35 d-flex align-items-center">
                                    <div class="food-content w-100 m-3">
                                        <h3 class="food-title text-lg mb-0 getVariants">${item.name}</h3>
                                        <p class="food-text mb-0 text-xs">${item.description}</p>
                                        <span class="food-rating-icon text-theme text-md"><i class="fas fa-star"></i></span>
                                        <button type="button" class="vs-btn mask-style3 getVariants m-2" data-toggle="modal"
                                                data-target="#exampleModalCenter" data-name="${item.id}">
                                            Выбрать
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                    $(`#items_category_${value.category.id}`).append(itemHtml);
                });
            });

            // Установка активного состояния для первой категории и контента
            $('#categories li:first-child a').addClass('active').attr('aria-selected', 'true');
            $('#foodTabContent .tab-pane:first-child').addClass('show active');
        }

        // Выполнение AJAX запроса
        $.ajax({
            type: 'POST',
            url: "api/clients/items/list",
            success: handleResponse,
            error: function (xhr, status, error) {
                console.error('Ошибка при выполнении запроса:', status, error);
            }
        });
    });
</script>

{{--Отображение модального окна с вариантами блюда--}}
<script>
    $(document).ready(function () {
        $(document).on('click', '.getVariants', function () {
            let item_id = $(this).data('name'); // Получение ID элемента из атрибута data-name

            // AJAX запрос для получения вариантов блюда
            $.ajax({
                type: 'POST',
                url: `api/clients/items/get/${item_id}`,
                success: function (response) {
                    let variants = response.response.variants;
                    let item = response.response.item;

                    // Очистка старых данных перед добавлением новых
                    $('#nav-tab').empty();
                    $('#nav-tabContent').empty();

                    // Добавление вариантов блюда
                    $.each(variants, function (index, value) {
                        let nav_item_class = index === 0 ? 'nav-item nav-link active small border-0' : 'nav-item nav-link small border-0';
                        let tab_pane_class = index === 0 ? 'tab-pane fade show active mt-4' : 'tab-pane fade mt-4';

                        let nav_variant = `
                            <a class="${nav_item_class}" id="nav-${value.id}-tab" data-toggle="tab" data-name="${value.id}" href="#nav-${value.id}"
                               role="tab" aria-controls="nav-${value.id}" aria-selected="${index === 0}">${value.name}</a>
                        `;

                        let tab_variant = `
                            <div class="${tab_pane_class}" id="nav-${value.id}" role="tabpanel" aria-labelledby="nav-${value.id}-tab">
                                <img style="width: 300px" class="m-2" src="${value.picture}" alt="pizza-size">
                                <p></p>
                                <button type="button" class="vs-btn mask-style1 ml-2 add-to-basket" style="width: 300px" data-name="${value.id}">В корзину за ${value.price} ₽</button>
                            </div>
                        `;

                        $('#nav-tab').append(nav_variant);
                        $('#nav-tabContent').append(tab_variant);
                    });

                    // Обновление заголовка модального окна и описания
                    $('#exampleModalLongTitle').html(`<h5 class="modal-title mt-2 ml-2">${item.name}</h5>`);
                    $('#compound').html(`<h5 class="ml-4 mr-4 small">${item.description}</h5>`);
                },
                error: function (xhr, status, error) {
                    // Обработчик ошибок
                    console.error('Ошибка при выполнении запроса:', status, error);
                    alert('Произошла ошибка при загрузке данных. Пожалуйста, попробуйте позже.');
                }
            });
        });
    });
</script>

{{--Отображение корзины--}}
<script>
    $(document).ready(function () {
        $(document).on('click', '.getBasket', function () {
            // Выполнение AJAX запроса
            $.ajax({
                type: 'POST',
                url: `api/clients/basket/get`,
                success: function (response) {
                    let total = 0

                    // Очистка старых данных перед добавлением новых
                    $('#product_list_widget').empty();
                    $('#total').empty();
                    // Добавление вариантов блюд
                    $.each(response.response, function (key, value) {
                        let html = `
                        <li class="woocommerce-mini-cart-item mini_cart_item">
                            <button type="button" class="close remove-from-basket" data-name="${value.item_variant.id}">
                                &times;
                            </button>
                            <a><img src="${value.item.picture}" alt="Cart Image">${value.item.name} ${value.item_variant.name}</a>
                            <span class="quantity">${value.quantity} ×
                            <span class="woocommerce-Price-amount amount">
                            <span class="woocommerce-Price-currencySymbol">${value.item_variant.price}</span>₽</span>
                            </span>
                        </li>
                        `
                        total = total + value.item_variant.price * value.quantity

                        $('#product_list_widget').append(html);
                    })

                    let totalHtml = `
                    <strong>Итого:</strong>
                    <span class="woocommerce-Price-amount amount">
                            <span class="woocommerce-Price-currencySymbol">${total}</span>₽</span>
                    `

                    $('#total').append(totalHtml);
                },
                error: function (xhr, status, error) {
                    console.error('Ошибка при выполнении запроса:', status, error);
                }
            });
        })
    })
</script>

{{--Добавление товара в корзину--}}
<script>
    $(document).ready(function () {
        $(document).on('click', '.add-to-basket', function () {
            let itemVariantId = $(this).data('name');
            let quantity = 1; // Количество товара, можно сделать динамическим
            $.ajax({
                type: 'POST',
                url: `api/clients/basket/add/${itemVariantId}`,
                data: {
                    quantity: quantity
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    alert('Товар успешно добавлен в корзину');
                    console.log(response);
                },
                error: function (xhr, status, error) {
                    console.error('Ошибка при добавлении товара в корзину:', status, error);
                    alert('Произошла ошибка при добавлении товара в корзину. Пожалуйста, попробуйте позже.');
                }
            });
        });
    });
</script>

{{--Удаление товара из корзины--}}
<script>
    $(document).on('click', '.remove-from-basket', function () {
        let itemVariantId = $(this).attr('data-name');
        console.log(itemVariantId)
        $.ajax({
            type: 'POST',
            url: `api/clients/basket/remove/${itemVariantId}`,
            success: function (response) {
                alert('Товар удален из корзины');
                console.log(response);
            },
            error: function (xhr, status, error) {
                console.error('Ошибка при удалении товара из корзины:', status, error);
                alert('Произошла ошибка при удалении товара из корзины. Пожалуйста, попробуйте позже.');
            }
        });
    });
</script>

{{--Очистка корзины--}}
<script>
    $(document).ready(function () {
        $(document).on('click', '.clear-basket', function () {
            $.ajax({
                type: 'POST',
                url: `api/clients/basket/clear`,
                success: function (response) {
                    alert('Корзина очищена');
                    console.log(response);
                },
                error: function (xhr, status, error) {
                    console.error('Ошибка при очистке корзины:', status, error);
                    alert('Произошла ошибка при очистке корзины. Пожалуйста, попробуйте позже.');
                }
            });
        });
    });
</script>

{{--mobile basket--}}
<script>
    $(document).ready(function () {
        // бургерное меню у мобильной версии
        $('body > header > div > div > div.col-6.col-md-9.col-lg-7.col-xl-5.position-static > button').on('click', function () {
            let $target = $('body > div.vs-menu-wrapper');

            if ($target.hasClass('vs-body-visible')) {
                $target.removeClass('vs-body-visible');
            } else {
                $target.addClass('vs-body-visible');
            }

            //крестик в мобильной версии у меню
            $('body > div.vs-menu-wrapper.vs-body-visible > div > button').unbind().on('focus', function () {
                $('body > div.vs-menu-wrapper').removeClass('vs-body-visible');
            })
        })
    })
</script>

</body>

</html>