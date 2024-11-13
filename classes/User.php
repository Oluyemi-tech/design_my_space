<?php
    require_once "Db.php";

    class User extends Db
    {
        private $dbconn;
        public function __construct(){
            $this->dbconn = $this->connect();
        }

        public function get_myproduct($user_id){
            $sql = "SELECT * FROM orders JOIN order_details ON orders.id = order_details.order_id JOIN products ON order_details.product_id =products.id WHERE orders.status =? AND orders.user_id=?";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute(['paid',$user_id]);
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
        public function active_product(){
            $sql = "SELECT * FROM products WHERE available=?";
            $stmt= $this->dbconn->prepare($sql);
            $stmt->execute(["active"]);
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;

        }

        public function get_product_id($id){
            $query = "SELECT * FROM products WHERE id=?";
            $stmt = $this->dbconn->prepare($query);
            $stmt->execute([$id]);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            return $data;
        }
        // public function get_order($user_id){
        //     $sql = "SELECT * FROM order JOIN orderitem ON order.id = orderitem.order_id JOIN products ON orderitem.id =products.id WHERE order.status =? AND order.user_id=?";
        //     $stmt = $this->dbconn->prepare($sql);
        //     $stmt->execute(['paid',$user_id]);
        //     $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //     return $data;
        // }

        public function get_user_id($id){
            $query = "SELECT * FROM users WHERE user_id=?";
            $stmt = $this->dbconn->prepare($query);
            $stmt->execute([$id]);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            return $data;
        }

        public function check_email($email){
            // write your query
            $query = "SELECT * FROM users WHERE email =?";
            // prepare
            $stmt = $this->dbconn->prepare($query);
            // execute
            $stmt->execute([$email]);
            $result = $stmt->rowCount();
            return $result;
        }

        public function user($fname,$lname,$email,$phone,$pass1){
            // sql
            $sql = "INSERT INTO users(firstname,lastname,email,phone,password) VALUES(?,?,?,?,?)";
            // prepare
            $stmt = $this->dbconn->prepare($sql);
            // execute
            $hashed = password_hash($pass1,PASSWORD_DEFAULT);
            $stmt->execute([$fname,$lname,$email,$phone,$hashed]);
            $id = $this->dbconn->lastInsertId();
            return $id;

        }
         public function login($email,$password){
            //sqql
            try{
                $sql = "SELECT * FROM users WHERE email=?";
                $stmt = $this->dbconn->prepare($sql);
                $stmt->execute([$email]);
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                if($result){
                    $hashed_password = $result['password'];
                    $check = password_verify($password,$hashed_password);
                    if($check){
                        return $result['user_id'];
                    }else{
                        $_SESSION['errormsg'] = "Invalid password";
                        return 0;
                    }
                }else{
                    $_SESSION['errormsg'] = "Invalid email";
                    return 0;
                }  
            }
            catch(PDOException $e){
                $_SESSION['errormsg'] = $e->getMessage();
                return 0;
            }
            catch(Exception $e){
                $_SESSION['errormsg'] = $e->getMessage();
                return 0;
            }
        }
        public function signout(){
             unset($_SESSION['user_id']);
             session_unset();
             session_destroy();
        }


    }

?>