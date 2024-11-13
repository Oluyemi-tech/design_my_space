<?php 
session_start();
include_once "partials/header.php";
?>

    <div class="row bg-light">
        <div class="col-md-6 p-5 offset-3">
          <h1 class="offset-3 mb-5"> ADMIN LOGIN </h1> 
          
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
               
    <form action="process/adlogin_process.php" method="post">    
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control border-dark noround" name="username" id="username" aria-describedby="emailHelp">
          
        </div>
        <div class="mb-3">
          <label for="pass" class="form-label">Password</label>
          <input type="password" class="form-control border-dark noround" id="pass" name="pass">
        </div>
        <div class="col-sm-12 text-center mb-3">
            <button type="submit" name="btnlogin" class="btn btn-success col-6">LOGIN</button>
        </div>
      </form>
    </div>

    <div class="row bg-dark ">
          <div class="col-md-12 text-center">
            <p style="color:white; padding:10px; margin:50px;">&copy 2024 Developed By Me</p>
          </div>
        </div>
        <?php
        include_once "partials/footer.php";
        ?>
