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
        <form action="Validate.php" method="post">
            <h1>
                Validate email url phone number
            </h1>
            <table>
                <tr>
                    <td>Enter a email to check (example@exmaple.com): </td>
                    <td><input type="text" size=30 name="email"></td>
                </tr>
                <tr>
                    <td>Enter a url to check (https://vnexpress.com): </td>
                    <td><input type="text" size=30 name="url"></td>
                </tr>
                <tr>
                    <td>Enter a phone number to check (01234567891.com): </td>
                    <td><input type="text" size=30 name="phone"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"> 
                        <input type="submit" value="check validation">
                        <input type="reset" value="Reset">
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>
