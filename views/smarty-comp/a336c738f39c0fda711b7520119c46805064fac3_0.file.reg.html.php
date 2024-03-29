<?php
/* Smarty version 3.1.33, created on 2019-08-12 04:36:31
  from 'C:\xampp\htdocs\TaiwanGYM\views\home\login\reg.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d50d0afddbcc7_67019986',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a336c738f39c0fda711b7520119c46805064fac3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TaiwanGYM\\views\\home\\login\\reg.html',
      1 => 1565577379,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d50d0afddbcc7_67019986 (Smarty_Internal_Template $_smarty_tpl) {
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
                <form class="form-horizontal">
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="email">Email</label>
                        <div class="col-md-4">
                            <input id="email" name="email" type="text" placeholder="" class="form-control input-md"
                                autocomplete="off">
                            <span class="help-block">請輸入一個目前可用的Email
                                <span class="errorinfo" id='emailinfo'></span>
                            </span>
                        </div>
                    </div>

                    <!-- Password input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="password">password</label>
                        <div class="col-md-4">
                            <input id="password" name="password" type="password" placeholder=""
                                class="form-control input-md" autocomplete="off">
                            <span class="help-block">請輸入6~20位
                                <span class="errorinfo" id="passwordinfo"></span>
                            </span>
                        </div>
                    </div>

                    <!-- Password input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="password">repassword</label>
                        <div class="col-md-4">
                            <input id="repassword" name="repassword" type="password" placeholder=""
                                class="form-control input-md" autocomplete="off">
                            <span class="help-block">請再輸入一次密碼
                                <span class="errorinfo" id="repasswordinfo"></span>
                            </span>
                        </div>
                    </div>

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
 src='<?php echo URL;?>
public/js/helper.js'><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
>

        let emailflag = false;
        let passwordflag = false;
        let repasswordflag = false;
        let nameflag = false;
        let phoneflag = false;
        let addressflag = false;

        $("#email").blur(function () {
            let email = $(this).val();
            if (checkInput(email, 'email') === false) {
                $("#emailinfo").html("請輸入正確的Email");
            } else {
                emailfalg = true;
                $("#emailinfo").html("");
            }
        })

        $("#password").blur(function () {
            let password = $(this).val();
            if (checkInput(password,'length', '6~20') === false) {
                $("#passwordinfo").html("密碼長度不符合");
            } else {
                passwordflag = true;
                $("#passwordinfo").html("");
            }
        })

        $("#repassword").blur(function () {
            let repassword = $(this).val();
            if (repassword !== $("#password").val() || repassword === "") {
                $("#repasswordinfo").html("確認密碼錯誤");
            } else {
                repasswordflag = true;
                $("#repasswordinfo").html("");
            }
        })

        $("#name").blur(function () {
            let name = $(this).val();
            if (checkInput(name,'length', '3~30') === false) {
                $("#nameinfo").html("格式不正確");
            } else {
                nameflag = true;
                $("#nameinfo").html("");
            }
        })

        $("#phone").blur(function () {
            let phone = $(this).val();
            if (checkInput(phone,'phone') === false) {
                $("#phoneinfo").html("手機號碼錯誤");
            } else {
                phoneflag = true;
                $("#phoneinfo").html("");
            }
        })

        $("#address").blur(function () {
            let address = $(this).val();
            if (checkInput(address,'length', '6~50') === false) {
                $("#addressinfo").html("地址錯誤");
            } else {
                addressflag = true;
                $("#addressinfo").html("");
            }
        })

        $("#regsend").click(function () {
            let email = $('#email').val();
            let password = $('#password').val();
            let repassword = $('#repassword').val();
            let name = $('#name').val();
            let phone = $('#phone').val();
            let address = $('#address').val();
            let formname = ['email', 'password', 'repassword', 'name', 'phone', 'address'];
            for (error of formname) {
                $('#' + error + 'info').html("");
            }

            formname.forEach(function(item){
                if($("#" + item).val() === '') {
                    $("#" + item).focus();
                }
            })

            if (!(emailflag && password && repassword && name && phone && address)) {
                return false;
            }

            return false;
            $.ajax({
                url: "add",
                type: "POST",
                dataType: "json",
                data: {
                    'email': email,
                    'password': password,
                    'repassword': repassword,
                    'name': name,
                    'phone': phone,
                    'address': address,
                },
                success: function (result) {
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
