
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../favicon.ico">

    <title>ALMI TUFF Formulär</title>

    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <style>
    /* Sticky footer styles
		-------------------------------------------------- */
		html {
		  position: relative;
		  min-height: 100%;
		}
		body {
		  /* Margin bottom by footer height */
		  margin-bottom: 60px;
		}
		.footer {
		  position: absolute;
		  bottom: 0;
		  width: 100%;
		  /* Set the fixed height of the footer here */
		  height: 60px;
		  background-color: #f5f5f5;
		}


		/* Custom page CSS
		-------------------------------------------------- */
		/* Not required for template or sticky footer method. */

		.container {
		  width: auto;
		  max-width: 680px;
		  padding: 0 15px;
		}
		.container .text-muted {
		  margin: 20px 0;
		}
    </style>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!--link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet" -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <!-- Begin page content -->
    <div class="container">
      <div class="page-header">
        <h1>TUFF-träff den 26 sept 2017 kl 08:30</h1>
      </div>
      <p class="lead">Vänligen dela med dig av dina erfarenheter som företagare genom att svara på nedan 3 frågor inför TUFF co-creation workshop. Dina svar är anonyma och används till att gemensamt med andras svar forma riktning på workshopen</p>

      <div>

      	<form style="margin-top:40px; margin-bottom:40px;" id="ajax-send" method="POST" action="/tuff/tuffsend.php">
 
		   <fieldset class="form-group">
		  	<span style="margin-bottom: 20px; font-size: 21px;">1. Jag går på TUFFs nätverksträffar, främst för att:</span>
		    <div class="form-check">
		      <label class="form-check-label">
		        <input type="radio" class="form-check-input" name="one" id="optionsRadios1" value="option1" checked>
		        Exponera mitt företag
		      </label>
		    </div>
		    <div class="form-check">
		    <label class="form-check-label">
		        <input type="radio" class="form-check-input" name="one" id="optionsRadios2" value="option2">
		        Ny kunskap/inspiration
		      </label>
		    </div>
		    <div class="form-check">
		    <label class="form-check-label">
		        <input type="radio" class="form-check-input" name="one" id="optionsRadios3" value="option3" >
		        Hitta samarbetspartners
		      </label>
		    </div>
		    <div class="form-check ">
		    <label class="form-check-label">
		        <input type="radio" class="form-check-input" name="one" id="optionsRadios4" value="option4" >
		        Gratis frukost
		      </label>
		    </div>
		    <div class="form-check form-check-inline">
		    <label class="form-check-label">
		        <input type="radio" class="form-check-input" name="one" id="optionsRadios5" value="option5" >
		        Annat: <input type="text" id="other" name="other" style="height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;" disabled>
		      </label>
		    </div>
		  </fieldset>
		  <div class="form-group">
		    <span style="margin-bottom: 20px; font-size: 21px;">2.  Beskriv en utmaning du som företagare brottas med för tillfället:</span>
		    <textarea class="form-control" id="exampleTextarea" rows="4" name="two" placeholder="Max 200 tecken" maxlength="200"></textarea>
		  </div>
		  <div class="form-group">
		     <span style="margin-bottom: 20px; font-size: 21px;">3.  Vilken fråga skulle du gärna vilja diskutera med andra företagare?</span>
		    <textarea class="form-control" id="exampleTextarea" rows="4" name="three" placeholder="Max 200 tecken" maxlength="200"></textarea>
		  </div>
		  <button type="submit" class="btn btn-primary">Skicka</button>
		</form>

		<div class="alert alert-success" style="display:none;" id="sucessmsg">
  			<strong>Tack!</strong> Vi ses den 26 september.
		</div>


		<div class="alert alert-danger" style="display:none;" id="errormsg">
		  <strong>Tekniskt problem!</strong> Tyvärr inträffade ett problem, vänligen prova igen.
		</div>

      </div>

    </div>

    <footer class="footer">
      <div class="container">
        <p class="text-muted text-center">Tenco &copy; 2017</p>
      </div>
    </footer>
  </body>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <script>
  	

  	$(function(){
	  $(".form-check-input").change(function(){
	    if ($("#optionsRadios5").is(':checked'))
	    {
	      	$('#other').attr('disabled', false);
	    }
	    else
	    {
	    	$('#other').val('');
	    	$('#other').attr('disabled', true);
	    }
	  });
	});

	// ajax email function
	$(function() {

    // Get the form.
    var form = $('#ajax-send');

    // Set up an event listener for the contact form.
    $(form).submit(function(e) {
        // Stop the browser from submitting the form.
        e.preventDefault();

        // Serialize the form data.
        var formData = $(form).serialize();

        // Submit the form using AJAX.
        $.ajax({
            type: 'POST',
            url: $(form).attr('action'),
            data: formData
        })
        .done(function(response) {
        	$(form).slideUp();
            $( "#sucessmsg" ).show();
        })
        .fail(function(data) {
            //$( "#errormsg" ).show();
            $("#errormsg").show().delay(5000).fadeOut();
        });

    });

});

  </script>
</html>
