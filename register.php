<?php
 $msg = isset($_GET['msg']) ? $_GET['msg'] : '';
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


        </div>
    </div>
    <div class="container">
        <?php
        if ($msg == "invalid") {
        ?>
            <div class="text-center col-md-6 offset-md-3 ">
                <div class="alert alert-danger" role="alert">
                    invalid
                </div>
            </div>
        <?php
        }
        ?>

        <form action="checkregister.php" method="POST">
            
            <div class="form-group">
                <label for="exampleInputEmail1">username</label>
                <input name="USERNAME" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                <small id="emailHelp" class="form-text text-muted"></small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input name="PASSWORD" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input name="EMAIL" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email @">
                <small id="emailHelp" class="form-text text-muted"></small>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Fullname</label>
                <input name="FULLNAME" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                <small id="emailHelp" class="form-text text-muted"></small>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">ADDRESS</label>
                <input name="ADDRESS" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                <small id="emailHelp" class="form-text text-muted"></small>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">เบอร์โทร</label>
                <input name="TEL" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                <small id="emailHelp" class="form-text text-muted"></small>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">อยู่ในระบบตลอดกาล</label>
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