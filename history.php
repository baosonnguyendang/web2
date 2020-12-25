<?php
    session_start();
    if(isset($_SESSION['user_id']) && isset($_SESSION['is_admin'])){
        if($_SESSION['is_admin'] == 1){
            header("Location: admin.php");
        }
        $username = "root";
        $password = "";
        $hostname = "localhost"; 
        $dbname = "csdl_web";
        $mysqli = new mysqli("localhost",$username,$password,$dbname);

        $sql = "SELECT DISTINCT order_item_info.order_id FROM order_item_info 
                LEFT JOIN order_info ON order_item_info.order_id = order_info.order_id
                LEFT JOIN item_info ON order_item_info.item_id = item_info.item_id
                WHERE item_info.seller_id =". $_SESSION['user_id'];
        $order_id_list = $mysqli->query($sql)->fetch_all();

        // echo "<pre>";
        // var_dump($order_id_list);
        // echo "</pre>";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HASH</title>
        <link rel="shortcut icon" type="image/png" href="./images/favicon.png">
        <link rel="stylesheet" type="text/css" href="./style.css?v=<?=time();?>">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </head>
    <body>
        <div>
            <div id='header'>
                <img src='./images/logo.jpg' alt=''>
                <div id='slogan'>
                    <p style='font-family: cursive; font-size: 36px; color:red;'><a href='./trangchu.php'><b>HASH </b></a></p>
                </div>
                <div id='cart'>
                    <div class='cart1'>
                        <a><i class="fa fa-phone fa-lg" aria-hidden="true"></i></a>
                    </div>
                    <span> 0912345678</span>
                    <div class='cart1'>
                        <a><i class="fa fa-shopping-cart fa-lg" aria-hidden="true"></i></a>
                    </div>
                    <a href='./cart.php' style='text-decoration: none; color: black'><span style='cursor: pointer;'><b> Giỏ hàng</b></span></a>
                </div>
                <div id='bar'>
                    <a><i class="fa fa-bars fa-2x" aria-hidden="true"></i></a>
                </div>
                <div id='close'>
                    <a><i class="fa fa-times fa-2x" aria-hidden="true"></i></a>
                </div>
            </div>
            <div id='header2'>
                <ul id='menu' class='menu'>
                    <li style='width: 120px;'><a href='./trangchu.php'>Trang chủ</a></li>
                    <li style='width: 140px;' id='drop1' class='drop'>
                        <span>Danh mục <i style='margin-left: 7px;' class="fa fa-angle-down" aria-hidden="true"></i></span>
                        <ul class='category'>
                            <li><a href="./category.php?item_type=ram">RAM</a></li>
                            <li><a href="./category.php?item_type=ssd">SSD</a></li>
                            <li><a href="./category.php?item_type=hdd">HDD</a></li>
                            <li><a href="./category.php?item_type=gpu">GPU</a></li>
                            <li><a href="./category.php?item_type=cpu">CPU</a></li>
                            <li><a href="./category.php?item_type=mobo">Motherboard</a></li>
                            <li><a href="./category.php?item_type=psu">PSU</a></li>
                        </ul>
                    </li>
                    <li style='width: 120px;' id='drop2' class='drop'>
                        <span>Bán hàng <i style='margin-left: 7px;' class="fa fa-angle-down" aria-hidden="true"></i></span>
                            <ul class='category'>
                                <li><a href="./upload.php">Đăng bán</a></li>
                                <li><a href="./manage.php">Quản lý</a></li>
                            </ul>
                    </li>
                    <li style='width: 140px;'><a href='./tracking.php'>Theo dõi đơn</a></li>
                    <li style='width: 140px;'><a href='https://docs.google.com/spreadsheets/d/1bU182Yl9RNRS2NeX26YB8368lvxHcNjY4g_qDMoia1o/edit#gid=503289772'>Về chúng tôi</a></li>
                </ul>
                <div id='user'>
                    <?php
                        if(isset($_SESSION['username'])){
                            echo '<i class="fa fa-user fa-lg" aria-hidden="true"></i><a href="./user.php"><span style="cursor: pointer;">'.$_SESSION['username'].'</span></a><span><a href="./API/api_signout.php">Đăng xuất</a></span>';
                        } else {
                            echo '<a href="./login.php"><i class="fa fa-user fa-lg" aria-hidden="true"></i><span>Đăng nhập/Đăng ký</span></a>';
                        }
                    ?>
                </div>
            </div>
        </div>

        <div id='history'>
            <div id='history1'>
                <ul><span style='text-transform: uppercase; font-size: 1.5rem; padding-left: 5px;'><b>Quản lý</b></span>
                    <li style='margin-top: 5px;'><a href='./manage.php'><i class="fa fa-tasks" aria-hidden="true"></i><span>Quản lí sản phẩm đang bán</span></a></li>
                    <li style='background-color: #aaa8; '><a href='./history.php'><i class="fa fa-book" aria-hidden="true"></i><span>Lịch sử bán</span></a></li>
                </ul>
            </div>
            <div id='history2'>
                <h4>Lịch sử</h4>
                <div id='history21'>
                    <div id='manage-table'>
                        <table style="width: 100%;">
                            <thead>
                                <tr>
                                    <th style='width: 8%'>Mã đơn</th>
                                    <th style='width: 10%'>Hình SP</th>
                                    <th style='width: 25%; text-align: left'>Tên sản phẩm</th>
                                    <th style='width: 15%'>Người mua</th>
                                    <th style='width: 13%'>Ngày mua</th>
                                    <th style='width: 13%'>Trạng thái</th>
                                    <th style='width: 16%'>Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                foreach($order_id_list as $order_id){
                                    $sql = "SELECT item_info.item_id, item_info.item_picture, item_info.item_name, user_info.name, order_info.create_date, order_info.status, order_info.price FROM order_item_info 
                                            LEFT JOIN order_info ON order_item_info.order_id = order_info.order_id
                                            LEFT JOIN item_info ON order_item_info.item_id = item_info.item_id
                                            LEFT JOIN user_info ON order_info.buyer_id = user_info.user_id
                                            WHERE order_info.order_id = ". $order_id[0];
                                    $data = $mysqli->query($sql)->fetch_all();
                                    $html_string = "
                                        <tr>
                                            <td style='width: 8%' rowspan = '" . count($data) . "'><h6>$order_id[0]</h6></td>
                                    ";
                                    $flag =0;
                                    foreach($data as $item){
                                        if(!$flag){
                                            $html_string .= "
                                                    <td style='width: 10%;'><img style='height: 5vw' src='" . $item[1] . "'></td>
                                                    <td style='width: 25%; text-align: left'><a href='./viewitem.php?item_id='" . $item[0] . ">" . $item[2] . "</a></td>
                                                    <td style='width: 15%;' rowspan = '" . count($data) . "'><h6>$item[3]</h6></td>
                                                    <td style='width: 13%;' rowspan = '" . count($data) . "'><h6>$item[4]</h6></td>
                                            ";
                                            switch($item[5]){
                                                case "Đang vận chuyển":
                                                    $html_string .= "<td style='width: 13%' rowspan = '" . count($data) . "'><h4 style='margin: 0'><span class='badge badge-primary'>$item[5]</span></h4></td>";
                                                    break;
                                                case "Thành công":
                                                    $html_string .= "<td style='width: 13%' rowspan = '" . count($data) . "'><h4 style='margin: 0'><span class='badge badge-success'>$item[5]</span></h4></td>";
                                                    break;
                                                case "Hủy":
                                                    $html_string .= "<td style='width: 13%' rowspan = '" . count($data) . "'><h4 style='margin: 0'><span class='badge badge-danger'>$item[5]</span></h4></td>";
                                                    break;
                                                case "Hoàn tiền":
                                                    $html_string .= "<td style='width: 13%' rowspan = '" . count($data) . "'><h4 style='margin: 0'><span class='badge badge-warning'>$item[5]</span></h4></td>";
                                                    break;
                                            }
                                            $html_string .= "<td style='width: 16%' rowspan = '" . count($data) . "'><h6>".number_format($item[6])."đ</h6></td>";
                                            $html_string .= "</tr>";
                                            $flag++;
                                        } else {
                                            $html_string .= "
                                                <tr>
                                                    <td style='width: 10%;'><img style='height: 5vw' src='" . $item[1] . "'></td>
                                                    <td style='width: 25%; text-align: left'><a href='./viewitem.php?item_id='" . $item[0] . ">" . $item[2] . "</a></td>
                                                </tr>
                                            ";
                                        }
                                    }
                                    echo $html_string;
                                }
                            ?>
                                <!-- <tr>
                                    <td style='width: 12%'>Mã đơn</td>
                                    <td style='width: 12% '><img src="" alt=""></td>
                                    <td style='width: 35%; text-align: left'><a href=""></a></td>
                                    <td style='width: 15%'>Người mua</td>
                                    <td style='width: 13%'>Ngày mua</td>
                                    <td style='width: 13%'>Trạng tdái</td>
                                </tr> -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        <div class='footer' id=''>
            <div id='f1'>
                <p style='font-size: 22px; margin-bottom: 10px;'><b>Công ty TNHH HASH</b></p>
                <p style='font-size: 14px; margin-bottom: 5px;'>Address: Khu đô thị ĐHQG TPHCM, Phường Đông Hòa, TP Dĩ An, Bình Dương</p>
                <p style='font-size: 14px; margin-bottom: 5px;'>Email: noreply@hcmut.edu.vn</p>
            </div>
            <div id='f2'>
                <p style='font-size: 20px;'><b>FOLLOW US</b></p>
                <a href="http://facebook.com/"><span class="fa fa-facebook-official fa-2x" style='color: #4267B2;'></span></a>
                <a href="http://twitter.com/"><span class="fa fa-twitter fa-2x" style='color: #1DA1F2;'></span></a>
                <a href="http://skype.com/"><span class="fa fa-skype fa-2x" style='color: #00AFF0;'></span></a>
                <a href="http://youtube.com/"><span class="fa fa-youtube-play fa-2x" style='color: red;'></span></a>
            </div>
        </div>
        <script>
            $("#bar").click(function(){
                $("#bar").css("display","none")
                $("#close").css("display","block")
                $("body").css("overflow","hidden")
                document.getElementById('menu').className = "menu2";
            })
            $("#close").click(function(){
                $("#close").css("display","none")
                $("#bar").css("display","block")
                $("body").css("overflow","")
                document.getElementById("menu").className = "menu";
            })
            $(window).resize(function(){
                if ($("#menu").css("display") == 'block') {
                    $("#bar").css("display","none")
                }
                if ($("#menu").css("display") == 'none') {
                    $("#bar").css("display","block")
                }
                if ($("#menu").css("display") == 'inline'){
                    $("#close").css("display","none")
                    $("#bar").css("display","none")
                }
                if (window.innerWidth > 720){
                    document.getElementById("menu").className = "menu";
                    $("#bar").css("display","none")
                    $("#close").css("display","none")
                    document.getElementById('drop1').className = "drop";
                    document.getElementById('drop2').className = "drop";
                    $(".drop").hover(function(){
                        $(this).children("ul").css("display","block")
                        }, function(){
                        $(this).children("ul").css("display","none")
                    })  
                }
                else {
                    document.getElementById('drop1').className = "drop2";
                    document.getElementById('drop2').className = "drop2";
                    console.log('a')
                }
                if ($("#bar").css("display") == 'none' && $("#close").css("display") == 'none'){
                    document.getElementById("menu").className = "menu";
                }
            })

            // dropdown menu
            if (window.innerWidth < 720){
                document.getElementById('drop1').className = "drop2";
                document.getElementById('drop2').className = "drop2";
            }

            $(".drop").hover(function(){
                $(this).children("ul").css("display","block")
                }, function(){
                $(this).children("ul").css("display","none")
            })  

            // console.log($('#manage-table tbody'))

            

        </script>
    </body>
</html>
<?php
    } else {
        header("Location: login.php");
    }
?>