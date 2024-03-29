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
                    <li style='padding: 0 20px;'><a href='https://docs.google.com/spreadsheets/d/1bU182Yl9RNRS2NeX26YB8368lvxHcNjY4g_qDMoia1o/edit#gid=503289772'>Về chúng tôi</a></li>
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

        <div id='checkout' class='ssd'>
            <h4>Giỏ hàng</h4>
            <div>
                <div id='checkout1'>
                    <!-- <div class='unit'>
                        <div class='unit1'>
                            <img src='./images/sp1.jpg' alt='' style='width:100%; height: auto'>
                        </div>
                        <div class='unit2'>
                            <p>Ổ cứng SSD Samsung 860 Evo 500GB 2.5" SATA 3 - MZ-76E500BW<br>Số lượng: 1</p>
                            <p style='font-size: 0.875rem; cursor: pointer; color:#00AFF0;'>Xóa sản phẩm</p>
                        </div>
                        <div class='unit3'>
                            <p style='font-size: 1.25rem'><b>20.000đ</b></p>
                        </div>
                    </div> -->
                </div>
                <div id='checkout2'>
                    <div id='checkout2-1'>
                        <div style='padding-bottom: 20px; border-bottom: 1px solid #f1f1f1'>
                            <div id='change-address'>
                                <h4>Thông tin người nhận</h4>
                                <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                    <u style='color: blue;'>Thay đổi</u>
                                </button> -->
                                <p><?php echo $user_data['name'];?></p>
                                <p>Địa chỉ: <span><?php echo $user_data['address'];?></span></p>
                                <p>Email: <span><?php echo $user_data['email'];?></span></p>
                                <p>SĐT: <span><?php echo $user_data['phone'];?></span></p>
                            </div>
                            <!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Thông tin người nhận</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <div>
                                                    <label style='width: 30%; display: inline-block;' for="fname">Tên người nhận:</label>
                                                    <input style='width: 50%;' type="text" id="name" name="name" value=""><br><br>
                                                </div>
                                                <div>
                                                    <label style='width: 30%; display: inline-block;' for="lname">SĐT:</label>
                                                    <input style='width: 50%;' type="text" id="phone" name="phone" value=""><br><br>
                                                </div>
                                                <div>
                                                    <label style='width: 30%; display: inline-block;' for="birthday">Tỉnh/thành:</label>
                                                    <input style='width: 50%;' type="text" id="province" name="province" value=""><br><br>
                                                </div>
                                                <div>
                                                    <label style='width: 30%; display: inline-block;' for="birthday">Quận/huyện:</label>
                                                    <input style='width: 50%;' type="text" id="district" name="district" value=""><br><br>
                                                </div>
                                                <div>
                                                    <label style='width: 30%; display: inline-block;' for="birthday">Phường/xã:</label>
                                                    <input style='width: 50%;' type="text" id="ward" name="ward" value=""><br><br>
                                                </div>
                                                <div>
                                                    <label style='width: 30%; display: inline-block;' for="birthday">Số nhà, tên đường:</label>
                                                    <input style='width: 50%;' type="text" id="street" name="street" value=""><br><br>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary">Lưu</button>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <div id='checkout3'>
                        <div style='padding-bottom: 20px; border-bottom: 1px solid #f1f1f1'>
                            <div class='money'>
                                <span>Tổng tiền</span>
                                <span><b id='tong'></b></span>
                            </div>
                            <div class='money'>
                                <span>Giảm giá</span>
                                <span><b id='giam'></b></span>
                            </div>
                            <div class='money'>
                                <span>Phí vận chuyển</span>
                                <span><b id='ship'></b></span>
                            </div>
                        </div>
                        <div class='money' style='padding-top: 10px'>
                            <span style='line-height: 30px;'>Thành tiền</span>
                            <span style='font-size: 20px; line-height: 30px; color: red'><b id='thanh'></b></span>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary" id="order-btn"><b>Đặt hàng thôi</b></button>
                </div>
            </div>
            <input type="hidden" name="price" id="price">
        </div>
        
        <div class='footer'>
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
                if (window.innerWidth > 1024){
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
            if (window.innerWidth < 1024){
                document.getElementById('drop1').className = "drop2";
                document.getElementById('drop2').className = "drop2";
            }

            $(".drop").hover(function(){
                $(this).children("ul").css("display","block")
                }, function(){
                $(this).children("ul").css("display","none")
            })  


            function fill_data(name, price, id, image, number){
                // html_string = `
                // <div class='unit'>
                //     <div class='unit1'>
                //         <img src='` + image + `' alt='' style='width:100%; height: auto'>
                //     </div>
                //     <div class='unit2'>
                //         <a href='./viewitem.php?item_id=` + id + `'>` + name + `</a><br>Số lượng: ` + number + `
                //         <p style='font-size: 0.875rem; cursor: pointer; color:#00AFF0;'>Xóa sản phẩm</p>
                //     </div>
                //     <div class='unit3'>
                //         <p style='font-size: 1.25rem'><b>` + price + `đ</b></p>
                //     </div>
                // </div>
                // `
                html_string = `
                <div class='unit'>
                    <div class='unit1'>
                        <img src='` + image + `' alt='' style='width:100%; height: auto'>
                    </div>
                    <div class='unit2'>
                        <a href='./viewitem.php?item_id=` + id + `'>` + name + `</a>
                        <p style='font-size: 0.875rem; cursor: pointer; color:#00AFF0;' onclick='remove_cart_item(` + id + `)'>Xóa sản phẩm</p>
                    </div>
                    <div class='unit3'>
                        <p style='font-size: 1.25rem'><b>` + price + `đ</b></p>
                    </div>
                </div>
                `
                $('#checkout1').append(html_string)
            }

            function load_data(){
                // tinh tong tien
                var total_money = parseInt(0);
                var sale_money = parseInt(0);
                var ship_money = 20000;

                var cart = <?php echo isset($_COOKIE['cart'])? json_encode($_COOKIE['cart']) : 0 ?>;
                // console.log(cart)
                if(cart){
                    current_user_cart = JSON.parse(cart)[<?php echo $_SESSION['user_id']?>]
                    // console.log(Object.keys(current_user_cart).length)
                    if(Object.keys(current_user_cart).length){
                        $.each(current_user_cart, function(key, value){
                            // console.log("key: "+key+" value: "+value)
                            $.ajax({
                                type: "GET",
                                async: false,
                                url: "./API/api_get_item_data.php",
                                data: {'get_case' : 1, 'item_id' : key},
                                success: function(response){
                                    result = JSON.parse(response)
                                    // console.log(result)
                                    item = result['item_data'][0]
                                    fill_data(item[1], Number(item[7]).toLocaleString('en') , item[0], item[2], value)
                                    total_money += parseInt(item[7])
                                    // console.log(item[7])
                                    // console.log(total_money)
                                }
                            })
                        })
                        $('#order-btn').prop('disabled', false)
                    } else {
                        html_string = `
                            <h1>Hiện không có sản phẩm trong giỏ hàng</h1>
                        `
                        $('#checkout1').append(html_string)
                        $('#order-btn').prop('disabled', true)
                        ship_money = 0;
                    }
                } else {
                    html_string = `
                        <h1>Hiện không có sản phẩm trong giỏ hàng</h1>
                    `
                    $('#checkout1').append(html_string)
                    $('#order-btn').prop('disabled', true)
                    ship_money = 0;
                }

                // console.log(total_money)
                document.getElementById('tong').innerHTML = Number(total_money).toLocaleString('en') + 'đ'
                document.getElementById('giam').innerHTML = Number(sale_money).toLocaleString('en') + 'đ'
                document.getElementById('ship').innerHTML = Number(ship_money).toLocaleString('en') + 'đ'
                document.getElementById('thanh').innerHTML = Number(total_money - sale_money + ship_money).toLocaleString('en') + 'đ'
                $('#price').val(total_money - sale_money + ship_money)
            } 


            window.onload= load_data()
            $.ajax({
                type: "GET",
                url: "./API/api_set_cookie.php",
                async: false,
                success: function(response){
                    result = JSON.parse(response)
                    console.log(result)
                }
            })

            function remove_cart_item(item_id){
                // console.log(item_id)
                $.ajax({
                    type: "POST",
                    url: "./API/api_set_cookie.php",
                    data: {'item_id' : item_id , 'cookie_case' : 1},
                    async: false,
                    success: function(response){
                        result = JSON.parse(response)
                        console.log(result)
                        location.reload();
                    }
                })
            }
            $('#order-btn').click(function(){
                price = $('#price').val()
                $.ajax({
                    type: "POST",
                    url:'./API/api_create_order.php',
                    data: {'price' : price},
                    async: false,
                    success: function(response){
                        result = JSON.parse(response)
                        if(result['sql_status'] == "success" && result['cookie_set'] == "success"){
                            alert("Đặt hàng thành công")
                            window.location = "./tracking.php"
                        }
                    }
                })
                console.log("click")
            })
        </script>
    </body>
</html>
<?php
    } else {
        header("Location: login.php");
    }
?>