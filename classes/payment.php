<?php
require_once "Db.php";
 class Payment extends Db
 {
    private $dbconn;

    public function __construct(){
        $this->dbconn = $this->connect();
    }

    public function get_product_amt($productid){
        $amt = 0;
        $sql = "SELECT price FROM products WHERE id=?";
        $stmt = $this->dbconn->prepare($sql);
        $stmt->execute([$productid]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if($data){
        $amt = $data['price'];
        }
        return $amt;
    }

    public function insert_order($orderitems,$userid,$ref){


        //we will first insert into order table because we need to insert the id into order details table

        $query_order = "INSERT INTO orders(user_id,ref) VALUES(?,?)";
        $stmt = $this->dbconn->prepare($query_order);
        $stmt->execute([$userid,$ref]);
        $orderid = $this->dbconn->lastInsertId();

        // with the orderid, we will loop through the orderitems and insert them one by one into order_details table

        $totamt = 0;
        foreach($orderitems as $id=>$qty){// $id is the product id passed from session
            $product_amt = $this->get_product_amt($id);
            $ticket = uniqid("SSA/".date('Y'));
            $query_details = "INSERT INTO order_details(order_id,product_id,qty,price) VALUES(?,?,?,?)";
            $stmt = $this->dbconn->prepare($query_details);
            $stmt->execute([$orderid,$id,$qty,$product_amt]);
            $totamt = $totamt + $product_amt * $qty;
           
        }
        
        //update orders table with total amount
        $query_update = "UPDATE orders SET total_amount=? WHERE id=?";
        $stmt = $this->dbconn->prepare($query_update);
        $stmt->execute([$totamt,$orderid]);
        return $orderid;


    }
    public function get_order($ref){
        $sql = "SELECT * FROM orders JOIN users ON orders.user_id = users.user_id WHERE ref=?";
        $stmt = $this->dbconn->prepare($sql);
        $stmt->execute([$ref]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    public function update_database($amount_paid,$transaction_status,$message_from_paygate, $reference){
        $sql = "UPDATE orders SET amount_debited_kobo=?, status=?, paygate_response=? WHERE ref=?";
        $stmt=$this->dbconn->prepare($sql);
        $stmt->execute([$amount_paid, $transaction_status, $message_from_paygate, $reference]);
        unset($_SESSION['cartitems']);
        return true;

    }
    public function get_orderby_ref($ref){
        $sql = "SELECT * FROM orders JOIN order_details ON orders.id = order_details.order_id JOIN products ON order_details.product_id= products.id WHERE ref=?";
        $stmt = $this->dbconn->prepare($sql);
        $stmt->execute([$ref]);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function paystack_verify($ref){
        $url= "https://api.paystack.co/transaction/verify/$ref";
        $headers = ['Content-Type: application/json','Authorization: Bearer sk_test_a936a06e70399ac60bc467194b32527e32b64e2a'];
        
        // step 1: initializer curl
        $curlobj = curl_init($url);
        //step2 : set curl options using the function curl_setopt()
        curl_setopt($curlobj, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curlobj, CURLOPT_HTTPHEADER,$headers);

        curl_setopt($curlobj, CURLOPT_SSL_VERIFYPEER, false);
        //step 3
        $apiResponse = Curl_exec($curlobj);

        if($apiResponse){
            curl_close($curlobj); // step 4
            return json_decode($apiResponse); // step 5: do anything
        }else{
            $r = curl_error($curlobj);
            //echo $r;
            return false;
        }
        



    }

    public function paystack_initialize($email,$amount,$reference){
        // this is the method we will call to generate paystack payment page for us
        $postRequest = ['email' => $email,'amount'=>$amount*100, "reference"=>$reference, "callback_url"=>"http://localhost/design_my_space/paydirect.php"];// we will create paydirect.php

        $url = "https://api.paystack.co/transaction/initialize";
        $headers = ['Content-Type: application/json','Authorization: Bearer sk_test_a936a06e70399ac60bc467194b32527e32b64e2a'];

        // step 1: initializer curl
        $curlobj = curl_init($url);
        //step2 : set curl options using the function curl_setopt()
        curl_setopt($curlobj, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($curlobj, CURLOPT_POSTFIELDS, json_encode($postRequest));
        //
        curl_setopt($curlobj, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curlobj, CURLOPT_HTTPHEADER,$headers);

        curl_setopt($curlobj, CURLOPT_SSL_VERIFYPEER, false);
        // step 3: execute the curl session using curl_exec()
        $apiResponse = Curl_exec($curlobj);
        if($apiResponse){
            curl_close($curlobj); // step 4
            return json_decode($apiResponse); // step 5: do anything
        }else{
            $r = curl_error($curlobj);
            //echo $r
            return false;
        }

    }
 }



?>