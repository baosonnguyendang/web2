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
        $result['type'] = $_GET['type'];

        $sql = !empty($result['type'])? "SELECT * FROM item_info WHERE type='".$result['type']."'" : "SELECT * FROM item_info ORDER BY type ASC";
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