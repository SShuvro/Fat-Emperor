<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Fat Emperor</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ URL::asset('public/frontend/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="{{ URL::asset('public/frontend/assets/https://fonts.googleapis.com/css?family=Poppins') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('public/frontend/assets/vendor/fontawesome/css/all.css') }}">



    <link rel="stylesheet" href="{{ URL::asset('public/frontend/assets/vendor/revolution/css/revolution.all.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('public/frontend/assets/vendor/revolution/css/revolution.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('public/frontend/assets/vendor/aos/css/aos.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('public/frontend/assets/vendor/jquery/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('public/frontend/assets/vendor/jquery/jquery.timepicker.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('public/frontend/assets/vendor/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('public/frontend/assets/vendor/lightGallery/css/lightgallery.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('public/frontend/assets/css/main.css') }}">

    <!-- Modernizr -->
    <script src="{{URL::asset('public/frontend/assets/vendor/modernizr.js') }}"></script>
    <script src="https://kit.fontawesome.com/c5c6af0c15.js" crossorigin="anonymous"></script>

    <style>
        .menuImage{
            width: 100px;
            height: auto;
        }
    </style>

</head>

<body id="page-top">
    <!-- Start  Loading Mask-->
    <div id="mask">
        <div class="material-icon">
            <div class="spinner">
                <div class="right-side">
                    <div class="bar"></div>
                </div>
                <div class="left-side">
                    <div class="bar"></div>
                </div>
            </div>
            <div class="spinner color-2">
                <div class="right-side">
                    <div class="bar"></div>
                </div>
                <div class="left-side">
                    <div class="bar"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Loading Mask-->

    <!-- Navigation -->
    <header class="container-fluid header js-header-fixsmall overlayer-fixed">
        <!-- Start Navbar-->
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row justify-content-between">
                    <div class="col-auto">
                        <a class="navbar-brand" href="{{route('index.view')}}"><img src="{{URL::asset('public/frontend/assets/img/demo/logos/fatEmperor_white.png') }}" alt=""></a>
                        <a class="navbar-brand black" href="{{route('index.view')}}" ><img src="{{URL::asset('public/frontend/assets/img/demo/logos/fatEmperor.png') }}" alt="" style="width: 47px; height: auto;"></a>
                    </div>
                    <div class="d-flex justify-content-center onlydesktop">
                        <ul class="navbar">
                            <li><a href="#section-home" class="animatedScroll nav-link active">Home</a></li>
                            <li><a class="animatedScroll nav-link" href="#section-specialities">About</a></li>
                            <li><a class="animatedScroll nav-link" href="#section-menu">Menu</a></li>
                            <li><a class="animatedScroll nav-link" href="#section-gallery" onclick="chgMas1(3)">Gallery</a></li>
                            <li><a class="animatedScroll nav-link" href="#section-teamSection">Team</a></li>
                            <li><a class="animatedScroll nav-link" href="#section-booking">Contact</a></li>
                        </ul>
                    </div>
                    <div class="d-flex justify-content-end">
                        <ul class="navbar float-right onlydesktop">
                            <li><a class="bt-orange bt-menu-reserve animatedScroll" href="#section-booking">Reservation</a></li>
                            <li><a class="fb-ic mr-3" href="/http://www.facebook.com" target="_blank" role="button"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a class="tw-ic mr-3" href="/http://www.tripadvisor.com" target="_blank" role="button"><i class="fab fa-instagram"></i></a></li>
                            <li><a class="tw-ic mr-3" href="/http://www.twitter.com" role="button"><i class="fab fa-twitter"></i></a></li>
                        </ul>
                        <div class="col">
                            <ul class="navbar float-right">
                                <li class="hambuger onlyresponsive">
                                    <button id="trigger-overlay" class="trigger-overlay dropdown-icon"><span></span></button>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="overlay overlay-hugeinc">
            <div class="overlay-content"><span class="trigger-overlay"></span>
                <nav id="nav">
                    <ul>
                        <li class="current"><a href="#section-home" class="animatedScroll">Home</a></li>
                        <li><a href="#section-specialities" class="animatedScroll">About</a></li>
                        <li><a href="#section-menu" class="animatedScroll">Menu</a></li>
                        <li><a href="#section-gallery" class="animatedScroll">Gallery</a></li>
                        <li><a href="#section-teamSection" class="animatedScroll">Team</a></li>
                        <li><a href="#section-booking" class="animatedScroll">Contact</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- End Navbar-->
    </header>

        <!-- Hero Section  Start -->
        <section id="section-home" class="slider slide-overlay-black">
            <!-- START REVOLUTION -->
            <div class="rev_slider_wrapper">
                <div id="slider1" class="rev_slider" data-version="5.0">
                    <ul>
    
                        <li data-description="Slide Description" data-easein="default" data-easeout="default" data-fsmasterspeed="1500" data-fsslotamount="7" data-fstransition="fade" data-hideafterloop="0" data-hideslideonmobile="off" data-index="rs-1689" data-masterspeed="default"
                            data-param1="" data-param10="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-rotate="0" data-saveperformance="off" data-slotamount="default" data-thumb="img/demo/slider-design/sliderbg1.jpg') }}"
                            data-title="Slide Title" data-transition="slotfade-horizontal">
                            <img alt="" class="rev-slidebg" data-bgfit="cover" data-bgparallax="10" data-bgposition="center center" data-bgrepeat="no-repeat" data-no-retina="" src="{{URL::asset('public/frontend/assets/img/demo/slider-design/sliderbg1.jpg') }}">
    
                            <div class="tp-caption" data-x="['center']" data-hoffset="['15','135','15','15']" data-voffset="['-80']" data-x="['center']" data-y="['middle','middle','middle','middle']" data-textalign="['center']" data-frames='[{"from":"opacity: 0;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:50px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"opacity: 1;auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'>
                                <h2>Welcome to Fat Emperor</h2>
                            </div>
    
                            <div class="tp-caption" data-x="['center']" data-hoffset="['15','135','15','15']" data-voffset="['0']" data-x="['center']" data-y="['middle','middle','middle','middle']" data-textalign="['center']" data-frames='[{"from":"opacity: 0;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:50px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"opacity: 1;auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'>
                                <p class="title">Eat Healthy and Natural Food</p>
                            </div>
    
                            <div class="tp-caption" data-responsive_offset="on" data-x="['center']" data-hoffset="['15','135','15','15']" data-voffset="['100']" data-x="['center']" data-y="['middle','middle','middle','middle']" data-textalign="['center']" data-frames='[{"from":"opacity: 0;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:50px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"opacity: 1;auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'>
                                <p class="description">Fat Emperor is a restaurant, bar and coffee roastery located on London. We have awesome<br> recipes and the most talented chefs in town.</p>
                            </div>
    
                            <div class="tp-caption" data-responsive_offset="on" data-type="text" data-height="none" data-width="['1170','1170','1170','420']" data-whitespace="normal" data-voffset="['200']" data-x="['center']" data-y="['middle','middle','middle','middle']" data-textalign="['center']"
                                data-frames='[{"from":"opacity: 0;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"opacity: 1;auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'>
                                <div class="btns-box">
                                    <a href="#section-menu" class="animatedScroll theme-btn btn-style-one bt-orange">OUR MENU</a>
                                    <a href="#section-specialities" class="animatedScroll theme-btn btn-style-one bt-default">ABOUT US</a>
                                </div>
                            </div>
                        </li>
    
                        <li data-description="Slide Description" data-easein="default" data-easeout="default" data-fsmasterspeed="1500" data-fsslotamount="7" data-fstransition="fade" data-hideafterloop="0" data-hideslideonmobile="off" data-index="rs-1688" data-masterspeed="default"
                            data-param1="" data-param10="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-rotate="0" data-saveperformance="off" data-slotamount="default" data-thumb="img/demo/slider-design/sliderbg2.jpg') }}"
                            data-title="Slide Title" data-transition="slotfade-horizontal">
                            <img alt="" class="rev-slidebg" data-bgfit="cover" data-bgparallax="10" data-bgposition="center center" data-bgrepeat="no-repeat" data-no-retina="" src="{{URL::asset('public/frontend/assets/img/demo/slider-design/sliderbg2.jpg') }}">
    
                            <div class="tp-caption" data-x="['center']" data-hoffset="['15','135','15','15']" data-voffset="['-80']" data-x="['center']" data-y="['middle','middle','middle','middle']" data-textalign="['center']" data-frames='[{"from":"opacity: 0;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:50px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"opacity: 1;auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'>
                                <h2>Welcome to Fat Emperor</h2>
                            </div>
    
                            <div class="tp-caption" data-x="['center']" data-hoffset="['15','135','15','15']" data-voffset="['0']" data-x="['center']" data-y="['middle','middle','middle','middle']" data-textalign="['center']" data-frames='[{"from":"opacity: 0;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:50px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"opacity: 1;auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'>
                                <p class="title">The Best Delicious Food</p>
                            </div>
    
                            <div class="tp-caption" data-x="['center']" data-hoffset="['15','135','15','15']" data-voffset="['100']" data-x="['center']" data-y="['middle','middle','middle','middle']" data-textalign="['center']" data-frames='[{"from":"opacity: 0;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:50px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"opacity: 1;auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'>
                                <p class="description">Fat Emperor is a restaurant, bar and coffee roastery located on London. We have awesome<br> recipes and the most talented chefs in town.</p>
                            </div>
    
                            <div class="tp-caption" data-responsive_offset="on" data-type="text" data-height="none" data-width="['1170','1170','1170','420']" data-whitespace="normal" data-voffset="['200']" data-x="['center']" data-y="['middle','middle','middle','middle']" data-textalign="['center']"
                                data-frames='[{"from":"opacity: 0;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"opacity: 1;auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'>
                                <div class="btns-box">
                                    <a href="#section-menu" class="animatedScroll theme-btn btn-style-one bt-orange">OUR MENU</a>
                                    <a href="#section-specialities" class="animatedScroll theme-btn btn-style-one bt-default">ABOUT US</a>
                                </div>
                            </div>
                        </li>
    
                        <li data-description="Slide Description" data-easein="default" data-easeout="default" data-fsmasterspeed="1500" data-fsslotamount="7" data-fstransition="fade" data-hideafterloop="0" data-hideslideonmobile="off" data-index="rs-1687" data-masterspeed="default"
                            data-param1="" data-param10="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-rotate="0" data-saveperformance="off" data-slotamount="default" data-thumb="img/demo/slider-design/sliderbg3.jpg') }}"
                            data-title="Slide Title" data-transition="slotfade-horizontal">
                            <img alt="" class="rev-slidebg" data-bgfit="cover" data-bgparallax="10" data-bgposition="center center" data-bgrepeat="no-repeat" data-no-retina="" src="{{URL::asset('public/frontend/assets/img/demo/slider-design/sliderbg3.jpg') }}">
    
                            <div class="tp-caption" data-x="['center']" data-hoffset="['15','135','15','15']" data-voffset="['-80']" data-x="['center']" data-y="['middle','middle','middle','middle']" data-textalign="['center']" data-frames='[{"from":"opacity: 0;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:50px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"opacity: 1;auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'>
                                <h2>Welcome to Fat Emperor</h2>
                            </div>
    
                            <div class="tp-caption" data-x="['center']" data-hoffset="['15','135','15','15']" data-voffset="['0']" data-x="['center']" data-y="['middle','middle','middle','middle']" data-textalign="['center']" data-frames='[{"from":"opacity: 0;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:50px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"opacity: 1;auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'>
                                <p class="title">Eat Healthy and Natural Food</p>
                            </div>
    
                            <div class="tp-caption" data-x="['center']" data-hoffset="['15','135','15','15']" data-voffset="['100']" data-x="['center']" data-y="['middle','middle','middle','middle']" data-textalign="['center']" data-frames='[{"from":"opacity: 0;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:50px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"opacity: 1;auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'>
                                <p class="description">Fat Emperor is a restaurant, bar and coffee roastery located on London. We have awesome<br> recipes and the most talented chefs in town.</p>
                            </div>
    
                            <div class="tp-caption" data-responsive_offset="on" data-type="text" data-height="none" data-width="['1170','1170','1170','420']" data-whitespace="normal" data-voffset="['200']" data-x="['center']" data-y="['middle','middle','middle','middle']" data-textalign="['center']"
                                data-frames='[{"from":"opacity: 0;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"opacity: 1;auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'>
                                <div class="btns-box">
                                    <a href="#section-menu" class="animatedScroll theme-btn btn-style-one bt-orange">OUR MENU</a>
                                    <a href="#section-specialities" class="animatedScroll theme-btn btn-style-one bt-default">ABOUT US</a>
                                </div>
                            </div>
                        </li>
    
                        <li data-description="Slide Description" data-easein="default" data-easeout="default" data-fsmasterspeed="1500" data-fsslotamount="7" data-fstransition="fade" data-hideafterloop="0" data-hideslideonmobile="off" data-index="rs-1686" data-masterspeed="default"
                            data-param1="" data-param10="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-rotate="0" data-saveperformance="off" data-slotamount="default" data-thumb="img/demo/slider-design/sliderbg4.jpg') }}"
                            data-title="Slide Title" data-transition="slotfade-horizontal">
                            <img alt="" class="rev-slidebg" data-bgfit="cover" data-bgparallax="10" data-bgposition="center center" data-bgrepeat="no-repeat" data-no-retina="" src="{{URL::asset('public/frontend/assets/img/demo/slider-design/sliderbg4.jpg') }}">
    
                            <div class="tp-caption" data-x="['center']" data-hoffset="['15','135','15','15']" data-voffset="['-80']" data-x="['center']" data-y="['middle','middle','middle','middle']" data-textalign="['center']" data-frames='[{"from":"opacity: 0;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:50px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"opacity: 1;auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'>
                                <h2>Welcome to  Fat Emperor</h2>
                            </div>
    
                            <div class="tp-caption" data-x="['center']" data-hoffset="['15','135','15','15']" data-voffset="['0']" data-x="['center']" data-y="['middle','middle','middle','middle']" data-textalign="['center']" data-frames='[{"from":"opacity: 0;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:50px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"opacity: 1;auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'>
                                <p class="title">The Best Delicious Food</p>
                            </div>
    
                            <div class="tp-caption" data-x="['center']" data-hoffset="['15','135','15','15']" data-voffset="['100']" data-x="['center']" data-y="['middle','middle','middle','middle']" data-textalign="['center']" data-frames='[{"from":"opacity: 0;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:50px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"opacity: 1;auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'>
                                <p class="description">Fat Emperor is a restaurant, bar and coffee roastery located on London. We have awesome<br> recipes and the most talented chefs in town.</p>
                            </div>
    
                            <div class="tp-caption" data-responsive_offset="on" data-type="text" data-height="none" data-width="['1170','1170','1170','420']" data-whitespace="normal" data-voffset="['200']" data-x="['center']" data-y="['middle','middle','middle','middle']" data-textalign="['center']"
                                data-frames='[{"from":"opacity: 0;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"opacity: 1;auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'>
                                <div class="btns-box">
                                    <a href="#section-menu" class="animatedScroll theme-btn btn-style-one bt-orange">OUR MENU</a>
                                    <a href="#section-specialities" class="animatedScroll theme-btn btn-style-one bt-default">ABOUT US</a>
                                </div>
                            </div>
                        </li>
    
                    </ul>
                </div>
                <!-- END REVOLUTION SLIDER -->
            </div>
            <!-- END OF SLIDER WRAPPER -->
            <a class="scroll-down animatedScroll" href="#section-specialities"><span></span></a>
        </section>
        <!-- Hero Section End -->
    
        <div class="voffset-131 big"></div>

    @yield('section')
    
     <!-- Booking Section Start -->
     <section id="section-booking" class="section booking">
        <div class="row justify-content-md-center">
            <div class="col-12">
                <div class="voffset-90"></div>
                <div class="container">
                    <div class="row ">
                        <div class="col-lg-12" data-aos-id="booking-section">
                            <!--<h4 class="small medium white">Let’s</h4>-->
                            <h4 class="white title">Book a Table</h4>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="#section-booking" method="post" id="bookingform" class="booking-form row">
                                <div class="form-group col-lg-4">
                                    <label for="input-date">Date <span><img alt=""  src="{{URL::asset('public/frontend/assets/img/demo/particles/arrow.svg') }}"/></span></label>
                                    <input name="date" type="text" class="form-control datepicker" id="input-date" placeholder="15-01-2019">
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="input-time">Time <span><img alt=""  src="{{URL::asset('public/frontend/assets/img/demo/particles/arrow.svg') }}"/></span></label>
                                    <input name="time" type="text" class="form-control timepicker" id="input-time" placeholder="08:30 PM">
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="input-persons">Guest <span><img alt=""  src="{{URL::asset('public/frontend/assets/img/demo/particles/arrow.svg') }}"/></span></label>
                                    <input name="persons" type="text" class="form-control" id="input-persons" placeholder="6 people">
                                </div>
                                <div class="voffset-20"></div>
                                <div class="form-group col-lg-12">
                                    <input name="email" type="text" class="form-control" id="input-email" placeholder="Your email address">
                                </div>
                                <div class="voffset-40"></div>
                                <div class="form-group col-lg-12">
                                    <button type="submit" value="" class="bt-orange left">Booking Now <span><img alt=""  src="{{URL::asset('public/frontend/assets/img/demo/particles/arrow.svg') }}"/></span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="voffset-100"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- Booking Section End -->

     <!-- Footer Section Start -->
     <footer>
        <div class="voffset-50"></div>
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="row justify-content-between">
                            <div class="col-auto">
                                <a href="{{route('index.view')}}"><img class="logo" src="{{URL::asset('public/frontend/assets/img/demo/logos/logo-slider-white.png') }}" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="voffset-50"></div>
                    <div class="col-footer-1">
                        <h4>About us</h4>
                        <p>The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog.</p>
                    </div>
                    <div class="col-footer-2">
                        <h4>Get News & Offers</h4>
                        <form action="#" method="post" id="newsform" class="booking-form">
                            <div class="form-group ">
                                <label for="input-news"></label>
                                <input name="date" type="text" class="form-control" id="input-news" placeholder="Enter your email">
                                <button type="submit" value="" class="bt-orange"><span class="left0"><img alt=""  src="{{URL::asset('public/frontend/assets/img/demo/particles/arrow.svg') }}"/></span></button>
                            </div>
                            <div class="voffset-50"></div>

                        </form>
                    </div>
                    <div class="col-lg-5 col-footer-3 footer-contact">
                        <h4>Contact</h4>
                        <p>
                            <span>677 Main Drive</span>
                            <span>+00 123 456 7890</span>
                            <span>North Canton, OH 44720</span>
                            <span><a href="mailto:info@fatemperor.com">info@fatemperor.com</a></span>
                            <span class="margintop">Monday - Wednesday </span>
                            <span class="margintop">Wednesday - Sunday </span>
                            <span>7:00 - 9:00PM</span>
                            <span>8:00 - 10:30PM</span>
                        </p>
                    </div>
                </div>
                <div class="voffset-50"></div>
            </div>
            <div class="container-fluid">
                <div class="col-12 copyright">
                    <div class="voffset-20"></div>
                    <div class="row">
                        <p>Copyright 2019 Jellythemes</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Booking Section End -->

    <!-- Bootstrap core JavaScript -->
    <script src="{{ URL::asset('public/frontend/assets/vendor/jquery/jquery.js') }}"></script>
    <script src="{{ URL::asset('public/frontend/assets/vendor/jquery/jquery-ui.js') }}"></script>
    <script src="{{ URL::asset('public/frontend/assets/vendor/jquery/jquery.timepicker.js') }}"></script>
    <script src="{{ URL::asset('public/frontend/assets/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>

    <!-- Revolution Slider -->
    <script src="{{ URL::asset('public/frontend/assets/vendor/revolution/js/jquery.themepunch.tools.min.js?rev=5.0') }}"></script>
    <script src="{{ URL::asset('public/frontend/assets/vendor/revolution/js/jquery.themepunch.revolution.min.js?rev=5.0') }}"></script>
    <script src="{{ URL::asset('public/frontend/assets/vendor/revolution/js/extensions/revolution.extensions.all.js') }}"></script>

    <!-- Animation On Screen -->
    <script src="{{ URL::asset('public/frontend/assets/vendor/aos/js/aos.js') }}"></script>

    <!-- Slick Slider -->
    <script src="{{ URL::asset('public/frontend/assets/vendor/slick/slick.js') }}"></script>

    <!-- Masonry -->
    <script src="{{ URL::asset('public/frontend/assets/vendor/masonry/js/isotope.pkgd.js') }}"></script>

    <!-- LightGallery -->
    <script src="{{ URL::asset('public/frontend/assets/vendor/lightGallery/js/lightgallery.js') }}"></script>

    <!-- Custom scripts for this template -->
    <script src="{{ URL::asset('public/frontend/assets/js/main.js') }}"></script>

</body>

</html>