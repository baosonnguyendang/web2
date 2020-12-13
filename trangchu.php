<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HASH</title>
    <link rel="shortcut icon" type="image/png" href="/images/favicon.png">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>
<body>
    <div id='header'>
        <img src='./images/logo.jpg' alt=''>
        <div id='slogan'>
            <p style='font-family: cursive; font-size: 36px; color:red;'><a href='trangchu.php'><b>HASH </b></a></p>
        </div>
        <div id='cart'>
            <div class='cart1'>
                <a><i class="fa fa-phone fa-lg" aria-hidden="true"></i></a>
            </div>
            <span> 0912345678</span>
            <div class='cart1'>
                <a><i class="fa fa-shopping-cart fa-lg" aria-hidden="true"></i></a>
            </div>
            <span style='cursor: pointer;'><b> Giỏ hàng</b></span>
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
            <li style='width: 120px;'><a href='aboutus.html'>Trang chủ</a></li>
            <li style='width: 140px;' id='drop'>
                <a href='ourproducts.html'>Danh mục <span style='margin-left: 7px;' class="fa fa-angle-down" aria-hidden="true"></span></a>
                <ul id='category'>
                    <li><a href="#">SSD</a></li>
                    <li><a href="#">RAM</a></li>
                </ul>
            </li>
            <li style='width: 120px;'><a href='careers.html'>Đăng bán</a></li>
            <li style='width: 140px;'><a href='careers.html'>Theo dõi đơn</a></li>
            <li style='padding: 0 20px;'><a href='contactus.html'>Về chúng tôi</a></li>
        </ul>
        <div id='user'>
            <?php
                if(isset($_SESSION['username'])){
                    echo '<a href="#"><i class="fa fa-user fa-lg" aria-hidden="true"></i><span>'.$_SESSION['username'].'</span></a>';
                } else {
                    echo '<a href="./login.php"><i class="fa fa-user fa-lg" aria-hidden="true"></i><span>Đăng nhập/Đăng ký</span></a>';
                }
            ?>
        </div>
    </div>
    <div id='mid'>
        <div id='sale'>
            <h3><i>Giá sốc tận nóc</i></h3>
            <div>
                <div class="card">
                    <img src='./images/sp1.jpg' alt=''>
                    <div class="container">
                      <p style='font-size: 13px;'>Ổ cứng SSD Samsung 860 QVO 1TB 2.5" (Mz-76Q1T0BW)</p>
                      <p><b>20.000 VND</b></p>
                    </div>
                </div>
                <div class="card">
                    <img src='./images/sp1.jpg' alt=''>
                    <div class="container">
                      <p style='font-size: 13px;'>Ổ cứng SSD Samsung 860 QVO 1TB 2.5" (Mz-76Q1T0BW)</p>
                      <p><b>20.000 VND</b></p>
                    </div>
                </div>
                <div class="card">
                    <img src='./images/sp1.jpg' alt=''>
                    <div class="container">
                      <p style='font-size: 13px;'>Ổ cứng SSD Samsung 860 QVO 1TB 2.5" (Mz-76Q1T0BW)</p>
                      <p><b>20.000VND</b></p>
                    </div>
                </div>
            </div>
        </div>
        <div id='view'>
            <h3><i>Xem nhiều hôm nay</i></h3>
            <div>
                <div class="card">
                    <img src='./images/sp1.jpg' alt=''>
                    <div class="container">
                      <p style='font-size: 13px;'>Ổ cứng SSD Samsung 860 QVO 1TB 2.5" (Mz-76Q1T0BW)</p>
                      <p><b>20.000 VND</b></p>
                    </div>
                </div>
                <div class="card">
                    <img src='./images/sp1.jpg' alt=''>
                    <div class="container">
                      <p style='font-size: 13px;'>Ổ cứng SSD Samsung 860 QVO 1TB 2.5" (Mz-76Q1T0BW)</p>
                      <p><b>20.000 VND</b></p>
                    </div>
                </div>
                <div class="card">
                    <img src='./images/sp1.jpg' alt=''>
                    <div class="container">
                      <p style='font-size: 13px;'>Ổ cứng SSD Samsung 860 QVO 1TB 2.5" (Mz-76Q1T0BW)</p>
                      <p><b>20.000VND</b></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class='footer' id='footer1'>
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

        $("#drop").hover(function(){
            $("#drop > ul").css("display","block")
            }, function(){
            $("#drop > ul").css("display","none")
        })  
    </script>
</body>
</html>