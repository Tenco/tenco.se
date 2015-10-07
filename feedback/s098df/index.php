<?php
  /**

  SETTINGS

  */

  $id = basename(__DIR__);
 

  /**

  LOGIC

  */

  

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
    <meta name="description" content="feedback">
    <meta name="author" content="Tenco AB"> 
    <link rel="shortcut icon" href="ico/favicon.png">

    <title>Tenco AB | Service Design | Feedback</title>

    <!-- Bootstrap core CSS -->
    <!--link href="../../css/bootstrap.css" rel="stylesheet" -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link href="../../css/theme.css" rel="stylesheet">
    <link href="../../css/tenco.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../css/magnific-popup.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="../../css/font-awesome.min.css" rel="stylesheet">

    <style type="text/css">

    .btn-primary {
        background: #C9CBCC;
    }
    .btn-primary:active, .btn-primary.active {
      background-color: #BABBBB;
      border-color: #BABBBB;
    }

    .btn-primary.active.focus, .btn-primary.active:focus, .btn-primary.active:hover, .btn-primary:active.focus, .btn-primary:active:focus, .btn-primary:active:hover, .open>.dropdown-toggle.btn-primary.focus, .open>.dropdown-toggle.btn-primary:focus, .open>.dropdown-toggle.btn-primary:hover {
      color: #000;
      background-color: #C9CBCC;
      border-color: #C9CBCC;
    }

    .btn-primary:hover {
      background-color: #BABBBB;
    }
    </style>

    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.../../js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <script src="../../../../js/modernizr.custom.js"></script>
  </head>

  <body>

    <!--
    <div class="preloader">
       <div class="spinner">
          <div class="bounce1"></div>
          <div class="bounce2"></div>
          <div class="bounce3"></div>
        </div>
    </div>
    -->

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
              <h1 style="background-color:#f6f6f6;"><a class="navbar-brand scroll" href="../../">
                <img class="logo" src="../../img/tenco-logo.png">
              </a></h1>
            </div>
         
          </div>
        </div>

      </div>
    </div>


<!-- Clients
    ================================================== -->
    <section id="clients">

      <div class="page-header text-center">
         <h2>Ge oss gärna din feedback</h2>
      </div>

      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <div class="alert alert-info" role="alert" style="font-size: 16px;" id="infobox"><strong>Vi skulle bli väldigt tacksamma</strong> om Du tog ett par minuter att besvara nedan frågor/påstående angående vårt senaste sammarbete. Tack för gott sammarbetet, med hopp om fler möjligheter i framtiden.<p>- Tenco</p></div>
            <div class="alert alert-success" role="alert" style="display:none; font-size: 16px;" id="success_msg"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span> <strong>Tack för din input</strong></div>
            <form id="feedbackForm" method="POST">
              <input type="hidden" name="feedbackID" value="<?=$id?>">
              <div style="display:none"><input type="text" name="name" value=""></div>
              <!--div class="form-group">
                <label for="exampleInputEmail1">1. Tenco var tydliga i sitt upplägg och sin process</label>
                <div class="range range-success">
                  <input id="rangeSelector0" type="range" class="rangeSelector" name="range" min="0" max="10" value="5" step="1">
                  <output id="range0" class="rangeValue">Stämmer ungefär</output>
                </div>
              </div>

              <div class="checkbox input-lg">
                <label>
                  <input type="checkbox"> Donec ullamcorper nulla non metus auctor fringilla?
                </label>
              </div>
              
              <div class="form-group">
                <label for="exampleInputPassword1">2. Tenco var tydliga i sin kommunikation</label>
                <input type="text" class="form-control input-lg" id="example2" name="example2" placeholder="">
              </div -->

              <div class="form-group">
                <label for="exampleInputEmail1">1. Tenco var tydliga i sitt upplägg och sin process</label>
                <div class="btn-group btn-group-justified btn-group-lg btn-group-1" data-toggle="buttons">
                  <label class="btn btn-primary">
                    <input type="radio" name="q1" value="1" autocomplete="off"> <span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span> <span class="hidden-xs">Stämmer ej</span>
                  </label>
                  <label class="btn btn-primary">
                    <input type="radio" name="q1" value="2" autocomplete="off"> nja
                  </label>
                  <label class="btn btn-primary">
                    <input type="radio" name="q1" value="3" autocomplete="off">  <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> <span class="hidden-xs">Stämmer bra</span>
                  </label>
                </div>
              </div>

              <div class="form-group">
                <label for="question2">2. Tenco var tydliga i sin kommunikation</label>
                <div class="btn-group btn-group-justified btn-group-lg btn-group-2" data-toggle="buttons">
                  <label class="btn btn-primary">
                    <input type="radio" name="q2" value="1" autocomplete="off"> <span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span> <span class="hidden-xs">Stämmer ej</span>
                  </label>
                  <label class="btn btn-primary">
                    <input type="radio" name="q2" value="2" autocomplete="off"> nja
                  </label>
                  <label class="btn btn-primary">
                    <input type="radio" name="q3" value="3" autocomplete="off">  <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> <span class="hidden-xs">Stämmer bra</span>
                  </label>
                </div>
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">3. Tenco var lyhörda och flexibla under uppdraget</label>
                <div class="btn-group btn-group-justified btn-group-lg btn-group-2" data-toggle="buttons">
                  <label class="btn btn-primary">
                    <input type="radio" name="q3" value="1" autocomplete="off"> <span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span> <span class="hidden-xs">Stämmer ej</span>
                  </label>
                  <label class="btn btn-primary">
                    <input type="radio" name="q3" value="2" autocomplete="off"> nja
                  </label>
                  <label class="btn btn-primary">
                    <input type="radio" name="q3" value="3" autocomplete="off">  <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> <span class="hidden-xs">Stämmer bra</span>
                  </label>
                </div>
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">4. Resultatet/Leveransen motsvarade förväntningarna</label>
                <div class="btn-group btn-group-justified btn-group-lg btn-group-2" data-toggle="buttons">
                  <label class="btn btn-primary">
                    <input type="radio" name="q4" value="1" autocomplete="off"> <span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span> <span class="hidden-xs">Stämmer ej</span>
                  </label>
                  <label class="btn btn-primary">
                    <input type="radio" name="q4" value="2" autocomplete="off"> nja
                  </label>
                  <label class="btn btn-primary">
                    <input type="radio" name="q4" value="3" autocomplete="off">  <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> <span class="hidden-xs">Stämmer bra</span>
                  </label>
                </div>
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">5. Jag kan tänka mig att rekommendera Tenco</label>
                <div class="btn-group btn-group-justified btn-group-lg btn-group-2" data-toggle="buttons">
                  <label class="btn btn-primary">
                    <input type="radio" name="q5" value="1" autocomplete="off"> <span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span> <span class="hidden-xs">Stämmer ej</span>
                  </label>
                  <label class="btn btn-primary">
                    <input type="radio" name="q5" value="2" autocomplete="off"> nja
                  </label>
                  <label class="btn btn-primary">
                    <input type="radio" name="q5" value="3" autocomplete="off">  <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> <span class="hidden-xs">Stämmer bra</span>
                  </label>
                </div>
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">6. Följande uppskattade jag mest med sammarbetet</label>
                <textarea name="comment6" class="form-control input-lg" rows="3" placeholder="Skriv..."></textarea>
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">7. Följande ser jag gärna hade förbättrats</label>
                <textarea name="comment7" class="form-control input-lg" rows="3" placeholder="Skriv..."></textarea>
              </div>
              
              <div class="alert alert-danger" role="alert" style="display:none; font-size: 16px;" id="error_msg"><strong>Någonting har tyvärr gått galet.</strong> Vänligen försök igen eller ring och klaga på oss (0733 941144). Tack.</div>
              <button type="submit" class="btn btn-default btn-lg" id="submitButton">Skicka</button>
            </form>
          </div>
        </div> <!-- /row -->
      </div> <!-- /container -->

    </section>



 
  
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../../js/jquery-1.10.2.min.js"></script>
    <!-- script src="../../js/bootstrap.min.js"></script -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="../../js/feedback.js"></script>


    <script>
   

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
