<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $name = $_POST["name"];
        $class = $_POST["class"];
        $uni = $_POST["university"];
        $music = $_POST["music"];
        $movie = $_POST["movie"];
        $book = $_POST["book"];

        print("<br>Thank you for your submission <br>");
        print("<br>Hello $name");
        print("<br>You are studying at class $class, $uni");
        print("<br>Your hobby is: ");
        print("<br>- $music");
        print("<br>- $movie");
        print("<br>- $book");
        ?>
    </body>
</html>
