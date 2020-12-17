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

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $datetime = date('Y-m-d H:i:s');
        $sql = "INSERT INTO comment_info(cmt_content, cmt_user_id, is_delete, item_id, cmt_date) 
                VALUES ('" . $_POST['cmt_content'] . "', '" . $_SESSION['user_id'] . "', 0, '" . $_POST['item_id'] . "', '" . $datetime . "')";
        $result['sql_log'] = $sql;
        if($mysqli->query($sql)){
            $result['sql_status'] = 'success';
            header("Location: ../viewitem.php?item_id=".$_POST['item_id']);
        }
    }
    
        // echo "<pre>";
        // var_dump($result['post_data']);
        // var_dump($sql);
        // echo "</pre>";
?>