<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Distance and Time Calculator</title>
    <style media="screen">
      table, th, td {
        border: 1px solid black;
      }
    </style>
  </head>
  <body>
    <?php
      $cities = array(
        'Boston' => 848,
        'Dallas' => 803,
        'Miami' => 1189,
        'Nashville' => 406,
        'Las Vegas' => 1526,
        'Pittsburgh' => 409,
        'San Francisco' => 1835,
        'Toronto' => 435,
        'Washington, DC' => 595
      );
    ?>
    <table>
      <thead>
        <tr>
          <th>No.</th>
          <th>Destination</th>
          <th>Distance</th>
          <th>Driving time</th>
          <th>Walking time</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $count = 1;
          foreach ($_POST['destination'] as $destination) {
            print '<tr>';
            print "<td>$count</td>";
            $count++;
            if (isset($cities[$destination])) {
              $distance = $cities[$destination];
              $time = round($distance / 60, 2);
              $walktime = round($distance / 5, 2);
              print "<td>$destination</td>";
              print "<td>$distance</td>";
              print "<td>$time</td>";
              print "<td>$walktime</td>";
            } else {
              print "<td>$destination</td><td colspan=\"3\">N/A</td>";
            }
            print('</tr>');
          }
        ?>
      </tbody>
    </table>
  </body>
</html> 