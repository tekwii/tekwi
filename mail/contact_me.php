<?php
// Check for empty fields
if(empty($_POST['name'])      ||
   empty($_POST['lastname'])     ||
   empty($_POST['email'])     ||
   empty($_POST['message'])   ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
   echo "No arguments Provided!";
   return false;
   }
   
$name = strip_tags(htmlspecialchars($_POST['name']));
$lastname = strip_tags(htmlspecialchars($_POST['lastname']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$message = strip_tags(htmlspecialchars($_POST['message']));
   
// Create the email and send the message
$to = 'info@tekwi.wz.sk'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "TekWi Graphic kontakt od:  $name";
$email_body = "Dostal si novu spravu z tvojej stranky.\n\n"."Viac detailov tu:\n\nMeno: $name\n\nPriezvisko: $lastname\n\nEmail: $email_address\n\nSprava:\n$message";
$headers = "Od: \n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";   
mail($to,$email_subject,$email_body,$headers);
return true;         
?>