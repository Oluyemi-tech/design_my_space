<?php 
include_once "partials/header.php";
require_once "classes/User.php";
//check if the id is set
if(!isset($_GET["id"])){
    header("location:index.php");
    exit;
}
//check that the id is not empty
//check that it is a number
//fetch the id from query string
$id = $_GET["id"];
//instantiantiate the class
$u = new User;
//call the method
$product_data = $u->get_product_id($id);
//check if the method returns something
?>


    <!-- product details start here -->
        <div class="row justify-content-between  py-5 places" style="background-color: #F2F2F2 !important;">
          <div class='col-md-8 offset-2'>
              <div class='row'>
              <div class="col-md-6">
                <p><b>Description:</b> <?php echo $product_data["description"]; ?> </p>
                <p><b>Ticket Price:</b>  <?php echo $product_data["price"]; ?></p>
                <a href="addtocart?id=<?php echo $product_data['id'];?>" class='btn btn-dark'>Add To Cart</a>
              </div> 
              <div class="col-md-6">
                <p>product Picture</p>
                <img src="uploads/<?php echo $product_data["Image"]; ?>" alt="<?php echo $product_data["name"]; ?>" class="img-fluid"/>
              </div>
              </div>
          </div>
        </div> 

 
<div class="row bg-dark text-white my-5">
  <div class="col-md-12 my-2">
    <p class="text-center"> &copy;2024 Design_my_space Right Reserved.</p>
  </div>
</div>

<?php 
include_once "partials/footer.php";
?>