<?php 

require("vendor/autoload.php");

use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($subject, $body, $email, $name, $html = false) {

    //Configuracion inicial
    $phpmailer = new PHPMailer();
    $phpmailer->isSMTP();
    $phpmailer->Host = 'smtp.gmail.com';
    $phpmailer->SMTPAuth = true;
    $phpmailer->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $phpmailer->CharSet = PHPMailer::CHARSET_UTF8;
    $phpmailer->Port = 465;
    $phpmailer->Username = 'Correo';
    $phpmailer->Password = 'Contraseña';

    //Destinatarios
    $phpmailer->setFrom('contact@miempresa.com', 'Mi empresa');
    $phpmailer->addAddress($email, $name);

    //Definiendo contenido de email
    $phpmailer->isHTML($html);    //Set email format to HTML
    $phpmailer->Subject = $subject;
    $phpmailer->Body    = $body;

    //Enviar el correo
    $phpmailer->send();
}

?>