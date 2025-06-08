<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

function sendRegistrationEmail($userEmail) {
    $mail = new PHPMailer(true);

    try {
        //Server settings
       // $mail->SMTPDebug = 2; // Enables verbose debug output
        $mail->isSMTP();
        $mail->Host       = 'ccc.com'; // Your SMTP server
        $mail->SMTPAuth   = true;
        $mail->Username   = 'cc.com'; // SMTP username
        $mail->Password   = ''; // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable STARTTLS encryption
        $mail->Port       = 587; // TCP port for STARTTLS

        //Recipients
        $mail->setFrom('ccc.com', 'ClearTech');
        $mail->addAddress($userEmail); // Add a recipient

        // Content
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = 'Registration Confirmation';
        $mail->Body    = 'Thank you for registering with our service. Your email has been successfully registered.';

        $mail->send();
        header('Location: login.php');
        exit;
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
