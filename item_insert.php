<?php
session_start();
require_once('connect.php');
if ($_SESSION["user_status"] == 0) //0 is normal 
{
    header("Location: login.php");
}
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

        <form action="item_insert_SQL.php" method="POST" enctype="multipart/form-data">

            <div class="form-group">
                <label for="exampleInputEmail1">item_name</label>
                <input name="item_name" class="form-control" aria-describedby="emailHelp">
                <small class="form-text text-muted"></small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">item_price</label>
                <input name="item_price" class="form-control">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">item_type</label>
                <select name="item_type" id="track_owner">
                    <?php
                    $track_owner = $conn->prepare("SELECT * FROM item_type");
                    $track_owner->execute();
                    while ($track_owner_result = $track_owner->fetch()) {
                    ?>
                        <option value="<?php echo $track_owner_result["item_type_id"]; ?>">
                            <?php echo $track_owner_result["item_type_name"]; ?>
                        </option>
                    <?php
                    }
                    ?>
                    <!-- <option value="volvo">Volvo</option>
                                            <option value="saab">Saab</option>
                                            <option value="opel">Opel</option>
                                            <option value="audi">Audi</option> -->
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">item_amount</label>
                <input name="item_amount" class="form-control" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">item_preview</label>
                <input name="item_preview" class="form-control" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">item_disc</label>
                <input name="item_disc" class="form-control" aria-describedby="emailHelp">
            </div>



            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">



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