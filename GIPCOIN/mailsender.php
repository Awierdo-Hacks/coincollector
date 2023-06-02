<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


function sendMail(string $message, string $address) {
	require 'includes/PHPMailer.php';
	require 'includes/SMTP.php';
	require 'includes/Exception.php';
	$mail = new PHPMailer();
	$mail->isSMTP();
	$mail->Host = "smtp.gmail.com";
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = "tls";
	$mail->Port = "587";
	$mail->Username = "pieter.afr@gmail.com";
	$mail->Password = "nrhndttrekelpgke";
	$mail->Subject = "coincollector";//
	$mail->setFrom("pieter.afr@gmail.com");
	$mail->isHTML(true);
	$mail->Body = $message;//
	$mail->addAddress($address);
	return $mail->send();

}
//nrhndttrekelpgke

?>