<?php
/* Smarty version 3.1.33, created on 2019-08-16 08:16:47
  from 'C:\xampp\htdocs\TaiwanGYM\views\back\index.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d564a4f4c5a89_13327786',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'af448bb39bb231caa242154f1e69e2b7eb3b6235' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TaiwanGYM\\views\\back\\index.html',
      1 => 1565936203,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d564a4f4c5a89_13327786 (Smarty_Internal_Template $_smarty_tpl) {
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
            margin-bottom: 70px;
            border-radius: 0px;
        }

        /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
        .row.content {
            height: 767px
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

        #index {
            background-image: url("<?php echo URL;?>
public/backimg/index.png");
            background-repeat: no-repeat;
            background-size: 100% 100%;
            height: 700px;
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
orderback/index">訂單管理</a></li>
                    <li><a href="<?php echo URL;?>
Customerback/index">會員管理</a></li>
                    <li><a href="<?php echo URL;?>
goodsback/index">商品管理</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?php echo URL;?>
loginback/edit/<?php echo $_smarty_tpl->tpl_vars['userinfo']->value['aid'];?>
">
                            <span class="glyphicon glyphicon glyphicon-pencil"></span> Modify</a></li>
                    <li><a href="<?php echo URL;?>
loginback/logout"><span class="glyphicon glyphicon glyphicon-log-in"></span>
                            Logout</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">

            </div>
        </div>
    </nav>

    <div class="container-fluid text-center">
        <div class="row content">
            <div class="col-sm-2 sidenav"></div>
            <div class="col-sm-8 text-left" id='index'></div>
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
