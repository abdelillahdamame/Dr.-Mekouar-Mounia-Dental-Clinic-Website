<?php
ini_set('include_path', value: '.;C:\php\pear;C:\Users\ayman\Desktop\Site_DrMekour_Front_End\vendor');

require __DIR__ . '/../vendor/autoload.php';

require __DIR__ . '/../vendor/phpmailer/phpmailer/src/Exception.php';
require __DIR__ . '/../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require __DIR__ . '/../vendor/phpmailer/phpmailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

// Retrieve form data
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// Email message content
$email_message = "
Name: $name
Email: $email
Phone: $phone
Subject: $subject
Message: $message
";

try {
    // Initialize PHPMailer
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.hostinger.com'; // Hostinger SMTP server
    $mail->SMTPAuth = true;
    $mail->Username = 'Contact@drmekouarmounia.com'; // Your Hostinger email address
    $mail->Password = 'Drmekouar,123'; // Your Hostinger email password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Encryption type (STARTTLS)
    $mail->Port = 587; // SMTP port for STARTTLS
    $mail->SMTPDebug = SMTP::DEBUG_SERVER; // Verbose debugging output

    // Email settings
    $mail->setFrom('Contact@drmekouarmounia.com', 'Dr. Mekouar Mounia'); // Match the authenticated email

    $mail->addAddress('contact@drmekouarmounia.com'); // Recipient email
    $mail->addReplyTo($email, $name); // Reply-To address

    // Email content
    $mail->isHTML(false); // Set email format to plain text
    $mail->Subject = "vous avez reçu une nouvelle message depuis le site web: $subject";
    $mail->Body = $email_message;

    // Send the email
    $mail->send();
    header("Location: ../contact-success.html");
} catch (Exception $e) {
    // Check if the error is related to SMTP authentication
    if (strpos($mail->ErrorInfo, 'SMTP Error: Could not authenticate') !== false) {
        echo "Authentication Error: Please verify your SMTP username and password.";
    } elseif (strpos($mail->ErrorInfo, 'Sender address rejected') !== false) {
        echo "Sender Address Error: The sender address is not recognized by the SMTP server.";
    } else {
        // Generic error message
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>