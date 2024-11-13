<?php
session_start();
require_once("admin_guard.php");
require_once "classes/Admin.php";

?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="assets/fontawesome/css/all.css">
        <link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
        <title>Admin Gallery</title>
    </head>
    <body>

<div class="row">

<?php  require_once "partials/Admin_menu.php"; ?>



<div class="col-md-9 p-3">
    
    
 <div class="row">
    <div class="col-md-12">
        <h5 class="my-3">Photo Gallery <button class="btn btn-dark noround">Add New</button></h5>
    <div class="row">
      
    </div>
</div>
</div>

</div>
</div>
 
 
<div class="row bg-dark text-white">
  <div class="col">
    <p class="text-center my-3"> &copy; 2024 Developed By Me</p>
  </div>
</div>
</body>
</html>