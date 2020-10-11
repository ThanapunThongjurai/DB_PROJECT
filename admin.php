<?php
if (!isset($_SESSION)) {
  session_start();
}
require_once('connect.php');
if ($_SESSION["user_status"] == 0) //0 is normal 
{
  header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css" />

  <title>Hello, world!</title>
</head>
<style tpye="text/css">
  body {
    background-image: url('image/wall.jpg');
    -webkit-background-size: cover;
    background-attachment: fixed;
  }
</style>

<body>


  <?php include_once (__DIR__) . ('/include/navbar.php'); ?>
  <div class="container">
    <div class="row row-cols-1 row-cols-md-3">
      <?php


      $stmt = $conn->prepare("SELECT * FROM `item`");
      $stmt->execute();                               // run sql before
      ?>
      <div class="">
        <table class="table">

          <thead>
            <tr>
              <th scope="col">item_id</th>
              <th scope="col">item_name</th>
              <th scope="col">item_price</th>
              <th scope="col">item_type</th>
              <th scope="col">item_amount</th>
              <th scope="col">imagelocation</th>
            </tr>
          </thead>
          <?php
          while ($result = $stmt->fetch()) {
          ?>
            <tbody>
              <tr>
                <th scope="row"><?php echo $result["id_item"]; ?></th>
                <td><?php echo $result["item_name"]; ?></td>
                <td><?php echo $result["item_price"]; ?></td>
                <td><?php echo $result["item_type"]; ?></td>
                <td><?php echo $result["item_amount"]; ?></td>
                <td><img src="image/<?php echo $result["imagelocation"] ; ?>" height="40px"></td>
                <td><a type="button" class="btn btn-outline-secondary" href="item_update.php?id_item=<?php echo $result["id_item"]; ?>.php">UPDATE</a></td>
                <td><a type="button" class="btn btn-outline-danger" href="item_delete.php?id_item=<?php echo $result["id_item"]; ?>.php">DELETE</a></td>
              </tr>
            </tbody>
          <?php
          } ?>
        </table>


      </div>

      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="js/jquery-3.5.1.slim.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
</body>

</html>