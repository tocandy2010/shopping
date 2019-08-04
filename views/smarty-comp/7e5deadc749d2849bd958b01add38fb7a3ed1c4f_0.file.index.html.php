<?php
/* Smarty version 3.1.33, created on 2019-08-04 09:33:18
  from 'C:\xampp\htdocs\TaiwanGYM\views\home\index.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d468a3e0ae4c5_00786013',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7e5deadc749d2849bd958b01add38fb7a3ed1c4f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TaiwanGYM\\views\\home\\index.html',
      1 => 1564903996,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d468a3e0ae4c5_00786013 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <title>TaiwanGym</title>
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
        /* Remove the navbar's default rounded borders and increase the bottom margin */
        .navbar {
            margin-bottom: 0;
            border-radius: 0;
        }

        /* Remove the jumbotron's default bottom margin */
        .jumbotron {
            margin-bottom: 10px;
        }

        /* Add a gray background color and some padding to the footer */
        footer {
            background-color: #444444;
            padding: 25px;
            color: white;
        }

        #headerimg {
            background-image: url('<?php echo URL;?>
public/homeimg/headerimg/index.png');
            background-repeat: no-repeat;
            background-size: 100% 100%;
            height: 700px;
        }

        #username {
            cursor: default;
            color: white;
            font-size: 16px;
        }

        #username:hover {
            cursor: default;
            color: white;
        }

        .goodsprice {
            width: 97%;
            text-align: right;
            font-family: fantasy;
            font-size: 18px;
            color: black;
            letter-spacing: 0.8px
        }

        .goodsname {
            text-align: center;
            width: 100%;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            letter-spacing: 0.8px;
        }

        .goodswall {
            border: 3px solid white
        }

        .goodswall:hover {
            border: 3px solid goldenrod
        }

        .goodsimg {
            max-width: 100%;
            margin: auto;
        }

        .toggleable {
            font-size: 18px;
            height: 40px;
            line-height: 40px;
            width: 377px;
            text-align: center;
            line-height: 14px;
            background-color: #444444;
            color: white;
            font-family: Microsoft JhengHei;
        }

        .showtab {
            border: 1px solid black;
            height: 800px;
            margin-bottom: 10%;
            font-size: 25px;
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
/index/index">Home</a>
                <span class="navbar-brand" id='username'>&nbsp
                    <span class="glyphicon glyphicon-user"></span>&nbsp<?php echo (($tmp = @$_smarty_tpl->tpl_vars['userinfo']->value['name'])===null||$tmp==='' ? '訪客' : $tmp);?>
</span>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="<?php echo URL;?>
goods/index/jog">Jog</a></li>
                    <li><a href="<?php echo URL;?>
goods/index/ski">Ski</a></li>
                    <li><a href="<?php echo URL;?>
goods/index/boxing">Boxing</a></li>
                    <li><a href="<?php echo URL;?>
goods/index/yoga">Yoga</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?php echo URL;?>
cart/index"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
                    <?php if ((($tmp = @$_smarty_tpl->tpl_vars['loginflag']->value)===null||$tmp==='' ? false : $tmp)) {?>
                    <li><a href=""><span class="glyphicon glyphicon glyphicon-pencil"></span> Modify</a></li>
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

    <div class="jumbotron" id='headerimg'>
        <div class="container text-center"></div>
    </div>
    <div class="container">
        <ul class="nav nav-pills">
            <li class="active" class='toggleable'><a data-toggle="pill" href="#home" class='toggleable'>熱銷商品</a></li>
            <li><a data-toggle="pill" href="#menu1" class='toggleable'>專屬推薦</a></li>
            <li><a data-toggle="pill" href="#menu2" class='toggleable'>夏日運動</a></li>
        </ul>

        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
                <h3></h3>
                <div class='showtab'>熱銷商品</div>
            </div>
            <div id="menu1" class="tab-pane fade">
                <h3></h3>
                <div class='showtab'>專屬推薦</div>
            </div>
            <div id="menu2" class="tab-pane fade">
                <h3></h3>
                <div class='showtab'>夏日運動</div>
            </div>
        </div>
    </div>
    <footer class="container-fluid text-center">
        <p>© 2019 Hogan Online shopping Mall</p>
    </footer>

</body>

</html><?php }
}
