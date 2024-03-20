<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Me</title>
	<link rel="stylesheet" href="index.css" type="text/css">
</head>
<body id="container">
<main>
<?php

//assigning key => values to input fields.
	$error = [];

	$inContactName = $_POST['name'];
	$inEmailName = $_POST['email'];
	$inContactOption = $_POST['contact_options'];
	$inContactMessage = $_POST['message'];
	$date = date("n/j/y");
	
//validating information in the input fields.
	if(empty($_POST[$inContactName])){
		$error = 'Name is empty';
	} 

	if (empty($_POST[$inEmailName])){
		$error = 'Email is empty';
	} else if(!filter_var($inEmailName, FILTER_VALIDATE_EMAIL)){
		$error = 'Email is invalid';
	}

	if (empty($_POST[$inContactOption])){
		$error = 'Please Select an option';
	} else if($inContactOption == 'Default'){
		$error = 'Pick a valid';
	}

	if (empty($_POST['message'])){
	
		$error = 'Message is empty';
	}

//Email response to user.
	$inEmail = $inEmailName;
	
	$message = "<p>Dear $inContactName,</p>\n
	<p>Thank you for filling out the contact form and showing interest.</p>
	<p>I will make sure to reply to you a s soon as I am able.</p> \n
	<p>Sincerely, William Nelson </p>";

	$message = wordwrap($message, 70, "\r\n");

	$to = $inEmail;
	$subject = "Thank you!";
	$header = "From: info@wknelson.net" . "\r\n";
	
//validation if the message was sent.
	if(mail($to,$subject,$message,$header)){
		echo "<p>Message sent.</p>";
	}else{
		echo "<p style='color:#a60707;'>There was an error. Message failed to send.</p>";
	}

?>
<?php 

	$toMe = "info@wknelson.net";
	$subjectMe = "Respose";
	$headerMe = "From: $inEmail";
	$messageMe = "The message: $inContactMessage";
	$messageDate = "Sent on: $date";

	mail($toMe, $subjectMe, $headerMe, $messageMe, $messageDate);


?>
</main>
</body>
</html>


