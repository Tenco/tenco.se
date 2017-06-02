(function()
{

	$('form#contactForm').on('submit',function(e)
	{

		var form = $(this);
		var method = "POST";
		var url = "../ajax/contact.php";

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


(function()
{

	$('form#submitForm').on('submit',function(e)
	{

		//alert("submit");

		var form = $(this);
		var method = "POST";
		var url = "/ajax/notify.php";

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
						// Do something after 4 seconds
						$('#error_msg').slideUp();
					}, 4000);
				}
				else
				{
					$('#submitForm').slideUp();
					$('#error_msg').slideUp();
					$('#success_msg').slideDown();
				}
					
			}

		});

		
		e.preventDefault();
	
	});

})();

(function()
{

	$('#plusOne').on('click',function(e)
	{

		// alert("submit");
		

		$('#plusoneForm').slideDown();
			setTimeout(function() {
			// Do something after 4 seconds
			$('#plusOne').slideUp();
		}, 1000);

		
		e.preventDefault();
	
	});

})();