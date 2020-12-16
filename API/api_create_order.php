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

    $buyer_id = $_SESSION['user_id'];
    $item_list = json_decode(stripslashes($_COOKIE['cart']), true);
    $datetime = date('Y-m-d H:i:s');
    
    $sql = "INSERT INTO order_info( price, create_date, status, buyer_id) 
            VALUES (" . $_POST['price'] . ",'" . $datetime . "','Đang vận chuyển'," . $buyer_id . ")";
    if($mysqli->query($sql)){
        $sql = "SELECT * FROM order_info ORDER BY order_id DESC LIMIT 1";
        $order_id = $mysqli->query($sql)->fetch_row()[0];
        $result['order_id'] = $order_id;

        foreach($item_list[$buyer_id] as $item_id=>$quantity){
            $sql = "SELECT * FROM item_info WHERE item_id = ". $item_id;
            $item = $mysqli->query($sql)->fetch_row();
            $price = (int)$item[7] * (int)$quantity;

            $sql = "INSERT INTO order_item_info(order_id, item_id, buyer_id, quantity, price) 
                    VALUES (" . $order_id . "," . $item_id . "," . $buyer_id . "," . $quantity . "," . $price . ")";
            $mysqli->query($sql);
        }

        //unset cookie
        $item_list[$buyer_id] = [];
        setcookie('cart', json_encode($item_list), time()+60*60*24*30, '/');
        $result['cookie_set'] = "success";
        $result['sql_status'] = "success";
    } else {
        $result['sql_log'] = $sql;
    }

    
    $result['item_list'] =  $item_list[$buyer_id];
    print json_encode($result);
    $mysqli -> close();
?>