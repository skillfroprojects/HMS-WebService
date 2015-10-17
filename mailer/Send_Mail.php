<?php
function Send_Mail($to,$subject,$body)
{
require 'class.phpmailer.php';
$from = "gautamsutaria@gmail.com";
$mail = new PHPMailer();
$mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
$mail->IsSMTP(true); // SMTP
$mail->SMTPAuth   = true; // SMTP authentication
$mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for Gmail
$mail->Mailer = "smtp";
$mail->Host       = "smtp.gmail.com"; // Amazon SES server, note "tls://" protocol
$mail->Port       = 587;                    // set the SMTP port
$mail->Username   = "gautamsutaria@gmail.com";  // SES SMTP  username
$mail->Password   = "gautam188";  // SES SMTP password
$mail->SetFrom($from, 'Gautam Sutaria');
$mail->AddReplyTo($from,'Gautam Sutaria');
//  $mail->AddAddress('whoto@otherdomain.com', 'John Doe');
//  $mail->SetFrom('name@yourdomain.com', 'First Last');
//  $mail->AddReplyTo('name@yourdomain.com', 'First Last');
//$mail->AddAttachment('images/phpmailer.gif');      // attachment
//  $mail->AddAttachment('images/phpmailer_mini.gif'); // attachment
$mail->Subject = $subject;
$mail->MsgHTML($body);
$address = $to;
$mail->AddAddress($address, $to);

if(!$mail->Send())
return false;
else
return true;

}
?>