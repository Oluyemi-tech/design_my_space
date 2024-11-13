<?php
session_start();
require_once "admin_guard.php";
require_once "classes/Admin.php";

$c = new Admin;
$cat_id = $_GET['id'];
$cat_data = $c->get_cat_id($cat_id);

  ?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="assets/fontawesome/css/all.css">
        <link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
        <title>Manage Product</title>
    </head>
    <body>


<div class="row">

<?php  require_once "partials/Admin_menu.php"; ?>



<div class="col-md-9 p-3">
    
     <!-- Profile-->
    <div class="row">
        <div class="col-md-12 my-3">
            <h5 class="my-3">category Update </h5>
            <?php

            if(isset($_SESSION['errormsg'])){
              echo "<div class='alert alert-danger'>".$_SESSION['errormsg']."</div>";
              unset($_SESSION['errormsg']);
            }

            if(isset($_SESSION['good_msg'])){
              echo "<div class='alert alert-success'>".$_SESSION['good_msg']."</div>";
              unset($_SESSION['good_msg']);
            }

            ?>
    <form action="process/process_cat.php" method="post" enctype="multipart/form-data">
        <div class="row mb-3">
            
          <label for="center" class="col-sm-2 col-form-label">categorie Name</label>
          <div class="col-sm-4">
            <?php
          if ($cat_data === false) {
    echo "<div class='alert alert-danger'>No category found for this ID.</div>";
} else {
    // Now it is safe to access the array
    ?>
            <input type="text" name="product" class="form-control noround border-dark" id="product" value="<?php echo htmlspecialchars($cat_data['category']);  ?>">
          </div>
        </div>

            <?php
          }
          ?>
          </div>
        <div class="row mb-3">
            
            <div class="col-sm-12 text-center">
                <button type="submit" name="btnupdate" class="btn btn-dark col-4">Update Category</button>
            </div>
          </div>
      </form>
        </div>
    </div>
    <!-- End profile-->
</div>
</div>
<div class="row bg-dark text-white">
  <div class="col">
    <p class="text-center my-3"> &copy; 2024 Developed By Me</p>
  </div>
</div>

</body>
</html>