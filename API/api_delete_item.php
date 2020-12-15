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
        $sql = "UPDATE item_info
        SET is_delete = 1
        WHERE item_id = '" . $_POST['item_id'] . "'";

        if ($mysqli->query($sql)) {
            $result['sql_status'] = "success";
            $result['sql_log'] = $sql;
        } else {
            $result['sql_status'] = "fail to query";
            $result['sql_log'] = $sql;
        }
    }

    print json_encode($result);
    $mysqli -> close();
?>