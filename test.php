<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_CONNECTION;
    $mail->isSMTP();
    $mail->Host        = 'mail.fap-agri.com';
    $mail->SMTPAuth    = true;
    $mail->Username    = 'noreply@fap-agri.com';
    $mail->Password    = 'FAP2023vip';
    $mail->SMTPSecure  = null;
    $mail->Port       = 587;
    $mail->SMTPAutoTLS = true;

    //Recipients
    $mail->setFrom('noreply@fap-agri.com');
    $mail->addAddress('adam.pm77@gmail.com');

    //Content

    $body = "Dear SIti Nur,<br />";
    $body .= "Terima Kasih Anda Sudah Mengajukan Lamaran Pekerjaan Fap-Agri dengan Posisi (Jabatan)<br />";
    $body .= "Lamaran Akan Kami Segera Kami Proses dan akan segera kami beritahukan berikutnya.<br />";
    $body .= "Demikian dan Terima kasih.<br />";
    $body .= "Regards,<br />";
    $body .= "Recrutment FAP AGRI<br />";

    $mail->isHTML(true);
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
