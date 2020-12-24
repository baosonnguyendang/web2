<?php
    session_start();
    
    $username = "root";
    $password = "";
    $hostname = "localhost"; 
    $dbname = "csdl_web";
    $mysqli = new mysqli("localhost",$username,$password,$dbname);

    $result['post_data'] = $_POST;
    $result['sql_status'] = "fail";
    $result['is_correct_pass'] = "fail";
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
        if($_POST['curr_pass'] != "" && $_POST['new_pass'] != "" && $_POST['new_pass_confirm'] != ""){
            $sql = "SELECT * FROM user_info WHERE user_id = '".$_SESSION['user_id']."' AND password = '".$_POST['curr_pass']."'";
            if (!empty($mysqli->query($sql)->fetch_all())) {
                $result['is_correct_pass'] = "success";
                $sql = "UPDATE user_info SET password = '".$_POST['new_pass']."' WHERE user_id = '".$_SESSION['user_id']."'";
                if($mysqli->query($sql)){
                    $result['sql_status'] = "success";
                }
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