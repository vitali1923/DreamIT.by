<?php
        echo "<form action=\"autoriz.php\" method=\"post\" class=\"autoriz\">
            <input name=\"login\" class=\"f\" type=\"text\" placeholder=\"Логин\">
            <input name=\"password\" class=\"f\" type=\"password\" placeholder=\"Пароль\">
            <input value=\"Войти\" class=\"f\" type=\"submit\"> </form>";
        if (isset($_SESSION["alert"]))
        {
            echo "<script>alert('".$_SESSION["alert"]."')</script>";
            unset($_SESSION["alert"]);
        }
?>