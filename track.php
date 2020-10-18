<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once('connect.php');
if ($_SESSION["user_status"] == 0) //0 is normal 
{
    header("Location: login.php");
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
    $user =  $_SESSION["user_username"];
    $query = $conn->prepare("SELECT 
                            orders.order_id, 
                            orders.order_date,
                            orders.order_date,
                            payment.pay_id,
                            payment.pay_price, 
                            payment.pay_status,
                            payment.pay_imagelocation, 
                            track.track_status,
                            track.track_owner,
                            track.track_no
                            FROM orders 
                            INNER JOIN payment ON orders.pay_id = payment.pay_id
                            INNER JOIN track ON orders.track_id = track.track_id
                            WHERE payment.pay_status ='pay' AND track.track_status ='wait'
                            ORDER BY orders.order_date DESC");


    $query->execute();
    ?>

    <div class="container mt-3">
        <h1>จัดส่งและนำเลขพัสดุติดตามเข้าระบบ</h1>
        <div class="col-12">
            <div class=" card table-responsive">
                <table class="table dark">
                    <thead class="thead-dark ">
                        <tr>
                            <th scope="col">รหัส ORDER</th>
                            <th scope="col">สถานะ</th>
                            <th scope="col">ช่องทางการส่ง</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // track

                        $track_owner = $conn->prepare("SELECT `track_owner_id`, `track_owner_name` FROM `track_owner_id`");
                        $track_owner->execute();

                        while ($result = $query->fetch()) {
                            $pay_id = $result["pay_id"];
                            $order_id = $result['order_id'];
                        ?>
                            <tr>
                                <th><a href="order_detail.php?order_id=<?php echo $order_id; ?>">#<?php echo $order_id; ?><br>กดเพื่อดูของที่ต้องจัดส่ง</a></th>
                                <td>
                                    <p>ต้องจัดส่ง <br> ชำระเงินแล้ว</p>
                                </td>
                                <td>
                                    <form method="POST" action="track_update_SQL.php">
                                        <label for="track_owner">Choose Delivery:</label>
                                        <select name="track_owner" id="track_owner">
                                            <?php
                                            while ($track_owner_result = $track_owner->fetch()) {
                                            ?>
                                                <option value="<?php echo $track_owner_result["track_owner_name"]; ?>">
                                                    <?php echo $track_owner_result["track_owner_name"]; ?>
                                                </option>
                                            <?php
                                            }
                                            ?>
                                            <!-- <option value="volvo">Volvo</option>
                                            <option value="saab">Saab</option>
                                            <option value="opel">Opel</option>
                                            <option value="audi">Audi</option> -->
                                        </select>
                                        <div class="form-group">

                                            Track NO.<input type="text" id="TIME" name="TIME" required>
                                        </div>


                                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                    </form>
                                    <!-- //! form -->
                                </td>
                            </tr>

                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>