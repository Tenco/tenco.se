(function()
{

	$('form#contactForm').on('submit',function(e)
	{

		var form = $(this);
		var method = "POST";
		var url = "ajax/contact.php";

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
					}, 3000);
				}
				else
				{
					$('#contactForm').slideUp();
					$('#error_msg').slideUp();
					$('#success_msg').slideDown();
				}
					
			}

		});

		
		e.preventDefault();
	
	});

})();