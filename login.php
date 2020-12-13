<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HASH</title>
    <link rel="shortcut icon" type="image/png" href="./images/favicon.png">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <style>
        html {
            /* overflow: hidden; */
        }
    </style>
</head>
<body>
    <div>
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
                <li style='width: 120px;'><a href='upload.php'>Đăng bán</a></li>
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
    </div>

    <div id='login'>
        <form id="signin-form">
            <h2>Đăng nhập</h2>
            <div class="form-group">
                <span style="color: red; font-size: 15px" id="signin-error"></span>
                <label for="username_signin">Tên đăng nhập</label>
                <input type="text" class="form-control" id="username_signin" name="username_signin" aria-describedby="emailHelp" placeholder="Username">
                <small id="emailHelp" class="form-text text-muted">Chúng tôi sẽ không bao giờ chia sẻ thông tin của bạn cho bất cứ ai</small>
            </div>
            <div class="form-group">
                <label for="password_signin">Mật khẩu</label>
                <input type="password" class="form-control" id="password_signin" name="password_signin" placeholder="Password">
            </div>
        </form>
        <button id='signin-btn' class="btn btn-primary">Đăng nhập</button><span> Chưa có tài khoản?</span><span style='background-color: white; border: none;' type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><u>Đăng ký</u></span>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Đăng ký</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post" id="signup-form">
                    <div class="modal-body">
                        <div class="control-group">
                            <!-- Username -->
                            <label class="control-label"  for="username_signup">Tên đăng nhập</label>
                            <div class="controls">
                                <input type="text" id="username_signup" name="username_signup" placeholder="" class="input-xlarge">
                                <p class="help-block" style="font-size: 12px;"><span id="username-signup-error" style="color: red;"></span>Tên đăng nhập chứa 5-30 ký tự</p>
                            </div>
                        </div>       
                        <div class="control-group">
                            <!-- E-mail -->
                            <label class="control-label" for="email">E-mail</label>
                            <div class="controls">
                                <input type="text" id="email" name="email" placeholder="" class="input-xlarge">
                                <p class="help-block" style="font-size: 12px;"><span id="email-error" style="color: red;"></span>Xin cung cấp E-mail của bạn</span></p>
                            </div>
                        </div>                 
                        <div class="control-group">
                            <!-- Password-->
                            <label class="control-label" for="password_signup">Mật khẩu</label>
                            <div class="controls">
                                <input type="password" id="password_signup" name="password_signup" placeholder="" class="input-xlarge">
                                <p class="help-block" style="font-size: 12px;"><span id="password-signup-error" style="color: red;"></span>Mật khẩu chứa 5-30 ký tự</span></p>
                            </div>
                        </div>
                        <div class="control-group">
                            <!-- Password -->
                            <label class="control-label"  for="password_confirm_signup">Xác nhận mật khẩu</label>
                            <div class="controls">
                                <input type="password" id="password_confirm_signup" name="password_confirm_signup" placeholder="" class="input-xlarge">
                                <p class="help-block" style="font-size: 12px;"><span id="confirm-password-signup-error" style="color: red;"></span>Xin xác nhận mật khẩu</span></p>
                            </div>
                        </div>
                        <!-- <div class="control-group">
                            <div class="controls">
                              <button class="btn btn-success">Register</button>
                            </div>
                        </div> -->
                    </div>
                </form>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                  <button type="button" onclick="check_data()" class="btn btn-primary" id="signup">Đăng ký</button>
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

        //validate sign-up data
        function check_username_signup(){
            let username_signup = document.getElementById("username_signup")
            if(username_signup.value.length < 5){
                document.getElementById("username-signup-error").innerHTML="Tên đăng nhập không thể ít hơn 5 ký tự<br>"
                console.log(document.getElementById("username-signup-error"))
                return 1
            } else if(username_signup.value.length > 30){
                document.getElementById("username-signup-error").innerHTML="Tên đăng nhập không thể nhiều hơn 30 ký tự<br>"
                return 1
            } else {
                document.getElementById("username-signup-error").innerHTML=""
                return 0
            }
        }

        function check_password_signup(){
            let password_signup = document.getElementById("password_signup")
            if(password_signup.value.length < 5){
                document.getElementById("password-signup-error").innerHTML="Mật khẩu không thể ít hơn 5 ký tự<br>"
                return 1
            } else if(password_signup.value.length > 30){
                document.getElementById("password-signup-error").innerHTML="Mật khẩu không thể nhiều hơn 30 ký tự<br>"
                return 1
            } else {
                document.getElementById("password-signup-error").innerHTML=""
                return 0
            }
        }

        function check_confirm_password_signup(){
            let password_signup = document.getElementById("password_signup")
            let password_confirm_signup = document.getElementById("password_confirm_signup")
            if(password_confirm_signup.value != password_signup.value){
                document.getElementById("confirm-password-signup-error").innerHTML = "Mật khẩu không chính xác<br>"
                return 1
            } else {
                document.getElementById("confirm-password-signup-error").innerHTML = ""
                return 0
            }
        }
        
        function check_email() {
            let email = document.getElementById("email")
            var re = /\S+@\S+\.\S+/;
            result = re.test(email.value)
            // console.log (email.value);
            if (result) {
                document.getElementById("email-error").innerHTML=""
                return 0
            } else {
                document.getElementById("email-error").innerHTML="Email không hợp lệ<br>"
                return 1
            }
        }
        
        function check_data(){
            var error_flag = 0
            console.log("aa")
            error_flag += check_username_signup()
            error_flag += check_password_signup()
            error_flag += check_confirm_password_signup()
            error_flag += check_email()
            if(error_flag == 0){
                let signup_form = $("#signup-form")
                console.log(signup_form.serialize())
                $.ajax({
                    type:"POST",
                    url: "./API/api_signup.php",
                    data: signup_form.serialize(),
                    success: function(response){
                        result = JSON.parse(response)
                        console.log(result)
                        if(result['sql_status'] == "success"){
                            alert("Đăng ký tài khoản thành công!")
                            signup_form.submit()
                        } else {
                            $('#username-signup-error').html('Tên đăng nhập đã được sử dụng, vui lòng chọn tên đăng nhập khác<br>')
                        }
                    }
                })
            }
        }
        $('#signin-btn').on('click',function(){
            let signin_form = $('#signin-form')
            console.log(signin_form.serialize())
            $.ajax({
                    type:"POST",
                    url: "./API/api_signin.php",
                    data: signin_form.serialize(),
                    success: function(response){
                        result = JSON.parse(response)
                        console.log(result)
                        if(result['sql_status'] == "success"){
                            window.location = "trangchu.php"
                        } else {
                            $('#signin-error').html('Sai tên đăng nhập hoặc mật khẩu<br>')
                        }
                    }
                })
        })
    </script>
</body>
</html>