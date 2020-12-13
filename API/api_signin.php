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

    //insert data to mysql
    if($_SERVER['REQUEST_METHOD']=="POST"){
        //insert
        if($_POST['username_signin'] != "" && $_POST['password_signin'] != ""){
            $sql = "SELECT * FROM user_info WHERE username='".$_POST['username_signin']."' AND password='".$_POST['password_signin']."';";
            if (!empty($mysqli->query($sql)->fetch_assoc())) {
                $result['sql_status'] = "success";
                $result['sql_log'] = $sql;
                $result['user_data'] = $mysqli->query($sql)->fetch_assoc();
                // print $result['user_data'];
                $_SESSION['username'] = $result['user_data']['username'];
                $_SESSION['user_id'] = $result['user_data']['user_id'];
            } else {
                $result['sql_status'] = "fail";
                $result['sql_log'] = $sql;
                $result['user_data'] = $mysqli->query($sql)->fetch_assoc();
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