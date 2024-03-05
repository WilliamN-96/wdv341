<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WDV101 Basic Form Handler Example</title>
<style>
	table{
		background-color:lightblue;
		width:1000px;
		border-radius:5px;

		
	}
</style>
</head>

<body>
<h1>WDV101 Intro HTML and CSS</h1>
<h2>WDV341 Intro PHP - Two Part Form Handler Example</h2>
<h2>UNIT 3 Forms - Lesson 2 Server Side Processes</h2>

<p>This page will demonstrate how a server side application will take the data that was entered on a form and display it within an HTML table. This example will work for any form. It is setup to read any or all fields on a form without needing any changes.  Other applications are more specific to the form they process and require updates anytime the form is changed.</p>

<h3>Instructions</h3>

<p>The table below displays the 'name=value' pairs that were entered on the form and processed on the server.  This page is a result of that server side process.</p>
<p>The <strong>Field Name</strong> column contains the value of the name attribute for each field on the form. <em>Example: &lt;input name=&quot;first_name&quot;&gt;</em>  This displays what you coded into the HTML. NOTE: If you do not have a name attribute for a field OR if the name attribute does not have a value the form will NOT send the data to the server.</p>
<p>The <strong>Value of Field</strong> column contains the value of each field that was sent to the server by the form. This will vary depending upon the HTML form element and how the value attribute was used for a field.</p>
<h3>Form Name-Value Pairs</h3>
<?php

	echo "<table border='1'>";
	echo "<tr><th>Field Name</th><th>Value of Field</th></tr>";
	foreach($_POST as $key => $value)
	{
		echo '<tr>';
		echo '<td>',$key,'</td>';
		echo '<td>',$value,'</td>';
		echo "</tr>";
	} 
	echo "</table>";
	echo "<p>&nbsp;</p>";

	//$_POST["first_name"] is an associative array
	// associative array uses WORDs as the key/index
	// the value of the first is associated with the key: first_name.

?>

<h3>Thank Letter V.1</h3>
<p>Dear <?php echo $_POST["first_name"]; ?></p>
<p>Thank you for filling out the form. We thank you for your interest in <?php echo $_POST["school_name"]; ?></p>

<?php
	$inFirstName = $_POST['first_name'];
	$inLastName = $_POST['last_name'];
	$inSchoolName = $_POST['school_name'];
	$inEmailName = $_POST['email_name'];
	$inAcademicStanding = $_POST['academicStanding'];
	$inProgramChoice = $_POST['programChoices'];
	$incontactPreferences = $_POST['contact_prefernces'];
	$inComments = $_POST['comment_section'];
?>

<h3>Thank Letter V.2</h3>
<p>Dear <?php echo $inFirstName; ?></p>
<p>Thank you for filling out the form. We thank you for your interest in <?php echo $inSchoolName; ?></p>
<p>We have you listed as a <?php echo $inAcademicStanding?> starting this fall.</p>
<p>You have declared <?php echo $inProgramChoice; ?> as your major.</p>
<p>Based on your responses we will provide the following information in our conformation emial to you at <?php echo $inEmailName; ?></p>
<p>
	<?php
	echo $inProgramChoice; 
	?></br>
</p>
<p>You have shared the following comments which we will review: <?php echo $inComments; ?></p>



<?php

	$inEmail = $inEmailName;

	$message = "Dear $inFirstName,\n";
	$message .= 'Thank you for filling out the form. We thank you for your interest in' . $inSchoolName . '.';
	$message .= 'Sincerely, Management';



	$to = $inEmail;	//the email address of the person who sent us a message
	$subject = "Thank you for your interes!";
	$header = "From: webmaseter@example.com" . "\r\n";

	if(mail($to,$subject,$message,$header)){
		//true branch
		echo "<h1>Email submitted to Server</h1>";
	}else{
		//false branch
		echo "<h1 style='color:red;'>Message Failed to send</h1>";
	}
	;

?>



</body>
</html>
