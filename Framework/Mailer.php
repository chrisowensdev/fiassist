<?php

namespace Framework\PHPMailer;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once('PHPMailer.php');
require_once('SMTP.php');

class Mailer extends PHPMailer
{
    private $config;

    public function __construct(array $config, $exceptions = true)
    {
        $this->config = $config;
        $this->isSMTP();
        $this->SMTPDebug = 2;
        $this->Host = 'smtp.hostinger.com';
        $this->Port = 587;
        $this->SMTPAuth = true;
        $this->Username = $config['supportAddress'];
        $this->Password = $config['supportPassword'];
        $this->addReplyTo($config['supportAddress'], 'Support');
        $this->msgHTML(file_get_contents('message.html'), __DIR__);
        //$mail->addAttachment('attachment.txt');
    }

    // send security code email
    public function sendSecurityCodeEmail($email, $name, $code)
    {

        $mail_subject = "Security code account";
        $html_body = "";
        $mail_body = " Hey here is a test email and security code is: " . $code;
        $email_sent = self::sendEmail($email, $name, $mail_subject, $html_body, $mail_body);

        return $email_sent;
    }


    public static function sendEmail($to_email, $to_name, $subject, $html_body, $email_body)
    {
        $mail_sent = false;
        try {
            $mail = new PHPMailer;
            $mail->setFrom('support@chrisowens.dev', "Example");
            $mail->addAddress($to_email, $to_name);

            $mail->Subject = $subject;

            if (!empty($html_body)) {
                $mail->isHTML(true);
                $mail->AltBody = $email_body;
                $mail->Body = $html_body;
            } else {
                $mail->Body = $email_body;
            }

            if ($mail->send()) $mail_sent = true;
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

        return $mail_sent;
    }
}
