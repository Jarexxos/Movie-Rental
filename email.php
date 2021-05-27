<?php
/*use PHPMailer\PHPMailer\PHPMailer;
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';*/
require_once 'head.php';
require_once 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;
$mail->CharSet = 'UTF-8';
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';
$mail->Host = 'smtp.gmail.com';
$mail->Port = '587';
$mail->isHTML(true);
$mail->Username = 'juurbaniak4.0@gmail.com';
$mail->Password = 'Qwerty!123';
$mail->setFrom('Wypozyczalnia@wideo.pl');
$mail->Subject = 'Potwierdzenie zamówienia';
$mail->Body = 'Witaj! <br><br>Dziękujemy za zakupy w naszej wypożyczalni! Twoje zamówienie zostalo zrealizowane. <br><br>Pozdrawiamy, Wypożyczalnia wideo!';
$mail->AddAddress($_POST['email']);

$mail->Send();

header('Location: finish.php'); 
?>