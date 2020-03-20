<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Date Time Function </title>
    </head>
    <body>
        <?php
        $name_1 = $_POST["name_1"];
        $name_2 = $_POST["name_2"];

        function date2letter($date) {
            $day_num = (int) explode("-", $date)[2];
            $date_obj = date_create($date);
            $day = date_format($date_obj, "l");
            $month = date_format($date_obj, "F");
            $year = date_format($date_obj, "Y");
            echo "<br>";
            echo "$day, $month $day_num, $year";
        }

        function date_in_diff($date1, $date2) {

            $diff = strtotime($date2) - strtotime($date1);

            $days = abs(round($diff / 86400));
            print "<br> Different days: $days";
        }

        function age_diff_year($date1, $date2) {
            $year_1 = (int) explode("-", $date1)[0];
            $year_2 = (int) explode("-", $date2)[0];


            $age_1 = 2020 - $year_1;
            $age_2 = 2020 - $year_2;
            $diff_year = abs($year_1 - $year_2);

            print "<br> $name_1 age is $age_1";
            print "<br> $name_2 age is $age_2";
            print "<br> Different year: $diff_year";
        }

        $date_1 = $_POST["date_1"];
        $date_2 = $_POST["date_2"];

        $day_1 = (int) explode("-", $date_1)[2];
        $month_1 = (int) explode("-", $date_1)[1];
        $year_1 = (int) explode("-", $date_1)[0];

        $day_2 = (int) explode("-", $date_2)[2];
        $month_2 = (int) explode("-", $date_2)[1];
        $year_2 = (int) explode("-", $date_2)[0];

        if ($day_1 == $day_2 && $month_1 == $month_2) {
            print "Dates in letter";
            date2letter($date_1);
            date2letter($date_2);

            date_in_diff($date_1, $date_2);
            age_diff_year($date_1, $date_2);
        }
        ?>
    </body>
</html>
