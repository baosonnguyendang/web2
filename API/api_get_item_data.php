<?php
    session_start();

    $username = "root";
    $password = "";
    $hostname = "localhost"; 
    $dbname = "csdl_web";
    $mysqli = new mysqli("localhost",$username,$password,$dbname);

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

    if($_SERVER['REQUEST_METHOD']=="GET"){
        $result['get_data'] = $_GET;
        switch($_GET['get_case']){
            case 0:
                $result['type'] = $_GET['type'];

                $sql = !empty($result['type'])? "SELECT * FROM item_info WHERE type='".$result['type']."' AND is_delete = 0" : "SELECT * FROM item_info AND is_delete = 0 ORDER BY type ASC";
                break;
            case 1:
                $sql = "SELECT * FROM item_info 
                        WHERE item_id ='" . $_GET['item_id'] . "' AND is_delete = 0";
                break;
            case 2:
                $seller_id = $_SESSION['user_id'];
                $sql = "SELECT * FROM item_info 
                        WHERE seller_id = '" . $seller_id . "' AND is_delete = 0";
                break;
        }

        if ($mysqli->query($sql)) {
            $result['sql_status'] = "success";
            $result['sql_log'] = $sql;
            $result['item_data'] = $mysqli->query($sql)->fetch_all();
        } else {
            $result['sql_status'] = "fail";
            $result['sql_log'] = $sql;
            $result['item_data'] = $mysqli->query($sql)->fetch_all();
        }
    }

    print json_encode($result);
    $mysqli -> close();
?>