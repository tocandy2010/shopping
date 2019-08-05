<?php
/* Smarty version 3.1.33, created on 2019-08-05 19:00:36
  from 'D:\xampp\htdocs\TaiwanGYM\views\back\goods\addgoods.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d4860b4e962b0_46212421',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7180e4ceeac4fd31147bdba2d16b68ac7781303f' => 
    array (
      0 => 'D:\\xampp\\htdocs\\TaiwanGYM\\views\\back\\goods\\addgoods.html',
      1 => 1565024431,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d4860b4e962b0_46212421 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <title>join TaiwanGym</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"><?php echo '</script'; ?>
>
    <style>
        /* Remove the navbar's default margin-bottom and rounded borders */
        .navbar {
            margin-bottom: 100px;
            border-radius: 0px;
        }

        /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
        .row.content {
            height: 737px
        }

        /* Set gray background color and 100% height */
        .sidenav {
            padding-top: 20px;
            background-color: white;
            height: 100%;
        }

        /* Set black background color, white text and some padding */
        footer {
            background-color: #444444;
            padding: 25px;
            color: white;
        }

        #username {
            cursor: default;
            color: white;
        }

        #username:hover {
            cursor: default;
            color: white;
        }

        .errorinfo {
            color: darkred;
            font-weight: bold;
            letter-spacing: 0.5px
        }

        /* On small screens, set height to 'auto' for sidenav and grid */
        @media screen and (max-width: 767px) {
            .sidenav {
                height: auto;
                padding: 15px;
            }

            .row.content {
                height: auto;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo URL;?>
indexback/index">Home</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="<?php echo URL;?>
/goods/index/jog">訂單管理</a></li>
                    <li><a href="<?php echo URL;?>
/goods/index/ski">會員管理</a></li>
                    <li><a href="<?php echo URL;?>
/goods/index/boxing">新增商品</a></li>
                    <li><a href="<?php echo URL;?>
/goods/index/yoga">商品管理</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?php echo URL;?>
login/index"><span class="glyphicon glyphicon glyphicon-log-in"></span>
                            Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid text-center">
        <div class="row content">
            <div class="col-sm-2 sidenav"></div>
            <div class="col-sm-8 text-left">
                <form class="form-horizontal">
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="name">商品名稱</label>
                        <div class="col-md-4">
                            <input id="name" name="name" type="text" placeholder="" class="form-control input-md"
                                autocomplete="off">
                            <span class="help-block">最多文字限制20
                                <span class="errorinfo" id='nameinfo'></span>
                            </span>
                        </div>
                    </div>

                    <!-- Password input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="price">商品價格</label>
                        <div class="col-md-4">
                            <input id="price" name="price" type="number" placeholder=""
                                class="form-control input-md" autocomplete="off" min='1'>
                            <span class="help-block">請輸入整數價格
                                <span class="errorinfo" id="passwordinfo"></span>
                            </span>
                        </div>
                    </div>

                    <!-- Password input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="stock">上架數量</label>
                        <div class="col-md-4">
                            <input id="stock" name="stock" type="text" placeholder=""
                                class="form-control input-md" autocomplete="off" min='1'>
                            <span class="help-block">請輸入整數數字
                                <span class="errorinfo" id="stockinfo"></span>
                            </span>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="gimg">商品圖片</label>
                        <div class="col-md-4">
                            <input id="gimg" name="gimg" type="file" placeholder="" class="form-control-file"
                                autocomplete="off">
                            <span class="help-block">請上傳商品圖片
                                <span class="errorinfo" id="gimginfo"></span>
                            </span>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="uses">商品用途</label>
                        <div class="col-md-4">
                            <input id="uses" name="uses" type="text" placeholder="" class="form-control input-md"
                                autocomplete="off">
                            <span class="help-block">請說明商品用途 文字限制50
                                <span class="errorinfo" id="usesinfo"></span>
                            </span>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="material	">商品材質</label>
                        <div class="col-md-4">
                            <input id="material	" name="material" type="text" placeholder="" class="form-control input-md"
                                autocomplete="off">
                            <span class="help-block">請說明商品用途 文字限制50
                                <span class="errorinfo" id="material	info"></span>
                            </span>
                        </div>
                    </div>

                    <!-- Button (Double) -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="button1id"></label>
                        <div class="col-md-8">
                            <button type="button" id="regsend" class="btn btn-info">Create an account</button>
                            <a href="<?php echo URL;?>
login/index"><button type="button"
                                    class="btn btn-danger">Cancel</button></a>
                            <span class="errorinfo" id='errorinfo'></span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-2 sidenav"></div>
        </div>
    </div>
    <footer class="container-fluid text-center">
        <p>© 2019 Hogan Online shopping Mall</p>
    </footer>
    <?php echo '<script'; ?>
>
        //style="border:3px solid crimson"
        $("#regsend").click(function () {
            let eamil = $('#email').val();
            let password = $('#password').val();
            let repassword = $('#repassword').val();
            let name = $('#name').val();
            let phone = $('#phone').val();
            let address = $('#address').val();
            let formname = ['email', 'password', 'repassword', 'name', 'phone', 'address'];

            for (error of formname) {
                $('#' + error + 'info').html("");
            }

            $.ajax({
                url: "add",
                type: "POST",
                dataType: "json",
                data: {
                    'email': eamil,
                    'password': password,
                    'repassword': repassword,
                    'name': name,
                    'phone': phone,
                    'address': address,
                },
                success: function (result) {
                    console.log(result);
                    if (result.reginfo === 'success') {
                        $(window).attr('location', '<?php echo URL;?>
/login/index');
                    } else if (result.reginfo === 'fail') {
                        $('#errorinfo').html("註冊失敗");
                    } else if (result.reginfo) {
                        for (error of formname) {
                            $('#' + error + 'info').html(result.reginfo[error]);
                        }
                    } else {
                        $('#errorinfo').html("錯誤");
                    }
                }
            });
        })



    <?php echo '</script'; ?>
>
</body>

</html><?php }
}
