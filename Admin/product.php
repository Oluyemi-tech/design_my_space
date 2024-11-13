<?php
session_start();
require_once("admin_guard.php");
require_once "classes/Admin.php";
$admin = new Admin;

$listed = $admin->get_cat();
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="assets/fontawesome/css/all.css">
        <link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
        <title>Product</title>
    </head>
    <body>
<div class="row">

<?php  require_once "partials/Admin_menu.php"; ?>


<div class="col-md-9 p-3">
    
     <!-- Profile-->
    <div class="row">
        <div class="col-md-12 my-3">
            <h5 class="my-3">Product</h5>
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
        
    <form action="process/product_process.php" method="post" enctype="multipart/form-data">
        <div class="row mb-3">
            <label for="product" class="col-sm-2 col-form-label">product Name</label>
          <div class="col-sm-4">
            <input type="text" name="product" class="form-control noround border-dark" id="product" value="">
          </div>
              <label for="categorie" class="col-sm-2 col-form-label">Categories Name</label>
              <div class="col-sm-4">
             
              <select class="form-select">
              <option selected>Choose...</option>
              <?php
              if ($listed) {  
    foreach ($listed as $purchase) {
        ?>       
                <option><?php echo ($purchase['category']); ?></option>
                <?php
  
              }
              }
              ?>
              </select>
     
            </div>
            </div>
        </div>
         
        <div class="row mb-3">
            <label for="description" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-4"><br>
              <textarea name="description" id="description" class="form-control noround border-dark"></textarea>
            </div>
            <label for="cover" class="col-sm-2 col-form-label">product Picture</label>
            <div class="col-sm-4">
              <input type="file" name="image" class="form-control noround border-dark" id="image">
            </div>
            <div class="row mb-3">
            <div class="col-sm-2">
             <label for="price">Price</label>
            </div>
             <div class="col-sm-4"><br>
                <input type="number" name="price" id="price" value="" class="form-control noround border-dark">
             </div>
             
             <label for="stock" class="col-sm-2 col-form-label">Stock Quantity</label>
            <div class="col-sm-4">
              <input type="number" name="stock" class="form-control noround border-dark" id="stock">
            </div>
            
            </div>
            <div class="row mb-3">
            
            <div class="col-sm-12 text-center">
                <button type="submit" name="btninsert" class="btn btn-warning col-4 noround">Insert Product</button>
            </div>
          </div>
       
       
      </form>

 
        </div>
    </div>
    <!-- End profile-->



</div>
</div>
 
<div class="row bg-dark text-white">
  <div class="col-md-12">
    <p class="text-center my-3">&copy;2024 Design_my_space Right Reserved.</p>
  </div>
</div>

  </body>
  </html>