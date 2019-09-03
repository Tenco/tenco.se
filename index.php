<?php
  /**

  INCLUDES

  */

	require 'vendor/autoload.php';
  

  /**

  LOGIC

  */

  	// class found in inc/tencoFeed.php
	$feed = new tenco\tencoFeed();
 	$str = $feed->getTenLatestInstagramPhotos();
 	$insta_array = unserialize($str);
  

  // set the time limit message:
  # $limit = "2015-07-31 00:00:00.0";


?>

<!DOCTYPE html>
<!--[if IE 8]> <html class="no-js lt-ie9 ie8" lang="en"> <![endif]-->
<!--[if IE 9]> <html class="ie9" lang="en"> <![endif]-->
<!--[if IE 10]> <html class="ie10" lang="en"> <![endif]-->
<!--[if (gt IE 10)|!(IE)]> <html lang="en"> <![endif]-->
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="description" content="">
    <meta name="author" content="Tenco AB"> 
    <link rel="shortcut icon" href="ico/favicon.png">

    <title>Tenco AB | Service Design</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/theme.css" rel="stylesheet">
    <link href="css/tenco.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/magnific-popup.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="css/font-awesome.min.css" rel="stylesheet">

    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web' rel='stylesheet' type='text/css'>


    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="/manifest.json">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="theme-color" content="#ffffff">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <script src="js/modernizr.custom.js"></script>
  </head>

  <body>

    <div class="preloader">
       <div class="spinner">
          <div class="bounce1"></div>
          <div class="bounce2"></div>
          <div class="bounce3"></div>
        </div>
    </div>

    <!-- NAVBAR
    ================================================== -->
    <div class="navbar-wrapper cbp-af-header">
      <div class="container">

        <!-- Fixed navbar -->
        <div class="navbar cbp-af-inner" role="navigation">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <!--h1><a class="navbar-brand scroll" href="#intro">TENCO</a></h1-->
              <h1><a class="navbar-brand scroll" href="#intro-video">
                <img class="logo" src="img/tenco-logo.png">
              </a></h1>
            </div>
            <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav pull-right">
                <!--li><a href="#intro">Home</a></li-->
                <li><a href="#feed">News</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#team">Team</a></li>
                <li><a href="#clients">Clients</a></li>
                <li><a class="signup" href="#">Contact</a></li>
                <!--li><a class="signup" href="#">Sign up</a></li-->
              </ul>
            </div>
          </div>
        </div>

      </div>
    </div>


 <!-- Hero Banner
    ================================================== -->
    <div id="intro-video" style="background-image: url( 'img/bg.jpg' ); background-repeat: no-repeat; background-size: cover; background-position: center center;">
      <a class="player" data-property="{videoURL:'https://www.youtube.com/watch?v=knuv8bZKOWE',containment:'#intro-video',autoPlay:true, mute:true, startAt:0, printUrl:false,showControls:false, opacity:1, quality: 'highres'}"></a>
        <div class="item">
          <div class="container">
            <div class="row">
              <div class="carousel-caption-center colour-white">
                <!--h2>We offer</h2-->
                <h1>WE CREATE FLOW BETWEEN BUSINESS, PEOPLE AND TECHNOLOGY</h1>
                <p>We design holistic customer and user experiences that create value for business.</p>
                <p>
                  <a class="btn btn-lg btn-primary signup" href="#" role="button">
                  Get in touch</a></p>
              </div>
            </div>
          </div>
          <div class="overlay-bg"></div>
        </div>
    </div>

    <?php
    if ($insta_array)
    {
    ?>
    <!-- Portfolio
    ================================================== -->
    <section class="section-content section-isotope separator" id="feed">

      <div class="page-header text-center">
        <h3>Feed</h3>
        <h2>What's happening...</h2>
      </div>

      <div class="container">
        <!--div id="filters" class="button-group text-center">
          <button data-filter-value="*" class="active">show all</button>
          <button data-filter-value=".websites">websites</button>
          <button data-filter-value=".icons">icons</button>
          <button data-filter-value=".print">print</button>
          <button data-filter-value=".mobile">mobile</button>
        </div-->
        <div class="row demo-3 hidden-xs"> 
          <div id="portfolio" class="js-isotope grid cs-style-1" data-isotope-options='{ "columnWidth": 200, "itemSelector": ".portfolio-item" }'>
           
           <?php

            foreach ($insta_array as $k=>$v)
            {

              if ( ! $v['tag'])
              {
                $tag = 'design';
              }
              else
              {
                $tag = $v['tag'];
              }

              echo '<div class="col-sm-6 col-md-4 portfolio-item design">
              <figure>
                <!-- Thumb Info -->
                <div class="info">
                  <h3>'.$tag.'</h3>
                  <span>'.substr($v['caption'],0,35).'...</span>
                </div>
                <!-- Thumbnail -->
                <img src="'.$v['img'].'" alt="'.$v['caption'].'">
                <!-- Thumb links -->
                <figcaption>
                  <a href="'.$v['img'].'" alt="'.$v['caption'].'" class="preview tooltips popup-gallery" data-toggle="tooltip" data-placement="bottom" title="View"><i class="fa fa-plus"></i></a><a href="https://instagram.com/tencodesign" class="link tooltips" data-toggle="tooltip" data-placement="bottom" title="Open instagram"><i class="fa fa-external-link"></i></a>
                </figcaption>
              </figure>
            </div>';

            }
           ?>
          </div>
        </div>

        <!-- for mobile devices -->
        <div class="row demo-3 hidden-lg hidden-md hidden-sm"> 
         
           <div class="col-md-12">
            <div id="owl" class="owl-carousel">
              
              <?php
				reset($insta_array);
				$n = 0;
				foreach ($insta_array as $k=>$v)
				{
				if ($n == 9)
				  continue;
				echo '<div class="item">
				  <img class="img-responsive" style="margin-bottom:20px; border-radius: 4px; height: 262px;" src="'.$v['img'].'" alt="'.$v['caption'].'">
				  <p style="color:#000; margin:0;">'.$v['caption'].'</p>
				</div>';

				$n++;
              }
              ?>
            </div>
          </div>
          <!-- end small devices -->

        </div>
      </div>

    </section>

    <?php
    }
    ?>
    <!-- About Section
    ================================================== -->
    <section id="about" class="content text-center light">

      <div class="container">
        <!-- Three columns of text below the carousel -->
        <div class="row">
          <div class="col-lg-12 overlay-text">
            <h2>We use service design methodology to create solutions that make work and life easier, clearer, and more valuable for everyone</h2>
          </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->

        <div class="row">
          <div class="col-sm-4 text-center overlay-text icons">
            <div class="icon-wrapper">
              <i class="fa fa-users icon-large"></i>
            </div>
            <h3 style="line-height:25px;">1. Discover the outside-in perspective</h3>
            <p>We gather data on your customer experience and behaviour to determine the strategy for your business goals.</p>
          </div>
          <div class="col-sm-4 text-center overlay-text icons">
            <div class="icon-wrapper">
              <i class="fa fa-lightbulb-o icon-large"></i>
            </div>
            <h3 style="line-height:25px;">2. Evaluate during innovation and improvement</h3>
            <p>We innovate by co-creation and involve your stakeholders in testing designs for efficient decisions forward.</p>
          </div>
          <div class="col-sm-4 text-center overlay-text icons">
            <div class="icon-wrapper">
              <i class="fa fa-bar-chart-o icon-large"></i>
            </div>
            <h3 style="line-height:25px;">3. Deploy quality assured services</h3>
            <p>By involving and testing early in the process we make sure you are on track with your business improvements and deliver quality.</p>
          </div>
        </div><!-- /.row -->
      </div>

      <div class="overlay-bg light"></div>

    </section>



    <section id="featured2" class="featured">

      <div class="container">
        <div class="row">
          <div class="col-sm-5 text-center">
            <img class="margin-top img-responsive" src="img/material.png" data-scrollreveal="move 100px and enter from the left after 0.55s" width="512">
          </div>
          <div class="col-sm-5 col-sm-offset-1">
            <div class="vertical-align">
              <h2>Customer-driven and business focused</h2>
              <p>We help you design services based on actual data from people’s behavior and preferences and make sure they stay aligned with the needs of your business.
              Service design eliminates the guesswork and focuses your teams effort on what counts. We co-create design solutions in a visual process that result in service blueprints, requirement specifications and or prototypes.</p>
            </div>
          </div>
        </div>
      </div>

    </section>



    

    <!-- Team
    ================================================== -->
    <section id="team" class="dark">

      <div class="page-header text-center">
        <h3>Our Team</h3>
        <h2>Tencollaborators</h2>
      </div>

      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div id="owl-example" class="owl-carousel">
              <div class="item">
                <img class="display-pic" src="img/adriana.png" alt="Co-founder">
                  <h3>Adriana Azinovic</h3>
                  <!--h4>Design Manager</h4-->
                  <p>Adriana is specialized in co-creation with stakeholders mixing business analysis, customer experience and service design tools.</p>
                  <!--a class="icon" href="http://www.twitter.com/dparrelli" target="_blank"><i class="fa fa-twitter"></i></a>
                  <a class="icon" href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                  <a class="icon" href="http://www.linkedin.com/pub/david-parrelli/17/b22/a11" target="_blank"><i class="fa fa-linkedin"></i></a>
                  <a class="icon" href="http://dribbble.com/dparrelli" target="_blank"><i class="fa fa-dribbble"></i></a-->
              </div>
              <div class="item">
                <img class="display-pic" src="img/magnus.png" alt="Co-founder">
                  <h3>Magnus Nilsson</h3>
                  <!--h4>Service Designer</h4-->
                  <p>Magnus is a conceptual designer using his strenghts as a full stack developer with a passion for research and requirement analysis.</p>
                  <!--a class="icon" href="http://www.twitter.com/dparrelli" target="_blank"><i class="fa fa-twitter"></i></a>
                  <a class="icon" href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                  <a class="icon" href="http://www.linkedin.com/pub/david-parrelli/17/b22/a11" target="_blank"><i class="fa fa-linkedin"></i></a>
                  <a class="icon" href="http://dribbble.com/dparrelli" target="_blank"><i class="fa fa-dribbble"></i></a-->
              </div>
              <div class="item">
                <img class="display-pic" src="img/mattias.png" alt="CEO">
                  <h3>Mattias Nordgren</h3>
                  <!--h4>Service Designer</h4-->
                  <p>Mattias is an experienced Enterprise Architect. He is outgoing, calm and entrepreneurial with a good portion of determination and persistency.</p>
                  <!--a class="icon" href="http://www.twitter.com/dparrelli" target="_blank"><i class="fa fa-twitter"></i></a>
                  <a class="icon" href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                  <a class="icon" href="http://www.linkedin.com/pub/david-parrelli/17/b22/a11" target="_blank"><i class="fa fa-linkedin"></i></a>
                  <a class="icon" href="http://dribbble.com/dparrelli" target="_blank"><i class="fa fa-dribbble"></i></a-->
              </div>
              <div class="item">
                <img class="display-pic" src="img/monika.png" alt="Tencollaborator">
                  <h3>Monika Zielińska</h3>
                  <p>Monika is a service designer with a background in linguistics and multimedia. She is an observer motivated to define problems and make solutions for a big impact.</p>
              </div>
              <div class="item">
                <img class="display-pic" src="img/eric.png" alt="Tencollaborator">
                  <h3>Eric Ericsson</h3>
                  <p>Eric is an experienced front end developer turning business requirements and user needs into prototypes and solutions.</p>
              </div>
              <div class="item">
                <img class="display-pic" src="img/viktoria.jpg" alt="Tencollaborator">
                  <h3>Viktoria Ekberg</h3>
                  <p>Viktoria has a broad experience of different roles in international organisations. With an engeneering and design background she is focused on solving problems based on different organisational needs.</p>
              </div>

               

               <div class="item">
                <img class="display-pic" src="img/josef.jpg" alt="Tencollaborator">
                  <h3>Josef Sahlberg</h3>
                  <p>Josef is our Visual Designer with UX skills from many years of contributing to the success of big branding and change projects. His passion for holistic solutions is contagious.</p>
              </div>
              <div class="item">
                  <img class="display-pic" src="img/thomas.png" alt="Tencollaborator">
                  <h3>Thomas Glennow</h3>
                  <!--h4>ENTERPRISE ARCHITECT</h4-->
                  <p>Thomas uses his analytical skills and technical experience to increase the value you get out of your information technology investment.</p>
                </div>
              <div class="item">
                <img class="display-pic" src="img/user-avatar2.jpg" alt="Team Member">
                  <h3>Your Face Here</h3>
                  <!--h4>TBD</h4-->
                  <p>If you would like to be a part of this talented team please go ahead and <a class="signup" href="#">contact us</a>.</p>
                  <!--a class="icon" href="http://www.twitter.com/dparrelli" target="_blank"><i class="fa fa-twitter"></i></a>
                  <a class="icon" href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                  <a class="icon" href="http://www.linkedin.com/pub/david-parrelli/17/b22/a11" target="_blank"><i class="fa fa-linkedin"></i></a>
                  <a class="icon" href="http://dribbble.com/dparrelli" target="_blank"><i class="fa fa-dribbble"></i></a-->
              </div>
              <!--div class="item">
                <img class="display-pic" src="img/user-avatar3.jpg" alt="Team Member">
                  <h3>Adrian Filloti</h3>
                  <h4>Account Manager</h4>
                  <p>Maecenas eu placerat ante. Fusce ut neque justo, et aliquet enim. In hac habitasse platea dictumst. Nullam commodo neque erat.</p>
                  <a class="icon" href="http://www.twitter.com/dparrelli" target="_blank"><i class="fa fa-twitter"></i></a>
                  <a class="icon" href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                  <a class="icon" href="http://www.linkedin.com/pub/david-parrelli/17/b22/a11" target="_blank"><i class="fa fa-linkedin"></i></a>
                  <a class="icon" href="http://dribbble.com/dparrelli" target="_blank"><i class="fa fa-dribbble"></i></a>
              </div-->

            </div>
          </div>
        </div>
      </div>

    </section>


<!-- Clients
    ================================================== -->
    <section id="clients">

      <div class="page-header text-center">
        <h3>Tenco</h3>
        <h2>Trusted by...</h2>
      </div>

      <div class="container">
        <div class="row">

          <div class="col-md-2 col-xs-4">
            <img src="img/clients/cdon.png" class="client-logo img-responsive">
          </div>
          <div class="col-md-2 col-xs-4">
            <img src="img/clients/folk.png" class="client-logo img-responsive">
          </div>
          <div class="col-md-2 col-xs-4">
            <img src="img/clients/good.png" class="client-logo img-responsive">
          </div>
          <div class="col-md-2 col-xs-4">
            <img src="img/clients/almi.png" class="client-logo img-responsive">
          </div>
          <div class="col-md-2 col-xs-4">
            <img src="img/clients/skanska.png" class="client-logo img-responsive">
          </div>
          <!--div class="col-md-2 col-xs-4">
            <img src="img/clients/studio.png" class="client-logo img-responsive">
          </div-->
          <div class="col-md-2 col-xs-4">
            <!--a class="case" href=#--><img src="img/clients/tp.png" class="client-logo img-responsive"><!--/a-->
          </div>
          <div class="col-md-2 col-xs-4">
            <img src="img/clients/jv.png" class="client-logo img-responsive">
          </div>
          <div class="col-md-2 col-xs-4">
            <img src="img/clients/skanetrafiken.png" class="client-logo img-responsive">
          </div>
          <!--div class="col-md-2 col-xs-4">
            <img src="img/clients/fujitsu.png" class="client-logo img-responsive">
          </div-->
          <div class="col-md-2 col-xs-4">
            <img src="img/clients/rs.png" class="client-logo img-responsive">
          </div>
          <div class="col-md-2 col-xs-4">
            <img src="img/clients/besikta.png" class="client-logo img-responsive">
          </div>
          <div class="col-md-2 col-xs-4">
            <img src="img/clients/primarvarden.png" class="client-logo img-responsive">
          </div>
          <!--div class="col-md-2 col-xs-4">
            <img src="img/clients/it.png" class="client-logo img-responsive">
          </div>
          <div class="col-md-2 col-xs-4">
            <img src="img/clients/rotary.png" class="client-logo img-responsive">
          </div -->
          <!--div class="col-md-2 col-xs-4">
            <img src="img/clients/wme.png" class="client-logo img-responsive">
          </div-->
          <div class="col-md-2 col-xs-4">
            <img src="img/clients/verisure.png" class="client-logo img-responsive">
          </div>
          <!--div class="col-md-2 col-xs-4">
            <img src="img/clients/jfl.png" class="client-logo img-responsive">
          </div-->
        </div> <!-- /row -->
      </div> <!-- /container -->

    </section>

   <!-- Footer
    ================================================== -->
    <footer id="contact" class="footer">

      <div class="container">    
        <div class="row">
          <div class="col-lg-12">
            <div class="col-sm-3 col-md-3">
              <div class="footer-logo">
                <h2>Tenco</h2>
                
                <p><a href="https://goo.gl/maps/D8ApwQFyGkT2" target="_new">Humlegatan 4<br />211 27 Malmö, Sweden</a>
                  <!--br /> Entrance: <a target=_new href="http://map.what3words.com/hopes.storage.hails">hopes.storage.hails</a>
                  <br />Parking: <a target=_new href="http://map.what3words.com/walnuts.heavy.describe">walnuts.heavy.describe</a-->
                </p>
                <p>
                <a href="tel:+46767621011">+46 (0)767 62 10 11</a><br />
                <a href="mailto:office@tenco.se">office@tenco.se</a>

                </p>
                <br>
                <p class="muted">© 2014 Tenco AB.</p>
                <!--a href="#">Terms of Service</a>    
                <a href="#">Privacy</a-->
              </div>
            </div>
            <div class="col-sm-3 col-md-3">
              <h3>Awards</h3>
              <!--p>Tenco was awarded cut <br />the wire awards 2011</p-->
              <img src="img/cut.jpg" width=150>
            </div>
            <div class="col-sm-3 col-md-3">
              <h3>The Site</h3>
              <ul class="list-unstyled">
                <li><a href="#intro-video">Home</a></li>
                <li><a href="#feed">News</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#testimonials">Team</a></li>
                <li><a href="#clients">Clients</a></li>
              </ul>
            </div>
            <div class="col-sm-3 col-md-3">
              <h3>Partners</h3>
              <ul class="list-unstyled">
                <li><a href="http://sweden.service-design-network.org/" target="_new">Service Design Network</a></li>
                <li><a target="_new" href="http://mediaevolution.se">Media Evoulution</a></li>
              </ul>
            </div>  
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 text-center">
            <a class="icon" href="http://www.twitter.com/tencodesign" target="_blank"><i class="fa fa-twitter"></i></a>
            <a class="icon" href="https://www.facebook.com/tencodesign" target="_blank"><i class="fa fa-facebook"></i></a>
            <a class="icon" href="http://instagram.com/tencodesign" target="_blank"><i class="fa fa-instagram"></i></a>
            <!--a class="icon" href="http://www.workingnomads.co" target="_blank"><i class="fa fa-globe"></i></a-->
          </div>
        </div>
      </div>

		</footer>

    <div id="signup" class="overlay overlay-content">
  
      <button type="button" class="overlay-close">Close</button>
      <section class="login-part">
        <p class="login-overlay">
          Get in touch
        </p>
        <p>
          <a href="mailto:office@tenco.se">office@tenco.se</a><br />
          <a href="tel:+46767621011">+46 (0)767 62 10 11</a><br />
          <a href="https://goo.gl/maps/D8ApwQFyGkT2" target="_new">Humlegatan 4, 211 27 Malmö, Sweden</a>
        </p>

        <!--form method="post" id="contactForm">
          <input class="form-control" type="email" name="email" placeholder="Email" required="required" />
          <div style="display:none;"><input type="text" name="name" /></div>
          <textarea required="required" placeholder="Message" name="message" /></textarea>
          <div id="error_msg" style="display:none;">
          <div class="alert alert-danger" role="alert">Please enter a valid email address and a message and try again.
          </div>
        </div>
          <button id="contactButton" type="submit" class="btn btn-primary btn-block btn-large">Send</button>
        </form-->
        
        <!--div id="success_msg" style="display:none;">
          <div class="alert alert-success" role="alert">Thanks, we'll get back to you shortly :)
          </div>
        </div-->


       </section>
      
    </div>


<div id="case" class="caseoverlay overlay-content">
  
      <button type="button" class="overlay-close">Close</button>
      <section class="login-part">
        <p class="login-overlay">
          Case
        </p>
        <p>
          <img src="img/clients/tp.png" class="client-logo img-responsive">
          Donec id elit non mi porta gravida at eget metus. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed posuere consectetur est at lobortis.

Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.

Nullam id dolor id nibh ultricies vehicula ut id elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id dolor id nibh ultricies vehicula ut id elit. Cras mattis consectetur purus sit amet fermentum.
        </p>


       </section>
      
    </div>
 
  
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/classie.js"></script>
		<script src="js/cbpAnimatedHeader.min.js"></script>
    <script src="js/jquery.mb.YTPlayer.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/scrollReveal.js"></script>
    <script src="js/jquery.scrollTo.js" defer="defer"></script>
    <script src="js/jquery.nav.js" defer="defer"></script>
    <script src="js/imagesloaded.pkgd.min.js" defer="defer"></script>
    <script src="js/isotope.min.js" defer="defer"></script>
    <script src="js/jquery.magnific-popup.min.js" defer="defer"></script>
    <script src="js/jqBootstrapValidation.js" defer="defer"></script>
    <script src="js/tenco.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/analytics.js"></script>
  </body>
</html>
