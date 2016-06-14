<?php
/*
// BOT TRAP!!
if (!empty($_POST['name']))
{
	exit("success");
}

// check if fields passed are empty
if(empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	  exit("fail");
   }
	
   $email_address = $_POST['email'];
   $message = $_POST['message'];




// -------------------------------------------
// --- ENTER YOUR EMAIL ADDRESS HERE
// -------------------------------------------

$to = 'office@tenco.se';

// -------------------------------------------



$email_subject = "Contact form submitted on tenco.se";
$email_body = "A new message from tenco.se. \n\n".
				  "Email: $email_address\n Message: \n $message";
$headers = "From: $email_address\n";
$headers .= "Reply-To: $email_address";	
mail($to,$email_subject,$email_body,$headers);

exit("success");