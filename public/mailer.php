<?php
require '../vendor/autoload.php';
require '../helpers.php';

$config = require '../config/mail.php';

use PHPMailer\PHPMailer\PHPMailer;

$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 2;
$mail->Host = 'smtp.hostinger.com';
$mail->Port = 587;
$mail->SMTPAuth = true;
$mail->Username = $config['supportAddress'];
$mail->Password = $config['supportPassword'];
$mail->setFrom('support@chrisowens.dev', 'Support');
$mail->addReplyTo('support@chrisowens.dev', 'Support');
$mail->addAddress('guitarrockstarco@yahoo.com', 'Chris Owens');
$mail->Subject = 'Checking if PHPMailer works';
$mail->msgHTML(file_get_contents('message.html'), __DIR__);
$mail->Body = 'This is just a plain text message body';
//$mail->addAttachment('attachment.txt');
if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'The email message was sent.';
}
