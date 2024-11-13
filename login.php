<?php
session_start();
 include_once "partials/header.php";

?>
    <div class="row bg-light">
        <div class="col-md-5 p-5 offset-3">
          <h1 class="offset-4 mb-5"> LOGIN FORM </h1>

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
      <div class="text-center offset-3">
        <form action="process/process_login.php" method="post">
        <div class="mb-4">
          <label for="email" class="form-label">Email address</label>
          <input type="email" class="form-control border-dark noround" name="email" id="email" aria-describedby="emailHelp">
          
        </div>
        <div class="mb-4">
          <label for="pass" class="form-label">Password</label>
          <input type="password" class="form-control border-dark noround" id="pass" name="pass">
        </div>
        <div class="col-sm-12 text-center mb-3">
            <button type="submit" name="btnlogin" class="btn btn-warning col-6">Login</button>
        </div>
      </form>
      </div>
    </div>

    <div class="row bg-dark ">
          <div class="col-md-12 text-center">
            <p style="color:white; padding:20px;">&copy 2024 Developed By Me</p>
          </div>
        </div>
    <?php
 include_once "partials/footer.php";

?>