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
        if($_POST['name'] != "" && $_POST['email'] != "" && $_POST['address'] != "" && $_POST['phone'] != ""){
            $sql = "UPDATE user_info SET name = '".$_POST['name']."', email = '".$_POST['email']."', address = '".$_POST['address']."', phone = '".$_POST['phone']."' WHERE user_id ='".$_SESSION['user_id']."'";
            if ($mysqli->query($sql)) {
                $result['sql_status'] = "success";
                $result['sql_log'] = $sql;
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