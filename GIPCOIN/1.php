<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;






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
		$mail->Password = "muhzlfkkqraqmdqe";
		$mail->Subject = "titel test";//
		$mail->setFrom('pieter.afr@gmail.com');
		$mail->isHTML(true);
		$mail->Body = "test bang bang";//
		$mail->addAddress("pieter.afr@gmail.com");
		if ( $mail->send() ) {
			echo   "gelukt";//
	
		}else{
			echo $mail->ErrorInfo;
		}
?>