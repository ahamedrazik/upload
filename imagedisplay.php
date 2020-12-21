<?php
         include('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="imagedisplay.css">
    <title>Document</title>
</head>
<body>
    <h1>fetch data using database</h2>
    <div class="data">
    <table>
        <thead>
           <th>serial no</th>
           <th>username</th>
           <th>profile</th>
</thead>
      <tbody>
<?php
  $query="SELECT * FROM `pen`";
  $result=mysqli_query($con,$query);
  while($row_fetch=mysqli_fetch_assoc($result))
  {
        echo"
          <tr>
          <td>$row_fetch[serial_no]</td>
          <td>$row_fetch[username]</td>
          <td><img src='$row_fetch[profile]' width='150px'></td>
          </tr>";
  }

?>
</tbody>
</table>
</div>
</body>
</html>