<html>

  <head>
    <title>
      <?php
      $doc_title = 'Business Listings';
      echo "$doc_title\n";
      ?>
    </title>
  </head>

  <body>
    <h1>
      <?= $doc_title ?>
    </h1>

    <?php
    // establish the database connection

    require_once('db_login.php');

    $pick_message = 'Click on a category to find business listings:';
    ?>

    <table border=0>
      <tr>
        <td valign="top">
          <table border=5>
            <tr>
              <td class="picklist"><strong><?= $pick_message ?></strong></td>
            </tr>
            <p>
              <?php
              $PHP_SELF = $_SERVER['PHP_SELF'];
              // build the scrolling pick list for the categories
              $sql = "SELECT * FROM Categories";
              $result = $db->query($sql);
              if (DB::isError($result)) die($result->getMessage());
              while ($row = $result->fetchRow()) {
                if (DB::isError($row)) die($row->getMessage());
                echo '<tr><td class="formlabel">';
                echo "<a href=\"$PHP_SELF?cat_id=$row[0]\">";
                echo "$row[1]</a></td></tr>\n";
              }
              ?>
          </table>
        </td>
        <td valign="top">
          <table border=1>
            <?php
            $cat_id = $_GET['cat_id'];
            if ($cat_id) {
              $sql = "SELECT * FROM Businesses b, Biz_Categories bc WHERE";
              $sql .= " Category_ID = '$cat_id'";
              $sql .= " AND b.Business_ID = bc.Business_ID";
              $result = $db->query($sql);
              if (DB::isError($result)) die($result->getMessage());
              while ($row = $result->fetchRow()) {
                if (DB::isError($row)) die($row->getMessage());
                if ($color == 1) {
                  $bg_shade = 'dark';
                  $color = 0;
                } else {
                  $bg_shade = 'light';
                  $color = 1;
                }
                echo "<tr>\n";
                for ($i = 0; $i < count($row); $i++) {
                  echo "<td class=\"$bg_shade\">$row[$i]</td>\n";
                }
                echo "</tr>\n";
              }
            }
            ?>
          </table>
        </td>
      </tr>
    </table>
  </body>

</html>