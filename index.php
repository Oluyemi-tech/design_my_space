<?php
error_reporting(E_ALL);
session_start(); 
require_once "classes/User.php";

$u = new User;

if(isset($_SESSION['user_id'])){
  $user_data = $u->get_user_id($_SESSION['user_id']);

}

if(isset($_SESSION['user_id'])){
  $product_data = $u->get_product_id($_SESSION['user_id']);

}
$allproduct = $u->active_product();

 include_once "partials/header.php";


?>
        
      
        <div class="row">
           
            <div class="col-md-12">
                <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators ">
                      <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                      <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="1" aria-label="Slide 2"></button>
                      <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="2" aria-label="Slide 3"></button>
                      <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="3" aria-label="Slide 4"></button>
                      <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="4" aria-label="Slide 5"></button>
                    </div>
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="assets/images/livingroom1.jpg" class="d-block w-100  rounded-start-pill " alt="this is a picture of an office">
                        <div class="carousel-caption d-none d-md-block text4 animate__animated animate__backInLeft">
                          <h1><strong>Comfortable. Style. Perfect</strong></h1>
                          <h3>Some representative placeholder content for the first slide.</h3>
                        </div>
                      </div>
                      <div class="carousel-item">
                        <img src="assets/images/bathroom.jpg" class="d-block w-100 rounded-end-circle" alt="picture of a bathroom">
                        <div class="carousel-caption d-none d-md-block text">
                         
                        </div>
                      </div>
                      <div class="carousel-item">
                        <img src="assets/images/interior.jpg" class="d-block w-100 rounded-start-pill" alt="an image of a interior room">
                        <div class="carousel-caption d-none d-md-block text4 animate__animated animate__flip">
                          <h1>Inspired. Creative. Functional</h1>
          
                        </div>
                      </div>
                      <div class="carousel-item">
                        <img src="assets/images/kitchen.jpg" class="d-block w-100 rounded-start-pill" alt="this is an image of interior design">
                        <div class="carousel-caption d-none d-md-block text3">
                        </div>
                      </div>
                      <div class="carousel-item">
                        <img src="assets/images/bedroom.jpg" class="d-block w-100 rounded-end-circle" alt="this is an image modern-minimalist-bathroom">
                        <div class="carousel-caption d-none d-md-block text4">
                        </div>
                      </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>
               
                  </div>
            </div>
            <!-- end of second row -->
             <div class="row pt-5 mb-2">
                <div class="col-md-4 ">
                  <h3> 01.Concept </h3>
                  <p>Furniture is needed for practical reasons, and because it must be there, it may as well be as pleasant as possible to look at, and in a less definable psychological way, comforting to the spirit.</p>
                </div>
                <div class="col-md-4">
                  <h3>02. Design</h3>
                  <p>A designer has a duty to create timeless design. To be timeless you have to think really far into the future, not next year, not in two years but in 20 years minimum.</p>
                </div>
                <div class="col-md-4">
                  <h3>03. Development</h3>
                  <p>For a house to be successful, the objects in it must communicate with one another, respond and balance one another..If you want a golden rule that will fit everything, this is it: Have nothing in your houses that you do not know to be useful or believe to be beautiful.</p>
                </div>
             </div>

             <!-- end of 3rd row -->

             <div class="row main p-5">
              <div class="col-md-12 text-center ">
                <h1 class="header">Gallery</h1>
              </div>
             </div>
             <!-- end of 4th row -->
             <div class="row main">
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
      <div class="row mt-4 py-4 places" style="background-color: #F2F2F2 !important;">
          <div class="col-md-10 offset-md-1">
          <h2 style="margin-bottom:30px;" class="text-center heading-title">Product For Sales</h2> 
            <div class="row">
                <?php
                  foreach($allproduct as $key=>$value){
                    $desc =isset($value['description'])?trim($value['description']):"";
                ?>
               <div class="col-md-4">
                <img src="uploads/<?php echo $value['Image']; ?>"  class="img-fluid" style="width:300px; height: 250px;">
                <div class="my-2">
                  <h6> <a href="product_detail.php?id=<?php echo $value['id'];?>"><?php echo $value['name'];  ?> </a></h6>
                  <p><?php echo substr($desc,0,30). '...' ; ?></p>
                  <div class="d-flex justify-content-between">
                    <p class="text-danger m-1">&#8358;<?php echo $value['price'];   ?></p>
                    <a href="addtocart.php?id=<?php echo $value['id'];?>" class=" btn btn-dark col-4" >Add To Cart</a>
                  </div>  
                </div>
              </div>
              <?php
              }
              ?>
              
            </div>
          </div> 
        </div>
      

      

      <div class="row p-5">
        <div class="col-md-12 text-center">
          <a href="view_more_product.php" class="btn btn-dark">Veiw More Products</a>
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
        
              <div class="row bg-light p-3">
                <div class="col-md-12 text-center">
                  <p style="color: black;">&copy;2024 Design_my_space Right Reserved.</p>
                </div>
              </div>

      
        <?php
        include_once "partials/footer.php";
      ?>