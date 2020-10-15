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
  <div class="container">

    <div class="col-10"><!---->
      <div class=""><!---->
        <div class=""><!---->
          <div class=""><!---->
            <div class="col-12"><!---->
                
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="js/jquery-3.5.1.slim.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>

</html>