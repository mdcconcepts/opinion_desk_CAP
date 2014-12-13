<?php

require_once('./class.phpmailer.php');
require_once('./class.smtp.php');
//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

$mail = new PHPMailer();

//$body = file_get_contents('contents.html');
//$body = eregi_replace("[\]", '', $body);

$mail->IsSMTP(); // telling the class to use SMTP
//$mail->Host = "mail.yourdomain.com"; // SMTP server
//$mail->SMTPDebug = 2;                     // enables SMTP debug information (for testing)
// 1 = errors and messages
// 2 = messages only
$mail->SMTPAuth = true;                  // enable SMTP authentication
$mail->SMTPSecure = "tls";                 // sets the prefix to the servier
$mail->Host = "smtp.gmail.com";      // sets GMAIL as the SMTP server
$mail->Port = 587;                   // set the SMTP port for the GMAIL server
$mail->Username = "vikrambghadge@gmail.com";  // GMAIL username
$mail->Password = "vikram0207";            // GMAIL password

$mail->SetFrom('vikrambghadge@gmail.com', 'vikram ghadge');

$mail->AddReplyTo("vikrambghadge@gmail.com", "vikram ghadge");

$mail->Subject = "PHPMailer Test Subject via smtp (Gmail), basic";

$mail->AltBody = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

$mail->MsgHTML($body);

$address = "vikrambghadge@gmail.com";
$mail->AddAddress($address, "vikram ghadge");

//$mail->AddAttachment("images/phpmailer.gif");      // attachment
//$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment

if (!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}
?>