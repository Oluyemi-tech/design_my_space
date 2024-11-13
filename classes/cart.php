<?php

class Cart{

    public function add($id){
       if(is_array($_SESSION['cartitems'])){
        array_push($_SESSION['cartitems'],$id);
       }else{
        $_SESSION['cartitems']=[];
        array_push($_SESSION['cartitems'],$id);
       }
    }

    public function addbundle($id){
        if(isset($_SESSION['cartitems'])){

            if(array_key_exists($id,$_SESSION['cartitems'])){
                $existing_qty = $_SESSION['cartitems'][$id];
                $_SESSION['cartitems'][$id] =  $existing_qty +1;

            }else{
                $_SESSION['cartitems'][$id] =1;
            }
        }else{
            
            $_SESSION['cartitems'][$id] =1;
        }
    }

    public function empty(){
        if(isset($_SESSION['cartitems'])){
            unset($_SESSION['cartitems']);
        }

    }
}


?>