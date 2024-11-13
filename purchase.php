<?php
session_start();
require_once("user_guard.php");
require_once("classes/User.php");
$user = new User;
$product_data = $user->get_user_id($_SESSION['user_id']);
include_once "partials/header.php";

$mypurchase = $user->get_myproduct($_SESSION['user_id']);

?>

<div class="row">

<?php
  require_once "partials/menu.php";
?>


<div class="col-md-9 p-3">
    


 <div class="row">
    <div class="col-md-12">
        
        <h5 class="my-3"> purchase</h5>
        <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th scope="col">S/N</th>
                <th scope="col">Date</th>
                <th scope="col">Name</th>
                <th scope="col">Users</th>               
                <th scope="col">Status</th>
                
              </tr>
            </thead>
            <tbody> 
            <?php
if ($mypurchase) {  
    $counter = 1;
    foreach ($mypurchase as $purchase) {
        ?>        
        <tr>
            <td><?php echo $counter++; ?></td>
            <td><?php echo htmlspecialchars($purchase['order_date']); ?></td>
            <td><?php echo htmlspecialchars($purchase['name']); ?></td>
            <td><?php echo htmlspecialchars($purchase['qty']); ?> <a href="#">Review</a></td>
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
        </tr>
        <?php
        $counter++;
    }
} else {
    echo "<tr><td colspan='5'>No purchase made yet</td></tr>";
}
?>

            </tbody>
        </table>
    </div>
</div> 
</div>
</div>
 
<div class="row bg-dark text-white">
  <div class="col">
    <p class="text-center my-3">&copy;2024 Design_my_space Right Reserved.</p>
  </div>
</div>

<?php
include_once "partials/footer.php";
?>