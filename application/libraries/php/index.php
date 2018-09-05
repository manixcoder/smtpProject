<?php
// Include phpmailer class
require 'PHPMailer/PHPMailerAutoload.php';require 'PHPMailer/class.smtp.php';
$mail = new PHPMailer;
// $mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'eweba1test@gmail.com';
$mail->Password = 'plokijuh12345';
$mail->SMTPSecure = 'tls';
$mail->Port = 465;
$mail->setFrom('eweba1test@gmail.com', 'CodexWorld');
$mail->addReplyTo('testdemo198@gmail.com', 'CodexWorld');
$mail->addAddress('john@gmail.com');
$mail->addCC('parasharamantyagi@gmail.com');
$mail->addBCC('puneet.singh@a1professionals.info');
$mail->Subject = 'Send Email via SMTP using PHPMailer';
$mail->isHTML(true);
$mailContent = "<h1>Send HTML Email using SMTP in PHP</h1>
    <p>This is a test email sending using SMTP mail server with PHPMailer.</p>";
$mail->Body = $mailContent;
if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
