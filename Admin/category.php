<?php
session_start();
require_once("admin_guard.php");
require_once("classes/admin.php");

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
        <title>Categories</title>
    </head>
    <body>
<div class="row">

<?php  require_once "partials/Admin_menu.php"; ?>


<div class="col-md-9 p-3">
    
     <!-- Profile-->
    <div class="row">
        <div class="col-md-8 my-3">
            <h5 class="my-3">Categories</h5>

               
            <?php
            if (isset($_SESSION["errormsg"])) {
                echo "<div class='alert alert-danger'>" . $_SESSION['errormsg'] . "</div>";
                unset($_SESSION['errormsg']);
            }
            ?>

            <?php
            if (isset($_SESSION["good_msg"])) {
                echo "<div class='alert alert-success'>" . $_SESSION['good_msg'] . "</div>";
                unset($_SESSION['good_msg']);
            }
            ?>

               
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white text-center">
                        <h4>Add Category</h4>
                    </div>
                    <div class="card-body">
                       <form action="process/process_cat.php" method="post">

                           
                            <div class="form-group mb-3">
                                <label for="category" class="form-label">Category Name</label>
                                <input type="text" name="category" id="category" class="form-control">
                            </div>

                            <input type="hidden" name="id" value="<?php echo['id']; ?>">
                           
                          <div class="d-grid">
                                <button type="submit" class="btn btn-warning col-3 noround offset-4" name="btnadd" >Add Category</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    

     
     <div class="row mt-5">
      <div class="col-md-12 bg-dark text-light  p-1 text-center"><p>&copy;2024 Design_my_space Right Reserved.</p></div>
      </div>
    
      </body>
      </html>