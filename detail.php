<?php
session_start();
require_once('connect.php');

$id_item = $_GET['id_item'];
$stmt = $conn->prepare("SELECT * FROM `item` WHERE id_item = $id_item");
$stmt->execute();
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


    <?php include_once (__DIR__) . ('/include/navbar.php'); $id_item = $stmt->fetch()?>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <img src="image/<?php echo $id_item["imagelocation"] ?>" class="card-img-top" alt="...">
                <button type="button" class="btn btn-primary">
                
                    <a class="btn btn-primary" href="cart.php?id_item=<?php echo $id_item['id_item']; ?>&act=add" role="button">
                        <h1>หยิบกูลงตะกร้า</h1>
                    </a>
                </button>
            </div>

            <div class="col-sm-8">
                <p class="">ชื่อสินค้า : <?php echo $id_item["item_name"] ?></p>
                <p class="">ราคา : <?php echo $id_item["item_price"] ?></p>
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