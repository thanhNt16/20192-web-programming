<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>User Sorting</title>
  </head>
  <body>
    <?php
      function user_sort($a, $b) {
        // smarts is all-important, so sort it first
        if ($b == 'smarts') {
          return 1;
        }
        else if ($a == 'smarts') {
          return -1;
        }
        return ($a == $b) ? 0 : (($a < $b) ? -1 : 1);
      }

      $values = array(
        'name' => 'Buzz Lightyear',
        'email_address' => 'buzz@starcommand.gal',
        'age' => 32,
        'smarts' => 'some'
      );

      $sort_types = array(
        'unsorted' => 'Unsorted',
        'sort' => 'Standard sort',
        'rsort' => 'Reverse sort',
        'usort' => 'User-defined sort',
        'ksort' => 'Key sort',
        'krsort' => 'Reverse key sort',
        'uksort' => 'User-defined key sort',
        'asort' => 'Value sort',
        'arsort' => 'Reverse value sort',
        'uasort' => 'User-defined value sort',
      );

      if (array_key_exists('sort_type', $_POST)) {
        $sort_type = $_POST['sort_type'];
      } else {
        $sort_type = 'sort';
      }
      if (array_key_exists('submitted', $_POST)) {
        $submitted = $_POST['submitted'];
      } else {
        $submitted = false;
      }

      if ($submitted) {
        if ($sort_type == 'usort' || $sort_type == 'uksort' || $sort_type == 'uasort') {
          $sort_type($values, 'user_sort');
        }
        else if ($sort_type != 'unsorted') {
          $sort_type($values);
        }
      }
    ?>
    <form action="UserSorting.php" method="post">
      <?php
        foreach ($sort_types as $key => $value) {
          echo "<input type=\"radio\" name=\"sort_type\" value=\"$key\" id=\"$key\"";
          if ($sort_type == $key) {
            echo 'checked="checked"/>';
          } else {
            echo '/>';
          }
          echo "<label for=\"$key\">$value</label><br>";
        }
      ?>
      <p align="center">
        <input type="submit" value="Sort" name="submitted" />
      </p>
      <p>
        Values <?= $submitted && $sort_type != 'unsorted' ? "sorted by $sort_type" : "unsorted"; ?>:
      </p>
      <ul>
        <?php
          foreach ($values as $key => $value) {
            echo "<li><b>$key</b>: $value</li>";
          }
        ?>
      </ul>
    </form>
  </body>
</html>