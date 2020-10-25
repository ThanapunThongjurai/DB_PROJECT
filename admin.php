<?php
if (!isset($_SESSION)) {
  session_start();
}
require_once('connect.php');
if ($_SESSION["user_status"] == 0) //0 is normal 
{
  header("Location: login.php");
}
$item_type = $conn->prepare("SELECT * FROM `item_type`");
$item_type->execute();
$item_type_count = 0;
while ($item_type_result = $item_type->fetch()) {
  $item_type_array[$item_type_count][0] = $item_type_result["item_type_id"];
  $item_type_array[$item_type_count][1] = $item_type_result["item_type_name"];
  $item_type_count++ . "<br>";
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

  <title>ADMIN</title>
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

          <li class="nav-item card mt-2">
            <a class="nav-link" href="admin.php?msg=item">
              <svg width="24" height="24" viewBox="0 0 24 24" class="bi bi-handbag-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M8 1a2 2 0 0 0-2 2v2H5V3a3 3 0 0 1 6 0v2h-1V3a2 2 0 0 0-2-2zM5 5H3.361a1.5 1.5 0 0 0-1.483 1.277L.85 13.13A2.5 2.5 0 0 0 3.322 16h9.356a2.5 2.5 0 0 0 2.472-2.87l-1.028-6.853A1.5 1.5 0 0 0 12.64 5H11v1.5a.5.5 0 0 1-1 0V5H6v1.5a.5.5 0 0 1-1 0V5z" />
              </svg>
              item
            </a>
          </li>
          <li class="nav-item card mt-2">
            <a class="nav-link" href="admin.php?msg=item_type">
              <svg width="24" height="24" viewBox="0 0 24 24" class="bi bi-handbag-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M8 1a2 2 0 0 0-2 2v2H5V3a3 3 0 0 1 6 0v2h-1V3a2 2 0 0 0-2-2zM5 5H3.361a1.5 1.5 0 0 0-1.483 1.277L.85 13.13A2.5 2.5 0 0 0 3.322 16h9.356a2.5 2.5 0 0 0 2.472-2.87l-1.028-6.853A1.5 1.5 0 0 0 12.64 5H11v1.5a.5.5 0 0 1-1 0V5H6v1.5a.5.5 0 0 1-1 0V5z" />
              </svg>
              item_type
            </a>
          </li>
          <li class="nav-item card mt-2">
            <a class="nav-link" href="admin.php?msg=track_owner">
              <svg width="24" height="24" viewBox="0 0 24 24" class="bi bi-handbag-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M8 1a2 2 0 0 0-2 2v2H5V3a3 3 0 0 1 6 0v2h-1V3a2 2 0 0 0-2-2zM5 5H3.361a1.5 1.5 0 0 0-1.483 1.277L.85 13.13A2.5 2.5 0 0 0 3.322 16h9.356a2.5 2.5 0 0 0 2.472-2.87l-1.028-6.853A1.5 1.5 0 0 0 12.64 5H11v1.5a.5.5 0 0 1-1 0V5H6v1.5a.5.5 0 0 1-1 0V5z" />
              </svg>
              track_owner
            </a>
          </li>
          <li class="nav-item card mt-2">
            <a class="nav-link" href="admin.php?msg=user">
              <svg width="24" height="24" viewBox="0 0 24 24" class="bi bi-handbag-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M8 1a2 2 0 0 0-2 2v2H5V3a3 3 0 0 1 6 0v2h-1V3a2 2 0 0 0-2-2zM5 5H3.361a1.5 1.5 0 0 0-1.483 1.277L.85 13.13A2.5 2.5 0 0 0 3.322 16h9.356a2.5 2.5 0 0 0 2.472-2.87l-1.028-6.853A1.5 1.5 0 0 0 12.64 5H11v1.5a.5.5 0 0 1-1 0V5H6v1.5a.5.5 0 0 1-1 0V5z" />
              </svg>
              user
            </a>
          </li> 




          
        </ul>
      </div>
      <div class="container">
        <div class="card">

          <div class="">
            <h1 class="text-md-center">ADMIN CONTROL</h1>
            <?php

            if (isset($_GET["msg"])) {
              if ($_GET["msg"] == "item") {

                $stmt = $conn->prepare("SELECT * FROM `item`");
                $stmt->execute();                               // run sql before
            ?>
                <h2>ITEM</h2>
                <table class="table">
                  <a type="button" class="btn btn-outline-success btn-lg mb-3 card ml-3" href="item_insert.php">item_insert</a>
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">item_id</th>
                      <th scope="col">item_name</th>
                      <th scope="col">item_price</th>
                      <th scope="col">item_type</th>
                      <th scope="col">item_amount</th>
                      <th scope="col">imagelocation</th>
                    </tr>
                  </thead>
                  <?php
                  while ($result = $stmt->fetch()) {

                  ?>


                    <tbody>
                      <tr>
                        <th scope="row"><?php echo $result["id_item"]; ?></th>
                        <td><?php echo $result["item_name"]; ?></td>
                        <td><?php echo $result["item_price"]; ?></td>
                        <td>
                          <?php

                          for ($i = 0; $i < $item_type_count; $i++) {
                            if ($result["item_type"] == $item_type_array[$i][0]) {
                              echo $result["item_type"] . $item_type_array[$i][1];
                            }
                          }
                          // echo $result["item_type"];

                          ?>
                        </td>
                        <td><?php echo $result["item_amount"]; ?></td>
                        <td><img src="image/item/<?php echo $result["imagelocation"]; ?>" height="40px"></td>
                        <td><a type="button" class="btn btn-outline-secondary" href="item_update.php?id_item=<?php echo $result["id_item"]; ?>">UPDATE</a></td>
                        <td><a type="button" class="btn btn-outline-danger" href="item_delete.php?id_item=<?php echo $result["id_item"]; ?>">DELETE</a></td>
                      </tr>
                    </tbody>
                  <?php
                  } ?>
                </table>
              <?php
              }
              if ($_GET["msg"] == "item_type") {

                $stmt = $conn->prepare("SELECT * FROM `item_type`");
                $stmt->execute();                               // run sql before
              ?>


                <h2>ITEM_TYPE</h2>
                <table class="table">
                  <a type="button" class="btn btn-outline-success btn-lg mb-3 card ml-3" href="item_type_insert.php">item_type_insert</a>
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">item_type_id</th>
                      <th scope="col">item_type_name</th>
                    </tr>
                  </thead>
                  <?php
                  while ($result = $stmt->fetch()) {

                  ?>
                    <tbody>
                      <tr>
                        <th scope="row"><?php echo $result["item_type_id"]; ?></th>
                        <td><?php echo $result["item_type_name"]; ?></td>
                        <td>

                        </td>
                        <td><a type="button" class="btn btn-outline-secondary" href="item_type_update.php?item_type=<?php echo $result["item_type_id"]; ?>">UPDATE</a></td>
                        <td><a type="button" class="btn btn-outline-danger" href="item_type_delete.php?item_type=<?php echo $result["item_type_id"]; ?>">DELETE</a></td>
                      </tr>
                    </tbody>
                  <?php
                  } ?>
                </table>
              <?php
              }
              if ($_GET["msg"] == "track_owner") {
                $stmt = $conn->prepare("SELECT * FROM `track_owner_id`");
                $stmt->execute();                               // run sql before
              ?>

                <h2>track_owner</h2>
                <table class="table">
                  <a type="button" class="btn btn-outline-success btn-lg mb-3 card ml-3" href="track_owner_insert.php">track_owner_insert</a>
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">track_owner_id_id</th>
                      <th scope="col">track_owner_name</th>
                    </tr>
                  </thead>
                  <?php
                  while ($result = $stmt->fetch()) {

                  ?>
                    <tbody>
                      <tr>
                        <th scope="row"><?php echo $result["track_owner_id"]; ?></th>
                        <td><?php echo $result["track_owner_name"]; ?></td>
                        <td>

                        </td>
                        <td><a type="button" class="btn btn-outline-secondary" href="track_owner_update.php?track_owner_id=<?php echo $result["track_owner_id"]; ?>">UPDATE</a></td>
                        <td><a type="button" class="btn btn-outline-danger" href="track_owner_delete.php?track_owner_id=<?php echo $result["track_owner_id"]; ?>">DELETE</a></td>
                      </tr>
                    </tbody>
                  <?php
                  } ?>
                </table>

              <?php
              }
              if ($_GET["msg"] == "user") {
                $stmt = $conn->prepare("SELECT * FROM `user`");
                $stmt->execute();                               // run sql before
              ?>
                <h2>USER</h2>
                <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">user_username</th>
                      <th scope="col">user_username</th>
                    </tr>
                  </thead>
                  <?php
                  while ($result = $stmt->fetch()) {

                  ?>
                    <tbody>
                      <tr>
                        <th scope="row"><?php echo $result["user_username"]; ?></th>
                        <td><?php echo $result["user_username"]; ?></td>
                        <td>

                        </td>
                        <td><a type="button" class="btn btn-outline-secondary" href="user_update.php?id_item=<?php echo $result["user_username"]; ?>">UPDATE</a></td>
                        <td><a type="button" class="btn btn-outline-danger" href="user_delete.php?id_item=<?php echo $result["user_username"]; ?>">DELETE</a></td>
                      </tr>
                    </tbody>
                  <?php
                  } ?>
                </table>

            <?php
              }
            }
            ?>


          </div>
        </div>
      </div>
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="js/jquery-3.5.1.slim.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
</body>

</html>