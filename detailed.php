<?php
    session_start();
    if(isset($_SESSION['user_id'])){
        $username = "root";
        $password = "";
        $hostname = "localhost"; 
        $dbname = "csdl_web";
        $mysqli = new mysqli("localhost",$username,$password,$dbname);

        $sql = "SELECT * FROM user_info WHERE user_id = '" . $_SESSION['user_id'] . "'";
        $user_data = $mysqli->query($sql)->fetch_assoc();
        // echo "<pre>";
        // var_dump($user_data);
        // echo "</pre>";

        $sql = "SELECT * FROM order_item_info 
                LEFT JOIN item_info ON order_item_info.item_id = item_info.item_id
                WHERE order_item_info.order_id = " . $_GET['order_id'];
        $order_item_list = $mysqli->query($sql)->fetch_all();
        // echo "<pre>";
        // var_dump($order_item_list);
        // echo "</pre>";
        
        $sql = "SELECT * FROM order_info WHERE order_info.order_id = " . $_GET['order_id'];
        $order_data = $mysqli->query($sql)->fetch_row();
        // echo "<pre>";
        // var_dump($order_data);
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
        <div class="container-fluid" style="margin: 0; padding: 0">
            <div class="row" style="padding-left:15px;">
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
                        <li style='width: 140px;'><a href=''>Về chúng tôi</a></li>
                    </ul>
                    <div id='user'>
                        <?php
                            if(isset($_SESSION['username'])){
                                echo '<i class="fa fa-user fa-lg" aria-hidden="true"></i><a href="./user.php"><span style="cursor: pointer;">'.$_SESSION['username'].'</span></a><span>|</span><span><a href="./API/api_signout.php">Đăng xuất</a></span>';
                            } else {
                                echo '<a href="./login.php"><i class="fa fa-user fa-lg" aria-hidden="true"></i><span>Đăng nhập/Đăng ký</span></a>';
                            }
                        ?>
                    </div>
                </div>
            </div>

            <div class="row">
                <div id='detailed'>
                    <h4>Chi tiết đơn hàng</h4>
                    <div>
                        <div id='more-detailed'>
                            <div id='status'>
                                <!-- <div>
                                    <i class="fa fa-check fa-2x" aria-hidden="true"></i>
                                </div>
                                <span style='margin-left: 10px;'><b>Đơn đã được giao</b></span> -->
                                <!-- <div>
                                    <i class="fa fa-truck fa-2x" aria-hidden="true"></i>
                                </div>
                                <span style='margin-left: 10px;'><b>Đơn đang được vận chuyển</b></span> -->
                                <!-- <div>
                                    <i class="fa fa-times fa-2x" aria-hidden="true"></i>
                                </div>
                                <span style='margin-left: 10px;'><b>Đơn đã bị hủy</b></span> -->
                                <!-- <div>
                                    <i class="fa fa-usd fa-2x" aria-hidden="true"></i>
                                </div>
                                <span style='margin-left: 10px;'><b>Đơn đã được hoàn tiền</b></span> -->
                                <?php 
                                    switch($order_data[3]){
                                        case "Thành công":
                                            echo '
                                            <div>
                                                <i class="fa fa-check fa-2x" aria-hidden="true"></i>
                                            </div>
                                            <span style="margin-left: 10px;"><b>Đơn đã được giao</b></span>
                                            ';
                                            break;
                                        case "Hoàn tiền":
                                            echo '
                                            <div>
                                                <i class="fa fa-usd fa-2x" aria-hidden="true"></i>
                                            </div>
                                            <span style="margin-left: 10px;"><b>Đơn đã được hoàn tiền</b></span>
                                            ';
                                            break;
                                        case "Hủy":
                                            echo '
                                            <div>
                                                <i class="fa fa-times fa-2x" aria-hidden="true"></i>
                                            </div>
                                            <span style="margin-left: 10px;"><b>Đơn đã bị hủy</b></span>
                                            ';
                                            break;
                                        case "Đang vận chuyển":
                                            echo '
                                            <div>
                                                <i class="fa fa-truck fa-2x" aria-hidden="true"></i>
                                            </div>
                                            <span style="margin-left: 10px;"><b>Đơn đang được vận chuyển</b></span>
                                            ';
                                            break;
                                        default:
                                            echo '
                                            <div>
                                                <i class="fa fa-truck fa-2x" aria-hidden="true"></i>
                                            </div>
                                            <span style="margin-left: 10px;"><b>Đơn đang được lấy hàng</b></span>
                                            ';
                                            break;
                                    }
                                ?>
                            </div>
                            <div id='status2'>
                                <h4>Thông tin người nhận</h4>
                                <p><?php echo $user_data['name'] ?></p>
                                <p><span>Địa chỉ: </span><span><?php echo $user_data['address'] ?></span></p>
                                <p><span>Email: </span><span><?php echo $user_data['email'] ?></span></p>
                                <p><span>SĐT: </span><span><?php echo $user_data['phone'] ?></span></p>
                            </div>
                            <div id='status3'>
                                <h4>Sản phẩm</h4>

                                <div id='tracking-table'>
                                    <table>
                                        <thead>
                                            <tr>
                                                <th style='width: 15vw'>STT</th>
                                                <!-- <th style='width: 30vw; text-align: left'>Tên sản phẩm</th> -->
                                                <th style='width: 15vw'>Hình ảnh</th>
                                                <th style='width: 15vw; text-align: left'>Tên</th>
                                                <th style='width: 20vw'>Số lượng</th>
                                                <th style='width: 20vw'>Thành tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- <tr style='font-size: 20px;'>
                                                <td style='width: 15vw' rowspan="3">
                                                    1
                                                </td>
                                                    <td style='width: 15vw; padding: 10px 0'> <img src='./images/sp1.jpg' style='height: 5vw'></td>
                                                    <td style='width: 15vw; text-align: left'><a href=''>ssss</a></td>
                                                    <td style='width: 20vw'>1</td>
                                                    <td style='width: 20vw'>100000đ</td>
                                                <tr>
                                                    <td style='width: 15vw; padding: 10px 0'> <img src='./images/sp1.jpg' style='height: 5vw'></td>
                                                    <td style='width: 15vw; text-align: left'><a href=''>ssss</a></td>
                                                    <td style='width: 20vw'>1</td>
                                                    <td style='width: 20vw'>100000đ</td>
                                                </tr>
                                                <tr>
                                                    <td style='width: 15vw; padding: 10px 0'> <img src='./images/sp1.jpg' style='height: 5vw'></td>
                                                    <td style='width: 15vw; text-align: left'><a href=''>ssss</a></td>
                                                    <td style='width: 20vw'>1</td>
                                                    <td style='width: 20vw'>100000đ</td>
                                                </tr>
                                            </tr> -->
                                            <?php
                                                $stt = 1;
                                                foreach($order_item_list as $item){
                                                    $html_string = "
                                                        <tr style=''>
                                                            <td style='width: 15vw; font-size: 20px;'>
                                                                $stt
                                                            </td>
                                                            <td style='width: 15vw; padding: 10px 0'><img src='" . $item[7] . "' style='height: 5vw'></td>
                                                            <td style='width: 15vw; text-align: left;'><a href='./viewitem.php?item_id=" . $item[5] . "'>" . $item[6] . "</a></td>
                                                            <td style='width: 20vw; font-size: 20px;'>" . $item[3] . "</td>
                                                            <td style='width: 20vw; font-size: 20px;'>" . number_format($item[4]) . "đ</td>
                                                        </tr>
                                                    ";
                                                    echo $html_string;
                                                    $stt++;
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>

                                <table style="display: flex; justify-content: center; font-size: 0.875rem; font-size: 20px;">
                                    <tr>
                                        <td style='width: 25vw; padding-right: 10px'>Tiền hàng (đã trừ khuyến mãi):</td>    
                                        <td style='text-align: right'><?php echo number_format($order_data[1] - 20000);?>đ</td>                 
                                    </tr>
                                    <tr>
                                        <td style='width: 25vw; padding-right: 10px'>Phí vận chuyển:</td>
                                        <td style='text-align: right'>20,000đ</td>    
                                    </tr>
                                    <tr style='border-top: 1px solid #7e7a7a;'>
                                        <td style='width: 25vw; padding-right: 10px'>Tổng tiền:</td>
                                        <td style='text-align: right; color: red;'><?php echo number_format($order_data[1]);?>đ</td>
                                    </tr>
                                </table>
                            </div>
                            <div id='exchange'>
                                <?php 
                                    switch($order_data[3]){
                                        case "Thành công":
                                            if(is_null($order_data[5])){
                                                echo '<button type="button" class="btn btn-warning" onclick="confirm_recieved(4)">Hoàn tiền</button>';
                                            } else {
                                                $date_deliver = new DateTime($order_data[5]);
                                                
                                                $datetime = date('Y-m-d H:i:s');
                                                $date_refund = new DateTime($datetime);

                                                $interval = $date_deliver->diff($date_refund);
                                                if($interval->d <= 7 && $interval->m == 0 && $interval->y == 0){
                                                    echo '<button type="button" class="btn btn-warning" onclick="confirm_recieved(3)">Hoàn tiền</button>';
                                                } else {
                                                    echo '<button type="button" class="btn btn-warning" title="Đã vượt quá 7 ngày kể từ lúc nhận hàng" onclick="confirm_recieved(3)" disabled>Hoàn tiền</button>';
                                                }
                                            }
                                            break;
                                        case "Hoàn tiền":
                                            echo '<button type="button" class="btn btn-warning" onclick="confirm_recieved(3)" title="Đã hoàn tiền" disabled>Hoàn tiền</button>';
                                            break;
                                        case "Hủy":
                                            echo '<button type="button" class="btn btn-danger" onclick="confirm_recieved(2)" title="Đã hủy đơn hàng" disabled>Đã hủy đơn hàng</button>';
                                            break;
                                        case "Đang lấy hàng":
                                            echo '<button type="button" class="btn btn-danger" onclick="confirm_recieved(2)">Hủy đơn hàng</button>';
                                            break;
                                        default:
                                            echo '<button type="button" class="btn btn-success" onclick="confirm_recieved(1)">Xác nhận đã nhận hàng</button>';
                                            echo '<button type="button" class="btn btn-danger" onclick="confirm_recieved(2)">Hủy đơn hàng</button>';
                                            break;
                                    }
                                ?>
                                <!-- <button type="button" class="btn btn-primary" onclick="confirm_recieved(1)">Xác nhận đã nhận hàng</button>
                                <button type="button" class="btn btn-primary" onclick="confirm_recieved(10)">Hoàn tiền</button> -->
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
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

            console.log($('#manage-table tbody'))

            function fill_data(item_id, item_name, item_date){
                html_string = `
                    <tr>
                        <td style='width: 15vw'>` + item_id + `</td>
                        <td style='width: 30vw; text-align: left'><a href="./viewitem.php?item_id=` + item_id + `">` + item_name + `</a></td>
                        <td style='width: 15vw'>` + item_date + `</td>
                        <td style='width: 20vw'><button class='btn btn-danger' onclick='remove_item(this)'>Hủy bán</button></td>
                    </tr>
                `
                $('#manage-table tbody').append(html_string)
            }
            
            function confirm_recieved(status_case){
                order_id = <?php echo $_GET['order_id'] ?>;
                switch(status_case){
                    case 1:
                        confirm_str = "Bạn có chắc muốn xác nhận đơn hàng?";
                        break;
                    case 2:
                        confirm_str = "Bạn có chắc muốn hủy đơn hàng?";
                        break;
                    default:
                        confirm_str = "Bạn có chắc muốn hoàn tiền đơn hàng?";
                        break;
                }
                if(confirm(confirm_str)){
                    $.ajax({
                        type: "POST",
                        url:"./API/api_update_order_status.php",
                        data: {'status_case' : status_case, 'order_id' : order_id},
                        success: function(response){
                            result = JSON.parse(response)
                            console.log(result)
                            location.reload()
                        }
                    })
                }
            }

        </script>
    </body>
</html>
<?php
        $mysqli -> close();
    } else {
        header("Location: login.php");
    }
?>