<?php
/* Smarty version 3.1.33, created on 2019-08-03 06:21:07
  from 'D:\xampp\htdocs\TaiwanGYM\views\home\goods\goodsdetial.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d450bb378ff93_29159819',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '60c5a435185034a2111844014b48bdfc00576763' => 
    array (
      0 => 'D:\\xampp\\htdocs\\TaiwanGYM\\views\\home\\goods\\goodsdetial.html',
      1 => 1564806063,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d450bb378ff93_29159819 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <title>goodsdetail</title>
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

        /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
        .row.content {
            height: 900px
        }

        /* Set gray background color and 100% height */
        .sidenav {
            padding-top: 20px;
            background-color: white;
            height: 100%;
        }

        /* Add a gray background color and some padding to the footer */
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

        #typelist {
            position: relative;
            top: 15%
        }

        #breadcrumbs {
            background-color: white;
            font-size: 18px;
            margin-top: 20px;
        }

        .goodsimg {
            position: relative;
            left: 20%;
            width:60%;
            height:auto;
        }

        .goodsname {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            letter-spacing: 0.8px;

            font: bold 20px Microsoft JhengHei;
            color: #202528;
            padding-top:10px;
        }

        .goodsprice {
            width: 97%;
            font-family: fantasy;
            font-size: 20px;
            color: black;
            letter-spacing: 1px
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
                <a class="navbar-brand" href="./index.html">Home</a>
                <span class="navbar-brand" id='username'>Username</span>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="#">跑步</a></li>
                    <li><a href="#">滑雪</a></li>
                    <li><a href="#">拳擊</a></li>
                    <li><a href="#">瑜珈</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="./login.html"><span class="glyphicon glyphicon glyphicon-log-in"></span> Login</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-user"></span> Uaername</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon glyphicon-pencil"></span> Modify</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon glyphicon-log-out"></span> Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid" style="margin-bottom: 20px">
        <div class="row content">
            <div class="col-sm-2 sidenav"></div>
            <div class="col-sm-8 text-left">
                <ol class="breadcrumb glyphicon glyphicon-home" id='breadcrumbs'>
                    <li><a href="./index.html">Home</a></li>
                    <li><a href="#">typename</a></li>
                    <li>goodsname</li>
                    <!-- <li class="active">goodsname</li> -->
                </ol>
                <div class="container-fluid">
                    <div class="row" style="margin-top: 40px">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="container-fluid">
                                    <div class="row-content">
                                        <div class="col-sm-6">
                                            <img src="<?php echo URL;?>
public/homeimg/goodsimg/test.png"
                                                class="img-thumbnail goodsimg" alt="Cinque Terre">
                                        </div>
                                        <div class="col-sm-5 panel panel-default" >
                                            <p class="goodsname">超級登山杖超級登山杖超級登山杖超級登山杖超級登山杖超級登山杖超級登山杖超級登山杖超級登山杖超級登山杖</p>
                                            <p class="goodsprice">NT$<span>600</span></p>
                                            <p style="padding:10px">庫存數量&nbsp<span>600</span></p>
                                            <p style = "padding-top: 10%">
                                                    <input class="form-control" type="number" min='1'
                                                        id="example-number-input" value='1'>
                                            </p>
                                            <p>
                                                <td><button type="button" class="btn btn-danger">加入購物車</button></td>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                            <div class="panel panel-default">
                                <div class="panel-body" >

                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <div class="col-sm-2 sidenav"></div>
        </div>
    </div>
    <footer class="container-fluid text-center">
        <p>© 2019 Hogan Online shopping Mall</p>
    </footer>

</body>

</html><?php }
}
