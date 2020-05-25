<?php

$colors = array('black' => '#000000',
    'white' => '#ffffff',
    'red' => '#ff0000',
    'blue' => '#0000ff');
$bg_name = $_POST['background'];
$fg_name = $_POST['foreground'];

setcookie('bg', $colors[$bg_name]);
setcookie('fg', $colors[$fg_name]);
?>
<html>
    <body>
    <head><title>Preference sets</title></head>
    Thank you. your preference have been changed to: <br>
    Background: <?= $bg_name ?> <br>
        Foreground: <?= $fg_name ?> <br>
        Click <a href="prefs-demo.php">Here</a> to see the preference in action.
</body>
</html>


