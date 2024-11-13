<?php
  session_start();
 include_once "partials/header.php";


?>
    <div class="row bg-light">
        <div class="col-md-10 p-5 offset-1">
        <h2 class="offset-5">Sign up An Account</h2><br>
        <p class="offset-5 p-2 ">Sign up below to create an account</p>

        <?php 
  if(isset($_SESSION['errormsg'])){
    echo "<div class='alert alert-danger'>". $_SESSION['errormsg']. "</div>";
    unset($_SESSION['errormsg']);

  };
?>
    
        <form action="process/process_signup.php" method="post">
        <div class="row mb-3">
          <label for="fname" class="col-sm-2 col-form-label">Firstname</label>
          <div class="col-sm-4">
            <input type="text" name="fname" class="form-control noround border-dark" id="fname">
          </div>
          <label for="lname" class="col-sm-2 col-form-label">Lastname</label>
          <div class="col-sm-4">
            <input type="text" name="lname" class="form-control noround border-dark" id="lname">
          </div>
        </div>
        <div class="row mb-3">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-4">
              <input type="text" name="email" class="form-control noround border-dark" id="email">
              <span id="email_feedback"></span>
            </div>
            <label for="phone" class="col-sm-2 col-form-label">Phone</label>
            <div class="col-sm-4">
              <input type="text" name="phone" class="form-control noround border-dark" id="phone">
            </div>
          </div>
        <div class="row mb-3">
            <label for="pass1" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-4">
              <input type="password" name="pass1" class="form-control border-dark" id="password">
            </div>
            <label for="pass2" class="col-sm-2 col-form-label">Confirm Password</label>
            <div class="col-sm-4">
              <input type="password" name="pass2" class="form-control border-dark" id="pass2">
            </div>
          </div>
       
     
        <div class="row mb-3">
            
            <div class="col-sm-12 text-center">
                <button type="submit" name="btnsub" id="btnsub" value="1" class="btn btn-primary col-4">Signup</button>
            </div>
          </div>
       
       
      </form>
    </div>
    <div class="row bg-dark ">
          <div class="col-md-12 text-center">
            <p style="color:white; padding:20px;">&copy 2024 Developed By Me</p>
          </div>
        </div>
    <?php
 include_once "partials/footer.php";

?>
