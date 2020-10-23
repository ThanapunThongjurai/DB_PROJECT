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
  <div class="container-fluid">
  <div class="row">
  <div class="col-sm-2 col-md-2 sidebar">
  <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=shirt">
            <svg width="24" height="24" viewBox="0 0 24 24" class="bi bi-handbag-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path d="M8 1a2 2 0 0 0-2 2v2H5V3a3 3 0 0 1 6 0v2h-1V3a2 2 0 0 0-2-2zM5 5H3.361a1.5 1.5 0 0 0-1.483 1.277L.85 13.13A2.5 2.5 0 0 0 3.322 16h9.356a2.5 2.5 0 0 0 2.472-2.87l-1.028-6.853A1.5 1.5 0 0 0 12.64 5H11v1.5a.5.5 0 0 1-1 0V5H6v1.5a.5.5 0 0 1-1 0V5z"/>
            </svg>
              เสื้อ
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=login">
            <svg width="24" height="24" viewBox="0 0 24 24" class="bi bi-handbag-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path d="M8 1a2 2 0 0 0-2 2v2H5V3a3 3 0 0 1 6 0v2h-1V3a2 2 0 0 0-2-2zM5 5H3.361a1.5 1.5 0 0 0-1.483 1.277L.85 13.13A2.5 2.5 0 0 0 3.322 16h9.356a2.5 2.5 0 0 0 2.472-2.87l-1.028-6.853A1.5 1.5 0 0 0 12.64 5H11v1.5a.5.5 0 0 1-1 0V5H6v1.5a.5.5 0 0 1-1 0V5z"/>
            </svg>
              กางเกง
            </a>
          </li>
        </ul>
  </div>
    <div class="col-md-9">
      <div id="pag-wrapper">
        <?php
          $page = isset($_GET['page']) ? $_GET['page'] : 'shirt';
          include($page.'.php');
        ?>
      </div>
    </div>
  </div>
  </div>
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
      <script src="js/jquery-3.5.1.slim.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
</body>

</html>