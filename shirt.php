<div class="row">
<?php
      $stmt = $conn->prepare("SELECT * FROM `item`");
      $stmt->execute();                               // run sql before
      while ($result = $stmt->fetch()) {
      ?>
        <div class="col-md-3">
          <div class="card">
              <!--img src="images/gallery/<?php echo $result; ?>.jpg"-->
              <img src="image/item/<?php echo $result["imagelocation"] ?>" class="card-img-top img-thumbnail" alt="..." >
              <div class="card-body">
                <h5 class="card-title"><?php echo $result["item_name"] ?></h5>
                <p class="card-text"><?php $result["item_preview"]; ?></p>
              </div>
              <a class="btn btn-primary" href="item_detail.php?id_item=<?php echo $result['id_item']; ?>" role="button">
                <h5>สนใจกดเลยราคาอยู่ข้างใน</h5>
              </a>
          </div>
        </div><?php
            } ?>
</div>