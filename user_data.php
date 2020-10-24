<?php
session_start();
require_once('connect.php');
if ($_SESSION["user_status"] == 0) //0 is normal 
{
    header("Location: login.php");
}
$msg = isset($_GET['msg']) ? $_GET['msg'] : '';

$user_username = $_SESSION["user_username"];
 

$stmt = $conn->prepare("SELECT `user_username`, `user_fullname`, `user_address`, `user_email`, `user_tel`, `user_status` FROM `user` WHERE `user_username` = '$user_username';");
$stmt->execute();
$user = $stmt->fetch();
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


<body>
    <?php include_once (__DIR__) . ('/include/navbar.php'); ?>



    <div class="container-fluid">
        <div class="row">


        </div>
    </div>
    <div class="container">

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
        if ($msg == 'invalid') {
        ?>
            <div class="text-center col-md-6 offset-md-3 ">
                <div class="alert alert-danger" role="alert">
                    invalid
                </div>
            </div>
        <?php
        }
        ?>
             
        <form action="user_update_SQL.php" method="POST" enctype="multipart/form-data">

            <div class="form-group">
                <label for="exampleInputEmail1">user_username</label>
                <input disabled name="user_username" class="form-control" aria-describedby="emailHelp" value="<?php echo $user['user_username']; ?>">
            <!-- </div>
            <div class="form-group">
                <label for="exampleInputPassword1">user_Password</label>
                <input name="user_password" type="password" value="<?php echo $user['user_password']; ?>" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div> -->
            <div class="form-group">
                <label for="exampleInputPassword1">user_fullname</label>
                <input name="user_fullname" class="form-control" value="<?php echo $user['user_fullname']; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">user_address</label>
                <input name="user_address" class="form-control" aria-describedby="emailHelp" value="<?php echo $user['user_address']; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">user_email</label>
                <input name="user_email" class="form-control" aria-describedby="emailHelp" value="<?php echo $user['user_email']; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">user_tel</label>
                <input name="user_tel" class="form-control" aria-describedby="emailHelp" value="<?php echo $user['user_tel']; ?>">
            </div>



            <!-- Select image to upload:
                <input type="file" name="fileToUpload" id="fileToUpload"> -->



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