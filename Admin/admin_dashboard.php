<?php
error_reporting(E_ALL);
session_start();
require_once("admin_guard.php");
require_once "classes/Admin.php";

$c = new Admin;
// $product_data = $c->get_product_id($_SESSION["id"]);

?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="assets/fontawesome/css/all.css">
        <link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
        <title>Admin Dashboard</title>
    </head>
    <body>

<div class="container-fluid">
<div class="row">

<?php  require_once "partials/Admin_menu.php"; ?>



<div class="col-md-9 p-3">
    <!-- For the Dashboard-->
     
    <div class="row">
        <div class="col-md-12">
    <h5 class="my-3">Welcome </h5>
        
    <p>You are logged in, plesae make use of the side menu to carry out tasks on this platform, you can sign out when you are done.</p>
           
            <div class="row">
                <div class="col-md-4">
                    <div class="card text-bg-primary mb-3" style="max-width: 18rem;">
                        <div class="card-header text-center">Total Product</div>
                        <div class="card-body">
                          <h5 class="card-title text-center">5</h5>                           
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-bg-warning mb-3" style="max-width: 18rem;">
                        <div class="card-header text-center">Users</div>
                        <div class="card-body">
                          <h5 class="card-title text-center">2</h5>                           
                        </div>
                    </div>
                </div>
            </div>
            </div>
            
        </div>
    </div>
    <!-- End the Dashboard-->
</div>
</div>
  
 
<div class="row bg-dark text-white">
  <div class="col-md">
    <p class="text-center my-3">&copy;2024 Design_my_space Right Reserved.</p>
  </div>
</div>
</div>

</body>
</html>
