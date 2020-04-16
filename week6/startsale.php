<?php
  $config = include('../config.php');
?>
<html>
  <head>
    <title>
      Update product
    </title>
  </head>
  <body>
    <h1>Select Product We Just Sold</h1>
    <hr>
    <form action="sale.php" method="POST">
      <label>Hammer</label><input type="radio" name="product" value="Hammer">
      <label>chiu</label><input type="radio" name="product" value="chiu">
      <br>
      <input type="submit" value="Click To Submit">
      <input type="reset" value="Reset">
    </form>
    <br><br>
    <?php
      $server = $config['server'];
      $user = $config['user'];
      $pass = $config['password'];
      $mydb = 'sale';
      $table_name = 'Products';
      $mysqli = new mysqli($server, $user, $pass, $mydb);
      if ($mysqli->connect_errno) {
        die ("Cannot connect to $server using $user");
        exit();
      } else {
        $SQLcmd = "SELECT * FROM $table_name";
        $mysqli->select_db($mydb);
        $results = $mysqli->query($SQLcmd);
        if ($results){
          print '<table border=1>';
          print '<th>Num<th>Product<th>Cost<th>Weight<th>Count';
          while($row = mysqli_fetch_row($results)) {
            print "<tr>";
            foreach($row as $field) {
              print "<td>$field</td>";
            }
            print "<tr/>";
          }
        } else {
          die ("Query Failed, SQLcmd=$SQLcmd");
        } 
        $mysqli->close();
      }
    ?>
  </body>
</html>