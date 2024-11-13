<?php
require_once "Db.php";

class Admin extends Db{

    private $dbconn;

    public function __construct(){
        $this->dbconn = $this->connect();
    }

    public function insert_cat($category,$id){
        $sql ="INSERT INTO categories(category,id) VALUES(?,?)";
        $stmt = $this->dbconn->prepare($sql);
        $result= $stmt->execute([$category,$id]);
         return $result;
      }

      public function get_cat(){
        $sql = "SELECT * FROM categories";
        $stmt= $this->dbconn->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;

    }

    public function get_cat_id($id) {
        $query = "SELECT * FROM categories WHERE id= ?";
        $stmt = $this->dbconn->prepare($query);
        $stmt->execute([$id]);
        
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($data) {
            return $data;
        } else {
            return false;
        }
    }

    public function delete_cat($id){
        $sql = "DELETE FROM categories WHERE id=?";
        $stmt = $this->dbconn->prepare($sql);
        $result = $stmt->execute([$id]);
        return $result;
     }

    public function product($product,$description,$image,$price,$stock){
        if($image['name'] != ''){
           
            $temp = $image['tmp_name'];
            $error = $image['error'];
            $size = $image['size'];
            $allowed = ["png", 'jpg', 'jpeg'];
            $name = $image['name'];

            $to = "../uploads/$name";
            $extension = explode('.',$name);
       
            if(!in_array(end($extension),$allowed)){
                $_SESSION['errormsg'] = "Please upload either of png, jpg, jpeg";
                return 0;
            }else{
                move_uploaded_file($temp,$to);
                $sql ="INSERT INTO products(name,description,Image,price,stock_quantity) VALUES(?,?,?,?,?)";
                $stmt = $this->dbconn->prepare($sql);
                $stmt->execute([$product,$description,$name,$price,$stock]);
                $_SESSION['good_msg']  ='Product uploaded successfully';
                              return 1;
                    
            }
        }else{$sql ="INSERT INTO products(name,description,Image,price,stock_quantity) VALUES(?,?,?,?,?)";
        $stmt = $this->dbconn->prepare($sql);
        $stmt->execute([$product,$description,$name,$price,$stock]);
        $id = $this->dbconn->lastInsertId();
        return $id;
        }
    }

    public function get_all_product(){
        $sql = "SELECT * FROM products ";
        $stmt= $this->dbconn->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;

    }

    public function get_product_id($id) {
        $query = "SELECT * FROM products WHERE id= ?";
        $stmt = $this->dbconn->prepare($query);
        $stmt->execute([$id]);
        
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($data) {
            return $data; // Return product data as an associative array
        } else {
            return false; // Return false if no product found
        }
    }
    

    public function get_active_product(){
        $sql = "SELECT * FROM products WHERE available=? AND price >?";
        $stmt= $this->dbconn->prepare($sql);
        $stmt->execute(["active", 0]);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;

    }

    public function get_myproduct($user_id){
        $sql = "SELECT * FROM orders JOIN order_details ON orders.id = order_details.order_id JOIN products ON order_details.product_id =products.id WHERE orders.status =? AND orders.user_id=?";
        $stmt = $this->dbconn->prepare($sql);
        $stmt->execute(['paid',$user_id]);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function login($username, $password){
        $sql = "SELECT * FROM admin WHERE Admin_username = ? LIMIT 1";
        $stmt = $this->dbconn->prepare($sql);
        $stmt->execute([$username]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $pass = $result['Admin_password'];
        if($pass!=$password){
            $_SESSION['errormsg'] = "Invalid password";

        }else{
            return $result['Admin_id'];
        }

    }
    public function signout(){
        unset($_SESSION['Admin_id']);
        session_unset();
        session_destroy();
   }
   public function update_product($product,$description,$image, $availability, $price,$product_id){
    // check if file was passed, then upload and save the picture in a variable
    // update the record of the resort center with the details
    // return true or false
    if($image['name'] != ''){
        // check the file type before allowing uploading..
        $temp = $image['tmp_name'];
        $type = $image['type'];
        $size = $image['size'];
        $allowed = ["png", 'jpg', 'jpeg'];
        $name = $image['name'];
        // $newname = rand().time() . ".$extention";

        $to = "../uploads/$name";
        $extension = explode('.',$name);
        if(!in_array(end($extension),$allowed)){
            $_SESSION['errormsg'] = "Please upload either of png, jpg, jpeg";
            return 0;
        }else{
            move_uploaded_file($temp,$to);
            $sql = "UPDATE products SET name=?, description=?,Image=?,available=?, price=? WHERE id=?";
            $stmt=$this->dbconn->prepare($sql);
            $stmt->execute([$product,$description,$name, $availability, $price,$product_id]);
            $_SESSION["good_msg"] = "File uploaded and records updated";
            return 1;
        }
        

    }else{
        $sql = "UPDATE products SET name=?, description=?,Image=?,available=?, price=? WHERE id=?";
        $stmt=$this->dbconn->prepare($sql);
        $stmt->execute([$product,$description,"", $availability, $price, $_SESSION['id']]);
        $_SESSION["good_msg"] = "Records updated";
        return 1; 
    }

}

public function delete_product($id){
    $sql = "DELETE FROM products WHERE id=?";
    $stmt = $this->dbconn->prepare($sql);
    $result = $stmt->execute([$id]);
    return $result;
 }

}

?>