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

    if($_SERVER['REQUEST_METHOD']=="GET"){
        $sql = "SELECT * FROM user_info WHERE is_admin != 1";
        $result['user_data'] = $mysqli->query($sql)->fetch_all(); 
        if($mysqli->query($sql)){
            $result['sql_status'] = "success";
        }
    }
    // echo "<pre>";
    // var_dump($result['user_data']->user_id);
    // echo "</pre>";

    //pass $result to ajax response
    print json_encode($result);
    $mysqli -> close();
?>