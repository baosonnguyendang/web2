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
                        <li><a href="#">SSD</a></li>
                        <li><a href="#">RAM</a></li>
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
                <li style='padding: 0 20px;'><a href=''>Về chúng tôi</a></li>
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

    <div id='detailed'>
        <h4>Chi tiết đơn hàng</h4>
        <div>
            <div id='more-detailed'>
                <div id='status'>
                    <!-- <div>
                        <i class="fa fa-check fa-2x" aria-hidden="true"></i>
                    </div>
                    <span style='margin-left: 10px;'><b>Đơn đã được giao</b></span> -->
                    <div>
                        <i class="fa fa-truck fa-2x" aria-hidden="true"></i>
                    </div>
                    <span style='margin-left: 10px;'><b>Đơn đang được vận chuyển</b></span>
                </div>
                <div id='status2'>
                    <h4>Thông tin người nhận</h4>
                    <p><?php echo $user_data['name'] ?></p>
                    <p><span>Địa chỉ: </span><span><?php echo $user_data['address'] ?></span></p>
                    <p><span>Email: </span><span><?php echo $user_data['email'] ?></span></p>
                </div>
                <div id='status3'>
                    <h4>Sản phẩm</h4>
                    <div id='tracking-table'>
                        <table>
                            <thead>
                                <tr>
                                    <th style='width: 15%'>Mã đơn</th>
                                    <th style='width: 15%'>Ngày mua</th>
                                    <th style='width: 15%'>Tổng tiền</th>
                                    <th style='width: 20%'>Trạng thái đơn</th>
                                    <th style='width: 20%'>Xem chi tiết</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <table style="display: flex; justify-content: center; font-size: 0.875rem;">
                        <tr>
                            <td style='width: 25vw; padding-right: 10px'>Tiền hàng (đã trừ khuyến mãi):</td>    
                            <td style='text-align: right'>20.000đ</td>                      
                        </tr>
                        <tr>
                            <td style='width: 25vw; padding-right: 10px'>Phí vận chuyển:</td>
                            <td style='text-align: right'>200.000đ</td>
                        </tr>
                        <tr style='border-top: 1px solid #7e7a7a;'>
                            <td style='width: 25vw; padding-right: 10px'>Tổng tiền:</td>
                            <td style='text-align: right; color: red;'>220.000đ</td>
                        </tr>
                    </table>
                </div>
                <div id='exchange'>
                    <button type="button" class="btn btn-primary">Xác nhận đã nhận hàng</button>
                    <button type="button" class="btn btn-primary">Hoàn tiền</button>
                </div>  
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

        function reformat_date(date_var){
            year = date_var.substring(0,4)
            month = date_var.substring(5,7)
            day = date_var.substring(8,10)
            return day + "/" + month + "/" + year
        }

        function load_data(){
            $.ajax({
                type: "GET",
                url: "./API/api_get_item_data.php",
                async: false,
                data:{'get_case' : 2},
                success: function(response){
                    result = JSON.parse(response)
                    // console.log(result)
                    item_list = result['item_data']
                    console.log(item_list)
                    $.each(item_list, function(key, item){
                        date_time = reformat_date(item[5])
                        // myDate = new Date(date_time).toISOString().slice(0,10)
                        console.log(date_time)
                        // console.log(myDate)
                        fill_data(item[0], item[1], item[5])
                    })
                }
            })
        }

        function remove_item(element){
            item_id = element.parentNode.parentNode.children[0].textContent
            confirm_text = "Bạn có chắc muốn xóa sản phẩm này?"
            if(confirm(confirm_text)){
                $.ajax({
                    type: "POST",
                    url: "./API/api_delete_item.php",
                    data: {'item_id' : item_id},
                    success: function(response){
                        result = JSON.parse(response)
                        console.log(result)
                    }
                })
                $('#manage-table tbody').html('')
                load_data()
            }
        }

        window.onload = load_data()

    </script>
</body>
</html>
<?php
    } else {
        header("Location: login.php");
    }
?>