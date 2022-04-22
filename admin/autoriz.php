<?php

session_start();

$connection = mysqli_connect( 'localhost', 'balkonsb_mfadmin', 'mf_admin_123', 'balkonsb_mfdreamit' );

mysqli_query($connection, "set names utf8"); 

?>

    <!DOCTYPE html>

    <html lang="en">



    <head>

        <meta charset="UTF-8">

        <title>Autoriz</title>

    </head>



    <body>

        <?php

$post_login = mysqli_real_escape_string($connection, trim($_POST["login"]));

$post_password = mysqli_real_escape_string($connection, trim($_POST["password"]));

$result=mysqli_query($connection, "SELECT * FROM `users` WHERE `user`='".$post_login."'");

$row=mysqli_fetch_array($result,MYSQLI_BOTH);

if(!$row)

     $_SESSION["alert"]="Такого пользователя не существует";

else

{

    if ($row["password"]==$post_password)

        $_SESSION["user"]=$post_login;

    else

        $_SESSION["alert"]="Для данного пользователя введен неверный пароль";  

}     

$return_page=$_SERVER["HTTP_REFERER"];    

echo "<meta http-equiv=\"Refresh\" content=\"0;URL=".$return_page."\">"; 

        ?>

    </body>



    </html>