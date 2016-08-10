<?php 
$errors = '';
$myemail = 'rambat1010@gmail.com';//<-----Put Your email address here.


if(empty($_POST['name'])  || 
   empty($_POST['email']) || 
   empty($_POST['message']))
{
    $errors = "\n Error: all fields are required";
}

$name = $_POST['name']; 
$email_address = $_POST['email']; 
$subject = $_POST['subject'];
$message = $_POST['message']; 

if(empty($_POST['subject']))
{
    $subject = "No Subject-Form Submission";
}

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$email_address))
{
    $errors .= "\n Error: Invalid email address";
	exit();
}

if(isset($_POST['newsletter']) && 
   $_POST['newsletter'] == 'Yes') 
{
   $newsletter = 'Yes'; 
}
else
{
    $newsletter = 'No'; 
}    

if( empty($errors))
{
	$to = $myemail; 
	$email_subject = "$subject" ;
	$email_body = "$message\n\n"."Contact Info:\n$name\n$email_address\n"."Newsletter:"."$newsletter"; 
	
	$headers = "From: $myemail \n"; 
	$headers .= "Reply-To: $name $email_address";
	

	mail($to,$email_subject,$email_body,$headers);
	

} 
	header("Location: index2.html");
	
?>



