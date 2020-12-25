<?php
    session_start();

    $username = "root";
    $password = "";
    $hostname = "localhost"; 
    $dbname = "csdl_web";
    $mysqli = new mysqli("localhost",$username,$password,$dbname);
    $result['sql_status'] = "fail";

    // $result['sql_status'] = "fail";
    // Check connection
    if ($mysqli->connect_error) {
        $result['db_status']="fail";
        $result['db_log']= "Failed to connect to MySQL: " . $mysqli->connect_error;
        exit();
    } else {
        $result['db_status'] = "success";
        $result['db_log'] = "Connected to MySQL";
    }

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $sql = "UPDATE order_info 
        LEFT JOIN order_item_info ON order_item_info.order_id = order_info.order_id
        SET order_info.status = 'Hủy'
        WHERE order_info.status = 'Đang vận chuyển' AND order_item_info.item_id = ". $_POST['item_id'];
        
        if ($mysqli->query($sql)) {
            $result['sql_status_1'] = "success";
            $result['sql_log_1'] = $sql;
        } else {
            $result['sql_status_1'] = "fail to query";
            $result['sql_log_1'] = $sql;
        }


        $sql = "UPDATE item_info
        SET is_delete = 1
        WHERE item_id = '" . $_POST['item_id'] . "'";

        if ($mysqli->query($sql)) {
            $result['sql_status'] = "success";
            $result['sql_log'] = $sql;

            //delete item from cookies
            $item_id = $_POST['item_id'];
            $cart = isset($_COOKIE['cart'])? json_decode(stripslashes($_COOKIE['cart']), true) : [] ; 
            foreach($cart as &$user_cart){
                if(isset($user_cart[$item_id])){
                    unset($user_cart[$item_id]);
                }
            }            
            setcookie('cart', json_encode($cart), time()+60*60*24*30, '/');
        } else {
            $result['sql_status'] = "fail to query";
            $result['sql_log'] = $sql;
        }
    }

    print json_encode($result);
    $mysqli -> close();
?>