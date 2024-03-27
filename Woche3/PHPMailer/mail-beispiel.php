<?php
// PHP Mailer "laden":
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mailer = new PHPMailer();
$mailer->isSMTP(); // wir nutzen SMTP

// Verbindungsdaten festlegen für den SMTP Server
$mailer->Host = 'smtp.gmail.com';
$mailer->Username = '***';
$mailer->Password = '***';
$mailer->SMTPAuth = true;
$mailer->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; 
$mailer->Port = 465;

// Mail erstellen
$mailer->setFrom('citystrolch@gmail.com', 'Terry Harker Privat');
$mailer->addAddress('terry.harker@bytekultur.net', 'Terry Harker, byteKultur');
// $mailer->addAddress('test-1eayji497@srv1.mail-tester.com', 'Terry Harker, byteKultur'); // Tip: mail-tester.com zum Testen des Spam Ratings nutzen!

$mailer->isHtml(true); // verwende HTML

// Mail erstellen: 
$mailer->Subject = 'Mail aus dem PHPMailer Demo Script';
$mailer->Body = 'Hallo, dies ist ein <b>Testmail aus PHPMailer</b>.';

if( $mailer->send() ){
    echo 'Mail wurde versendet';
}else{
    echo 'Mail konnte nicht versendet werden';
}

?>
