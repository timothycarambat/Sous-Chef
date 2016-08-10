<?php 
$errors = 'a thing';
$myemail = 'souscheftechteam@gmail.com';//<-----Put Your email address here.
if(empty($_POST['name'])  || 
   empty($_POST['email']) || 
   empty($_POST['subject']) ||
   empty($_POST['message']))
{
    $errors = "\n Error: all fields are required";
	exit();
}

$name = $_POST['name']; 
$email_address = $_POST['email']; 
$subject = $_POST['subject'];
$message = $_POST['message']; 

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$email_address))
{
    $errors .= "\n Error: Invalid email address";
	exit();
}

if( empty($errors))
{
	$to = $myemail; 
	$email_subject = "$subject" ;
	$email_body = "$message\n\n"."Contact Info:\n$name\n$email_address"; 
	
	$headers = "From: $myemail\n"; 
	$headers .= "Reply-To: $email_address";
	
	mail($to,$email_subject,$email_body,$headers);
	header("Location: index2.html");
	exit();

} 

	
?>



