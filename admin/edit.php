<?php

session_start();

$connection = mysqli_connect( 'localhost', 'balkonsb_mfadmin', 'mf_admin_123', 'balkonsb_mfdreamit' );

mysqli_query($connection, "set names utf8");

?>

    <!DOCTYPE html>

    <html lang="en">



    <head>

        <meta charset="UTF-8">

        <title>Document</title>

    </head>



    <body>

        <?php

$id=mysqli_real_escape_string($connection,trim($_POST["id"]));  

$fio = mysqli_real_escape_string($connection,trim($_POST["fio"]));

$email = mysqli_real_escape_string($connection,trim($_POST["email"]));   

$tel = mysqli_real_escape_string($connection,trim($_POST["tel"]));

$tel = str_replace( "+375", "", $tel );         

$coment = mysqli_real_escape_string($connection,trim($_POST["coment"]));

$stats = mysqli_real_escape_string($connection,trim($_POST["stats"])); 

$button = mysqli_real_escape_string($connection,trim($_POST["button"]));   

if ($button=="УДАЛИТЬ")

    $result=mysqli_query($connection,"DELETE FROM `orders` WHERE `id`='".$id."'");

        

if ($button=="ИЗМЕНИТЬ")

    $result=mysqli_query($connection,"UPDATE `orders` SET `user_name`='".$fio."',`user_email`='".$email."',`user_phone`='".$tel."',`user_coment`='".$coment."',`user_status`='".$stats."' WHERE `id`='".$id."'");  

echo "<meta http-equiv=\"Refresh\" content=\"0;URL=".$_SERVER['HTTP_REFERER']."\">";             

?>

    </body>



    </html>