<?php
    
    // Only process POST reqeusts.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the form fields and remove whitespace.
        $q1 = 		strip_tags(trim($_POST["one"]));
        if (isset($_POST["other"]) && $q1 == 'option5')
        	$other = 	strip_tags(trim($_POST["other"]));
        $q2 = 		strip_tags(trim($_POST["two"]));
        $q3 = 		strip_tags(trim($_POST["three"]));

        // Check that data was sent to the mailer.
        /*
        if ( empty($name) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Set a 400 (bad request) response code and exit.
            http_response_code(400);
            echo "There was a problem with your submission. Please complete the form and try again.";
            exit;
        }
        */

        // Set the recipient email address.
        // FIXME: Update this to your desired email address.
        $recipient = "magnus@tenco.se";

        // Set the email subject.
        $subject = "ALMI TUFF FORM";

        // Build the email content.
        $email_content = "Question 1: $q1\n";
        if (isset($other) && $q1 == 'option5')
        	$email_content = "Question 1 other: $other\n";
        $email_content .= "Question 2:\n$q2\n\n";
        $email_content .= "Question 3:\n$q3\n";

        // Build the email headers.
        $email_headers = "From: ALMI FORM <magnus@tenco.se>";

        // Send the email.
        if (mail($recipient, $subject, $email_content, $email_headers)) {
            // Set a 200 (okay) response code.
            http_response_code(200);
            echo "Thank You! Your message has been sent.";
        } else {
            // Set a 500 (internal server error) response code.
            http_response_code(500);
            echo "Something went wrong and we couldn't send your message.";
        }

    } else {
        // Not a POST request, set a 403 (forbidden) response code.
        http_response_code(403);
        echo "There was a problem with your submission, please try again.";
    }

?>