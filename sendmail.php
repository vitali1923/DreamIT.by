<?php

session_start();

$connection = mysqli_connect( 'localhost', 'balkonsb_mfadmin', 'mf_admin_123', 'balkonsb_mfdreamit' );

mysqli_query($connection, "set names utf8");



$post_ima = mysqli_real_escape_string($connection, trim($_POST["ima"]));

$post_myemail = mysqli_real_escape_string($connection, trim($_POST["myemail"]));

$post_phone = mysqli_real_escape_string($connection, trim($_POST["phone"]));

//var_dump($_POST);



$result=mysqli_query($connection, "INSERT INTO `orders`(`user_name`, `user_phone`, `user_email`, `user_status`) VALUES ('".$post_ima."','".$post_phone."','".$post_myemail."','В работе')");

$mess="Заявка:".$post_ima.", ".$post_myemail.", ".$post_phone;

mail("vitalimelnik@yandex.ru","Заявка",$mess,"From: vitalimelnik@yandex.ru \r\n"."X-Mailer: PHP/" . phpversion());



$_SESSION["alert"]="Данные отправлены";



$return_page=$_SERVER["HTTP_REFERER"];    

echo "<meta http-equiv=\"Refresh\" content=\"0;URL=".$return_page."\">"; 



/*$message='Данные отправлены!';

$response = ['message'=> $message];

header('Content-type: application/json');

echo json_encode($response);*/

		?>