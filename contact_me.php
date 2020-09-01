<?php
// Check for empty fields
if(empty($_POST['name'])      ||
   empty($_POST['email'])     ||
   //empty($_POST['option'])     ||
   empty($_POST['message'])   ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
   echo "Falta completar algún campo, por favor complete los 4 pasos del formulario.";
   return false;
   }
   
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$option = strip_tags(htmlspecialchars($_POST['option']));
$message = strip_tags(htmlspecialchars($_POST['message']));
   
// Create the email and send the message
$to = 'info@raicesurbanas.com.ar'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Contacto desde web Raices Urbanas:  $name";
$email_body = "Has recibido un mensaje desde la web de raices urbanas\n\n"."Nombre: $name\n\nEmail: $email_address\n\nOpcion: $option\n\nMensage: $message";
$headers = "From: noreply@raicesurbanas.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";   
mail($to,$email_subject,$email_body,$headers);
include 'confirma.html'; //se debe crear un html que confirma el envío
//return true;   
      
?>