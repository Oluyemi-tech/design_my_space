<?php
  session_start();
    require_once "classes/User.php";
  $u = new User;


if(isset($_SESSION['user_id'])){
  $user_data = $u->get_user_id($_SESSION['user_id']);
}

if(isset($_SESSION['user_id'])){
  $product_data = $u->get_product_id($_SESSION['user_id']);

}

  include_once "partials/header.php";
?>
 
  <!-- about-->
  <div class="row mt-5">
    <div class="col-md-10 offset-md-1">
      <h3 style="margin-bottom:30px;" class="text-center heading-title">MY CART</h3>
     
  </div>
</div>
<div class="row py-2">

<div class="col-md-8 offset-md-2">
<?php 
  if(isset($_SESSION['errormsg'])){
    echo "<div class='alert alert-danger'>". $_SESSION['errormsg']. "</div>";
    unset($_SESSION['errormsg']);

  };
 
  if(isset($_SESSION['good_msg'])){
    echo "<div class='alert alert-success'>". $_SESSION['good_msg']. "</div>";
    unset($_SESSION['good_msg']);

  };

?>



<table class="table table-striped table-sm">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>                
                <th scope="col">Amount</th>
                <th scope="col">Details</th>
                <th scope="col">Total</th>
              </tr>
            </thead>
            <tbody>           
             <?php
             if(isset($_SESSION['cartitems'])){
              
                $counter = 1; $grand_total = 0;
                foreach($_SESSION['cartitems'] as $id=>$qty){
                  
                    $cendeets = $u->get_product_id($id);

                    $grand_total = $grand_total + ($qty * $cendeets['price']);
                ?>

              <tr>
                <td><?php echo $counter++;  ?></td>
                <td><?php echo $cendeets['name']; ?></td>
                <td><?php echo $cendeets['price']; ?></td>
                <td><?php echo $qty; ?></td>
                <td>&#8358;<?php echo number_format($qty * $cendeets['price'],2); ?></td>
              </tr>
              <?php
                }
               echo "<tr>
                <td colspan='3' align='center'>Grand Total</td>
                <td colspan='3' align='center'><b>&#8358;" .number_format($grand_total,2).";</td>
              </tr>";
}
              ?>
              
             <tr>
                <td colspan='4' align='center'>
                <a href="emptycart.php" class="btn btn-danger" class='fa fa-trash'>Empty Cart</a> &nbsp;&nbsp;&nbsp;
                <a href="index.php" class="btn btn-success">Continue Shopping</a>  &nbsp;&nbsp;&nbsp;
                <a href="checkout.php" class="btn btn-warning">Check out</a>
                </td>
            </tr>
            </tbody>
        </table>
 
</div>
</div>
  <!-- end about-->
   
 
 
 
<div class="row bg-dark text-white mb-5">
  <div class="col">
    <p class="text-center my-3"> &copy; 2024 Developed By Me</p>
  </div>
</div>

      <?php
        include_once "partials/footer.php";
      ?>