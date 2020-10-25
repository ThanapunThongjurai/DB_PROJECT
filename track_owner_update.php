<?php
session_start();
require_once('connect.php');
if ($_SESSION["user_status"] == 0) //0 is normal 
{
  header("Location: login.php");
}
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

  <title>ITEM UPDATE</title>
</head>


<body>
  <?php include_once (__DIR__) . ('/include/navbar.php'); ?>
  <div class="container card ">
    <h1 class="text-md-center">ITEM INSERT</h1>
    <!--
      <?php
      if ($item_update_id != 0) { ?>
        <div class="text-center col-md-6 offset-md-3 ">
            <div class="alert alert-danger" role="alert">
              //<?php echo $item_update_id ?>
            </div>
        </div>
          <?php
        }
          ?>
-->
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

    $track_owner_id = $_GET["track_owner_id"];

    }
    ?>

    <form action="track_owner_update_SQL.php" method="POST">

      
      <label for="exampleInputEmail1">track_owner_id</label>
      <input name="track_owner_id" class="form-control" aria-describedby="emailHelp" value="<?php echo $_GET["track_owner_id"]; ?>" disabled>
      <label for="exampleInputEmail1">track_owner_name</label>
      <input name="track_owner_name" class="form-control" aria-describedby="emailHelp">

      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="js/jquery-3.5.1.slim.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>

</html>