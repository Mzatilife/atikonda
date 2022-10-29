<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './phpmailer/src/Exception.php';
require './phpmailer/src/PHPMailer.php';
require './phpmailer/src/SMTP.php';

$from = $_REQUEST['email'];
$name = $_REQUEST['name'];
$subject = $_REQUEST['subject'];
$cmessage = $_REQUEST['message'];

$mail = new PHPMailer(true);

//email confirmation
try {
	//Server settings
	$mail->SMTPDebug = 0; //SMTP::DEBUG_SERVER;                     
	$mail->isSMTP();
	$mail->Host       = 'smtp.gmail.com';
	$mail->SMTPAuth   = true;
	$mail->Username   = 'dreammallmw@gmail.com';
	$mail->Password   = 'pbndrhflsvnyqypi';
	$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
	$mail->Port       = 587;

	//Recipients
	$mail->setFrom($from, $name);
	$mail->addReplyTo($from, $name);
	$mail->From = "{$from}";
	$mail->addAddress('atimtenje@gmail.com');

	$mail->isHTML(true);

	$mail->Subject = "{$subject}";

	$mail->Body = "<div>{$cmessage}	</div>";

	$result = $mail->send();
	if ($result) {
		echo "<script>alert('Message sent successfully')</script>";
		echo "<script>window.open('index.php', '_self')</script>";
	} else {
		echo "<script>alert(Message could not be sent')</script>";
		echo "<script>window.open('index.php', '_self')</script>";
		// echo "Message could not be sent" . $e->getMessage();
	}
} catch (Exception $e) {
	echo "<script>alert('Message could not be sent')</script>";
	echo "<script>window.open('index.php', '_self')</script>";
	// echo "Message could not be sent{$mail->ErrorInfo}";
}
