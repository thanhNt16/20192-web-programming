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
        <form action="form.php" method="POST">
            <div>
                <p>Name</p>
                <input type="text" name="name">
            </div>
            <div>
                <p>Class</p>

                <input type="text" name="class">
            </div>
            <div>
                <p>University</p>

                <input type="text" name="university">
            </div>
            <div>
                <input type="checkbox" name="music" value="music">
                <label for="music"> You like music</label><br>
                <input type="checkbox" name="movie" value="movie">
                <label for="movie">You like movie</label><br>
                <input type="checkbox" name="book" value="book" checked>
                <label for="book">You like book</label><br><br>
            </div>
            <div>

                <input type="submit" value="Click to submit">
                <input type="reset" value="erase and restart">
            </div>
        </form>
    </body>
</html>
