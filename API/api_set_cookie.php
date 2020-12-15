<?php
    session_start();

    $username = "root";
    $password = "";
    $hostname = "localhost"; 
    $dbname = "csdl_web";
    $mysqli = new mysqli("localhost",$username,$password,$dbname);

    $result['post_data'] = $_POST;
    $result['sql_status'] = "fail";
    $result['cookie_set'] = "fail";
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
        switch($_POST['cookie_case']){
            case 0:
                // $_COOKIE['cart'][user_id][item_id] = item_number
                $item_id = $_POST['item']['item_id'];
                $cart = isset($_COOKIE['cart'])? json_decode(stripslashes($_COOKIE['cart']), true) : [] ; 
                if(!isset($cart[$_SESSION['user_id']])){
                    $cart[$_SESSION['user_id']] = [];
                }
                if(isset($cart[$_SESSION['user_id']][$item_id])){
                    // $cart[$_SESSION['user_id']][$item_id]++;
                } else {
                    $cart[$_SESSION['user_id']][$item_id] = 1;
                }

                setcookie('cart', json_encode($cart), time()+60*60*24*30, '/');
                $result['cookie_set'] = "success";

                break;
            case 1:
                $item_id = $_POST['item_id'];
                $cart = isset($_COOKIE['cart'])? json_decode(stripslashes($_COOKIE['cart']), true) : [] ; 
                if(isset($cart[$_SESSION['user_id']][$item_id])){
                    unset($cart[$_SESSION['user_id']][$item_id]);
                }
                
                setcookie('cart', json_encode($cart), time()+60*60*24*30, '/');
                $result['cookie_set'] = "success";

        }
    }
    $result['cart'] = isset($cart)? $cart : "no cart";
    $result['cookie'] = isset($_COOKIE['cart'])? json_decode(stripslashes($_COOKIE['cart']), true) : "no cookie";
    //pass $result to ajax response
    print json_encode($result);
    $mysqli -> close();
?>