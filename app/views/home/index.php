<?php $this->lang->load('home');?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html lang="en" class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html lang="en" class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html lang="en" class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Always force latest IE rendering engine -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Meta Keyword -->
    <meta name="keywords" content="one page, business template, single page, onepage, responsive, parallax, creative, business, html5, css3, css3 animation">
    <!-- meta character set -->
    <meta charset="utf-8">

    <!-- Site Title -->
    <title>Smart Tailoring</title>

        <!--
        Google Fonts
        ============================================= -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700" rel="stylesheet" type="text/css">

        <!--
        CSS
        ============================================= -->
        <!-- Fontawesome -->
        <link rel="stylesheet" href="<?php echo base_url('res/css/font-awesome.min.css');?>">

        <!-- Bootstrap -->
        <link rel="stylesheet" href="<?php echo base_url('res/css/bootstrap.min.css');?>">
        <!-- Fancybox -->
        <link rel="stylesheet" href="<?php echo base_url('res/css/jquery.fancybox.css');?>">
        <!-- owl carousel -->
        <link rel="stylesheet" href="<?php echo base_url('res/css/owl.carousel.css');?>">
        <!-- Animate -->
        <link rel="stylesheet" href="<?php echo base_url('res/css/animate.css');?>">
        <!-- Main Stylesheet -->
        <link rel="stylesheet" href="<?php echo base_url('res/css/main.css');?>">
        <!-- Main Responsive -->
        <link rel="stylesheet" href="<?php echo base_url('res/css/responsive.css');?>">


        <!-- Modernizer Script for old Browsers -->
        <script src="<?php echo base_url('res/js/vendor/modernizr-2.6.2.min.js')?>"></script>

    </head>

    <body>

        <!--
        Fixed Navigation
        ==================================== -->
        <header id="navigation" class="navbar-fixed-top">
            <div class="container">

                <div class="navbar-header">
                    <!-- responsive nav button -->
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- /responsive nav button -->

                    <!-- logo -->
                    <h1 class="navbar-brand">
                        <a href="#body">
                            <img src="res/img/logo.png" alt="Logo">
                        </a>
                    </h1>
                    <!-- /logo -->

                </div>

                <!-- main nav -->
                <nav class="collapse navigation navbar-collapse navbar-right" role="navigation">
                    <ul id="nav" class="nav navbar-nav">
                        <li class="current"><a href="#home"><?php echo lang('menu_home');?></a></li>
                        <li><a href="#service"><?php echo lang('menu_services');?></a></li>
                        <li><a href="#about"><?php echo lang('menu_about');?></a></li>
                        <li><a href="#pricing"><?php echo lang('menu_pricing');?></a></li>
                        <li><a href="#contact"><?php echo lang('menu_contact');?></a></li>
                        <li><a href="#signup"><?php echo lang('menu_signup');?></a></li>
                    </ul>
                </nav>
                <!-- /main nav -->
            </div>

        </div>
    </header>
        <!--
        End Fixed Navigation
        ==================================== -->


        <!--
        Home Slider
        ==================================== -->
        <section id="home">
            <div id="home-carousel" class="carousel slide" data-interval="false">
                <ol class="carousel-indicators">
                    <li data-target="#home-carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#home-carousel" data-slide-to="1"></li>
                    <li data-target="#home-carousel" data-slide-to="2"></li>
                </ol>
                <!--/.carousel-indicators-->

                <div class="carousel-inner">

                    <div class="item active"  style="background-image: url('res/img/slider/bg1.jpg')" >
                        <div class="carousel-caption">
                            <div class="animated bounceInRight">
                                <h2>Smart Tailoring Managment System !</h2>
                                <p>It's Easy , Fast & Secure !<br>Smart tailoring managment system provide complete solution to tailors cummunity.</p>
                            </div>
                        </div>
                    </div>

                    <div class="item" style="background-image: url('res/img/slider/bg2.jpg')">
                        <div class="carousel-caption">
                            <div class="animated bounceInDown">
                                <h2>World first Tailoring Managment System !</h2>
                                <p>Create ,Update multiple clients Record and Retrive with a single click ,as easy and as you ever imagine !.</p>
                            </div>
                        </div>
                    </div>

                    <div class="item" style="background-image: url('res/img/slider/bg3.jpg')">
                       <div class="carousel-caption">
                        <div class="animated bounceInUp">
                            <h2>Responsive Design <br>it's for all devices</h2>
                            <p>weather you used Mobile ,Tablet or Computer ,it's smoothy runs on every device</p>
                        </div>
                    </div>
                </div>
            </div>
            <!--/.carousel-inner-->
            <nav id="nav-arrows" class="nav-arrows hidden-xs hidden-sm visible-md visible-lg">
                <a class="sl-prev hidden-xs" href="#home-carousel" data-slide="prev">
                    <i class="fa fa-angle-left fa-3x"></i>
                </a>
                <a class="sl-next" href="#home-carousel" data-slide="next">
                    <i class="fa fa-angle-right fa-3x"></i>
                </a>
            </nav>

        </div>
    </section>
        <!--
        End #home Slider
        ========================== -->


        <!--
        #service
        ========================== -->
        <section id="service">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title text-center wow fadeInDown">
                            <h2><?php echo lang('heading_services');?></h2>
                            <p>We are providing Smart Tailroing Managment System for all devices platform ,Mobilr,Tablet ,Desktop and for Web!</p>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-6 col-sm-12 wow fadeInLeft">
                        <div class="media">
                            <a href="#" class="pull-left">
                                <img src="<?php echo base_url('res/img/icons/multipleusers.png');?>" class="media-object" alt="Monitor">
                            </a>
                            <div class="media-body">
                                <h3>Mutiplel Record</h3>
                                <p>Mutiple Record can be added for a client ,e-g you can add Wasket Pemaish ,Kurta Pemaish ,All you have to choose form a menu.</p>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-6 col-sm-12 wow fadeInRight" data-wow-delay="0.2s">
                        <div class="media">
                            <a href="#" class="pull-left">
                                <img src="res/img/icons/invoice.png" alt="Cog">
                            </a>
                            <div class="media-body">
                                <h3>Client Invoices </h3>
                                <p>You can create ,Update ,Email and Downoad as PDF ,Client Invoices ,and it can be store which can be retrive whenever you want.</p>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-6 col-sm-12 wow fadeInLeft">
                        <div class="media">
                            <a href="#" class="pull-left">
                                <img src="res/img/icons/sms.png" alt="Ruler">
                            </a>
                            <div class="media-body">
                                <h3>SMS Notification</h3>
                                <p>SMS Notification are send to Clients. whenever an order is place ,order date meet ,order complete ,Record Updated ,Deleted.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-12 wow fadeInRight" data-wow-delay="0.2s">
                        <div class="media">
                            <a href="#" class="pull-left">
                                <img src="res/img/icons/orders.png" alt="Camera">
                            </a>
                            <div class="media-body">
                                <h3>Place Order</h3>
                                <p>Orders are Place Against Client ,that can be Review ,Edit ,Delete and Filter ! </p>
                            </div>
                        </div>
                    </div>

                </div> <!-- end .row -->
            </div> <!-- end .container -->
        </section>
        <!--
        End #service
        ========================== -->

        <!--
        #service-bottom
        ========================== -->

        <section id="service-bottom">
            <div class="container">
                <div class="mobile-device">
                 <img data-wow-delay="0.2s" class="img-responsive black  wow fadeInLeftBig" src="<?php echo base_url('res/img/icons/iphone-black.png');?>" alt="iPhone Black">
                 <!-- <img data-wow-delay="0.5s" class="img-responsive white  wow fadeInLeftBig" src="<?php echo base_url('res/img/icons/iphone-white.png');?>" alt="iPhone White"> -->
             </div>
             <div class="service-features wow fadeInRight">
                <h3>STMS is Design for Every Device</h3>
                <ul>
                    <li>Responsive Design</li>
                    <li>Modern And Clean Design</li>
                    <li>Mobile App Available in Play Store</li>
                    <li>Browser Friendly</li>
                </ul>
            </div>
        </div>
    </section>
        <!--
        End #service-bottom
        ========================== -->


        <!--
        #about
        ========================== -->
        <section id="about">
            <div class="container">
                <div class="row">

                    <div class="section-title text-center wow fadeInUp">
                        <h2><?php echo lang('heading_about');?></h2>
                        <p>This simple Application is made by Ithinq.net All Rights reserved .</p>
                    </div>

                    <div class="about-us text-center wow fadeInDown">
                        <img src="<?php echo base_url('res/img/about.png');?>" alt="About Us" class="img-responsive">
                    </div>
                </div>
            </div>
        </section>
        <!--
        End #about
        ========================== -->


        <!--
        #count
        ========================== -->

        <section id="count">
            <div class="container">
                <div class="row">
                    <div class="counter-section clearfix">

                        <div class="col-md-3 col-sm-6 col-xs-12 wow fadeInLeft" data-wow-delay="0.5s">
                            <div class="fact-item text-center">
                                <div class="fact-icon">
                                    <i class="fa fa-check-square fa-lg"></i>
                                </div>
                                <span data-to="20000">0</span>
                                <p>Active Users</p>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 col-xs-12 wow fadeInLeft" data-wow-delay="0.8s">
                            <div class="fact-item text-center">
                                <div class="fact-icon">
                                    <i class="fa fa-users fa-lg"></i>
                                </div>
                                <span data-to="10000">0</span>
                                <p>Satisfied Clients</p>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 col-xs-12 wow fadeInLeft" data-wow-delay="1.1s">
                            <div class="fact-item text-center last">
                                <div class="fact-icon">
                                    <i class="fa fa-clock-o fa-lg"></i>
                                </div>
                                <span data-to="2500">0</span>
                                <p>Working Hours</p>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6 col-xs-12 wow fadeInLeft" data-wow-delay="1.3s">
                            <div class="fact-item text-center last">
                                <div class="fact-icon">
                                    <i class="fa fa-trophy fa-lg"></i>
                                </div>
                                <span data-to="150">0</span>
                                <p>Gold Pakage Holder</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!--
        End #count
        ========================== -->

        <!--
        #about-us
        ========================== -->
        <section id="about-us">
            <div class="container">
                <div class="row">

                    <div class="col-md-5 col-md-offset-1 wow fadeInLeft">

                        <div class="subtitle text-center">
                            <h3>Clients Review</h3>
                            <p>What people say about Smart Tailoring Managment System.STMS Team Encourage you to say it All!</p>
                        </div>

                        <div id="testimonial">

                            <div class="tst-item clearfix">
                                <div class="tst-single clearfix">
                                    <img src="<?php echo base_url('res/img/client/1.jpg');?>" alt="Client" class="img-circle">
                                    <div class="tst-content">
                                        <p>i am using Smart tailoring managment system for last 1 year and am happy with it.</p>
                                        <span>Rahat Afridi</span>
                                    </div>
                                </div>

                                <div class="tst-single clearfix">
                                    <img src="<?php echo base_url('res/img/client/2.jpg');?>" alt="Client" class="img-circle">
                                    <div class="tst-content">
                                        <p>i am using Smart Tailoring managment system for last 8 months ,i like it's design it's smooth ,secure and trust worthy.</p>
                                        <span>Zahanzeb khan</span>
                                    </div>
                                </div>
                            </div>

                            <div class="tst-item">
                                <div class="tst-single clearfix">
                                    <img src="<?php echo base_url('res/img/client/3.jpg');?>" alt="Client" class="img-circle">
                                    <div class="tst-content">
                                        <p>i am using it and it perfact !</p>
                                        <span>Muhammad zaman</span>
                                    </div>
                                </div>
                                <div class="tst-single clearfix">
                                    <img src="<?php echo base_url('res/img/client/1.jpg');?>" alt="Client" class="img-circle">
                                    <div class="tst-content">
                                        <p>i am using it for 2 months it make my life easy.</p>
                                        <span>Ahmad Nawaz</span>
                                    </div>
                                </div>
                            </div>

                            <div class="tst-item">
                                <div class="tst-single clearfix">
                                    <img src="<?php echo base_url('res/img/client/2.jpg');?>" alt="Client" class="img-circle">
                                    <div class="tst-content">
                                        <p>It's easy to operate ,i love this app</p>
                                        <span>Ijaz khan</span>
                                    </div>
                                </div>
                                <div class="tst-single clearfix">
                                    <img src="<?php echo base_url('res/img/client/3.jpg');?>" alt="Client" class="img-circle">
                                    <div class="tst-content">
                                        <p>Good design i am running it on my mobile device it run smoothly without any error .</p>
                                        <span>Shafiq khan</span>
                                    </div>
                                </div>
                            </div>

                        </div> <!-- end #testimonial -->
                    </div> <!-- end .col-md-5 -->

                    <div class="col-md-5 col-md-offset-1 wow fadeInRight">

                        <div class="subtitle text-center">
                            <h3>Clients Rating</h3>
                            <p>Rate Our System ,it will help us in future development and improvment,People Rate Us So far.</p>
                        </div>

                        <div class="progress-bars">

                            <span>Design - <small>95%</small></span>
                            <div class="progress"  data-progress="95">
                                <div class="bar"></div>
                            </div>
                            <span>Performance - <small>96%</small></span>
                            <div class="progress"  data-progress="96">
                                <div class="bar"></div>
                            </div>
                            <span>Pricing <small>85%</small></span>
                            <div class="progress" data-progress="85">
                                <div class="bar"></div>
                            </div>
                            <span>Help/Support - <small>90%</small></span>
                            <div class="progress kill-margin"  data-progress="90">
                                <div class="bar"></div>
                            </div>

                        </div>  <!-- progress-bars -->

                    </div>  <!-- end .col-md-5 -->

                </div>
            </div>
        </section>
        <!--
        End #about-us
        ========================== -->

        <!--
        #quotes
        ========================== -->
        <section id="quotes">
            <div class="container">
                <div class="row wow zoomIn">
                    <div class="col-lg-12">
                        <div class="call-to-action text-center">
                            <p>“We have About 10,000 Happy Clients Around the World That Uses Smart Tailoring Managment System”</p>
                            <span>STMS Team</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--
        End #quotes
        ========================== -->

        <!--
        #pricing
        ========================== -->
        <section id="pricing">
            <div class="container">
                <div class="row">

                    <div class="section-title text-center wow fadeInUp">
                        <h2><?php echo lang('heading_pricing');?></h2>
                        <p>Choose your pakage that best suit you and you bussiness.</p>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12 wow fadeInUp">
                        <div class="pricing-table text-center">
                            <div class="price">
                                <span class="plan">Basic</span>
                                <span class="value"><small>Rs</small><strong>0</strong>/Year</span>
                            </div>
                            <ul class="text-center">
                                <li>View Record</li>
                                <li>150 Orders</li>
                                <li>100 Clients</li>
                                <li>10 invoices</li>
                            </ul>
                            <a href="#" class="btn btn-price"><?php echo lang('btn_subscribe');?></a>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="pricing-table text-center">
                            <div class="price">
                                <span class="plan">Bronze</span>
                                <span class="value"><small>Rs</small><strong>999</strong>/Year</span>
                            </div>
                            <ul class="text-center">
                                <li>View Records</li>
                                <li>1100 orders</li>
                                <li>1000 clients</li>
                                <li>1200 invoices</li>
                            </ul>
                            <a href="#" class="btn btn-price"><?php echo lang('btn_subscribe');?></a>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12 wow fadeInUp" data-wow-delay="0.6s">
                        <div class="pricing-table text-center">
                            <div class="price">
                                <span class="plan">Silver</span>
                                <span class="value"><small>Rs</small><strong>1999</strong>/year</span>
                            </div>
                            <ul class="text-center">
                                <li>View Records</li>
                                <li>6000 orders</li>
                                <li>5000 clients</li>
                                <li>8000 Invoices</li>
                            </ul>
                            <a href="#" class="btn btn-price"><?php echo lang('btn_subscribe');?></a>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12 wow fadeInUp" data-wow-delay="0.9s">
                        <div class="pricing-table text-center">
                            <div class="price">
                                <span class="plan">Gold</span>
                                <span class="value"><small>Rs</small><strong>4999</strong>/Year</span>
                            </div>
                            <ul class="text-center">
                                <li>View Record</li>
                                <li>Unlimited Orders</li>
                                <li>Unlimited Clients</li>
                                <li>Unlimited Invoices</li>
                            </ul>
                            <a href="#" class="btn btn-price"><?php echo lang('btn_subscribe');?></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 wow fadeInUp">
                        <div class="special-plan text-center">
                            <p>Contact us if you have special request</p>
                            <a href="#" class="btn btn-pink">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--
        End #pricing
        ========================== -->


        <!--
        #subscribe
        ========================== -->
        <section id="subscribe">
            <div class="container">
                <div class="row">

                    <div class="col-md-7 wow fadeInLeft">
                        <form action="#" method="post" class="subscription-form">
                            <i class="fa fa-envelope-o fa-lg"></i>
                            <input type="email" name="subscribe" class="subscribe" placeholder="YOUR MAIL" required="">
                            <input type="submit" value="SUBSCRIBE" id="mail-submit">
                        </form>
                    </div>

                    <div class="col-md-4 text-left wow fadeInRight">
                        <p>Subscribe for our monthly news later and be aware from new offers and updates</p>
                    </div>
                </div>
            </div>
        </section>
        <!--
        End #subscribe
        ========================== -->


        <!--
        #contact
        ========================== -->
        <section id="contact">
            <div class="container">
                <div class="row">

                    <div class="section-title text-center wow fadeInDown">
                        <h2><?php echo lang('heading_contact');?></h2>
                        <p>Contact us 24/7 ,our team will help you.</p>
                    </div>

                    <div class="col-md-8 col-sm-9 wow fadeInLeft">
                        <div class="contact-form clearfix">
                            <form action="index.html" method="post">
                                <div class="input-field">
                                    <input type="text" class="form-control" name="name" placeholder="Your Name" required="">
                                </div>
                                <div class="input-field">
                                    <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
                                </div>
                                <div class="input-field message">
                                    <textarea name="message" class="form-control" placeholder="Your Message" required=""></textarea>
                                </div>
                                <input type="submit" class="btn btn-pink pull-right" value="SEND MESSAGE" id="msg-submit">
                            </form>
                        </div> <!-- end .contact-form -->
                    </div> <!-- .col-md-8 -->

                    <div class="col-md-4 col-sm-3 wow fadeInRight">
                        <div class="contact-details">
                            <span>GET IN TOUCH</span>
                            <p>+00 123.456.789 <br> <br> +00 123.456.789</p>
                        </div> <!-- end .contact-details -->

                        <div class="contact-details">
                            <span>GET IN TOUCH</span>
                            <p>+00 123.456.789 <br> <br> +00 123.456.789</p>
                        </div> <!-- end .contact-details -->
                    </div> <!-- .col-md-4 -->

                </div>
            </div>
        </section>
        <!--
        End #contact
        ========================== -->

        <!--
        #footer
        ========================== -->
        <footer id="footer" class="text-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="footer-logo wow fadeInDown">
                            <img src="<?php echo base_url('res/img/logo.png');?>" alt="logo">
                        </div>

                        <div class="footer-social wow fadeInUp">
                            <h3>We are social</h3>
                            <ul class="text-center list-inline">
                                <li><a href="http://goo.gl/RqhEjP"><i class="fa fa-facebook fa-lg"></i></a></li>
                                <li><a href="http://goo.gl/hUfpSB"><i class="fa fa-twitter fa-lg"></i></a></li>
                                <li><a href="http://goo.gl/r4xzR4"><i class="fa fa-google-plus fa-lg"></i></a></li>
                                <li><a href="http://goo.gl/k9zAy5"><i class="fa fa-dribbble fa-lg"></i></a></li>
                            </ul>
                        </div>

                        <div class="copyright">

                            <p><?php echo lang('label_developed');?> <a href="http://ithinq.net">ithinq.net</a></p>
                        </div>

                    </div>
                </div>
            </div>
        </footer>
        <!--
        End #footer
        ========================== -->


        <!--
        JavaScripts
        ========================== -->

        <!-- main jQuery -->
        <script src="<?php echo base_url('res/js/vendor/jquery-1.11.1.min.js');?>"></script>
        <!-- Bootstrap -->
        <script src="<?php echo base_url('res/js/bootstrap.min.js');?>"></script>
        <!-- jquery.nav -->
        <script src="<?php echo base_url('res/js/jquery.nav.js');?>"></script>
        <!-- Portfolio Filtering -->
        <script src="<?php echo base_url('res/js/jquery.mixitup.min.js');?>"></script>
        <!-- Fancybox -->
        <script src="<?php echo base_url('res/js/jquery.fancybox.pack.js');?>"></script>
        <!-- Parallax sections -->
        <script src="<?php echo base_url('res/js/jquery.parallax-1.1.3.js');?>"></script>
        <!-- jQuery Appear -->
        <script src="<?php echo base_url('res/js/jquery.appear.js');?>"></script>
        <!-- countTo -->
        <script src="<?php echo base_url('res/js/jquery-countTo.js');?>"></script>
        <!-- owl carousel -->
        <script src="<?php echo base_url('res/js/owl.carousel.min.js');?>"></script>
        <!-- WOW script -->
        <script src="<?php echo base_url('res/js/wow.min.js');?>"></script>
        <!-- theme custom scripts -->
        <script src="<?php echo base_url('res/js/main.js');?>"></script>
    </body>
    </html>
