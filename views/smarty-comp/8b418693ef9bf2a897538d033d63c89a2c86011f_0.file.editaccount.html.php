<?php
/* Smarty version 3.1.33, created on 2019-08-09 09:23:11
  from 'C:\xampp\htdocs\TaiwanGYM\views\home\login\editaccount.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d4d1f5fdd95c9_56668545',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8b418693ef9bf2a897538d033d63c89a2c86011f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TaiwanGYM\\views\\home\\login\\editaccount.html',
      1 => 1565335388,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d4d1f5fdd95c9_56668545 (Smarty_Internal_Template $_smarty_tpl) {
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

        .formtitle {
            text-align: center;
            padding-bottom: 2%;
            font-weight: bold
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
index/index">Home</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="<?php echo URL;?>
/goods/index/jog">Jog</a></li>
                    <li><a href="<?php echo URL;?>
/goods/index/ski">Ski</a></li>
                    <li><a href="<?php echo URL;?>
/goods/index/Boxing">boxing</a></li>
                    <li><a href="<?php echo URL;?>
/goods/index/yoga">Yoga</a></li>
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
                <div class="container">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="">Account</a></li>
                        <li><a href="<?php echo URL;?>
/login/editpassword">Security</a></li>
                    </ul>
                </div>
                <h3 class='formtitle'>Change&nbspInfo</h3>
                <form class="form-horizontal">
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="address">name</label>
                        <div class="col-md-4">
                            <input id="name" name="name" type="text" placeholder="" class="form-control input-md"
                                autocomplete="off">
                            <span class="help-block">請輸入您的姓名&nbsp不可輸入空白&nbsp3~30字&nbsp&nbsp&nbsp
                                <span class="errorinfo" id="nameinfo"></span>
                            </span>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="phone">phone</label>
                        <div class="col-md-4">
                            <input id="phone" name="phone" type="text" placeholder="" class="form-control input-md"
                                autocomplete="off">
                            <span class="help-block">請輸入您的手機號碼&nbsp例如:&nbsp09xxxxxxxx&nbsp&nbsp&nbsp
                                <span class="errorinfo" id="phoneinfo"></span>
                            </span>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="address">address</label>
                        <div class="col-md-4">
                            <input id="address" name="address" type="text" placeholder="" class="form-control input-md"
                                autocomplete="off">
                            <span class="help-block">請輸入您的地址&nbsp&nbsp&nbsp
                                <span class="errorinfo" id="addressinfo"></span>
                            </span>
                        </div>
                    </div>

                    <!-- Button (Double) -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="button1id"></label>
                        <div class="col-md-8">
                            <button type="button" id="regsend" class="btn btn-info">Update&nbspaccount</button>
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
