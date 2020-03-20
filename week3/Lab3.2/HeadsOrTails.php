<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Coin flip!</title>
    </head>
    <body>
        <font size="4" color="blue">Please Pick Heads or Tails</font>

        <form action="GotFlip.php" method="post">
            <?php
            print("<input type=\"radio\" name=\"pick\" value=0 > Heads");
            print("<input type=\"radio\" name=\"pick\" value=1 > Tails");
            ?>
            <input type="SUBMIT" value="Submit">
            <input type="RESET" value="Reset">

        </form>
    </body>
</html>
