<?php
if (!isset($_SESSION)) {
  session_start();
}
require_once('connect.php');
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
  
  <div class="container md-3 mt-5">
    <div class="row row-cols-1 row-cols-md-3 mt-5">
      <?php
      $stmt = $conn->prepare("SELECT * FROM `item`");
      $stmt->execute();                               // run sql before
      while ($result = $stmt->fetch()) {
      ?>
        <div class="col mb-3">
          <div class="card">
            <!--img src="images/gallery/<?php echo $result; ?>.jpg"-->
            <img src="image/item/<?php echo $result["imagelocation"] ?>" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title"><?php $result["item_preview"]; ?></h5>
              <p class="card-text">Amoung us charlacter item_name <?php echo $result["item_name"] ?></p>
            </div>
            <a class="btn btn-primary" href="item_detail.php?id_item=<?php echo $result['id_item']; ?>" role="button">
              <h1>ซื้อกูสิ</h1>
            </a>
          </div>
        </div><?php
            } ?>
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="js/jquery-3.5.1.slim.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
</body>

</html>