<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Page generator</title>
  </head>
  <body>
    <form action="result.php" method="post">
      <label>Title: </label>
      <input type="text" name="title" value="">
      <br>
      <label>Year: </label>
      <input type="text" name="year" value="">
      <br>
      <label>Copyright: </label>
      <input type="text" name="copyright" value="">
      <br>
      <label>Content: </label>
      <textarea name="content" rows="8" cols="80"></textarea>
      <br>
      <input type="submit" name="" value="SUBMIT">
    </form>
  </body>
</html>