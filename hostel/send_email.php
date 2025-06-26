<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

function sendConfirmationEmail($emailid, $fullname, $roomno, $seater, $stayfrom, $duration, $foodstatus) {
    $mail = new PHPMailer(true);
   


    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'shaikhussain2402@gmail.com'; // Replace with your email
        $mail->Password = 'sskh tpdl zjow tdfq';    // Use App Password, not Gmail password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Sender and recipient
        $mail->setFrom('shaikhussain2402@gmail.com', 'Hostelio Admin');
        $mail->addAddress($emailid, $fullname);

        // Email content
        $mail->isHTML(true);
        $mail->Subject = 'Hostel Registration Confirmation';
        $mail->Body    = "
            Dear $fullname,<br><br>
            Thank you for registering for hostel accommodation.<br><br>
            <strong>Room No:</strong> $roomno<br>
            <strong>Seater:</strong> $seater<br>
            <strong>Stay From:</strong> $stayfrom<br>
            <strong>Duration:</strong> $duration months<br>
            <strong>Food:</strong> " . ($foodstatus ? "With Food" : "Without Food") . "<br><br>
            Regards,<br>Hostel Admin
        ";

        $mail->send();
        return true;
    } catch (Exception $e) {
        return "Mailer Error: {$mail->ErrorInfo}";
    }
}
