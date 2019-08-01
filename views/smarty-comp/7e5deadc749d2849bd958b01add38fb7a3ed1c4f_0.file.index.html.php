<?php
/* Smarty version 3.1.33, created on 2019-08-01 11:36:22
  from 'C:\xampp\htdocs\TaiwanGYM\views\home\index.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d42b2962329f6_24797745',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7e5deadc749d2849bd958b01add38fb7a3ed1c4f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TaiwanGYM\\views\\home\\index.html',
      1 => 1564652181,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d42b2962329f6_24797745 (Smarty_Internal_Template $_smarty_tpl) {
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
            margin-bottom: 100px;
        }

        /* Add a gray background color and some padding to the footer */
        footer {
            background-color: brown;
            padding: 25px;
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
                <a class="navbar-brand" href="./index">Home</a>
                <span class="navbar-brand" id='username'>Username</span>
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
                    <li><a href="#"><span class="glyphicon glyphicon glyphicon-log-out"></span> Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="jumbotron" id='headerimg'>
        <div class="container text-center"></div>
    </div>
    <div class="container">
        <h3>熱門商品</h3>
        <div class="row">
            <div class="col-sm-4 goodswall">
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
            <div class="col-sm-4 goodswall">
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
            <div class="col-sm-4 goodswall">
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
        </div>
    </div><br>
    <div class="container">
        <h3>熱門商品</h3>
        <div class="row">
            <div class="col-sm-4 goodswall">
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
            <div class="col-sm-4 goodswall">
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
            <div class="col-sm-4 goodswall">
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
        </div>
    </div><br>

    <div class="container">
        <h3>熱門商品</h3>
        <div class="row">
            <div class="col-sm-4 goodswall">
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
            <div class="col-sm-4 goodswall">
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
            <div class="col-sm-4 goodswall">
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
        </div>
    </div><br>
    <div class="container">
        <h3>熱門商品</h3>
        <div class="row">
            <div class="col-sm-4 goodswall">
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
            <div class="col-sm-4 goodswall">
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
            <div class="col-sm-4 goodswall">
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
        </div>
    </div><br><br>
    <footer class="container-fluid text-center">
        <p>© 2019 Hogan Online shopping Mall</p>
    </footer>

</body>

</html><?php }
}
