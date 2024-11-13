<?php
session_start();
require_once("admin_guard.php");
require_once("classes/Admin.php");

$admin = new Admin;

$listed = $admin->get_all_product();

?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="assets/fontawesome/css/all.css">
        <link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
        <title>List Product</title>
    </head>
    <body>

<div class="row">

<?php  require_once "partials/Admin_menu.php"; ?>


<div class="col-md-9 p-3">
    
  


    <!-- For product-->

 <div class="row">
    <div class="col-md-12">
        
        <h5 class="my-3"> Listed Product</h5>
        <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th scope="col">S/N</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th> 
                <th scope="col">Price</th>  
                <th scope="col">stock_quantity</th>             
                <th scope="col">Status</th>
                <th scope="col">Action</th>
                
              </tr>
            </thead>
            <tbody> 
            <?php
if ($listed) {  
    $counter = 1;
    foreach ($listed as $purchase) {
        ?>        
        <tr>
            <td><?php echo $counter++; ?></td>
            <td><?php echo htmlspecialchars($purchase['name']); ?></td>
            <td><?php echo htmlspecialchars($purchase['description']); ?> </td>
            <td> <?php echo htmlspecialchars($purchase['price']); ?> </td>
            <td> <?php echo htmlspecialchars($purchase['stock_quantity']); ?> </td>
            <td>
                <button class="btn <?php echo ($purchase['status'] == 'invalid') ? 'btn-secondary' : 'btn-success'; ?> btn-sm noround">
                    <?php
                    if ($purchase['status'] == 'invalid') {
                        echo "<i class='fa fa-thumbs-down'></i>";
                    } else {
                        echo "<i class='fa fa-thumbs-up'></i>";
                    }
                    ?>
                    <?php echo htmlspecialchars($purchase['status']); ?>
                </button>
            </td>
            <td>
            <a href="manage_product.php?id=<?php echo $purchase['id']; ?>"class="btn btn-warning">
                <i class="fas fa-sync" style="color: green;"></i>Update</a> &nbsp;
               <a href="delete_product.php?id=<?php echo $purchase['id']; ?>"class="btn btn-danger">
                 <i class="fa-solid fa-trash-can"></i>Delete</a></td>
             
        </tr>
    
        <?php
        
    }
  } else {
    echo "<tr><td colspan='5'>No Listed product yet</td></tr>";
}
?>

            </tbody>
        </table>
    </div>
</div>

    <!-- end product -->

     
    
</div>
</div>
 
<div class="row bg-dark text-white">
  <div class="col">
    <p class="text-center my-3">&copy;2024 Design_my_space Right Reserved.</p>
  </div>
</div>

</body>
</html>