<?php
/* Smarty version 3.1.33, created on 2019-08-01 11:35:25
  from 'C:\xampp\htdocs\TaiwanGYM\views\home\goods\goods.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d42b25d29eb89_43390099',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8b6b93bd7b3d4303e68ea6d790c0a79135b8cd27' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TaiwanGYM\\views\\home\\goods\\goods.html',
      1 => 1564652121,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d42b25d29eb89_43390099 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <title>goodstypename</title>
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
            height: 737px
        }

        /* Set gray background color and 100% height */
        .sidenav {
            padding-top: 20px;
            background-color: white;
            height: 100%;
        }

        /* Remove the jumbotron's default bottom margin */
        .jumbotron {
            margin-bottom: 30px;
        }

        /* Add a gray background color and some padding to the footer */
        footer {
            background-color: brown;
            padding: 25px;
        }

        #headerimg {
            background-image: url('<?php echo URL;?>
public/homeimg/headerimg/<?php echo $_smarty_tpl->tpl_vars['headimg']->value;?>
.png');
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
                    <span class="glyphicon glyphicon-user"></span>&nbspUsername</span>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="<?php echo URL;?>
/goods/index/jog">Jog</a></li>
                    <li><a href="<?php echo URL;?>
/goods/index/ski">Ski</a></li>
                    <li><a href="<?php echo URL;?>
/goods/index/boxing">boxing</a></li>
                    <li><a href="<?php echo URL;?>
/goods/index/yoga">Yoga</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?php echo URL;?>
login/index"><span class="glyphicon glyphicon glyphicon-log-in"></span>
                            Login</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon glyphicon-pencil"></span> Modify</a></li>

                    <li><a href="<?php echo URL;?>
login/logout"><span class="glyphicon glyphicon glyphicon-log-out"></span>
                            Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="jumbotron" id='headerimg'>
        <div class="container text-center"></div>
    </div>


    <div class="container-fluid" style="margin-bottom: 20px">
        <div class="row content">
            <div class="col-sm-2 sidenav">
                <div class="list-group" id='typelist'>
                    <a href="#" class="list-group-item"><strong>Bigtype</strong></a>
                    <a href="#" class="list-group-item">type1</a>
                    <a href="#" class="list-group-item">type2</a>
                    <a href="#" class="list-group-item">type3</a>
                </div>
            </div>

            <div class="col-sm-8 text-left">
                <ol class="breadcrumb glyphicon glyphicon-home" id='breadcrumbs'>
                    <li><a href="./index.html">Home</a></li>
                    <li><a href="#">typename</a></li>
                    <!-- <li class="active">goodsname</li> -->
                </ol>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-3 goodswall">
                            <div>
                                <!-- <div class="panel-heading"  style = 'background-color: white'>商品1</div> -->
                                <div class="panel-body">
                                    <a href='#'><img src="./test2.png" class="img-responsive goodsimg" alt="Image"></a>
                                </div>
                                <div class="panel-heading" style='background-color: white'>
                                    <p class='goodsprice'><span>NT$</span>123456</p>
                                    <a href='#'>
                                        <p class='goodsname'>
                                            產品名稱可能會溢出邊界喔產品名稱可能會溢出邊界喔產品名稱可能會溢出邊界喔產品名稱可能會溢出邊界喔產品名稱可能會溢出邊界喔</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 goodswall">
                            <div>
                                <div class="panel-body">
                                    <a href='#'><img src="./test2.png" class="img-responsive"
                                            style="max-width: 100%;margin:auto;" alt="Image"></a>
                                </div>
                                <div class="panel-heading">
                                    <p class='goodsprice'><span>NT$</span>123456</p>
                                    <a href='#'>
                                        <p class='goodsname'>
                                            產品名稱可能會溢出邊界喔產品名稱可能會溢出邊界喔產品名稱可能會溢出邊界喔產品名稱可能會溢出邊界喔產品名稱可能會溢出邊界喔</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 goodswall">
                            <div>
                                <!-- <div class="panel-heading"  style = 'background-color: white'>商品1</div> -->
                                <div class="panel-body" style="padding: -100%">
                                    <a href='#'><img src="./test2.png" class="img-responsive"
                                            style="max-width: 100%;margin:auto;" alt="Image"></a>
                                </div>
                                <div class="panel-heading">
                                    <p class='goodsprice'><span>NT$</span>123456</p>
                                    <a href='#'>
                                        <p class='goodsname'>
                                            產品名稱可能會溢出邊界喔產品名稱可能會溢出邊界喔產品名稱可能會溢出邊界喔產品名稱可能會溢出邊界喔產品名稱可能會溢出邊界喔</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 goodswall">
                            <div>
                                <!-- <div class="panel-heading"  style = 'background-color: white'>商品1</div> -->
                                <div class="panel-body">
                                    <a href='#'><img src="./test2.png" class="img-responsive"
                                            style="max-width: 100%;margin:auto;" alt="Image"></a>
                                </div>
                                <div class="panel-heading">
                                    <p class='goodsprice'><span>NT$</span>123456</p>
                                    <a href='#'>
                                        <p class='goodsname'>
                                            產品名稱可能會溢出邊界喔產品名稱可能會溢出邊界喔產品名稱可能會溢出邊界喔產品名稱可能會溢出邊界喔產品名稱可能會溢出邊界喔</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 goodswall">
                            <div>
                                <!-- <div class="panel-heading"  style = 'background-color: white'>商品1</div> -->
                                <div class="panel-body">
                                    <a href='#'><img src="./test2.png" class="img-responsive"
                                            style="max-width: 100%;margin:auto;" alt="Image"></a>
                                </div>
                                <div class="panel-heading">
                                    <p class='goodsprice'><span>NT$</span>123456</p>
                                    <a href='#'>
                                        <p class='goodsname'>
                                            產品名稱可能會溢出邊界喔產品名稱可能會溢出邊界喔產品名稱可能會溢出邊界喔產品名稱可能會溢出邊界喔產品名稱可能會溢出邊界喔</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 goodswall">
                            <div>
                                <div class="panel-body">
                                    <a href='#'><img src="./test2.png" class="img-responsive"
                                            style="max-width: 100%;margin:auto;" alt="Image"></a>
                                </div>
                                <div class="panel-heading">
                                    <p class='goodsprice'><span>NT$</span>123456</p>
                                    <a href='#'>
                                        <p class='goodsname'>
                                            產品名稱可能會溢出邊界喔產品名稱可能會溢出邊界喔產品名稱可能會溢出邊界喔產品名稱可能會溢出邊界喔產品名稱可能會溢出邊界喔</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 goodswall">
                            <div>
                                <!-- <div class="panel-heading"  style = 'background-color: white'>商品1</div> -->
                                <div class="panel-body" style="padding: -100%">
                                    <a href='#'><img src="./test2.png" class="img-responsive"
                                            style="max-width: 100%;margin:auto;" alt="Image"></a>
                                </div>
                                <div class="panel-heading">
                                    <p class='goodsprice'><span>NT$</span>123456</p>
                                    <a href='#'>
                                        <p class='goodsname'>
                                            產品名稱可能會溢出邊界喔產品名稱可能會溢出邊界喔產品名稱可能會溢出邊界喔產品名稱可能會溢出邊界喔產品名稱可能會溢出邊界喔</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 goodswall">
                            <div>
                                <!-- <div class="panel-heading"  style = 'background-color: white'>商品1</div> -->
                                <div class="panel-body">
                                    <a href='#'><img src="./test2.png" class="img-responsive"
                                            style="max-width: 100%;margin:auto;" alt="Image"></a>
                                </div>
                                <div class="panel-heading">
                                    <p class='goodsprice'><span>NT$</span>123456</p>
                                    <a href='#'>
                                        <p class='goodsname'>
                                            產品名稱可能會溢出邊界喔產品名稱可能會溢出邊界喔產品名稱可能會溢出邊界喔產品名稱可能會溢出邊界喔產品名稱可能會溢出邊界喔</p>
                                    </a>
                                </div>
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
