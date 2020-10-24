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

    <title>suberSHOP</title>
</head>
<style>
h6 {
  text-shadow: 1px 1px #f2f2f2;
}
</style>

<body>
    <?php include_once (__DIR__) . ('/include/navbar.php'); ?>



    <div class="container-fluid">
        <div class="row">


        </div>
    </div>
    <div class="container">
        <?php
        if (isset($msg)) {
        ?>
            <script type="text/javascript">
                swal("", "<?php echo $msg; ?> !!", "error");
            </script>
        <?php
        }
        ?>

        <form action="checkregister.php" method="POST">

            <div class="form-group">
            <h6 class="text-white"><label for="exampleInputEmail1">username</label></h6>
                <input name="USERNAME" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted"></small>
            </div>
            <div class="form-group">
            <h6 class="text-white"><label for="exampleInputPassword1">Password</label></h6>
                <input name="PASSWORD" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="form-group">
            <h6 class="text-white"><label for="exampleInputEmail1">Email address</label></h6>
                <input name="EMAIL" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email @">
                <small id="emailHelp" class="form-text text-muted"></small>
            </div>
            <div class="form-group">
            <h6 class="text-white"><label for="exampleInputEmail1">Fullname</label></h6>
                <input name="FULLNAME" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted"></small>
            </div>
            <div class="form-group">
            <h6 class="text-white"><label for="exampleInputEmail1">ADDRESS</label></h6>
                <input name="ADDRESS" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted"></small>
            </div>
            <div class="form-group">
            <h6 class="text-white"><label for="exampleInputEmail1">เบอร์โทร</label></h6>
                <input name="TEL" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted"></small>
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