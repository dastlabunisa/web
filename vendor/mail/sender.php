<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {   
    $nome = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];
    
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Port = 587;// TCP port to connect to
    $mail->SMTPAuth = true;// Enable SMTP authentication
    $mail->SMTPSecure = 'tls';// Enable TLS encryption, `ssl` also accepted
    $mail->Host = 'smtp.gmail.com';// Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    
    $mail->Username = 'datascienceunisa@gmail.com';                 // SMTP username
    $mail->Password = 'FINV-12BS01041';                           // SMTP password
    
    //Recipients
    $mail->setFrom($email, $nome);
    //$mail->addAddress('ddesiato@unisa.it', '');  
    $mail->addAddress('scirillo@unisa.it', '');     
    //$mail->addAddress('lcaruccio@unisa.it', '');     
    //$mail->addAddress('gpolese@unisa.it', '');     
    //$mail->addAddress('deufemia@unisa.it', '');     
    $mail->addReplyTo($email, 'Information');
    
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');
    
    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $message;
    $mail->AltBody = 'Messaggio da '.$nome.' '.$email;
    
    $mail->send();

} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}