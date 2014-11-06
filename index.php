<?php
  /**

  INCLUDES

  */

  require 'vendor/autoload.php';

  
  /**

  SETTINGS

  */
  
  $tencodesign = 21450120;
  $client_id = 'bb732030ffd9411c9f14da0647156e0f';
  $count = 9;



  /**

  FUNCTIONS

  */

  function setCacheTime()
  {

    $cache = time();
    // Write the contents back to the file
    file_put_contents('cache.txt', $cache);
    return true;

  }

  // ----------------- \\


  function CacheTenLatestInstagramImages($response)
  {
   

    $instagrams = $response->json();

    $n = 0;
    foreach ($instagrams[data] as $k => $pic)
    {
      $temp_array[$n]['thumbnail'] = $pic['images']['thumbnail']['url'];
      $temp_array[$n]['img'] = $pic['images']['standard_resolution']['url'];
      $temp_array[$n]['tag'] = $pic['tags'][0];
      $temp_array[$n]['caption'] = $pic['caption']['text'];
      $n++;
    }
    

    #$insta_array = print_r($instagrams[data],true);
    $str = serialize($temp_array);

    // create a txt-file with this array
    // or overwrite it if existing
    file_put_contents('instagrams.txt', $str);


    return true;
  }

  // ----------------- \\

  function handleTheError()
  {
    // use fallback images?

    // email magnus@tenco.se?

    #exit("error..");
    return;
  }

  /**

  LOGIC

  */

  // figure out the when instagram photos was fetched last time
  if ( ! $cache = file_get_contents('cache.txt'))
  {

    setCacheTime();
    $ago = 0;

  }
  else
  {
    $ago = (time() - $cache)/3600; // how many hours ago did we fetch the instagram images  
  }
  
  
  
  // if there's no photots or it was more than 2h ago
  // go get new photos 
  if ($ago > 2 || ! file_get_contents('instagrams.txt'))
  {

    // fetch some photos
    $client = new \Guzzle\Service\Client('https://api.instagram.com/v1/users/'.$tencodesign.'/media/');
    $response = $client->get('recent/?client_id='.$client_id.'&count='.$count)->send();
    
    if ($response)
    {
      // write the img-array to a cache-file
      CacheTenLatestInstagramImages($response);

      // set the new cache time:
      setCacheTime();  
    }
    else
    {
      handleTheError();
    }
    

  }
  
  // fetch the instagram images from the local txt-file
  $str = file_get_contents('instagrams.txt');
  $insta_array = unserialize($str);

  

  
  // debug
  #if ( ! is_array($insta_array))
  #  exit("mfucker!");
  #print('<pre>');
  #print_r($insta_array);
  #print('</pre>');

 #echo $ago;

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
    <meta name="author" content="">
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
                <h2>We offer</h2>
                <h1>Service Innovation and Improvement.</h1>
                <p>With Service Design we put Your Customers in the Center.</p>
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
                  <span>'.substr($v['caption'],0,25).'...</span>
                </div>
                <!-- Thumbnail -->
                <img src="'.$v['img'].'" alt="'.$v['caption'].'">
                <!-- Thumb links -->
                <figcaption>
                  <a href="'.$v['img'].'" class="preview tooltips popup-gallery" data-toggle="tooltip" data-placement="bottom" title="Preview"><i class="fa fa-plus"></i></a><a href="https://instagram.com/tencodesign" class="link tooltips" data-toggle="tooltip" data-placement="bottom" title="Open instagram"><i class="fa fa-external-link"></i></a>
                </figcaption>
              </figure>
            </div>';

            }
           ?>
          </div>
        </div>
<!-- -->
        <div class="row demo-3 hidden-lg hidden-md hidden-sm"> 
         
           

          <!-- new stuff -->
        
          <div class="col-md-12">
            <div id="owl" class="owl-carousel">
              
              <?php
            
              $n = 0;
              foreach ($insta_array as $k=>$v)
              {
                if ($n == 9)
                  continue;
              echo '<div class="item">
                  <img class="img-responsive" style="margin-bottom:20px; border-radius: 4px; height: 242px;" src="'.$v['img'].'" alt="'.$v['caption'].'">
                  <p style="color:#F26F21;">'.$v['caption'].'</p>
              </div>';
              
              $n++;
              }
              ?>
            </div>
          </div>
        
      

          <!-- new stuff ends -->


           <?php
            /*
            $n = 0;
            foreach ($insta_array as $k=>$v)
            {
              if ($n == 3)
                  continue;

                echo '<div class="col-sm-6 col-md-4 portfolio-item design">
                      <img class="img-responsive" style="margin-bottom:20px; border-radius: 4px;" src="'.$v['img'].'" alt="'.$v['caption'].'">
                      </div>';
              $n++;
            }
            */
           ?>
          
        </div>
<!-- -->
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
            <h2>We get into the heads of your customers</h2>
          </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->

        <div class="row">
          <div class="col-sm-4 text-center overlay-text icons">
            <div class="icon-wrapper">
              <i class="fa fa-users icon-large"></i>
            </div>
            <h3>1. Discover the outside-in perspective</h3>
            <p>We gather data on your customer experience and behaviour to determine the strategy for your business goals.</p>
          </div>
          <div class="col-sm-4 text-center overlay-text icons">
            <div class="icon-wrapper">
              <i class="fa fa-lightbulb-o icon-large"></i>
            </div>
            <h3>2. Evaluate during innovation and improvement</h3>
            <p>We innovate by co-creation and involve your stakeholders in testing designs for efficient decisions forward.</p>
          </div>
          <div class="col-sm-4 text-center overlay-text icons">
            <div class="icon-wrapper">
              <i class="fa fa-bar-chart-o icon-large"></i>
            </div>
            <h3>3. Deploy quality assured services</h3>
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
                  <h4>Design Manager</h4>
                  <p>Adriana is a design manager specialized in facilitating co-creation and prototyping.</p>
                  <!--a class="icon" href="http://www.twitter.com/dparrelli" target="_blank"><i class="fa fa-twitter"></i></a>
                  <a class="icon" href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                  <a class="icon" href="http://www.linkedin.com/pub/david-parrelli/17/b22/a11" target="_blank"><i class="fa fa-linkedin"></i></a>
                  <a class="icon" href="http://dribbble.com/dparrelli" target="_blank"><i class="fa fa-dribbble"></i></a-->
              </div>
              <div class="item">
                <img class="display-pic" src="img/magnus.png" alt="Co-founder">
                  <h3>Magnus Nilsson</h3>
                  <h4>Service Designer</h4>
                  <p>Magnus has more than 15 yrs of experience from digital service design on all kinds of devices.</p>
                  <!--a class="icon" href="http://www.twitter.com/dparrelli" target="_blank"><i class="fa fa-twitter"></i></a>
                  <a class="icon" href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                  <a class="icon" href="http://www.linkedin.com/pub/david-parrelli/17/b22/a11" target="_blank"><i class="fa fa-linkedin"></i></a>
                  <a class="icon" href="http://dribbble.com/dparrelli" target="_blank"><i class="fa fa-dribbble"></i></a-->
              </div>
              <div class="item">
                <img class="display-pic" src="img/anna.png" alt="Tencollaborator">
                  <h3>Anna Kapferer</h3>
                  <h4>Communication Designer</h4>
                  <p>Anna is a communication designer visualizing complexity in a simple and userfriendly way.</p>
                  <!--a class="icon" href="http://www.twitter.com/dparrelli" target="_blank"><i class="fa fa-twitter"></i></a>
                  <a class="icon" href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                  <a class="icon" href="http://www.linkedin.com/pub/david-parrelli/17/b22/a11" target="_blank"><i class="fa fa-linkedin"></i></a>
                  <a class="icon" href="http://dribbble.com/dparrelli" target="_blank"><i class="fa fa-dribbble"></i></a-->
              </div>
              <div class="item">
                <img class="display-pic" src="img/emma.png" alt="Tencollaborator">
                  <h3>Emma Jacobsen</h3>
                  <h4>PM & Marketing</h4>
                  <p>Emma is a project manager with experience from marketing and product development.</p>
                  <!--a class="icon" href="http://www.twitter.com/dparrelli" target="_blank"><i class="fa fa-twitter"></i></a>
                  <a class="icon" href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                  <a class="icon" href="http://www.linkedin.com/pub/david-parrelli/17/b22/a11" target="_blank"><i class="fa fa-linkedin"></i></a>
                  <a class="icon" href="http://dribbble.com/dparrelli" target="_blank"><i class="fa fa-dribbble"></i></a-->
              </div>
              <div class="item">
                <img class="display-pic" src="img/user-avatar2.jpg" alt="Team Member">
                  <h3>Your Face Here</h3>
                  <h4>TBD</h4>
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
            <img src="img/clients/tp.png" class="client-logo img-responsive">
          </div>
          <div class="col-md-2 col-xs-4">
            <img src="img/clients/jv.png" class="client-logo img-responsive">
          </div>
          <div class="col-md-2 col-xs-4">
            <img src="img/clients/skanetrafiken.png" class="client-logo img-responsive">
          </div>
          <div class="col-md-2 col-xs-4">
            <img src="img/clients/fujitsu.png" class="client-logo img-responsive">
          </div>
          <div class="col-md-2 col-xs-4">
            <img src="img/clients/rs.png" class="client-logo img-responsive">
          </div>
          <div class="col-md-2 col-xs-4">
            <img src="img/clients/besikta.png" class="client-logo img-responsive">
          </div>
          <div class="col-md-2 col-xs-4">
            <img src="img/clients/primarvarden.png" class="client-logo img-responsive">
          </div>
          <div class="col-md-2 col-xs-4">
            <img src="img/clients/elicit.png" class="client-logo img-responsive">
          </div>
          <div class="col-md-2 col-xs-4">
            <img src="img/clients/it.png" class="client-logo img-responsive">
          </div>
          <div class="col-md-2 col-xs-4">
            <img src="img/clients/rotary.png" class="client-logo img-responsive">
          </div>
          <div class="col-md-2 col-xs-4">
            <img src="img/clients/wme.png" class="client-logo img-responsive">
          </div>
          <div class="col-md-2 col-xs-4">
            <img src="img/clients/kiliam.png" class="client-logo img-responsive">
          </div>
          <div class="col-md-2 col-xs-4">
            <img src="img/clients/vf.png" class="client-logo img-responsive">
          </div>
          <div class="col-md-2 col-xs-4">
            <img src="img/clients/jfl.png" class="client-logo img-responsive">
          </div>
          
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
                
                <p><a href="https://goo.gl/maps/2uPhN" target="_new">Södra Bulltoftavägen 51<br />212 43 Malmö, Sweden</a><br /><br /><a href="tel:+46767621011">+46 (0)767 62 10 11</a><br />
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
                <li><a target="_new" href="http://digitalpeople.se">digital people</a></li>
                <li><a target="_new" href="http://mediaevolution.se">Media Evoulution</a></li>
                <li><a target="_new" href="http://www.elicit.se">Elicit</a></li>
                <li><a target="_new" href="http://www.swcg.se">Swedish Consulting Group</a></li>             
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
        <form method="post" id="contactForm">
          <input class="form-control" type="email" name="email" placeholder="Email" required="required" />
          <div style="display:none;"><input type="text" name="name" /></div>
          <textarea required="required" placeholder="Message" name="message" /></textarea>
          <div id="error_msg" style="display:none;">
          <div class="alert alert-danger" role="alert">Please enter a valid email address and a message and try again.
          </div>
        </div>
          <button id="contactButton" type="submit" class="btn btn-primary btn-block btn-large">Send</button>
          <!--p class="disclaimer">By signing up, you agree with our <a href="#">Terms of Service</a> & <a href="#">Privacy Policy</a></p-->
        </form>
        
        <div id="success_msg" style="display:none;">
          <div class="alert alert-success" role="alert">Thanks, we'll get back to you shortly :)
          </div>
        </div>


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

    <script>

      $(document).ready(function(){
        $(".player").mb_YTPlayer();
        isotope();
        signupOverlay();
      });
   

      /* google analytics */
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-36412546-7', 'auto');
      ga('send', 'pageview');

</script>

  </body>
</html>
