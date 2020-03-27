<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Distance from Chicago!</title>
  </head>
  <body>
    <h1>Welcome to the Distance Calculator</h1>
    The pages that calculate distance from Chicago <br>
    Select a destination:
    <form action="CheckDistance.php" method="post">
      <select size="5" multiple name="destination[]">
        <option>Boston</option>
        <option>Dallas</option>
        <option>Miami</option>
        <option>Nashville</option>
        <option>Las Vegas</option>
        <option>Pittsburgh</option>
        <option>San Francisco</option>
        <option>Toronto</option>
        <option>Washington, DC</option>
        <option>Hanoi</option>
      </select>
      <br>
      <input type="submit" name="" value="Submit">
      <input type="reset" name="" value="Reset">
    </form>
  </body>
</html>