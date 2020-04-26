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
        // put your code here
        $pattern = '/^[0-9\-\(\)\/\+\s]*$/';
        $email = $_POST["email"];
        $url = $_POST["url"];
        $phone = $_POST["phone"];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            print "Invalid email: $email <br>";
        } else {
            print "Valid email: $email <br>";
        }
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $url)) {
            print "Invalid URL: $url <br>";
        } else {
            print "Valid url: $url <br>";
        }
        if (!preg_match($pattern, $phone)) {
            print "Invalid phone number: $phone <br>";
        } else {
            print "Valid phone number: $phone <br>";
        }
        ?>
    </body>
</html>
