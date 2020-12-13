<?php
    session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        //move file to folder
        $target_dir = "../images/item/";
        $target_file = $target_dir . basename($_FILES["item_picture"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $num = 1;

        //rename file
        $target_name = $_SESSION['user_id']."_".$_SESSION['username']."_".$_POST['type']."_";
        $target_file = $target_dir.$target_name.$num.".".$imageFileType;

        // Check duplicate
        while(file_exists($target_file)) {
            $num++;
            $target_file = $target_dir.$target_name.$num.".".$imageFileType;
        }


        if (move_uploaded_file($_FILES["item_picture"]["tmp_name"], $target_file)) {
            //insert to mysql
            $username = "root";
            $password = "";
            $hostname = "localhost"; 
            $dbname = "csdl_web";
            $mysqli = new mysqli("localhost",$username,$password,$dbname);
    
            // Check connection
            if ($mysqli->connect_error) {
                echo "Unable to connect to db";
                // sleep(10);
                header("Location: ../upload.php");
                exit();
            }
    
            //prepare variable
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $datetime = date('Y-m-d H:i:s');
            $piture_path = "./images/item/".$target_name.$num.".".$imageFileType;
            $sql = "INSERT INTO item_info(item_name, item_picture, item_description, type, sell_date, stock, price, is_delete, seller_id) VALUES ('"
                    .$_POST['item_name']."', '"
                    .$piture_path."', '"
                    .$_POST['item_description']."', '"
                    .$_POST['type']."', '"
                    .$datetime."', '"
                    .$_POST['stock']."', '"
                    .$_POST['price']."', '"
                    ."0"."', '"
                    .$_SESSION['user_id']."')";
            if($mysqli->query($sql)){
                header("Location: ../upload.php");
            } else {
                // echo "SQL fail to insert";
                // sleep(5);
                header("Location: ../upload.php");
            }
        } else {
            // echo "Sorry, there was an error uploading your file.";
            // sleep(5);
            header("Location: ../upload.php");
            exit();
        }
    }
    // print $sql;
    $mysqli -> close();
?>