<?php
// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['phone']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }
	
$name = $_POST['name'];
$email_address = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];
	
// Create the email and send the message
$to 						= 'thedijje.ic@gmail.com,dheeraj@thedijje.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject	= "Website Contact Form:  $name";
$email_body		= "You have received a new message from your website contact form.\n\n"."Here are the details:<br>Name: $name<br>Email: $email_address<br>Phone: $phone<br>Message:\n$message";
    $headers  = "From: Thedijje.com < no-reply@thedijje.com >\n";
    $headers .= "Cc: Thedijje < dheeraj@thedijje.com >\n"; 
    $headers .= "X-Sender: Thedijje.com < no-reply@thedijje.com >\n";
    $headers .= 'X-Mailer: PHP/' . phpversion();
    $headers .= "X-Priority: 1\n"; // Urgent message!
    $headers .= "Return-Path: dheeraj@thedijje.com\n"; // Return path for errors
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=iso-8859-1\n";
    
mail($to,$email_subject,$email_body,$headers);
return true;			
