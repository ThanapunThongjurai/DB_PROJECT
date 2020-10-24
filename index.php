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

<body>


  <?php include_once (__DIR__) . ('/include/navbar.php');


  $item_type = $conn->prepare("SELECT * FROM `item_type`");
  $item_type->execute();
  ?>
  <div class="container-fluid">

    <div class="row">
      <div class="col-sm-2 col-md-2 sidebar">
        <ul class="nav flex-column">
          <?php
          while ($item_type_result = $item_type->fetch()) {
          ?>
            <li class="nav-item">
              <a class="nav-link" href="index.php?type=<?php echo $item_type_result["item_type_id"]; ?>">
                <svg width="24" height="24" viewBox="0 0 24 24" class="bi bi-handbag-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path d="M8 1a2 2 0 0 0-2 2v2H5V3a3 3 0 0 1 6 0v2h-1V3a2 2 0 0 0-2-2zM5 5H3.361a1.5 1.5 0 0 0-1.483 1.277L.85 13.13A2.5 2.5 0 0 0 3.322 16h9.356a2.5 2.5 0 0 0 2.472-2.87l-1.028-6.853A1.5 1.5 0 0 0 12.64 5H11v1.5a.5.5 0 0 1-1 0V5H6v1.5a.5.5 0 0 1-1 0V5z" />
                </svg>
                <?php echo $item_type_result["item_type_name"]; ?>

              </a>
            </li>
          <?php } ?>
        </ul>
      </div>
      <div class="col-md-9">
        <div class="row">
          <?php
          if (isset($_GET["type"])) {
            $item_type_get = $_GET["type"];
          }
          else
          {
            $item_type_get = "";
          }

          if ($item_type_get == "") {
            $stmt = $conn->prepare("SELECT * FROM `item`");
          } else {

            $stmt = $conn->prepare("SELECT * FROM `item` WHERE item_type = '$item_type_get'");
          }
          //$stmt = $conn->prepare("SELECT * FROM `item`");
          $stmt->execute();                               // run sql before
          while ($result = $stmt->fetch()) {
          ?>
            <div class="col-md-3">
              <div class="row">
                <div class="card" style="width: 21rem;">
                  <!--img src="images/gallery/<?php echo $result; ?>.jpg"-->
                  <img style="width: 350px; height: 300px;" src="image/item/<?php echo $result["imagelocation"] ?>" class="card-img-top img-thumbnail" alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $result["item_name"] ?></h5>
                    <p class="text-left"><?php echo $result["item_preview"]; ?></p>
                    <h5 class="text-right"><?php echo $result["item_price"]." บาท"; ?></h5>
                  </div>
                  <a class="btn btn-primary" href="item_detail.php?id_item=<?php echo $result['id_item']; ?>" role="button">
                    <h5>สนใจกดเลยราคาอยู่ข้างใน</h5>
                  </a>
                </div>
              </div>
            </div><?php
                } ?>
        </div>
      </div>
    </div>
  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
  <script src="js/jquery-3.5.1.slim.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>

</html>