<?php


	#var_dump($_POST);
	// BOT TRAP!!
	if (!empty($_POST['name']))
	{
		exit("successsss");
	}

	$thedata = var_export($_POST, true);

	// -------------------------------------------
	// --- ENTER YOUR EMAIL ADDRESS HERE
	// -------------------------------------------

	$to = 'magnus@tenco.se';

	// -------------------------------------------



	$email_subject = "Feedback form submitted on tenco.se";
	$email_body = "New feedback from tenco.se.\n\n";
	$email_body .= $thedata;
	$headers = "From: office@tenco.se";
	$headers .= "Reply-To: office@tenco.se";	
	mail($to,$email_subject,$email_body,$headers);

	print($email_body);
	exit("success");

?>