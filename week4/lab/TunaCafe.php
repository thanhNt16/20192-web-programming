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
        <font size=4 color="blue">
        Welcome to tuna cafe survey!
        </font>
        <form action="TunaResults.php" method="get">
            
        <?php
        // put your code here
            $menu = array ('Tuna Casserole', 'Tuna Sandwich', 'Tuna Pie', 'Grilled Tuna', 'Tuna Surprise');
            $bestseller = 2;
            print "Please indicate all your favourite dishes. <br>";
            for ($i = 0; $i < count($menu); $i++) {
                print "<input type=\"checkbox\" name=\"prefer[]\" value=$i> $menu[$i]";
                if ($i == $bestseller) {
                    print 'font color=red> Our best seller!!! </font>';
                }
                print "<br>";
            }
        ?>
        <input type="submit" value="submit">
            <input type="reset" value="reset">
        </form>

    </body>
</html>
