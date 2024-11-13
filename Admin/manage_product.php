<?php
session_start();
require_once "admin_guard.php";
require_once "classes/Admin.php";

$c = new Admin;
$product_id = $_GET['id'];
$product_data = $c->get_product_id($product_id);

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
            <h5 class="my-3">Profile Update </h5>
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
    <form action="process/process_product.php" method="post" enctype="multipart/form-data">
        <div class="row mb-3">
            
          <label for="center" class="col-sm-2 col-form-label">Product Name</label>
          <div class="col-sm-4">
            <?php
          if ($product_data === false) {
    echo "<div class='alert alert-danger'>No product found for this ID.</div>";
} else {
    // Now it is safe to access the array
    ?>
            <input type="text" name="product" class="form-control noround border-dark" id="product" value="<?php echo htmlspecialchars($product_data['name']);  ?>">
          </div>
        </div>
        <div class="row mb-3">
            <label for="description" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-4">
              <textarea name="description" id="description" class="form-control noround border-dark"><?php echo htmlspecialchars($product_data['description']);  ?></textarea>
            </div>
            <label for="image" class="col-sm-2 col-form-label">Picture</label>
            <div class="col-sm-4">
              <input type="file" name="image" class="form-control noround border-dark" id="image">
            </div>

            
          </div>
          <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="">Availability</label>
              <div class="col-sm-10">
                <select name="availability" id="availability" class="form-select noround border-dark">
                  <option value="active" <?php if($product_data['available'] == 'active'){ echo "selected";} ?> >Active</option>
                  <option value="disabled" <?php if($product_data['available'] == 'disabled'){ echo "selected";} ?> >Disabled</option>
                </select>
              </div>
          </div>

          <div class="row mb-3">
            <div class="col-sm-2">
             <label for="price">Price</label>
            </div>
             <div class="col-sm-4">
                <input type="number" name="price" id="price" value="<?php echo htmlspecialchars ($product_data['price']);  ?>" 
                class="form-control noround border-dark">
             </div>

            
          </div>

          <div class="row mb-3">
            <div class="col-sm-2">
            </div>
             <div class="col-sm-4">
                <input type="hidden" name="product_id" id="product_id" value="<?php echo htmlspecialchars ($product_id);  ?>" 
                class="form-control noround border-dark">
                <?php
          }
          ?>
             </div> 
          </div>
        <div class="row mb-3">
            
            <div class="col-sm-12 text-center">
                <button type="submit" name="btnupdate" class="btn btn-dark col-4">Update Product</button>
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