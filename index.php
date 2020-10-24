<?php
if (!isset($_SESSION)) {
  session_start();
}
require_once('connect.php');
?>
<?php 
  $page     = basename($_SERVER['PHP_SELF'], ".php");
?>
<!DOCTYPE html>

<html lang="en">


<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css" />

  <title>suberSHOP</title>
</head> 

<body>


  <?php include_once (__DIR__) . ('/include/navbar2.php');


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
            <li class="nav-item card mt-2">
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
            <div class="col-md-3 mt-3 mr-2">
              <div class="row">
                <div class="card" style="width: 21rem;">
                  <!--img src="images/gallery/<?php echo $result; ?>.jpg"-->
                  <img style="width: 350px; height: 300px;" src="image/item/<?php echo $result["imagelocation"] ?>" class="card-img-top img-thumbnail" alt="Card image cap">
                  <div class="card-body">
                    <h4 class="card-title"><span class="d-block p-2 bg-dark text-white"><?php echo $result["item_name"] ?></span></h4>
                    <p class="text-left"><?php echo $result["item_preview"]; ?></p>
                    <h5 class="text-right">
                    
                    <p class="text-primary"><?php echo $result["item_price"]." บาท"; ?></p>


                    </h5>
                  </div>
                  <center><a href="item_detail.php?id_item=<?php echo $result['id_item']; ?>"><button type="button" class="btn btn-outline-dark"><h4>สนใจกดเลยราคาอยู่ข้างใน</h4></button></a></center>
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