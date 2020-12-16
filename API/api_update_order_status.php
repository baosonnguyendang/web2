<?php
    session_start();

    $username = "root";
    $password = "";
    $hostname = "localhost"; 
    $dbname = "csdl_web";
    $mysqli = new mysqli("localhost",$username,$password,$dbname);

    // $result['post_data'] = $_POST;
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

    switch($_POST['status_case']){
        case 0:
            $status = "Đang vận chuyển";
            break;
        case 1:
            $status = "Thành công";
            break;
        case 2:
            $status = "Hủy";
            break;
        default:
            $status = "Hoàn tiền";
            break;
    }
    $datetime = date('Y-m-d H:i:s');
    $sql = "UPDATE order_info SET status='" . $status . "', deliver_date = '" . $datetime . "' WHERE order_id = " . $_POST['order_id'];

    if($mysqli->query($sql)){
        $result['sql_status'] = "success";
    }
    
    $result['sql_log'] = $sql;

    print json_encode($result);
    $mysqli -> close();
?>