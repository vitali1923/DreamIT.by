<?php
session_start();

$connection = mysqli_connect( 'localhost', 'balkonsb_mfadmin', 'mf_admin_123', 'balkonsb_mfdreamit' );

$var1=$_POST["name"];
$var2=$_POST["phone"];
$var3=$_POST["email"];
$var4=$_POST["massage"];


mysqli_query($connection, "set names utf8"); 

$sql="INSERT INTO `orders`( `user_name`, `user_phone`, `user_email`, `user_coment`) VALUES ($var1,$var2,$var3,$var4)";

mysqli_query($connection, $sql);

// Файлы phpmailer
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

// Переменные, которые отправляет пользователь
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$massage = $_POST['massage'];

// Формирование самого письма
$title = "Новое обращение mf.dreamit";
$body = "
<h2>Новое обращение</h2>
<b>Имя:</b> $name<br>
<b>Телефон:</b> $phone<br><br>
<b>Почта:</b> $email<br><br>
<b>Сообщение:</b><br>$massage
";

// Настройки PHPMailer
$mail = new PHPMailer\PHPMailer\PHPMailer();
try {
    $mail->isSMTP();   
    $mail->CharSet = "UTF-8";
    $mail->SMTPAuth   = true;
    // $mail->SMTPDebug = 2;
    $mail->Debugoutput = function($str, $level) {$GLOBALS['status'][] = $str;};

    // Настройки вашей почты
    $mail->Host       = 'smtp.mail.ru'; // SMTP сервера вашей почты
    $mail->Username   = 'hummel.sport@mail.ru'; // Логин на почте
    $mail->Password   = 'tpgUGyPmBuaDGSEptXXx'; // Пароль на почте
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;
    $mail->setFrom('hummel.sport@mail.ru', 'mfdreamit'); // Адрес самой почты и имя отправителя

    // Получатель письма
    $mail->addAddress('2vadelfina@gmail.com'); 

// Отправка сообщения
$mail->isHTML(true);
$mail->Subject = $title;
$mail->Body = $body;    

// Проверяем отравленность сообщения
if ($mail->send()) {$result = "success";} 
else {$result = "error";}

} catch (Exception $e) {
    $result = "error";
    $status = "Сообщение не было отправлено. Причина ошибки: {$mail->ErrorInfo}";
}

// Отображение результата
header('Location: thankyou.html');