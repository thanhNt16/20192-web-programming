<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Distance from Chicago</title>
    </head>
    <body>
        <font size=4 color="blue"> 
        Welcome to distance calculator
        </font>
        <br>The page that calculates distance from Chicago
        <br>Select a distination
        <form action="CheckDistance.php" method="post">
            <select name="destination" size=5 multiple>
                <option> Boston </option>
                <option> Dallas </option>
                <option> Miami </option>
                <option> Nashville </option>
                <option> Las Vegas </option>
                <option> Pittsburgh </option>
                <option> San Francisco </option>
                <option> Toronto </option>
                <option> Washington, DC </option>
            </select>
            <br>
            <input type="submit" value="submit">
            <input type="reset" value="reset">
        </form>
    </body>
</html>
