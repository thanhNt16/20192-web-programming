<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title> Distance and time calculations</title>
    </head>
    <body>
        <table>
            <tr>
                <th>No. </th>
                <th>Destination </th>
                <th>Distance </th>
                <th>Driving time </th>
                <th>Walking time </th>
            </tr>
            <?php
            $cities = array('Dallas' => 803, 'Toronto' => 435, 'Boston' => 848,
                'Nashville' => 406, 'Las Vegas' => 1526,
                'San Francisco' => 1835, 'Washington, DC' => 595,
                'Miami' => 1189, 'Pittsburgh' => 409);
            $destinations = $_POST["destination"];

            if (isset($cities[$destinations])) {
                foreach ($destinations as $destination) {
                    print "<tr>";
                    print "<th>$destination</th>";
                    print "</tr>";
                }
//                $distance = $cities[$destination];
//                $time = round(($distance / 60), 2);
//                $walktime = round(($distance / 5), 2);
//
//                print "<tr>";
//                print "<th>$destination</th>";
//                print "<th>$distance</th>";
//                print "<th>$time</th>";
//                print "<th>$walktime</th>";
//
//                print "</tr>";
            } else {
                print "Sorry, do not have destination information for $destination";
            }
            ?>
        </table>
    </body>
</html>
