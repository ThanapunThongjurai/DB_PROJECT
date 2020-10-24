<?php
session_start();

$msg = isset($_GET['msg']) ? $_GET['msg'] : '';
$id_item = isset($_REQUEST['id_item']) ? $_REQUEST['id_item'] : '';
$act = isset($_REQUEST['act']) ? $_REQUEST['act'] : 'update';
//$amount_array = isset($_REQUEST['amount']) ? $_REQUEST['amount'] : '0';
//$act = isset($_GET['amount']) ? $_GET['amount'] : '0';
//$act = $_REQUEST['act'];
//echo $id_item;
//echo $act;


if ($act == 'add' && !empty($id_item)) {
    if (isset($_SESSION['cart'][$id_item])) {
        $_SESSION['cart'][$id_item]++;
    } else {
        $_SESSION['cart'][$id_item] = 1;
    }
}

if ($act == 'remove' && !empty($id_item))  //ยกเลิกการสั่งซื้อ
{
    unset($_SESSION['cart'][$id_item]);
}

if ($act == 'update') {
    $amount_array = $_POST['amount'];
    foreach ($amount_array as $id_item => $amount) {
        $_SESSION['cart'][$id_item] = $amount;
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />

    <title>ตะกร้าสินค้า</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Shopping Cart</title>
</head>


<body>

    <?php include_once (__DIR__) . ('/include/navbar2.php');
    ?>
    <div class="container card">

        <?php
        // echo '<pre>';
        // print_r($_SESSION['cart']);
        // echo '</pre>'; ?>
        
        <h1 class="text-md-center">ตะกร้าสินค้า</h1>
        <form id="frmcart" name="frmcart" method="post" action="?act=update" class="">
            <table width="600" border="0" align="center" class="square">
                <tr>
                    <td colspan="5" bgcolor="#FFFFFF">
                </tr>
                <tr>
                    <td bgcolor="#EAEAEA">สินค้า</td>
                    <td align="center" bgcolor="#EAEAEA">ราคา</td>
                    <td align="center" bgcolor="#EAEAEA">จำนวน</td>
                    <td align="center" bgcolor="#EAEAEA">รวม(บาท)</td>
                    <td align="center" bgcolor="#EAEAEA">ลบ</td>
                </tr>
                <?php
                $total = 0;
                if (!empty($_SESSION['cart'])) {
                    //include("connect.php");                                                            แก้ด้วย
                    foreach ($_SESSION['cart'] as $id_item => $qty) {
                        $stmt = $conn->prepare("SELECT * FROM `item` WHERE id_item = '$id_item'");
                        $stmt->execute();                               // run sql before

                        $row = $stmt->fetch();

                        //echo $row['item_amount'];

                        if ($_SESSION['cart'][$id_item] >= $row['item_amount']) {
                            $qty = $row['item_amount'];
                        }


                        $sum = $row['item_price'] * $qty;
                        $total += $sum;
                        echo "<tr>";
                        echo "<td width='334'>" . $row["item_name"] . "</td>";
                        echo "<td width='46' align='right'>" . number_format($row["item_price"], 2) . "</td>";
                        echo "<td width='57' align='right'>";
                        echo "<input type='text' name='amount[$id_item]' value='$qty' size='2'/></td>";
                        echo "<td width='93' align='right'>" . number_format($sum, 2) . "</td>";
                        //remove product
                        echo "<td width='46' align='center'><a href='cart.php?id_item=" . $id_item . "&act=remove'>ลบ</a></td>";
                        echo "</tr>";
                    }
                    echo "<tr>";
                    echo "<td colspan='3' bgcolor='#CEE7FF' align='center'><b>ราคารวม</b></td>";
                    echo "<td align='right' bgcolor='#CEE7FF'>" . "<b>" . number_format($total, 2) . "</b>" . "</td>";
                    echo "<td align='left' bgcolor='#CEE7FF'></td>";
                    echo "</tr>";
                }
                ?>
                <tr>
                    <td><a href="index.php">กลับหน้ารายการสินค้า</a></td>
                    <td colspan="4" align="right">
                        <input type="submit" name="button" id="button" value="ปรับปรุง" />
                        <input type="button" name="Submit2" value="สั่งซื้อ" onclick="window.location='confirm.php';" />
                    </td>
                </tr>
            </table>
        </form>
        <script src="js/jquery-3.5.1.slim.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </div>
</body>

</html>