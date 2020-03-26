<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tuna cafe</title>
    </head>
    <body>
        <?php
        // put your code here
            $menu = array ('Tuna Casserole', 'Tuna Sandwich', 'Tuna Pie', 'Grilled Tuna', 'Tuna Surprise');
            $prefer = $_GET['prefer'];
            if (count($prefer) == 0) {
                print "oh no! Please pick something as your favourite!";
            } else {
                print "<br>Your selections were <ul>";
                foreach ($prefer as $item) {
                    print "<li>$menu[$item]</li>";
                }
                print "</ul>";
            }
        ?>
    </body>
</html>
