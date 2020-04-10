<?php

namespace MyProject\Services;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require __DIR__ . '/../../PHPMailer/src/Exception.php';
require __DIR__ . '/../../PHPMailer/src/PHPMailer.php';
require __DIR__ . '/../../PHPMailer/src/SMTP.php';


use MyProject\Models\Users\User;
use MyProject\Exceptions\MailException;

class EmailSender
{
    public static function send(
        User $receiver,
        string $subject,
        string $templateName,
        array $templateVars = []
    ): void {
        extract($templateVars);

        ob_start();
        require __DIR__ . '/../../../templates/mail/' . $templateName;
        $body = ob_get_contents();
        ob_end_clean();

        static::mail($receiver->getEmail(), $subject, $body);

    }

    private static function mail(string $to, string $subject, string $body, string $header='') {

        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            /* $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output */
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.mailtrap.io';                     // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = getenv('MAILER_USER');                       // SMTP username
            $mail->Password   = getenv('MAILER_PASSWORD');                       // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom(getenv('MAILER_FROM_EMAIL'), 'Mailer');
            $mail->addAddress($to, 'Joe User');     // Add a recipient Name is optional

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $body;
            $mail->CharSet = "utf-8";

            $mail->send();
        } catch (Exception $e) {
            throw new MailException("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
        }
    }
}
