<?php
/* Smarty version 3.1.33, created on 2019-08-15 03:50:49
  from 'C:\xampp\htdocs\TaiwanGYM\views\home\login\editinfo.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d54ba796bd822_30444413',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a950b98ac7ee87b11bded1d1660927aa1265e288' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TaiwanGYM\\views\\home\\login\\editinfo.html',
      1 => 1565833849,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d54ba796bd822_30444413 (Smarty_Internal_Template $_smarty_tpl) {
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
                <span class="navbar-brand" id='username'>&nbsp
                    <span class="glyphicon glyphicon-user"></span>&nbsp<?php echo (($tmp = @$_smarty_tpl->tpl_vars['userinfo']->value['name'])===null||$tmp==='' ? '訪客' : $tmp);?>
</span>
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
cart/index"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a>
                    </li>
                    <?php if ((($tmp = @$_smarty_tpl->tpl_vars['loginflag']->value)===null||$tmp==='' ? false : $tmp)) {?>
                    <li><a href="<?php echo URL;?>
login/editinfo"><span class="glyphicon glyphicon glyphicon-pencil"></span>
                            Modify</a></li>
                    <li><a href="<?php echo URL;?>
order/index"><span class="glyphicon glyphicon-list-alt"></span> Myorder</a></li>
                    <li><a href="<?php echo URL;?>
login/logout"><span class="glyphicon glyphicon glyphicon-log-out"></span>
                            Logout</a></li>
                    <?php } else { ?>
                    <li><a href="<?php echo URL;?>
login/index"><span class="glyphicon glyphicon glyphicon-log-in"></span>
                            Login</a></li>
                    <?php }?>
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
login/editpassword">Security</a></li>
                    </ul>
                </div>
                <h3 class='formtitle'>Change&nbspInfo</h3>
                <form class="form-horizontal">
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="address">name</label>
                        <div class="col-md-4">
                            <input id="name" name="name" type="text" value="<?php echo $_smarty_tpl->tpl_vars['userinfo']->value['name'];?>
"
                                class="form-control input-md" autocomplete="off">
                            <span class="help-block">請輸入您的姓名&nbsp3~30字&nbsp&nbsp&nbsp
                                <span class="errorinfo" id="nameinfo"></span>
                            </span>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="phone">phone</label>
                        <div class="col-md-4">
                            <input id="phone" name="phone" type="text" value="<?php echo $_smarty_tpl->tpl_vars['userinfo']->value['phone'];?>
"
                                class="form-control input-md" autocomplete="off">
                            <span class="help-block">請輸入您的手機號碼&nbsp例如:&nbsp09xxxxxxxx&nbsp&nbsp&nbsp
                                <span class="errorinfo" id="phoneinfo"></span>
                            </span>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="address">address</label>
                        <div class="col-md-4">
                            <input id="address" name="address" type="text" value="<?php echo $_smarty_tpl->tpl_vars['userinfo']->value['address'];?>
"
                                class="form-control input-md" autocomplete="off">
                            <span class="help-block">請輸入您的地址&nbsp&nbsp&nbsp
                                <span class="errorinfo" id="addressinfo"></span>
                            </span>
                        </div>
                    </div>

                    <!-- Button (Double) -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="button1id"></label>
                        <div class="col-md-8">
                            <button type="button" id="regsend" class="btn btn-info">Update&nbspinfo</button>
                            <a href="<?php echo URL;?>
index/index"><button type="button"
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

        let nameflag = false;
        let phoneflag = false;
        let addressflag = false;

        $("#name").blur(function () {
            let name = $(this).val();
            if (checkInput(name, 'length', '3~30') === false) {
                $("#nameinfo").html("欄位填寫不正確");
            } else {
                nameflag = true;
                $("#nameinfo").html("");
            }
        })

        $("#phone").blur(function () {
            let phone = $(this).val();
            if (checkInput(phone, 'phone') === false) {
                $("#phoneinfo").html("手機號碼錯誤");
            } else {
                phoneflag = true;
                $("#phoneinfo").html("");
            }
        })

        $("#address").blur(function () {
            let address = $(this).val();
            if (checkInput(address, 'length', '6~50') === false) {
                $("#addressinfo").html("地址錯誤");
            } else {
                addressflag = true;
                $("#addressinfo").html("");
            }
        })



        $("#regsend").click(function () {
            let name = $('#name').val();
            let phone = $('#phone').val();
            let address = $('#address').val();
            let formname = ['name', 'phone', 'address'];

            for (error of formname) {
                $('#' + error + 'info').html("");
            }

            // 檢查欄位是否填寫正確
            formname.forEach(function(item){
                // if($("#" + item).val() === '') {
                    $("#" + item).focus();
                    $("#" + item).blur();
                // }
            })

            if (!(nameflag && phoneflag && addressflag)) {
                return false;
            }

            $.ajax({
                url: "update",
                type: "PUT",
                dataType: "json",
                data: {
                    'name': name,
                    'phone': phone,
                    'address': address,
                },
                success: function (result) {
                    if (result.info === false) {
                        alert(result.message);
                        if (result.error !== '') {
                            for (error of formname) {
                                $('#' + error + 'info').html(result.error[error]);
                            }
                        }
                    } else if (result.info === true) {
                        alert(result.message);
                        $(window).attr('location', '<?php echo URL;?>
index/index');
                    } else {
                        alert('修改失敗');
                        $(window).attr('location', '<?php echo URL;?>
index/index');
                    }
                }
            });
        })



    <?php echo '</script'; ?>
>
</body>

</html><?php }
}
