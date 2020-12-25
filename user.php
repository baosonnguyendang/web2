<?php
    session_start();
    if($_SESSION['is_admin']){
        header("Location: admin.php");
    } else if(isset($_SESSION['user_id'])){
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
                            echo '<i class="fa fa-user fa-lg" aria-hidden="true"></i><span style="cursor: context-menu;">'.$_SESSION['username'].'</span><span>|</span><span><a href="./API/api_signout.php">Đăng xuất</a></span>';
                        } else {
                            echo '<a href="./login.php"><i class="fa fa-user fa-lg" aria-hidden="true"></i><span>Đăng nhập/Đăng ký</span></a>';
                        }
                    ?>
                </div>
            </div>
        </div>

        <div id='history'>
            <div id='history1'>
                <ul><span style='text-transform: uppercase; font-size: 1.5rem; padding-left: 5px;'><b>Tài khoản</b></span>
                    <li id='user-tab-1' style='margin-top: 5px; cursor: pointer;'><i class="fa fa-user" aria-hidden="true"></i><span>Thông tin tài khoản</span></a></li>
                    <li id='user-tab-2' style="cursor: pointer;"><i class="fa fa-key" aria-hidden="true"></i><span>Đổi mật khẩu</span></a></li>
                </ul>
            </div>
            <div id='history2'>
                <h4>Thay đổi thông tin tài khoản</h4>
                <div>
                    <div id='manage-table'>
                        <form id="user-info" onSubmit="event.preventDefault()">
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Tên người dùng</label>
                                <div class="col-sm-10">
                                    <input type="text" required class="form-control-plaintext" id="name" name="name" value="<?php echo $user_data['name'] ?>"maxlength="200">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" required class="form-control-plaintext" id="email" name="email" value="<?php echo $user_data['email'] ?>" maxlength="30">
                                    <span id="email-error" style="color: red; float: left; font-size: 15px;"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="address" class="col-sm-2 col-form-label">Địa chỉ</label>
                                <div class="col-sm-10">
                                    <input type="text" required class="form-control-plaintext" id="address" name="address" value="<?php echo $user_data['address'] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone" class="col-sm-2 col-form-label">SĐT</label>
                                <div class="col-sm-10">
                                    <input type="number" required class="form-control-plaintext" id="phone" name="phone" value="<?php echo $user_data['phone'] ?>"  minlength="10" maxlength="15">
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary" onclick="check_data()">Cập nhập</button>
                        </form>
                    </div>
                </div>
            </div>
            <div id='history3'>
                <h4>Đổi mật khẩu</h4>
                <div>
                    <div id='manage-table-2'>
                        <form id="update-pass-form" onSubmit="event.preventDefault()">
                            <div class="form-group row">
                                <label for="curr_pass" class="col-sm-3 col-form-label">Nhập mật khẩu hiện tại</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" id="curr_pass" name="curr_pass" placeholder="Password">
                                        <span id="curr-pass-error" style="color: red; float: left; font-size: 15px;"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="new_pass" class="col-sm-3 col-form-label">Mật khẩu mới</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" id="new_pass" name="new_pass" placeholder="Password">
                                        <span id="new-pass-error" style="color: red; float: left; font-size: 15px;"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="new_pass_confirm" class="col-sm-3 col-form-label">Xác nhận mật khẩu mới</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" id="new_pass_confirm" name="new_pass_confirm" placeholder="Password">
                                        <span id="new-pass-confirm-error" style="color: red; float: left; font-size: 15px;"></span>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary mb-2" onclick="update_pass()">Xác nhận</button>
                        </form>
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
                if (window.innerWidth > 720){
                    document.getElementById("menu").className = "menu";
                    $("#bar").css("display","none")
                    $("#close").css("display","none")
                }
                if ($("#bar").css("display") == 'none' && $("#close").css("display") == 'none'){
                    document.getElementById("menu").className = "menu";
                }
            })

            // dropdown menu
            if (window.innerWidth < 720){
                document.getElementById('drop1').className = "drop2";
                document.getElementById('drop2').className = "drop2";
                console.log('a')
            }

            $(".drop").hover(function(){
                $(this).children("ul").css("display","block")
                }, function(){
                $(this).children("ul").css("display","none")
            })  

            //doi tab tai khoan va mat khau
            $("#user-tab-1").click(function(){
                $("#history3").css("display","none")
                $("#history2").css("display","block")
                $("#user-tab-1").css("background-color", "#aaa8")
                $("#user-tab-2").css("background-color", "rgb(241,240,241)")
            })

            $("#user-tab-2").click(function(){
                $("#history2").css("display","none")
                $("#history3").css("display","block")
                $("#user-tab-1").css("background-color", "rgb(241,240,241)")
                $("#user-tab-2").css("background-color", "#aaa8")
            }) 

            function check_email() {
                let email = document.getElementById("email")
                var re = /\S+@\S+\.\S+/;
                result = re.test(email.value)
                // console.log (email.value);
                if (result) {
                    $('#email-error').html('')
                    return 1
                } else {
                    $('#email-error').html('Email không hợp lệ')
                    return 0
                }
            }
            
            function check_data() {
                error_string = check_email()
                form_data = $('#user-info').serialize()
                if(error_string){
                    $.ajax({
                        type: "POST",
                        url: "./API/api_update_user_info.php",
                        data: form_data,
                        success: function(response){
                            result = JSON.parse(response)
                            if(result['sql_status'] == "success"){
                                alert("Cập nhập dữ liệu thành công")
                                location.reload()
                            } else {
                                alert("Cập nhập dữ liệu thất bại")
                            }
                        }
                    })
                }
            }

            function check_password(){
                let new_pass = document.getElementById("new_pass")
                if(new_pass.value.length < 5){
                    document.getElementById("new-pass-error").innerHTML="Mật khẩu không thể ít hơn 5 ký tự"
                    return 1
                } else if(new_pass.value.length > 30){
                    document.getElementById("new-pass-error").innerHTML="Mật khẩu không thể nhiều hơn 30 ký tự"
                    return 1
                } else {
                    document.getElementById("new-pass-error").innerHTML=""
                    return 0
                }
            }

            function check_confirm_password(){
                let new_pass = document.getElementById("new_pass")
                let new_pass_confirm = document.getElementById("new_pass_confirm")
                if(new_pass_confirm.value != new_pass.value){
                    document.getElementById("new-pass-confirm-error").innerHTML = "Mật khẩu không chính xác"
                    return 1
                } else {
                    document.getElementById("new-pass-confirm-error").innerHTML = ""
                    return 0
                }
            }

            function update_pass(){
                err_flag = check_password();
                err_flag += check_confirm_password();
                form_data = $('#update-pass-form').serialize()
                if(!err_flag){
                    $.ajax({
                        type: "POST",
                        url: "API/api_update_password.php",
                        data: form_data,
                        asynch: false,
                        success: function(response){
                            result = JSON.parse(response)
                            if(result['is_correct_pass'] == "success"){
                                if(result['sql_status'] == "success"){
                                    alert("Cập nhập mật khẩu thành công")
                                    location.reload()
                                } else {
                                    alert("Cập nhập mật khẩu thất bại")
                                }
                            } else {
                                document.getElementById("curr-pass-error").innerHTML="Mật khẩu không chính xác"
                            }
                        }
                    })
                }
            }
        </script>
    </body>
</html>
<?php
    } else {
        header("Location: login.php");
    }
?>