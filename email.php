<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.example.com'; // Set the SMTP server to send through
        $mail->SMTPAuth = true;
        $mail->Username = 'birhanugirum30@gmail.com'; // SMTP username
        $mail->Password = 'your_password'; // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        //Recipients
        $mail->setFrom('your_email@example.com', 'Mailer');
        $mail->addAddress('birhanugirum30@gmail.com', 'Birhanu Girum');

        // Content
        $mail->isHTML(true);
        $mail->Subject = "Contact Form Submission from $name";
        $mail->Body    = "Name: $name<br>Email: $email<br><br>Message:<br>$message";

        $mail->send();
        echo 'Email successfully sent!';
    } catch (Exception $e) {
        echo "Email sending failed. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
