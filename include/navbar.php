<?php
if (!isset($_SESSION)) {
  session_start();
}
?>

<nav class="navbar navbar-light" style="background-color: #FFFFFF;">
  <a class="navbar-brand" href="index.php">
    <img src="image/apron.png" width="30" height="30" alt="" />
  </a>

  <a class="navbar-brand" href="index.php">ปิดกิจการพานิจ</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home</a>
      </li>

      <?php
      if (isset($_SESSION["user_username"])) {
      ?>
        <li class="nav-item">
          <a class="nav-link" href="user_data.php">username : <?php echo $_SESSION["user_fullname"]; ?></a>
        </li>
        <?php
        if ($_SESSION["user_status"] == 1) {
        ?>
          <li class="nav-item">
            <a class="nav-link" href="admin.php">AdminControl เพิ่ม ลบ update </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="check_payment_transection.php">ตรวจสอบแจ้งชำระ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="oreder.php">ORDERของลูกค้า</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cart.php?act=update1">ตะกร้า</a>
          </li>
        <?php
        }
        ?>
        <li class="nav-item">
            <a class="nav-link" href="cart.php?act=update1">ตะกร้า</a>
          </li>
        <li class="nav-item">
          <a class="nav-link" href="payment.php">แจ้งชำระ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="user_order.php">คำสั่งซื้อของฉัน</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">ออกจากระบบ</a>
        </li>
      <?php
      } else {
      ?>

        <li class="nav-item">
          <a class="nav-link" href="login.php">เข้าสู่ระบบ</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="register.php">สมัครสมาชิก</a>
        </li>
      <?php
      }
      ?>

    </ul>
  </div>
</nav>