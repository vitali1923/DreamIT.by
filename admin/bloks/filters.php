<?php
       echo "<table class=\"filters\">
        <caption>ФИЛЬТРЫ</caption>
        <tr><th>ID</th><th>ФИО</th><th>EMAIL</th><th>ТЕЛ</th><th>СТАТУС</th><th>T1</th><th>T2</th></tr>
        <tr>
            <td>
                <a href=\"index.php?filter_id=DESC&filter_fio=".$_GET["filter_fio"]."&filter_email=".$_GET["filter_email"]."&filter_time1=".$_GET["filter_time1"]."&filter_time2=".$_GET["filter_time2"]."\" title=\"Сортировка по убыванию\">&#9660;</a>
                <a href=\"index.php?filter_id=ASC&filter_fio=".$_GET["filter_fio"]."&filter_email=".$_GET["filter_email"]."&filter_time1=".$_GET["filter_time1"]."&filter_time2=".$_GET["filter_time2"]."\" title=\"Сортировка по возрастаю\">&#9650;</a>
            </td>
            <td>
                <a href=\"index.php?filter_id=".$_GET["filter_id"]."&filter_fio=DESC&filter_email=".$_GET["filter_email"]."&filter_time1=".$_GET["filter_time1"]."&filter_time2=".$_GET["filter_time2"]."\" title=\"Сортировка по убыванию\">&#9660;</a>
                <a href=\"index.php?filter_id=".$_GET["filter_id"]."&filter_fio=ASC&filter_email=".$_GET["filter_email"]."&filter_time1=".$_GET["filter_time1"]."&filter_time2=".$_GET["filter_time2"]."\" title=\"Сортировка по возрастаю\">&#9650;</a>
            </td>
            <td>
                <a href=\"index.php?filter_id=".$_GET["filter_id"]."&filter_fio=".$_GET["filter_fio"]."&filter_email=DESC&filter_time1=".$_GET["filter_time1"]."&filter_time2=".$_GET["filter_time2"]."\" title=\"Сортировка по убыванию\">&#9660;</a>
                <a href=\"index.php?filter_id=".$_GET["filter_id"]."&filter_fio=".$_GET["filter_fio"]."&filter_email=ASC&filter_time1=".$_GET["filter_time1"]."&filter_time2=".$_GET["filter_time2"]."\" title=\"Сортировка по возрастаю\">&#9650;</a>
            </td>
            <form action=\"index.php?".$_SERVER["QUERY_STRING"]."\" method=\"post\" id=\"filter_form_id\"></form>
            <td>
                <input form=\"filter_form_id\" name=\"filter_phone\" type=\"tel\" value=\"".$_POST["filter_phone"]."\" placeholder=\"код+номер\" maxlength=\"9\" minlength=\"9\" onchange=\"this.form.submit();
    \">
            </td>
            <td>
<select form=\"filter_form_id\" name=\"filter_status\" onchange=\"this.form.submit();
    \">";
    if ( isset( $_POST["filter_status"] ) || !empty( $_POST["filter_status"] ) )
    echo "<option value=\"".$_POST["filter_status"]."\" selected>".$_POST["filter_status"]."</option>";
    echo "<optgroup label=\"СТАТУСЫ\">
            <option value=\"Все\">Все</option>
            <option value=\"Согласен\">Согласен</option><option value=\"Отказ\">Отказ</option>
            <option value=\"В работе\">В работе</option>
            <option value=\"Думает\">Думает</option>
        </optgroup>
</select>
            </td>
            <td>
                <a href=\"index.php?filter_id=".$_GET["filter_id"]."&filter_fio=".$_GET["filter_fio"]."&filter_email=".$_GET["filter_email"]."&filter_time1=DESC&filter_time2=".$_GET["filter_time2"]."\" title=\"Сортировка по убыванию\">&#9660;</a>
                <a href=\"index.php?filter_id=".$_GET["filter_id"]."&filter_fio=".$_GET["filter_fio"]."&filter_email=".$_GET["filter_email"]."&filter_time1=ASC&filter_time2=".$_GET["filter_time2"]."\" title=\"Сортировка по возрастаю\">&#9650;</a>
            </td>
            <td>
                <a href=\"index.php?filter_id=".$_GET["filter_id"]."&filter_fio=".$_GET["filter_fio"]."&filter_email=".$_GET["filter_email"]."&filter_time1=".$_GET["filter_time1"]."&filter_time2=DESC\" title=\"Сортировка по убыванию\">&#9660;</a>
                <a href=\"index.php?filter_id=".$_GET["filter_id"]."&filter_fio=".$_GET["filter_fio"]."&filter_email=".$_GET["filter_email"]."&filter_time1=".$_GET["filter_time1"]."&filter_time2=ASC\" title=\"Сортировка по возрастаю\">&#9650;</a>
            </td>
        </tr>
        </table><br>";

    $querry="SELECT * FROM `orders` WHERE `user_phone`='' AND `user_status`='' ORDER BY `id` ASC,`user_name` ASC,`user_time` ASC,`user_time_add` ASC,`user_email` ASC";

    /*---------------------------------------*/ if ( !isset( $_GET["filter_id"] ) || empty( $_GET["filter_id"] ) )
    $querry=str_replace( "`id` ASC", "", $querry );

    else
    $querry=str_replace( "`id` ASC", "`id` ".$_GET["filter_id"], $querry );
    /*---------------------------------------*/ if ( !isset( $_GET["filter_fio"] ) || empty( $_GET["filter_fio"] ) )
    $querry=str_replace( ",`user_name` ASC", "", $querry );

    else
    $querry=str_replace( "`user_name` ASC", "`user_name` ".$_GET["filter_fio"], $querry );

    /*--------------------------------------------*/ if ( !isset( $_POST["filter_phone"] ) || empty( $_POST["filter_phone"] ) )
    $querry=str_replace( "`user_phone`=''", "", $querry );

    else
    $querry=str_replace( "`user_phone`=''", "`user_phone`='".$_POST["filter_phone"]."'", $querry );

    /*-------------------------------------------*/ if ( !isset( $_POST["filter_status"] ) || empty( $_POST["filter_status"])||  $_POST["filter_status"]=="Все" )
    $querry=str_replace( "`user_status`=''", "", $querry );

    else
    $querry=str_replace( "`user_status`=''", "`user_status`='".$_POST["filter_status"]."'", $querry );
    /*---------------------------------------*/                             if ( !isset( $_GET["filter_email"] ) || empty( $_GET["filter_email"] ) )
    $querry=str_replace( ",`user_email` ASC", "", $querry );

    else
    $querry=str_replace( "`user_email` ASC", "`user_email` ".$_GET["filter_email"], $querry );

    /*-------------------------------------------*/
    if ( !isset( $_GET["filter_time1"] ) || empty( $_GET["filter_time1"] ) )
    $querry=str_replace( ",`user_time` ASC", "", $querry );

    else
    $querry=str_replace( "`user_time` ASC", "`user_time` ".$_GET["filter_time"], $querry );
    /*-------------------------------------------*/
    if ( !isset( $_GET["filter_time2"] ) || empty( $_GET["filter_time2"] ) )
    $querry=str_replace( ",`user_time_add` ASC", "", $querry );

    else
    $querry=str_replace( "`user_time_add` ASC", "`user_time_add` ".$_GET["filter_time2"], $querry );

    /*-------------------------------------------*/
    if (
        empty( $_GET["filter_id"] )
        &&
        empty( $_GET["filter_fio"] )
        &&
        empty( $_GET["filter_email"] )
        &&
        empty( $_GET["filter_time1"] )
        &&
        empty( $_GET["filter_time2"] )
    )
    $querry=str_replace( "ORDER BY", "", $querry );
    /*-------------------------------------------*/
    if ( empty( $_POST["filter_phone"] ) || empty( $_POST["filter_status"] ) || $_POST["filter_status"]=="Все" )
    $querry=str_replace( "AND", "", $querry );
    /*-------------------------------------------*/
    if ( empty( $_POST["filter_phone"] ) && (empty( $_POST["filter_status"] )||$_POST["filter_status"]=="Все" ))
    $querry=str_replace( "WHERE", "", $querry );
    /*-------------------------------------------*/
    $querry=trim($querry);
?>