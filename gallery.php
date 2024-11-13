<?php
session_start();
require_once "classes/User.php";
 include_once "partials/header.php";

?>


<div class="row main p-5">
              <div class="col-md-12 text-center ">
                <h1 class="header">Gallery</h1>
              </div>
             </div>
             <!-- end of 4th row -->
             <div class="row main ">
              <div class="col-md-3 p-5">
                  <div class="card" style="width: 18rem;">
                    <img src="assets/images/building.jpg" class="card-img-top" alt="an image of building ">
                    <div class="card-body">
                      <h5 class="card-title">The Modern House</h5>
                      <p class="card-text">Living</p>
                    </div>
                </div>
               </div>

               <div class="col-md-3 main  p-5">
                <div class="card" style="width: 18rem;">
                  <img src="assets/images/decor.jpg" class="card-img-top" alt="an image of decor">
                  <div class="card-body">
                    <h5 class="card-title">Decor Products</h5>
                    <p class="card-text">Decor</p>
                  </div>
              </div>
             </div>

             <div class="col-md-3 main p-5">
              <div class="card" style="width: 18rem;">
                <img src="assets/images/interior-design.jpg" class="card-img-top" alt="image of an interior design">
                <div class="card-body">
                  <h5 class="card-title">Exterior Design</h5>
                  <p class="card-text">building</p>
                </div>
            </div>
           </div>

           <div class="col-md-3 main p-5 ">
          <div class="card" style="width: 18rem;">
            <img src="assets/images/kitchen.jpg" class="card-img-top" alt="picture of a Modern kitchen">
            <div class="card-body">
              <h5 class="card-title">Modern Parapan Kitchen</h5>
              <p class="card-text">Kitchen</p>
            </div>
        </div>
       </div>
      </div>
      <!-- end of 5th row -->
      <div class="row main ">
        <div class="col-md-3 p-5">
            <div class="card" style="width: 18rem;">
              <img src="assets/images/office.jpg" class="card-img-top" alt="an image of a Modern office">
              <div class="card-body">
                <h5 class="card-title">The Modern Office</h5>
                <p class="card-text">office</p>
              </div>
          </div>
         </div>

         <div class="col-md-3 main  p-5">
          <div class="card" style="width: 18rem;">
            <img src="assets/images/decor.jpg" class="card-img-top" alt="image of decor">
            <div class="card-body">
              <h5 class="card-title">Decor Products</h5>
              <p class="card-text">Decor</p>
            </div>
        </div>
       </div>

       <div class="col-md-3 main p-5">
        <div class="card" style="width: 18rem;">
          <img src="assets/images/interior-design.jpg" class="card-img-top" alt="image of an interior design">
          <div class="card-body">
            <h5 class="card-title">Exterior Design</h5>
            <p class="card-text">building</p>
          </div>
      </div>
     </div>

     <div class="col-md-3 main p-5 ">
    <div class="card" style="width: 18rem;">
      <img src="assets/images/modern-minimalist-bathroom.jpg" class="card-img-top" alt="picture of a Modern modern-minimalist-bathroom">
      <div class="card-body">
        <h5 class="card-title">Contemporary Bathroom</h5>
        <p class="card-text">bathroom</p>
      </div>
      </div>
        </div>
      </div>

      <div class="row bg-dark">
                <div class="col-md-3 p-3 ">
                  <h6 style="color: white; text-align: center;">Open Hours</h6>
                  <p style="color: white; text-align: center;" >Monday-Friday 9am-6pm</p>
                  <p style="color: white; text-align: center;">Saturday 10am-6pm</p>
                  <p style="color: white; text-align: center;">Sunday Closing Day</p>
                </div>
                <div class="col-md-3 p-3 ">
                  <h6 style="color: white; text-align: center;">Categories</h6>
                  <p style="color: white; text-align: center;" >Building</p>
                  <p style="color: white; text-align: center;">Decor</p>
                  <p style="color: white; text-align: center;">Furniture</p>
                  <p style="color: white; text-align: center;">Design</p>
                </div>
                <div class="col-md-3 p-3">
                <h6 style="color: white; text-align: center;">Contacts</h6>
                <p style="color: white; text-align: center;">No. 23, Star Lake Close,gariki,Abuja, Nigeria.</p>
                <p style="color: white; text-align: center;">+234 8065473580 +234 8143958230</p>
                <p style="color: white; text-align: center;">Email: Designmyspace@gmail.com</p>
                </div>
                <div class="col-md-3 p-3">
                <h6 style="color: white; text-align: center;">Company</h6>
                <a href="index.php" style="color: white; padding:130px;">Home</a><br>
                 <a href="service.php" style="color: white; padding:130px;">Service</a><br>
                <a  href="gallery.php" style="color: white; padding:130px;">Gallery</a><br>
                 <a href="about.php" style="color: white; padding:130px;">About</a>
                 </div>
              </div>
        
              <div class="row bg-light my-2">
                <div class="col-md-12 text-center">
                  <p style="color: black;">&copy;2024 Design_my_space Right Reserved.</p>
                </div>
              </div>

      
        <?php
        include_once "partials/footer.php";
      ?>