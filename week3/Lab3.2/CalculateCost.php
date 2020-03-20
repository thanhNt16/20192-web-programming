<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Carpet cost quote</title>
    </head>
    <body>
        <font size="5" color="blue">Your Estimateed Carpet Costs</font>
        <?php

        function carpet_cost($width, $length, $grade, $carpet_cost) {
            if ($width > 0 && $length > 0) {
                if ($grade == 1) {
                    $carpet_cost = $width * $length * 4.99;
                    return $carpet_cost;
                } elseif ($grade == 2) {
                    $carpet_cost = $width * $length * 3.99;
                    return $carpet_cost;
                } else {
                    print "Unknown carpet grade = $grade";
                    return 0;
                }
            } else {
                return 0;
            }
        }

        $width = $_POST["width"];
        $length = $_POST["length"];
        $grade = $_POST["grade"];
        $carpet_cost = 0;
        $install_cost = 0;
        $ret = carpet_cost($width, $length, $grade, $carpet_cost=&$carpet_cost);
        if ($ret) {
            $room_size = $width * $length;
            $total_cost = $carpet_cost + ($ret * .5);
            print "<br>Total square feet = $room_size";
            print "<br>Carpet grade = $grade";
            print "<br>Carpet cost = $ret";
            print "<br>Total cost estimate (installed) = \$$total_cost";
        } else {
            print "Illegal value recevied";
        }
        ?>
    </body>
</html>
