<?php
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
        if($_POST['username_signup'] != "" && $_POST['password_signup'] != "" && $_POST['email'] != ""){
            $sql = "INSERT INTO user_info(username, password, email, name, address) VALUES('".$_POST['username_signup']."','".$_POST['password_signup']."','".$_POST['email']."','".$_POST['name_signup']."','".$_POST['address_signup']."');";
            if ($mysqli->query($sql)) {
                $result['sql_status'] = "success";
                $result['sql_log'] = $sql;
            } else {
                $result['sql_log'] = $sql;
            }
        }
    }
    // echo "<pre>";
    // var_dump($_POST);
    // echo "</pre>";

    //pass $result to ajax response
    print json_encode($result);
    $mysqli -> close();
?>