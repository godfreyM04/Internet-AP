<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load PHPMailer only once (better at the top of the file, not inside a method)
require 'Plugins/PHPMailer/vendor/autoload.php';

class MailService {
    public function sendMail(array $config, array $mailData): bool {
        $mailer = new PHPMailer(true);

        try {
            // SMTP server settings
            $mailer->SMTPDebug  = SMTP::DEBUG_OFF;   // Disable debug output
            $mailer->isSMTP();
            $mailer->Host       = $config['smtp_host'] ?? 'localhost';
            $mailer->SMTPAuth   = true;
            $mailer->Username   = $config['smtp_user'] ?? '';
            $mailer->Password   = $config['smtp_pass'] ?? '';
            $mailer->SMTPSecure = $config['smtp_secure'] ?? PHPMailer::ENCRYPTION_STARTTLS;
            $mailer->Port       = $config['smtp_port'] ?? 587;

            // Recipients
            $mailer->setFrom($mailData['mail_from'], $mailData['name_from'] ?? '');
            $mailer->addAddress($mailData['mail_to'], $mailData['name_to'] ?? '');

            // Content
            $mailer->isHTML(true);
            $mailer->Subject = $mailData['subject'] ?? '(No Subject)';
            $mailer->Body    = $mailData['body'] ?? '';

            $mailer->send();
            return true;

        } catch (Exception $e) {
            // Optionally log $mailer->ErrorInfo
            return false;
        }
    }
}
