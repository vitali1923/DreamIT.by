<?php

session_start();

$connection = mysqli_connect( 'localhost', 'balkonsb_mfadmin', 'mf_admin_123', 'balkonsb_mfdreamit' );

mysqli_query( $connection, "set names utf8" );

?>

    <!DOCTYPE html>

    <html lang="en">



    <head>

        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">

        <title>AdminPanel</title>

        <link rel="stylesheet" href="css/style.css">

        <script type="text/javascript" src="js/light.js"></script>

    </head>



    <body>

        <?php

if ( isset( $_SESSION["user"] ) ) {

    include_once "bloks/filters.php";

    include_once "bloks/data_table.php";

} else {

    include_once "bloks/autoriz_form.php";

}

?>

    </body>



    </html>