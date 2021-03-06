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
    <title>track</title>
</head>


<body>
    <?php include_once (__DIR__) . ('/include/navbar2.php');
    $user =  $_SESSION["user_username"];
    $query = $conn->prepare("SELECT 
                            *
                            FROM orders 
                            INNER JOIN payment ON orders.pay_id = payment.pay_id
                            INNER JOIN track ON orders.track_id = track.track_id
                            INNER JOIN user ON orders.order_username = user.user_username
                            WHERE payment.pay_status ='pay' AND track.track_status ='wait'
                            ORDER BY orders.order_date DESC");


    $query->execute();
    ?>

    <div class="container mt- card">
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

                        

                        while ($result = $query->fetch()) {
                            $pay_id = $result["pay_id"];
                            $order_id = $result['order_id'];
                        ?>
                            <tr>
                                <th><a href="order_detail.php?order_id=<?php echo $order_id; ?>">#<?php echo $order_id; ?><br>กดเพื่อดูของที่ต้องจัดส่ง</a>
                            
                            <p>ที่อยู่จัดส่ง : <?php echo $result["user_address"];?></p>
                            </th>
                                <td>
                                    <p>ต้องจัดส่ง <br> ชำระเงินแล้ว</p>
                                </td>
                                <td>
                                    <form  action="track_update_SQL.php?track_id=<?php echo $result["track_id"];?>" method="POST">
                                        <label for="track_owner">Choose Delivery:</label>
                                        <select name="track_owner" id="track_owner">
                                            <?php
                                            $track_owner = $conn->prepare("SELECT `track_owner_id`, `track_owner_name` FROM `track_owner_id`");
                                            $track_owner->execute();
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

                                            Track NO.<input type="text" id="" name="track_no" required>
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