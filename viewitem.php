<?php
    session_start();
    if($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['item_id'])){
        $username = "root";
        $password = "";
        $hostname = "localhost"; 
        $dbname = "csdl_web";
        $mysqli = new mysqli("localhost",$username,$password,$dbname);

        
        $sql = "SELECT * FROM item_info LEFT JOIN user_info ON item_info.seller_id = user_info.user_id WHERE item_id = '".$_GET['item_id']."'";
        $item['item_data'] = $mysqli->query($sql)->fetch_assoc();
        // echo "<pre>";
        // var_dump($item['item_data']);
        // echo "</pre>";

        $sql = "SELECT * FROM comment_info 
                LEFT JOIN user_info ON user_info.user_id = comment_info.cmt_user_id 
                WHERE comment_info.item_id = '" . $_GET['item_id']. "' AND is_delete = 0
                ORDER BY cmt_date DESC";
        $cmt_list = $mysqli->query($sql)->fetch_all();
        // echo "<pre>";
        // var_dump($cmt_list);
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
                    <li style='width: 140px;' class='drop'>
                        <span>Danh mục <i style='margin-left: 7px;' class="fa fa-angle-down" aria-hidden="true"></i></span>
                        <ul class='category'>
                            <li><a href="./category.php?item_type=ram">Ram</a></li>
                            <li><a href="./category.php?item_type=ssd">SSD</a></li>
                            <li><a href="./category.php?item_type=hdd">HDD</a></li>
                            <li><a href="./category.php?item_type=gpu">GPU</a></li>
                            <li><a href="./category.php?item_type=cpu">CPU</a></li>
                            <li><a href="./category.php?item_type=mobo">Motherboard</a></li>
                            <li><a href="./category.php?item_type=psu">PSU</a></li>
                        </ul>
                    </li>
                    <li style='width: 120px;' class='drop'>
                        <span>Bán hàng <i style='margin-left: 7px;' class="fa fa-angle-down" aria-hidden="true"></i></span>
                            <ul class='category'>
                                <li><a href="./upload.php">Đăng bán</a></li>
                                <li><a href="./manage.php">Quản lý</a></li>
                            </ul>
                    </li>
                    <li style='width: 140px;'><a href='./tracking.php'>Theo dõi đơn</a></li>
                    <li style='padding: 0 20px;'><a href='contactus.html'>Về chúng tôi</a></li>
                </ul>
                <div id='user'>
                    <?php
                        if(isset($_SESSION['username'])){
                            echo '<i class="fa fa-user fa-lg" aria-hidden="true"></i><span style="cursor: context-menu;">'.$_SESSION['username'].'</span><span>|</span><span><a href="./API/api_signout.php">Đăng xuất</a></span>';
                        } else {
                            echo '<a href="./login.php"><i class="fa fa-user fa-lg" aria-hidden="true"></i><span>Đăng nhập/Đăng ký</span></a>';
                        }
                    ?>
                </div>
            </div>
        </div>
        <div id='ssd' class='ssd'>
            <div id='ssd0'>
                <div id='ssd1'>
                    <div id='ssd3'>
                        <img src="<?php echo $item['item_data']['item_picture'];?>" alt=''>
                        <!-- <div style='margin-top: 10px;'>
                            <span>- Dung lượng: 500GB</span><br>
                            <span>- Kết nối: SATA3</span><br>
                            <span>- Tốc độ đọc (ghi) tối đa: 550MB/s / 520MB/s</span>
                        </div> -->
                    </div>
                    <div id='ssd5'>
                        <div id='ssd7'>
                            <span><?php echo $item['item_data']['item_name'];?></span>
                            <h3><?php echo number_format($item['item_data']['price']);?> VNĐ</h3>
                            <span>Người bán: <?php echo $item['item_data']['username'];?></span><br><br>
                            <?php
                                if(!$item['item_data']['is_delete']){
                            ?>
                                <div id='ssd9'>
                                    <button type="button" class="btn btn-primary" onclick="buy_out()"><b>MUA LUÔN</b></button>
                                    <button type="button" class="btn btn-secondary" onclick="add_to_cart()"><b>THÊM VÀO GIỎ ĐÃ</b></button>
                                </div>
                            <?php
                                } else {
                            ?>
                                <div>
                                    <span class="badge badge-danger">SẢN PHẨM ĐÃ NGỪNG KINH DOANH</span>
                                </div>
                            <?php
                                }
                            ?>
                        </div>
                        <!-- <div id='ssd11'>
                            <ul>
                                <li>Cam kết giao hàng trong vòng 4h khu vực nội thành</li>
                                <li>Miễn đổi trả</li>
                                <li><span><b>Người bán:</b></span> HUY \/\/ | |3 |_|</li>
                            </ul>
                        </div> -->
                    </div>
                </div>
                <div id='ssd2'>
                    <div id='ssd4'>
                        <h4>Mô tả sản phẩm</h4>
                        <p><?php echo $item['item_data']['item_description'];?></p>
                    </div>
                </div>
            </div>
            <div id='ssd10'>
                <div>
                    <h4>Nhận xét sản phẩm</h4>
                    <?php
                    if(!empty($cmt_list)){
                        foreach($cmt_list as $cmt){
                            $sql = "SELECT * FROM order_item_info
                                    LEFT JOIN order_info ON order_item_info.order_id = order_info.order_id
                                    WHERE order_info.status != 'Đang vận chuyển' AND order_info.status != 'Hủy' AND order_item_info.item_id = '" . $cmt[4] . "' AND order_item_info.buyer_id = '" . $cmt[2] . "'";
                            if(empty($mysqli->query($sql)->fetch_all())){
                                $html_string = "
                                <div class='feedback'>
                                    <p style='margin-bottom: 2px; font-size: 1.125rem'>" . $cmt[10] . "</p>
                                    <p style='margin-bottom: 2px; color: #999999; font-size: 0.9rem'>Đã nhận xét vào " . $cmt[5] . "</p>
                                    <p style='margin-bottom: 2px'>" . $cmt[1] . "</p>
                                </div>
                                ";
                            } else {
                                $html_string = "
                                <div class='feedback'>
                                    <p style='margin-bottom: 2px; font-size: 1.125rem'>" . $cmt[10] . "<span style='font-size: 1rem; color: #125aaa'> (Đã mua sản phẩm)</span></p>
                                    <p style='margin-bottom: 2px; color: #999999; font-size: 0.9rem'>Đã nhận xét vào " . $cmt[5] . "</p>
                                    <p style='margin-bottom: 2px'>" . $cmt[1] . "</p>
                                </div>
                                ";
                            }
                            echo $html_string;
                        }
                    } else {
                        echo "<h1>Hiện không có bình luận cho sản phẩm này</h1>";
                    }
                    ?>
                    <!-- <div class='feedback'>
                        <p style='margin-bottom: 2px; font-size: 1.125rem'>Duy An</p>
                        <p style='margin-bottom: 2px; color: #999999; font-size: 0.9rem'>Đã nhận xét vào </p>
                        <p style='margin-bottom: 2px'>Xịn</p>
                    </div>
                    <div class='feedback'>
                        <p style='margin-bottom: 2px; font-size: 1.125rem'>Duy An<span style='font-size: 1rem; color: #125aaa'> (Đã mua sản phẩm)</span></p>
                        <p style='margin-bottom: 2px; color: #999999; font-size: 0.9rem'>Đã nhận xét vào </p>
                        <p style='margin-bottom: 2px'>Xịn</p>
                    </div> -->
                    <?php
                        if(isset($_SESSION['user_id'])){
                            echo "
                            <div class='feedback'>
                                <form method='POST' action='./API/api_create_cmt.php'>
                                    <label for='nx'><b>Nhận xét của bạn về sản phẩm:</b></label><br>
                                    <textarea maxlength='10000' style='width: 100%; height: 100px;' name='cmt_content'></textarea><br>
                                    <input type='hidden' name='item_id' value='".$_GET['item_id']."'>
                                    <input type='submit' value='Đăng'>
                                </form>
                            </div>
                            ";
                        }
                    ?>
                </div>
            </div>
        </div>
        
        <div class='footer'>
            <div id='f1'>
                <p style='font-size: 22px; margin-bottom: 10px;'><b>Công ty TNHH HASH</b></p>
                <p style='font-size: 14px; margin-bottom: 5px;'>Address: Khu đô thị ĐHQG TPHCM, Phường Đông Hòa, TP Dĩ An, Bình Dương</p>
                <p style='font-size: 14px; margin-bottom: 5px;'>Email: noreply@hcmut.edu.vn</p>
            </div>
            <div id='f2'>
                <p style='font-size: 20px;'><b>FOLLOW US</b></p>
                <a href="#"><span class="fa fa-facebook-official fa-2x" style='color: #4267B2;'></span></a>
                <a href="#"><span class="fa fa-twitter fa-2x" style='color: #1DA1F2;'></span></a>
                <a href="#"><span class="fa fa-skype fa-2x" style='color: #00AFF0;'></span></a>
                <a href="#"><span class="fa fa-youtube-play fa-2x" style='color: red;'></span></a>
            </div>
        </div>
        <script>
            $("#bar").click(function(){
                $("#bar").css("display","none")
                $("#close").css("display","block")
                document.getElementById('menu').className = "menu2";
            })
            $("#close").click(function(){
                $("#close").css("display","none")
                $("#bar").css("display","block")
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
                if (window.innerWidth > 767){
                    document.getElementById("menu").className = "menu";
                    $("#bar").css("display","none")
                    $("#close").css("display","none")
                }
                if ($("#bar").css("display") == 'none' && $("#close").css("display") == 'none'){
                    document.getElementById("menu").className = "menu";
                }
            })

            // dropdown menu
            $(".drop").hover(function(){
                $(this).children("ul").css("display","block")
                }, function(){
                $(this).children("ul").css("display","none")
            })  

            var item_detail = <?php echo json_encode($item);?>;
            var user_id = <?php echo isset($_SESSION['user_id'])? $_SESSION['user_id'] : 'false' ?>;
            // console.log(user_id)
            // console.log(item_detail)
            function add_to_cart(){
                // console.log(element)
                if(user_id){
                    $.ajax({
                        type: "POST",
                        url: "./API/api_set_cookie.php",
                        data: {item : item_detail['item_data'], cookie_case : "0"},
                        success: function(response){
                            result = JSON.parse(response)
                            if(result['cookie_set'] == "success"){
                                alert("Thêm vào giỏ hàng thành công")
                            }
                        }
                    })
                } else {
                    window.location = "./login.php"
                }
            }

            function buy_out(){
                if(user_id){
                    $.ajax({
                        type: "POST",
                        url: "./API/api_set_cookie.php",
                        data: {item : item_detail['item_data'], cookie_case : "0"},
                        success: function(response){
                            result = JSON.parse(response)
                            if(result['cookie_set'] == "success"){
                                // alert("Thêm vào giỏ hàng thành công")
                                window.location = "./cart.php"
                            }
                        }
                    })
                } else {
                    window.location = "./login.php"
                }
            }

            //log cookie ra console.log
            window.onload = function(){
                $.ajax({
                    type: "GET",
                    url: "./API/api_set_cookie.php",
                    success: function(response){
                        result = JSON.parse(response)
                        console.log(result['cookie'])
                    }
                })
            }
        </script>
    </body>
</html>
<?php
        $mysqli -> close();
    } else {
        header("Location: trangchu.php");
    }
?>