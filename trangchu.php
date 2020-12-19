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

        <div class="row">
            <div id='mid' style="width:100%">
                <!-- <div id='sale'>
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

                <div class='item-showcase'>
                    <h3><i>Xem nhiều hôm nay</i></h3>
                    <div style="display: flex; width: 100%; flex-wrap: wrap;">
                        <div class="card" style="min-width: 180px;">
                            <img src='./images/sp1.jpg' alt=''>
                            <div class="container">
                                <p style='font-size: 13px;'>Ổ cứng SSD Samsung 860 QVO 1TB 2.5" (Mz-76Q1T0BW)</p>
                                <p><b>20.000 VND</b></p>
                            </div>
                        </div>
                    </div>
                </div> -->
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
                    <a href="#"><span class="fa fa-facebook-official fa-2x" style='color: #4267B2;'></span></a>
                    <a href="#"><span class="fa fa-twitter fa-2x" style='color: #1DA1F2;'></span></a>
                    <a href="#"><span class="fa fa-skype fa-2x" style='color: #00AFF0;'></span></a>
                    <a href="#"><span class="fa fa-youtube-play fa-2x" style='color: red;'></span></a>
                </div>
            </div>
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

        function fill_data(item_type, item_array){
            var html_string = ""
            switch(item_type){
                case 'ram':
                    html_string = `
                    <div class='item-showcase'>
                        <h3><i>RAM</i></h3>`
                    break;
                case 'ssd':
                    html_string = `
                    <div class='item-showcase'>
                        <h3><i>SSD</i></h3>`
                    break;
                case 'hdd':
                    html_string = `
                    <div class='item-showcase'>
                        <h3><i>HDD</i></h3>`
                    break;
                case 'gpu':
                    html_string = `
                    <div class='item-showcase'>
                        <h3><i>GPU</i></h3>`
                    break;
                case 'mobo':
                    html_string = `
                    <div class='item-showcase'>
                        <h3><i>Motherboard</i></h3>`
                    break;
                case 'cpu':
                    html_string = `
                    <div class='item-showcase'>
                        <h3><i>CPU</i></h3>`
                    break;
                case 'psu':
                    html_string = `
                    <div class='item-showcase'>
                        <h3><i>PSU</i></h3>`
                    break;
            }
            
            html_string += `
                    <div style="display: flex; width: 100%; flex-wrap: wrap;">`
            $.each(item_array, function(index, item){
                html_string += `
                    <div class="card" style="min-width: 180px;" onclick="view_item(this)">
                        <img src='` + item[2] + `' alt=''>
                        <div class="container">
                            <p style='font-size: 13px;'>` + item[1] + `</p>
                            <p><b>` + Number(item[7]).toLocaleString('en') + ` VND</b></p>
                        </div>
                        <input type="hidden" name="item_id" value="` + item[0] + `">
                    </div>`
            })

            html_string += `</div></div>`
            $('#mid').append(html_string)
        }

        function get_item_data(){
            item_type = ['ram', 'ssd', 'hdd', 'gpu', 'cpu', 'mobo', 'psu']
            $.each(item_type, function(index, value){
                $.ajax({
                    type: "GET",
                    url: "./API/api_get_item_data.php",
                    data: {'type':value, 'get_case':0},
                    success: function(response){
                        result = JSON.parse(response)
                        // console.log(result['item_data'])
                        // console.log(value)
                        fill_data(value, result['item_data'])
                    }
                })
            })
        }

        function view_item(element){
            // console.log(element);
            // console.log(element.children[2].value);
            item_id = element.children[2].value
            // $.ajax({
            //     type: "GET",
            //     url: "./API/api_set_session.php",
            //     data: {'item_id':item_id},
            //     success: function(response){
            //         result = JSON.parse(response)
            //     }
            // })
            var form = document.createElement("form");
            var item_id_input = document.createElement("input"); 

            form.method = "GET";
            form.action = "viewitem.php";   

            item_id_input.value= item_id;
            item_id_input.name="item_id";
            form.appendChild(item_id_input);  

            document.body.appendChild(form);

            form.submit();
        }
        window.onload = get_item_data()
    </script>
</body>
</html>