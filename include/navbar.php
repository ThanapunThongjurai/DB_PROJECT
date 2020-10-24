<?php
if (!isset($_SESSION)) {
  session_start();
}
?>

<nav class="navbar navbar-light navbar fixed-top sticky-top" style="background-color: #FFFFFF;">
  <a class="navbar-brand" href="index.php">
    <img src="image/apron.png" width="30" height="30" alt="" />
  </a>


  <!-- Button trigger modal 
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Launch demo modal
  </button>
-->
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="modal-body">
            
            <h5>Popover in a modal</h5>
            <p>This <a href="#" role="button" class="btn btn-secondary popover-test" title="Popover title" data-content="Popover body content is set in this attribute.">button</a> triggers a popover on click.</p>
            <hr>
            <h5>Tooltips in a modal</h5>
            <p><a href="#" class="tooltip-test" title="Tooltip">This link</a> and <a href="#" class="tooltip-test" title="Tooltip">that link</a> have tooltips on hover.</p>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>





  <a class="navbar-brand" href="index.php">เซฟ และ ปอ ร้านขายเสื้อผ้า online</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>


  <!-- Button trigger modal -->
  <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  <span class="navbar-toggler-icon"></span>
  </button> -->

  <div class="collapse navbar-collapse" id="navbarNav">

    <ul class="navbar-nav">

      <li class="nav-item">
        <a class="nav-link" href="index.php">Home</a>
      </li>

      <?php
      if (isset($_SESSION["user_username"])) {
      ?>
        <li class="nav-item">
          <a class="nav-link" href="user_data.php">username : <?php echo $_SESSION["user_fullname"]; ?> แก้ไขเปลี่ยนแปลงข้อมูลผู้ใช้</a>
        </li>
        <?php
        if ($_SESSION["user_status"] == 1) {
        ?>
          <li class="nav-item">
            <a class="nav-link" href="admin.php">Admin : ITEM add remove update </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="payment_check.php">Admin : ตรวจสอบแจ้งชำระ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="order.php">Admin : ordersของลูกค้า</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="track.php">Admin : แปะเลขTRACKING ให้order ที่จ่ายเงินแล้ว</a>
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
          <a class="nav-link" href="order_user.php">คำสั่งซื้อของฉัน</a>
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

<style tpye="text/css">
  body {
    background-image: url('image/space.jpg');
    background-repeat:initial;
  }
</style>