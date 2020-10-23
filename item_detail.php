<?php
session_start();
require_once('connect.php');

$id_item = $_GET['id_item'];
$stmt = $conn->prepare("SELECT * FROM `item` WHERE id_item = $id_item");
$stmt->execute();

$item_type = $conn->prepare("SELECT * FROM `item_type`");
$item_type->execute();
$item_type_count = 0;
while ($item_type_result = $item_type->fetch()) {
   $item_type_array[$item_type_count][0] = $item_type_result["item_type_id"];
   $item_type_array[$item_type_count][1] = $item_type_result["item_type_name"];
   $item_type_count++ . "<br>";
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


    <?php include_once (__DIR__) . ('/include/navbar.php');
    $id_item = $stmt->fetch() ?>
    <div class="container card mt-5">
        <div class="row">
            <div class="col-sm-4">
                <img src="image/item/<?php echo $id_item["imagelocation"] ?>" class="card-img-top" alt="...">
                <button type="button" class="btn btn-primary">

                    <a class="btn btn-primary" href="cart.php?id_item=<?php echo $id_item['id_item']; ?>&act=add" role="button">
                        <h1>หยิบลงตะกร้า</h1>
                    </a>
                </button>
            </div>

            <div class="col-sm-8 mt-5">
                <p class="">ชื่อสินค้า : <?php echo $id_item["item_name"] ?></p>
                <p class="">ราคา : <?php echo $id_item["item_price"] ?></p>
                <p> ประเภท : 
                    <?php

                    for ($i = 0; $i < $item_type_count; $i++) {
                        if ($id_item["item_type"] == $item_type_array[$i][0]) {
                            echo /*$id_item["item_type"] . */$item_type_array[$i][1];
                        }
                    }
                    // echo $result["item_type"];

                    ?>
                </p>
                <p class="">คลัง : <?php echo $id_item["item_amount"] ?></p>
                <p class="">คำอธิบาย : <?php echo $id_item["item_disc"] ?></p>
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