<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/main.css">
    <link rel="stylesheet" href="assets/fontawesome/css/all.css">
    <link rel="icon" type="images/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    
    <title>DesignMySpace</title>
    
</head>
<body>
    <div class="container-fluid">
       <!--navigation-->
      <div class="row ">
        <div class="col-md-12">
            <nav class="navbar navbar-expand-lg bg-primary">
                <div class="container-fluid">
                  <a class="navbar-brand " href="index.php"><strong>Design My Space</strong></a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                      <li class="nav-item">
                        <a class="nav-link active text-light" aria-current="page" href="index.php">Home</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link text-light" href="service.php">Service</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link text-light" href="gallery.php">Gallery</a>
                      </li>
                  
                      <li class="nav-item">
                        <a class="nav-link text-light" href="about.php">About</a>
                      </li>
                    </ul>
                    <div><a href="signup.php" class="p-3 text-light">Sign Up</a></div>
                    <?php
                    if(!isset($_SESSION['user_id'])){
                      ?>
                    <div> <a href="login.php" class="text-dark">Login</a></div>
                    <?php
                      }
                      ?>

<?php
                if(isset($_SESSION['user_id'])){
                  ?>
                  <div class="dropdown user-menu">
                        <a class="btn dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          <img src="" width="30" style="border-radius: 50%;"> Hi <?php echo isset($user_data['firstname']) ? $user_data['firstname'] : "";?>
                        </a>
                      
                        <ul class="dropdown-menu user-profile" style="border-radius: 0px;background-color: #13357B;">
                          <li><a class="dropdown-item" href="user_dashboard.php">Profile</a></li>
                          <li><a class="dropdown-item" href="">Change Password</a></li>
                          <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                        </ul>
                      </div>

                  <?php
                }
                ?>
                  </div>
                  <div style="width:3%"></div>
                </div>
              </nav>
        </div>
    </div>
    <!--end navigation-->
   