<?php
    session_start();
    if($_SESSION['is_admin']){
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
    <style>
        .container{
            background-color: white
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-10">
                <h1>Trang admin</h1>
            </div>
            <div class="col-2" style="display: flex; justify-content: center; align-items: center;">
                <a href="./API/api_signout.php" type="button" class="btn btn-primary" style="float: left">Đăng xuất</a>
            </div>
        </div>
        <h2>Người dùng</h2>
        <table id="user-table" class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tên tài khoản</th>
                    <th scope="col">Email</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">SĐT</th>
                    <th scope="col">Thao tác</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        <h2>Sản phẩm</h2>
        <table id="item-table" class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Danh mục</th>
                    <th scope="col">Thao tác</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    <script>
        function ban_user(is_delete, user_id, username){
            confirm_str = is_delete? `Bạn có chắc muốn bỏ chặn ${username}`:`Bạn có chắc muốn chặn ${username}`
            if(confirm(confirm_str)){
                $.ajax({
                    type: "POST",
                    url: "./API/api_ban_unban_user.php",
                    data: {"is_delete" : is_delete, "user_id" : user_id},
                    success: function(response){
                        result = JSON.parse(response)
                        if(result['sql_status'] == "success"){
                            if(is_delete){
                                alert("Bỏ chặn "+username+" thành công")
                            } else {
                                alert("Chặn "+username+" thành công")
                            }
                        } else {
                            if(is_delete){
                                alert("Bỏ chặn "+username+" thất bại")
                            } else {
                                alert("Chặn "+username+" thất bại")
                            }
                        }
                        location.reload()
                    }
                })
            }
        }

        function delete_item(item_id, item_name){
            confirm_text = "Bạn có chắc muốn xóa sản phẩm " + item_name + " mã ID: " + item_id + "?"
            if(confirm(confirm_text)){
                $.ajax({
                    type: "POST",
                    url: "./API/api_delete_item.php",
                    async: false,
                    data: {'item_id' : item_id},
                    success: function(response){
                        result = JSON.parse(response)
                        // console.log(result)
                        if(result['sql_status'] == "success"){
                            alert("Xóa sản phẩm" + item_name + " mã ID: " + item_id + " thành công")
                        } else {
                            alert("Xóa sản phẩm" + item_name + " mã ID: " + item_id + " thất bại")
                        }
                    }
                })
                location.reload()
            }
        }

        function fill_user_data(id, username, email, name, address, phone, is_delete){
            html_string = `
                <tr>
                    <td>`+id+`</td>
                    <td>`+username+`</td>
                    <td>`+email+`</td>
                    <td>`+name+`</td>
                    <td>`+address+`</td>
                    <td>`+phone+`</td>
            `
            if(is_delete == 0){
                html_string += `
                    <td><button type="button" onclick="ban_user(${is_delete},${id},'${username}')" class="btn btn-danger">Chặn</button></td>
                </tr>
                `
            } else {
                html_string += `
                    <td><button type="button" onclick="ban_user(${is_delete},${id},'${username}')" class="btn btn-warning">Bỏ chặn</button></td>
                </tr>
                `
            }
            $('#user-table tbody').append(html_string)
        }

        function fill_item_data(item_id, item_image, item_name, item_type){
            switch(item_type){
                case 'ssd':
                    type = 'SSD'
                    break;
                case 'hdd':
                    type = 'HDD'
                    break;
                case 'psu':
                    type = 'PSU'
                    break;
                case 'mobo':
                    type = 'Motherboard'
                    break;
                case 'ram':
                    type = 'RAM'
                    break;
                case 'cpu':
                    type = 'CPU'
                    break;
                case 'gpu':
                    type = 'GPU'
                    break;
            }
            html_string =`
                <tr>
                    <td>${item_id}</td>
                    <td><img src="${item_image}" alt="" style="height: 5vw;"></td>
                    <td><a href="./viewitem.php?item_id=${item_id}" style="height: 5vw;">${item_name}</a></td>
                    <td>${type}</td>
                    <td><button type="button" onclick="delete_item(${item_id},'${item_name}')"class="btn btn-danger">Xóa sản phẩm</button></td>
                </tr>
            `
            $('#item-table tbody').append(html_string)
        }

        function get_user_data(){
            $.ajax({
                type: "GET",
                url: "./API/api_get_user.php",
                asynch: false,
                success: function(response){
                    result = JSON.parse(response)
                    console.log(result)
                    $.each(result['user_data'], function(index, value){
                        fill_user_data(value[0],value[1],value[3],value[4],value[5],value[6],value[8])
                    })
                }
            })
        }

        function get_item_data(){
            $.ajax({
                type: "GET",
                url: "./API/api_get_item_data.php",
                data: {"get_case" : 0 , "type" : ""},
                asynch: false,
                success: function(response){
                    result = JSON.parse(response)
                    console.log(result)
                    $.each(result['item_data'], function(index, value){
                        fill_item_data(value[0],value[2],value[1],value[4])
                    })
                }
            })
        }
        function get_data(){
            get_user_data()
            get_item_data()
        }
        window.onload=get_data()
    </script>
</body>
</html>
<?php
    } else {
        header("Location: trangchu.php");
    }
?>