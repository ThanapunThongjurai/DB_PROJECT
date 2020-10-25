<?php
if (!isset($_SESSION)) {
  session_start();
}
?>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
      <img src="image/apron.png" width="30" height="30" alt="" />
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="<?php echo ($page == 'index') ? 'active' : ''; ?>">
          <a class="nav-link" href="index.php">เซฟ และ ปอ ร้านขายเสื้อผ้า online<span class="sr-only">(current)</span></a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0" action="index.php" method="GET">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
        <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">ค้นหา</button>
      </form>
    </div>
  </div>

  <?php
  if (isset($_SESSION["user_username"])) {
  ?>
    <ul class="navbar-nav">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          username : <?php echo $_SESSION["user_fullname"]; ?>
          <span class="caret"></span>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="nav-link" href="user_data.php">username : <?php echo $_SESSION["user_fullname"]; ?> แก้ไขเปลี่ยนแปลงข้อมูลผู้ใช้</a>
          <?php
          if ($_SESSION["user_status"] == 1) { ?>
            <!-- <a class="nav-link" href="user_data.php">แก้ไขเปลี่ยนแปลงข้อมูลผู้ใช้</a> -->
            <a class="nav-link" href="admin.php">Admin : ITEM add remove update </a>
            <a class="nav-link" href="payment_check.php">Admin : ตรวจสอบแจ้งชำระ</a>
            <a class="nav-link" href="order.php">Admin : ordersของลูกค้า</a>
            <a class="nav-link" href="track.php">Admin : แปะเลขTRACKING ให้order ที่จ่ายเงินแล้ว</a>
          <?php } ?>

          <a class="nav-link" href="cart.php?act=update1">ตะกร้า</a>
          <a class="nav-link" href="payment.php">แจ้งชำระ</a>
          <a class="nav-link" href="order_user.php">คำสั่งซื้อของฉัน</a>


          <a class="nav-link" href="logout.php">ออกจากระบบ</a>
        </div>
      </li>
    </ul>
  <?php
  } else { ?>
    <ul class="navbar-nav">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          เข้าสู่ระบบ
          <span class="caret"></span>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="login.php">Login</a>
          <a class="dropdown-item" href="register.php">Register</a>
      </li>
    </ul>
    <?php }
    ?>

</nav>
<style tpye="text/css">
  body {
    background-image: url('image/space.jpg');
    background-repeat: initial;
  }
</style>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>