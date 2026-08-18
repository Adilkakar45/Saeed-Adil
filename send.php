<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name    = $_POST['name'];
    $email   = $_POST['email'];
    $phone   = $_POST['phone'];
    $message = $_POST['message'];

    $mail = new PHPMailer(true);

    try {
        // SMTP settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;

        // Your Gmail
        $mail->Username   = 'muhammadsaeedadil@gmail.com';
        $mail->Password   = 'uchs zjlb azch vewv';  // generated from Google

        $mail->SMTPSecure = 'ssl';
        $mail->Port       = 465;

        // sender and receiver
        $mail->setFrom($email, $name);
        $mail->addAddress('muhammadsaeedadil@gmail.com');  // your email to receive messages

        // email content
        $mail->isHTML(true);
        $mail->Subject = 'Portfolio Message';

        $mail->Body = "
            <h3>New Message from Website</h3>
            <p><strong>Name:</strong> $name</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Phone:</strong> $phone</p>
            <p><strong>Message:</strong><br>$message</p>
        ";

        $mail->send();
        echo "Message sent successfully!";
    }
    catch (Exception $e) {
        echo "Message could not be sent. Error: {$mail->ErrorInfo}";
    }
}
?>
