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
        $name = $_POST['username'];
        $password = $_POST['password'];
        echo $name;
        echo $password;
// Create connection
        $conn = new mysqli("remotemysql.com", "3qAQfFfEg9", "jpWpJZhyVm", "3qAQfFfEg9");

// Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);
        echo $result->num_rows;
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetchAll()) {
                echo "id: " . $row["username"] . "<br>";
            }
        }
        ?>
    </body>
</html>
