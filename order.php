<?php
if (!isset($_SESSION)) {
  session_start();
}
require_once('connect.php');
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
  <?php
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
  ORDER BY orders.order_date DESC");


  $query->execute();

  ?>


  <div class="container mt-3">
    <h1>ORDER ทั้งหมด</h1>
    <!--กรอบแดงๆ-->
    <div class="col-12">
      <!--กรอบเขียวๆ บนๆอะกรอบเขีวๆ-->
      <?php
      while ($result = $query->fetch()) {
      ?>
        <div class="mt-3 card">
          <!-- WHILE LOOP>
        
          <!--กรอบส้มๆ-->


          <h4></h4>
          <h2>รายการที่ <a href="order_detail.php?order_id=<?php echo $result["order_id"] ?>">#<?php echo $result["order_id"] ?> </a></h2>

          <div class="col">

            <!-- กรอบม่วงๆ -->
            <div class="col">
              <!-- กรอบน้ำเงินๆ -->
              <div class="col">
                <!-- กรอบแดงๆ3อันอะ -->

                <div class="row">
                  <div class="col">
                    <h4>order</h4>
                    <p>วันที่ทำการสั่งซื้อ </p>
                    <p><?php echo $result["order_date"] ?></p>
                    <!-- <a href="order_cancel.php?order_id=<?php echo $result["order_id"] ?>" type="button" class="btn btn-outline-danger">แจ้งยกเลิก</a> -->
                  </div>
                  <!-- <div class="col">
                    <h4>item</h4>
                  </div> -->
                  <div class="col">
                    <h4>pay</h4>
                    <p>ราคาสุทธิ :<?php echo $result["pay_price"] ?> บาท</p>
                    <p>สถานะการจ่ายเงิน : <?php echo $result["pay_status"] ?></p>
                    <?php if ($result["pay_status"] == "pay") { ?>
                      <a href="image/payment/<?php echo $result["pay_imagelocation"] ?>">
                        <img src="image/payment/<?php echo $result["pay_imagelocation"] ?>" width="200px">
                      </a>
                    <?php } ?>
                  </div>
                  <div class="col">
                    <h4>track</h4>
                    <p>สถานะการขนส่ง :<?php echo $result["track_status"] ?></p>
                    <p>บริษัทขนส่ง :<?php echo $result["track_owner"] ?></p>
                    <p>trackNO. : <?php echo $result["track_no"] ?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      <?php
      }
      ?>
    </div>
  </div>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="js/jquery-3.5.1.slim.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
<!---->

<!-- 
                    SELECT orders.order_id, orders.order_date,
                    payment.pay_price, 
                    track.track_status
                    FROM orders 
                    INNER JOIN payment ON orders.pay_id = payment.pay_id
                    INNER JOIN track ON orders.track_id = track.track_id
                    WHERE orders.order_username = 0
                    ORDER BY orders.order_date DESC



                    SELECT orders.order_id,
                    orders_no.order_no_item
                    FROM orders
                    INNER JOIN orders_no ON orders.order_id = orders_no.order_no_id
                    
                  -->

</html>