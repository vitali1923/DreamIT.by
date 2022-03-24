<?php
    echo "<table class=\"data_table\">
        <tr><th>ID</th><th>ФИО</th><th>EMAIL</th><th>ТЕЛ</th><th>КОМЕНТ</th><th>СТАТУС</th><th>T1</th><th>T2</th><th></th><th></th></tr>";
    $result = mysqli_query( $connection, $querry );
    while( $row = mysqli_fetch_array( $result, MYSQLI_BOTH ) ) {
        echo "
            <form action=\"edit.php\" method=\"post\">
            <input name=\"id\" type=\"hidden\" value=\"".$row["id"]."\">
            <tr id=\"tr_".$row["id"]."\">
                <td>".$row["id"]."</td>
                <td>
                    <input name=\"fio\" value=\"".$row["user_name"]."\" placeholder=\"".$row["user_name"]."\" onchange=\"light( ".$row["id"]." );
        \">
                </td>
                <td>
                    <input name=\"email\" value=\"".$row["user_email"]."\" placeholder=\"".$row["user_email"]."\" onchange=\"light( ".$row["id"]." );
        \">
                </td>
                <td>
                    <input name=\"tel\" value=\"+375".$row["user_phone"]."\" placeholder=\"".$row["user_phone"]."\" onchange=\"light( ".$row["id"]." );
        \">
                </td>
                <td>
                    <input name=\"coment\" value=\"".$row["user_coment"]."\" placeholder=\"".$row["user_coment"]."\" onchange=\"light( ".$row["id"]." );
        \">
                </td>
                <td>
                    <select name=\"stats\" onchange=\"light( ".$row["id"]." );
        \">";
        if ( !empty( $row["user_status"] ) )
        echo "<option value=\"".$row["user_status"]."\" selected>".$row["user_status"]."</option>";
        echo "<optgroup label=\"СТАТУСЫ\">
                        <option value=\"Согласен\">Согласен</option><option value=\"Отказ\">Отказ</option>
                        <option value=\"В работе\">В работе</option>
                        <option value=\"Думает\">Думает</option>
                    </optgroup>
                    </select>
                </td>
                <td>".$row["user_time_add"]."</td>
                <td>".$row["user_time"]."</td>
                <td>
                    <input name=\"button\" type=\"submit\" value=\"ИЗМЕНИТЬ\">
                </td>
                <td>
                    <input name=\"button\" type=\"submit\" value=\"УДАЛИТЬ\">
                </td>
            </tr>
            </form>";
    }
    echo "</table>";
?>