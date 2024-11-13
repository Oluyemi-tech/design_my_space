<?php
  session_start();
    require_once "classes/User.php";
    require_once "classes/payment.php";
    
  $u = new User;

$pay = new Payment;
if(isset($_SESSION['user_id'])){
  $product_data = $u->get_user_id($_SESSION['user_id']);
}
if(isset($_SESSION['user_id'])){
  $product_data = $u->get_product_id($_SESSION['user_id']);

}
  include_once "partials/header.php";
  $orderdeets = $pay->get_orderby_ref($_SESSION['trxref']);
  // echo "<pre>";
  // print_r($_SESSION);
  // echo "</pre>";
?>
 
  <!-- about-->
  <div class="row mt-5">
    <div class="col-md-10 offset-md-1">
      <h3 style="margin-bottom:30px;" class="text-center heading-title">CONFIRM ORDER</h3>
     
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


<div class='alert alert-info'>
    <h5>Please take note of your transaction reference: <?php echo $_SESSION['trxref'];?></h5>
    <p>After Clicking MAKE PAYMENT, you will be sent to a page to page to enter your card details</p>
</div>
<table class="table table-striped table-sm">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Product</th>                
                <th scope="col">Amount</th>
                <th scope="col">Details</th>
                <th scope="col">Total</th>
              </tr>
            </thead>
            <tbody> 
                <?php
                $counter = 1;
                $total = 0;
                foreach($orderdeets as $value){
                    $total = $total + ($value['price'] * $value['qty']);
                  
                 ?>
                 <tr>
                    <td> <?php echo $counter ++;?></td>
                    <td> <?php echo $value['name'];?></td>
                    <td> <?php echo number_format($value['price'],2);?></td>
                    <td> <?php echo $value['qty']; ?></td>
                    <td> <?php echo number_format($value['qty'] * $value['price'],2);?></td>
                    
                </tr>
                 <?php
                  
                }
                
                ?>
                <tr>
                    <td colspand='2'>
                        <a href="emptycart.php" class='btn btn-danger'>Cancel Order</a>
                    </td>
                    <td colspand='2'>
                        <form method="post" action="paystack_step1.php">
                            <button class='btn btn-success'>Make Payment</button>
                        </form>
                    </td>
                    <td><?php echo number_format($total, 2) ?></td>
            </tr>
             
            </tbody>
        </table>
 
</div>
</div>
  <!-- end about-->
   
 
 
 
<div class="row bg-dark text-white">
  <div class="col">
    <p class="text-center my-3"> &copy; 2024 Developed By Me</p>
  </div>
</div>

      <?php
        include_once "partials/footer.php";
      ?>