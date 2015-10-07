(function()
{

	// SUBMIT FEEDBACK \\

	$('form#feedbackForm').on('submit',function(e)
	{
		
		$('#submitButton').prop("disabled", true);

		var form = $(this);
		var method = "POST";
		var url = "../../ajax/feedback.php";

		$.ajax({
			type: 		method,
			url: 		url,
			data: 		form.serialize(),
			success: 	function(respons)
			{
				if (respons == "fail")
				{
					$('#error_msg').slideDown();
					setTimeout(function() {
						// Do something after 3 seconds
						$('#error_msg').slideUp();
					}, 10000);
					$('#submitButton').prop("disabled", false);
				}
				else
				{
					$('#feedbackForm').slideUp();
					$('#infobox').slideUp();
					$('#error_msg').slideUp();
					$('#success_msg').slideDown();
				}
					
			}

		});
	
		
		e.preventDefault();
	
	});


})();


//$().button('toggle');


