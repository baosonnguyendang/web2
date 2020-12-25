<?php
    session_start();
    
    $username = "root";
    $password = "";
    $hostname = "localhost"; 
    $dbname = "csdl_web";
    $mysqli = new mysqli("localhost",$username,$password,$dbname);

    $result['post_data'] = $_POST;
    $result['sql_status'] = "fail";
    // Check connection
    if ($mysqli->connect_error) {
        $result['db_status']="fail";
        $result['db_log']= "Failed to connect to MySQL: " . $mysqli->connect_error;
        exit();
    } else {
        $result['db_status'] = "success";
        $result['db_log'] = "Connected to MySQL";
    }

    if($_SERVER['REQUEST_METHOD']=="POST"){
        //check if empty
        if($_POST['is_delete'] != ""){
            $is_delete = $_POST['is_delete'] == 1? 0 : 1;
            $sql = "UPDATE user_info SET is_delete = ".$is_delete." WHERE user_id ='".$_POST['user_id']."'";
            if ($mysqli->query($sql)) {
                $result['sql_status'] = "success";
                $result['sql_log'] = $sql;

                //loại tất cả hàng đang dc bán bởi ng bị ban ra khỏi tất cửa user cart
                if($is_delete){
                    $sql = "SELECT item_id FROM item_info WHERE seller_id = '".$_POST['user_id']."'";
                    $item_id_list = $mysqli->query($sql)->fetch_all();
                    $cart = isset($_COOKIE['cart'])? json_decode(stripslashes($_COOKIE['cart']), true) : [] ; 
                    foreach($item_id_list as $item_id){
                        foreach($cart as &$user_cart){
                            if(isset($user_cart[$item_id[0]])){
                                unset($user_cart[$item_id[0]]);
                            }
                        }
                    }
                    setcookie('cart', json_encode($cart), time()+60*60*24*30, '/');
                }
            } else {
                $result['sql_status'] = "fail";
                $result['sql_log'] = $sql;
            }
        }
    }
    // echo "<pre>";
    // var_dump($result['user_data']->user_id);
    // echo "</pre>";

    //pass $result to ajax response
    print json_encode($result);
    $mysqli -> close();
?>