<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">หน้าแรก</a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      <li class="<?php echo ($page == 'webpage') ? 'active':''; ?>"><a href="webpage.php">สินค้า</a></li>
        <li class="<?php echo ($page == 'payment') ? 'active':''; ?>"><a href="payment.php">วิธีชำระเงิน</a></li>
      </ul>
      <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Login<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="Login.php">Login</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">register</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>