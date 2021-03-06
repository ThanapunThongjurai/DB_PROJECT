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

$item_update_id = $_GET["id_item"];

$stmt = $conn->prepare("SELECT * FROM `item` WHERE `id_item` = '$item_update_id';");
$stmt->execute();
$item_data = $stmt->fetch();
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
        }
        ?>

        <form action="item_update_SQL.php?id_item=<?php echo $item_update_id; ?>" method="POST" enctype="multipart/form-data">

            <div class="form-group">
                <label for="exampleInputEmail1">item_name</label>
                <input name="item_name" class="form-control" aria-describedby="emailHelp" value="<?php echo $item_data['item_name']; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">item_price</label>
                <input name="item_price" class="form-control" value="<?php echo $item_data['item_price']; ?>">
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
                <input name="item_amount" class="form-control" aria-describedby="emailHelp" value="<?php echo $item_data['item_amount']; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">item_preview</label>
                <input name="item_preview" class="form-control" aria-describedby="emailHelp" value="<?php echo $item_data['item_preview']; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">item_disc</label>
                <input name="item_disc" class="form-control" aria-describedby="emailHelp" value="<?php echo $item_data['item_disc']; ?>">
            </div>

            <!-- เพิ่มีูป -->

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