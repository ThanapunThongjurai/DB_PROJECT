<?php
session_start();
include("connect.php");
if (!isset($_SESSION["user_status"]))
    header("Location: login.php");

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />

    <title>suberSHOP</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Checkout</title>
</head>


<body>
    <?php include_once (__DIR__) . ('/include/navbar2.php'); ?>
    <form id="frmcart" name="frmcart" method="post" action="order_save.php">
        <table width="600" border="0" align="center" class="square">
            <tr>
                <td width="1558" colspan="4" bgcolor="#FFDDBB">
                    <strong>สั่งซื้อสินค้า</strong></td>
            </tr>
            <tr>
                <td bgcolor="#F9D5E3">สินค้า</td>
                <td align="center" bgcolor="#F9D5E3">ราคา</td>
                <td align="center" bgcolor="#F9D5E3">จำนวน</td>
                <td align="center" bgcolor="#F9D5E3">รวม/รายการ</td>
            </tr>
            <?php

            $total = 0;

            foreach ($_SESSION['cart'] as $id_item => $qty) {
                $stmt = $conn->prepare("SELECT * FROM `item` WHERE id_item = '$id_item'");
                $stmt->execute();                               // run sql before
                $row = $stmt->fetch();
                if ($_SESSION['cart'][$id_item] >= $row['item_amount']) {
                    $qty = $row['item_amount'];
                }
                $sum    = $row['item_price'] * $qty;
                $total    += $sum;
                echo "<tr>";
                echo "<td>" . $row["item_name"] . "</td>";
                echo "<td align='right'>" . number_format($row['item_price'], 2) . "</td>";
                echo "<td align='right'>$qty</td>";
                echo "<td align='right'>" . number_format($sum, 2) . "</td>";
                echo "</tr>";
            }
            $_SESSION["total"] = $total;
            echo "<tr>";
            echo "<td  align='right' colspan='3' bgcolor='#F9D5E3'><b>รวม</b></td>";
            echo "<td align='right' bgcolor='#F9D5E3'>" . "<b>" . number_format($total, 2) . "</b>" . "</td>";
            echo "</tr>";
            ?>
        </table>

        <?php
        //$_SESSION["user_username"] = $result['user_username'];
        //$_SESSION["user_fullname"] = $result['user_fullname'];
        //$_SESSION["user_status"] = $result['user_status'];
        $user_id = $_SESSION["user_username"];
        $stmt = $conn->prepare("SELECT * FROM `user` WHERE user_username    =  '$user_id' ");
        $stmt->execute(); // run sql before
        $user = $stmt->fetch();
        ?>

        <p>

            <table border="0" cellspacing="0" align="center">
                <tr>
                    <td colspan="2" bgcolor="#CCCCCC">รายละเอียดในการติดต่อ</td>
                </tr>
                <tr>
                    <td bgcolor="#EEEEEE">ชื่อ</td>
                    <td><input name="name" value="<?php echo $user['user_fullname'];  ?>" disabled id="name" required /></td>
                </tr>
                <tr>
                    <td width="22%" bgcolor="#EEEEEE">ที่อยู่</td>
                    <td width="78%">
                        <textarea name="address" disabled cols="35" rows="5" id="address" required><?php echo $user['user_address'];  ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td bgcolor="#EEEEEE">อีเมล</td>
                    <td><input name="email" type="email" value="<?php echo $user['user_email'];  ?>" disabled id="email" required /></td>
                </tr>
                <tr>
                    <td bgcolor="#EEEEEE">เบอร์ติดต่อ</td>
                    <td><input name="phone" type="text" value="<?php echo $user['user_tel'];  ?>" disabled id="phone" required /></td>
                </tr>

                <tr>
                    <td colspan="2" align="center" bgcolor="#CCCCCC">
                        <input type="submit" name="Submit2" value="สั่งซื้อ" />
                    </td>
                </tr>
            </table>

    </form>
    <div class="row">
        <div class="col">

        </div>
        <div class="col-6 d-flex justify-content-center">
            <a href="user_data.php">
                <button type="button" class="btn btn-outline-info">แก้ไขข้อมูลการจัดส่ง</button>
            </a>
        </div>
        <div class="col">

        </div>
    </div>
    </div>
    <?php
    echo '<pre>';
    print_r($_SESSION);
    echo '</pre>'; ?>
    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>