<?php
// BOT TRAP!!
if (!empty($_POST['name']))
{
	exit("success");
}

//the fields
$name = trim($_POST['theName']);
$email = trim($_POST['theEmail']);
//$company = trim($_POST['theCompany']);
$plusname = trim($_POST['thePlusName']);
$plusemail = trim($_POST['thePlusEmail']);
//$pluscompany = trim($_POST['thePlusCompany']);

$name = filter_var($name, FILTER_SANITIZE_STRING);
$plusname = filter_var($plusname, FILTER_SANITIZE_STRING);
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
//$company = filter_var($company, FILTER_SANITIZE_STRING);
//$pluscompany = filter_var($pluscompany, FILTER_SANITIZE_STRING);


// check if fields passed are empty
if(empty($name) || !filter_var($email,FILTER_VALIDATE_EMAIL))
{
  exit("fail");
}


// -------------------------------------------
// --- ENTER YOUR EMAIL ADDRESS HERE
// -------------------------------------------

$to = 'office@tenco.se';

// -------------------------------------------



$email_subject = "Houesewarming submission";
$email_body = "A new partisipant from tenco.se/housewarming. \n\n".
				  "name: $name\n Plus one name: $plusname \n 
				  plus one email: $plusemail";
$headers = "From: $email\n";
$headers .= "Reply-To: $email";	
mail($to,$email_subject,$email_body,$headers);

exit("success");