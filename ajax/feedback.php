<?php


	#var_dump($_POST);
	// BOT TRAP!!
	if (!empty($_POST['name']))
	{
		exit("ok");
	}

	if ( ! ctype_alnum($_POST['feedbackID']))
	{
		exit("ok");
	}

	// SAVE THE ANSWERS:
	$filename = $_POST['feedbackID'].'_'.time().'.txt';
	$file = '../feedback/data/'.$filename;
	$thedata = var_export($_POST, true);
	// Write the contents back to the file
	file_put_contents($file, $thedata);

	// -------------------------------------------
	// --- MAIL
	// -------------------------------------------

	$to = 'magnus@tenco.se';
	$email_subject = "Feedback form submitted on tenco.se";
	$email_body = "New feedback from tenco.se";
	$headers = "From: office@tenco.se";
	$headers .= "Reply-To: office@tenco.se";	
	mail($to,$email_subject,$email_body,$headers);

	exit("success");

?>