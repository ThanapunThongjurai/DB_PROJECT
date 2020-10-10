<?php
session_start();
require_once('connect.php');

$id_item = $_GET['id_item'];
$stmt = $conn->prepare("SELECT * FROM `item` WHERE id_item = $id_item");
$stmt->execute();
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
      
      while ($id_item = $stmt->fetch()) {
      ?>
        <div class="col mb-3">
          <div class="card">
            <!--img src="images/gallery/<?php echo $id_item; ?>.jpg"-->
            <img src="image/<?php echo $id_item["imagelocation"] ?>" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title"><?php $id_item["preview"] ?></h5>
              <p class="card-text">Amoung us charlacter item_name <?php echo $id_item["item_name"] ?></p>
            </div>
            <button type="button" class="btn btn-primary"><h1>ซื้อกูสิ</h1></button>
          </div>
        </div><?php
      }?>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="js/jquery-3.5.1.slim.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>

</html>