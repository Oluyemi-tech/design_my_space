<?php
session_start();
require_once("user_guard.php");
require_once("classes/User.php");
$user = new User;
$user_data = $user->get_user_id($_SESSION['user_id']);
include_once "partials/header.php";
?>


<div class="row">

<?php
  require_once "partials/menu.php";
?>


<div class="col-md-9 p-3">
     
    <div class="row">
        <div class="col-md-12">
            <h5 class="my-3">Welcome <?php echo $user_data['firstname']; ?></h5>
            <p>You are logged in, please make use of the side menu to carry out tasks on this platform, you can sign out when you are done.</p>
         
        </div>
    </div>

  


 
     
    
</div>
</div>
 
<div class="row bg-dark text-white">
  <div class="col">
    <p class="text-center my-3"> &copy; 2024 Developed By Me</p>
  </div>
</div>

<?php
include_once "partials/footer.php";
?>