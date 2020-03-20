<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Your result here</title>
    </head>
    <body>
        <?php

        function convertDeg2Rad($value) {
            echo "Your radian value is: <br>";
            echo deg2rad($value);
        }

        function convertRad2Deg($value) {
            echo "Your degree value is: <br>";
            echo rad2deg($value);
        }

        $input = $_POST["input"];
        $option = $_POST["option"];
        echo $input;
        echo "<br>";
        if ($option == "degree") {
            convertDeg2Rad($input);
        } else {
            convertRad2Deg($input);
        }
        ?>
    </body>
</html>
