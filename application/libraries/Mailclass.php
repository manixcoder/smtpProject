<?php
require 'php/PHPMailer/PHPMailerAutoload.php';
require 'php/PHPMailer/class.smtp.php';
defined('BASEPATH') OR exit('No direct script access allowed');
class Mailclass 
{
	public $user_mail;
	public $message;
	public function some_method($user_mail,$message,$subject)
	{
		$mail = new PHPMailer;
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		$mail->Username = 'eweba1test@gmail.com';
		$mail->Password = 'plokijuh12345';
		$mail->SMTPSecure = 'tls';
		$mail->Port = 465;
		$mail->setFrom('eweba1test@gmail.com', 'i-washy');
		//$mail->addReplyTo('testdemo198@gmail.com', 'CodexWorld');
		$mail->addAddress($user_mail);
		//$mail->addCC($user_mail);
		//$mail->addBCC('puneet.singh@a1professionals.info');
		$mail->Subject = $subject;
		$mail->isHTML(true);
		$mailContent = $message;
		//$mailContent = "<h1>$message</h1><p>Thanks You.</p>";
		$mail->Body = $mailContent;
		if(!$mail->send())
			{
				return false;
			}
			else
			{
				return true;
			}
	}
}
?>