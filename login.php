<?php
if (isset($_GET['msg'])) {
  $msg = $_GET['msg'];
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

  <title>LOGIN</title>
</head>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<body>
  <?php include_once (__DIR__) . ('/include/navbar2.php'); ?>




  <div class="container card">
    <?php
    if (isset($msg)) {
    ?>

      <script type="text/javascript">
        swal("", "<?php echo $msg; ?> !!", "error");
      </script>

      <!-- <div class="text-center col-md-6 offset-md-3 ">
        <div class="alert alert-danger" role="alert">
          invalid
        </div>
      </div> -->
    <?php
    }
    ?>
    <h1 class="text-md-center">LOGIN</h1>
    <form action="checklogin.php" method="POST">
      <div class="form-group">
        <h6 class="text-white"><label for="exampleInputEmail1">Email address</label></h6>
        <input name="USERNAME" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted">ใส่เดี่ยว</small>
      </div>
      <div class="form-group">
        <h6 class="text-white"><label for="exampleInputPassword1">Password</label></h6>
        <input name="PASSWORD" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
      </div>
      <div class="form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <h6 class="text-white"><label class="form-check-label" for="exampleCheck1">อยู่ในระบบตลอดกาล</label></h6>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="js/jquery-3.5.1.slim.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>

</html>