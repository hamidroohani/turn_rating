<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title>پرتال نوبت دهی پزشکان</title>
    <!--

    Template 2081 Solution

    http://www.tooplate.com/view/2081-solution

    -->
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">

    <!-- animate -->
    <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- font-awesome -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <!-- google font -->
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700,800' rel='stylesheet' type='text/css'>
    <!-- custom -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style-1.css') }}">

    <!-- jQuery -->
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <!-- bootstrap -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- isotope -->
    <script src="{{ asset('js/isotope.js') }}"></script>
    <!-- images loaded -->
    <script src="{{ asset('js/imagesloaded.min.js') }}"></script>
    <!-- wow -->
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <!-- smoothScroll -->
    <script src="{{ asset('js/smoothscroll.js') }}"></script>
    <!-- jquery flexslider -->
    <script src="{{ asset('js/jquery.flexslider.js') }}"></script>
    <!-- custom -->
    <script src="{{ asset('js/custom.js') }}"></script>

    <style>
        @font-face {
            font-family: BRoya;
            src: url('{{asset('/css/fonts/BRoya.ttf')}}');
        }

        body{
            font-family: BRoya;
        }
        .alert {
            position: fixed;
            width: 250px;
            left: 10px;
            bottom: 10px;
            z-index: 10;
        }

        td {
            text-align: center;
        }

        thead > tr > th{
            text-align: center;
        }

    </style>
    <script>
        $(function () {
            $('.alert').delay(3000).slideUp(3000);
        });
    </script>

</head>
<body data-spy="scroll" data-offset="50" data-target=".navbar-collapse">

<!-- start navigation -->
<div class="navbar navbar-fixed-top navbar-default" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
            </button>
            <a href="#" class="navbar-brand"><img src="images/logo.png" class="img-responsive" alt="logo"></a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#home" class="smoothScroll"><b>خانه</b></a></li>
                <li><a href="#service" class="smoothScroll"><b>اخذ نوبت</b></a></li>
                <li><a href="#about" class="smoothScroll"><b>پیگیری نوبت ها</b></a></li>
                <li><a href="#team" class="smoothScroll"><b>پزشکان</b></a></li>
                <li><a href="#pricing" class="smoothScroll"><b>کلینیک</b></a></li>
                <li><a href="#portfolio" class="smoothScroll"></a></li>
                <li><a href="#contact" class="smoothScroll"><b>درباره ما</b></a></li>
            </ul>
        </div>
    </div>
</div>
<!-- end navigation -->

<!-- start home -->
<section id="home" class="text-center">
    <div class="templatemo_headerimage">
        <div class="flexslider">
            <ul class="slides">
                <li>
                    <img src="{{ asset('img/docy2.png') }}" alt="Slide 1">
                    <div class="slider-caption">
                        <div class="templatemo_homewrapper" style="color: #1b4b72">
                            <h1 class="wow fadeInDown" data-wow-delay="2000">Solution Company</h1>
                            <h2 class="wow fadeInDown" data-wow-delay="2000">
                                <span>WE DESIGN &AMP; CODE WEBSITES</span>
                            </h2>
                            <a href="#service" class="smoothScroll btn btn-default wow fadeInDown" data-wow-delay="2000">Our Work</a>
                        </div>
                    </div>
                </li>
                <li>
                    <img src="{{ asset('img/docy3.jpg') }}" alt="Slide 2">
                    <div class="slider-caption">
                        <div class="templatemo_homewrapper" style="color: #1b4b72">
                            <h1 class="wow fadeInDown" data-wow-delay="2000">Flex Slider, CSS Flexbox</h1>
                            <h2 class="wow fadeInDown" data-wow-delay="2000">
                                <span>work on all modern browsers, Works on IE 10+</span>
                            </h2>
                            <p>see caniuse.com for browser compatibility information</p>
                            <a href="#about" class="smoothScroll btn btn-default wow fadeInDown" data-wow-delay="2000">See about us</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</section>
<!-- end home -->

<!-- start service -->
<div id="service">
    @yield('content-1')
</div>
<!-- end service -->

<!-- start divider -->
<div id="divider">
    <div class="container">
        <div class="row">
            <div class="col-md-1 col-sm-1"></div>
            <div class="col-md-8 col-sm-8">
                <h2 class="wow bounce">We provide <strong>solutions</strong></h2>
                <h3 class="wow fadeIn" data-wow-delay="0.6s"><mark>Creative</mark> Designers &amp; <mark>Talented</mark> Developers</h3>
                <p class="wow fadeInUp" data-wow-delay="0.9s">Nulla ultricies bibendum augue et molestie. Suspendisse pellentesque mollis imperdiet. Quisque sodales laoreet tincidunt. Phasellus ut mi orci. Vivamus id odio ac justo tincidunt placerat. Nulla facilisi. Vivamus et dolor urna. Sed vestibulum urna justo, nec malesuada urna aliquet et.</p>
            </div>
            <div class="col-md-2 col-sm-2"></div>
        </div>
    </div>
</div>
<!-- end divider -->

<!-- start about -->
<div id="about">
    @yield('content-2')
</div>
<!-- end about -->

<!-- start team -->
<div id="team">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="wow bounce">Meet the team</h2>
            </div>
            <div class="col-md-4 col-sm-4 wow fadeIn" data-wow-delay="0.3s">
                <img src="images/team1.jpg" class="img-responsive" alt="team img">
                <h4>Director</h4>
                <h3>JULIA</h3>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy.</p>
                <ul class="social-icon text-center">
                    <li><a href="#" class="wow fadeInUp fa fa-facebook" data-wow-delay="2s"></a></li>
                    <li><a href="#" class="wow fadeInDown fa fa-twitter" data-wow-delay="2s"></a></li>
                    <li><a href="#" class="wow fadeIn fa fa-instagram" data-wow-delay="2s"></a></li>
                    <li><a href="#" class="wow fadeInUp fa fa-pinterest" data-wow-delay="2s"></a></li>
                </ul>
            </div>
            <div class="col-md-4 col-sm-4 wow fadeIn" data-wow-delay="0.6s">
                <img src="images/team2.jpg" class="img-responsive" alt="team img">
                <h4>Developer</h4>
                <h3>MARY</h3>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy.</p>
                <ul class="social-icon text-center">
                    <li><a href="#" class="wow fadeInUp fa fa-facebook" data-wow-delay="2s"></a></li>
                    <li><a href="#" class="wow fadeInDown fa fa-twitter" data-wow-delay="2s"></a></li>
                    <li><a href="#" class="wow fadeIn fa fa-instagram" data-wow-delay="2s"></a></li>
                    <li><a href="#" class="wow fadeInUp fa fa-pinterest" data-wow-delay="2s"></a></li>
                </ul>
            </div>
            <div class="col-md-4 col-sm-4 wow fadeIn" data-wow-delay="0.9s">
                <img src="images/team3.jpg" class="img-responsive" alt="team img">
                <h4>Manager</h4>
                <h3>LINDA</h3>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy.</p>
                <ul class="social-icon text-center">
                    <li><a href="#" class="wow fadeInUp fa fa-facebook" data-wow-delay="2s"></a></li>
                    <li><a href="#" class="wow fadeInDown fa fa-twitter" data-wow-delay="2s"></a></li>
                    <li><a href="#" class="wow fadeIn fa fa-instagram" data-wow-delay="2s"></a></li>
                    <li><a href="#" class="wow fadeInUp fa fa-pinterest" data-wow-delay="2s"></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- end team -->

<!-- start newsletter -->
<div id="newsletter">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="title">
                    <h2 class="wow bounce">Get our newsletter!</h2>
                    <p class="wow fadeIn" data-wow-delay="0.6s">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy.</p>
                </div>
                <form action="#" method="get" class="wow fadeInUp" data-wow-delay="0.9s">
                    <div class="col-md-3 col-sm-3"></div>
                    <div class="col-md-4 col-sm-4">
                        <input name="email" type="email" class="form-control" id="email" placeholder="Enter your email">
                    </div>
                    <div class="col-md-2 col-sm-2">
                        <input name="submit" type="submit" class="form-control" id="submit" value="Sign Up">
                    </div>
                    <div class="col-md-3 col-sm-3"></div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end newsletter -->

<!-- start pricing -->
<div id="pricing" class="text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-12 wow bounce">
                <h2>Our Pricing</h2>
            </div>
            <div class="col-sm-6 col-md-3 wow fadeInLeft" data-wow-delay="0.6s">
                <div class="plan plan_one">
                    <h4 class="plan_title">Basic</h4>
                    <ul>
                        <li>$20 per month</li>
                        <li>100GB Storage</li>
                        <li>1,000GB Transfer</li>
                        <li>10 Bootstrap Themes</li>
                        <li>24-hr support</li>
                    </ul>
                    <button class="btn btn-warning">SIGN UP</button>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 wow fadeInUp" data-wow-delay="0.9s">
                <div class="plan plan_two">
                    <h4 class="plan_title">Standard</h4>
                    <ul>
                        <li>$40 per month</li>
                        <li>300GB Storage</li>
                        <li>3,000GB Transfer</li>
                        <li>30 Bootstrap Themes</li>
                        <li>12-hr response</li>
                    </ul>
                    <button class="btn btn-warning">SIGN UP</button>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 wow fadeInDown" data-wow-delay="1s">
                <div class="plan plan_three">
                    <h4 class="plan_title">Professional</h4>
                    <ul>
                        <li>$60 per month</li>
                        <li>600GB Storage</li>
                        <li>6,000GB Transfer</li>
                        <li>60 Premium Themes</li>
                        <li>1-hr response</li>
                    </ul>
                    <button class="btn btn-warning">SIGN UP</button>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 wow fadeInRight" data-wow-delay="1.3s">
                <div class="plan plan_four">
                    <h4 class="plan_title">Advanced</h4>
                    <ul>
                        <li>$80 per month</li>
                        <li>1,000GB Storage</li>
                        <li>10TB Premium</li>
                        <li>80 Premium Themes</li>
                        <li>15-min response</li>
                    </ul>
                    <button class="btn btn-warning">SIGN UP</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end pricing -->

<!-- start portfolio -->
<div id="portfolio">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="wow bounce">Recent Projects</h2>
                <div class="iso-section wow fadeIn" data-wow-delay="0.6s">

                    <ul class="filter-wrapper clearfix">
                        <li><a href="#" data-filter="*" class="selected opc-main-bg">All</a></li>
                        <li><a href="#" class="opc-main-bg" data-filter=".graphic">Graphic</a></li>
                        <li><a href="#" class="opc-main-bg" data-filter=".photoshop">Photoshop</a></li>
                        <li><a href="#" class="opc-main-bg" data-filter=".wallpaper">Wallpaper</a></li>
                    </ul>

                    <div class="iso-box-section">
                        <div class="iso-box-wrapper col4-iso-box">

                            <div class="iso-box graphic photoshop wallpaper col-md-4 col-sm-6 col-xs-12">
                                <div class="portfolio-thumb">
                                    <img src="images/portfolio-img1.jpg" class="fluid-img" alt="portfolio img">
                                    <div class="portfolio-overlay">
                                        <a href="#" class="fa fa-search"></a>
                                        <a href="#" class="fa fa-link"></a>
                                        <h4>Project title</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonumm.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="iso-box graphic wallpaper col-md-4 col-sm-6 col-xs-12">
                                <div class="portfolio-thumb">
                                    <img src="images/portfolio-img2.jpg" class="fluid-img" alt="portfolio img">
                                    <div class="portfolio-overlay">
                                        <a href="#" class="fa fa-search"></a>
                                        <a href="#" class="fa fa-link"></a>
                                        <h4>Project title</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonumm.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="iso-box wallpaper col-md-4 col-sm-6 col-xs-12">
                                <div class="portfolio-thumb">
                                    <img src="images/portfolio-img3.jpg" class="fluid-img" alt="portfolio img">
                                    <div class="portfolio-overlay">
                                        <a href="#" class="fa fa-search"></a>
                                        <a href="#" class="fa fa-link"></a>
                                        <h4>Project title</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonumm.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="iso-box graphic col-md-4 col-sm-6 col-xs-12">
                                <div class="portfolio-thumb">
                                    <img src="images/portfolio-img4.jpg" class="fluid-img" alt="portfolio img">
                                    <div class="portfolio-overlay">
                                        <a href="#" class="fa fa-search"></a>
                                        <a href="#" class="fa fa-link"></a>
                                        <h4>Project title</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonumm.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="iso-box wallpaper col-md-4 col-sm-6 col-xs-12">
                                <div class="portfolio-thumb">
                                    <img src="images/portfolio-img5.jpg" class="fluid-img" alt="portfolio img">
                                    <div class="portfolio-overlay">
                                        <a href="#" class="fa fa-search"></a>
                                        <a href="#" class="fa fa-link"></a>
                                        <h4>Project title</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonumm.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="iso-box graphic photoshop col-md-4 col-sm-6 col-xs-12">
                                <div class="portfolio-thumb">
                                    <img src="images/portfolio-img6.jpg" class="fluid-img" alt="portfolio img">
                                    <div class="portfolio-overlay">
                                        <a href="#" class="fa fa-search"></a>
                                        <a href="#" class="fa fa-link"></a>
                                        <h4>Project title</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonumm.</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- end portfolio -->

<!-- start contact -->
<div id="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-4 wow fadeInLeft" data-wow-delay="0.6s">
                <h2><strong>Solution</strong> Co.</h2>
                <p>Quisque at elit sapien. Sed velit enim, fringilla non suscipit quis, tristique et turpis. Proin vitae nisi justo.</p>
                <ul class="social-icon">
                    <li><a href="#" class="fa fa-facebook"></a></li>
                    <li><a href="#" class="fa fa-twitter"></a></li>
                    <li><a href="#" class="fa fa-instagram"></a></li>
                </ul>
            </div>
            <div class="col-md-3 col-sm-4 wow fadeIn" data-wow-delay="0.9s">
                <address>
                    <h3>Visit Office</h3>
                    <p><i class="fa fa-map-marker too-icon"></i> 123 Walking Street, New York</p>
                    <p><i class="fa fa-phone too-icon"></i> 010-010-0220</p>
                    <p><i class="fa fa-envelope-o too-icon"></i> hello@company.com</p>
                </address>
            </div>
            <form action="#" method="post" class="col-md-6 col-sm-4" id="contact-form" role="form">
                <div class="col-md-6 col-sm-12 wow fadeIn" data-wow-delay="0.3s">
                    <input name="name" type="text" class="form-control" id="name" placeholder="Name">
                </div>
                <div class="col-md-6 col-sm-12 wow fadeIn" data-wow-delay="0.3s">
                    <input name="email" type="email" class="form-control" id="email" placeholder="Email">
                </div>
                <div class="col-md-12 col-sm-12 wow fadeIn" data-wow-delay="0.9s">
                    <textarea name="message" rows="5" class="form-control" id="message" placeholder="Message"></textarea>
                </div>
                <div class="col-md-offset-9 col-md-3 col-sm-6 wow fadeIn" data-wow-delay="0.3s">
                    <input name="submit" type="submit" class="form-control" id="submit" value="Send">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end contact -->

<!-- start google map -->
<div class="google_map">
    <div id="map-canvas"></div>
</div>
<!-- end google map -->

<!-- start footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-7">
                <p>Copyright &copy; 2016 Solution Company</p>
                <small>Designed by <a rel="nofollow" href="http://www.tooplate.com" target="_parent">Tooplate</a></small>
            </div>
            <div class="col-md-4 col-sm-5">
                <ul class="social-icon">
                    <li><a href="#" class="fa fa-facebook"></a></li>
                    <li><a href="#" class="fa fa-twitter"></a></li>
                    <li><a href="#" class="fa fa-instagram"></a></li>
                    <li><a href="#" class="fa fa-pinterest"></a></li>
                    <li><a href="#" class="fa fa-google"></a></li>
                    <li><a href="#" class="fa fa-github"></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- end footer -->
@if(Session()->has('msg'))
    <div class="alert alert-success dir_rtl"><b>{{Session('msg')}}</b></div>
@endif
@if(Session()->has('dang_msg'))
    <div class="alert alert-danger dir_rtl"><b>{{Session('dang_msg')}}</b></div>
@endif
@if(count($errors))
    <div class="alert alert-danger dir_rtl">Error:{{$errors->first()}}</div>
@endif



</body>
</html>