<?php
/* Smarty version 3.1.33, created on 2019-08-01 05:15:05
  from 'C:\xampp\htdocs\shopping\views\home\index.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d425939e5a500_18317025',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4c605bc4402c9ad8d0d1fcf7f60e54f093104ace' => 
    array (
      0 => 'C:\\xampp\\htdocs\\shopping\\views\\home\\index.html',
      1 => 1564629303,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d425939e5a500_18317025 (Smarty_Internal_Template $_smarty_tpl) {
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
            background-image: url('http://localhost/shopping/public/homeimg/headerimg/index.png');
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
                    <li><a href="#">跑步</a></li>
                    <li><a href="#">滑雪</a></li>
                    <li><a href="#">拳擊</a></li>
                    <li><a href="#">瑜珈</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="./login.html"><span class="glyphicon glyphicon glyphicon-log-in"></span> Login</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon glyphicon-pencil"></span> Modify</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
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
            <div class="col-sm-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">商品1</div>
                    <div class="panel-body"><img src="" class="img-responsive" style="width:100%" alt="Image"></div>
                    <div class="panel-footer">名稱價格</div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="panel panel-danger">
                    <div class="panel-heading">商品2</div>
                    <div class="panel-body"><img src="" class="img-responsive" style="width:100%" alt="Image"></div>
                    <div class="panel-footer">名稱價格</div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="panel panel-success">
                    <div class="panel-heading">商品3</div>
                    <div class="panel-body"><img src="" class="img-responsive" style="width:100%" alt="Image"></div>
                    <div class="panel-footer">名稱價格</div>
                </div>
            </div>
        </div>
    </div><br>
    <div class="container">
        <h3>熱門商品</h3>
        <div class="row">
            <div class="col-sm-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">商品1</div>
                    <div class="panel-body"><img src="" class="img-responsive" style="width:100%" alt="Image"></div>
                    <div class="panel-footer">名稱價格</div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="panel panel-danger">
                    <div class="panel-heading">商品2</div>
                    <div class="panel-body"><img src="" class="img-responsive" style="width:100%" alt="Image"></div>
                    <div class="panel-footer">名稱價格</div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="panel panel-success">
                    <div class="panel-heading">商品3</div>
                    <div class="panel-body"><img src="" class="img-responsive" style="width:100%" alt="Image"></div>
                    <div class="panel-footer">名稱價格</div>
                </div>
            </div>
        </div>
    </div><br>

    <div class="container">
        <h3>熱門商品</h3>
        <div class="row">
            <div class="col-sm-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">商品1</div>
                    <div class="panel-body"><img src="" class="img-responsive" style="width:100%" alt="Image"></div>
                    <div class="panel-footer">名稱價格</div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="panel panel-danger">
                    <div class="panel-heading">商品2</div>
                    <div class="panel-body"><img src="" class="img-responsive" style="width:100%" alt="Image"></div>
                    <div class="panel-footer">名稱價格</div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="panel panel-success">
                    <div class="panel-heading">商品3</div>
                    <div class="panel-body"><img src="" class="img-responsive" style="width:100%" alt="Image"></div>
                    <div class="panel-footer">名稱價格</div>
                </div>
            </div>
        </div>
    </div><br>
    <div class="container">
        <h3>熱門商品</h3>
        <div class="row">
            <div class="col-sm-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">商品4</div>
                    <div class="panel-body"><img src="" class="img-responsive" style="width:100%" alt="Image"></div>
                    <div class="panel-footer">名稱價格</div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">商品5</div>
                    <div class="panel-body"><img src="" class="img-responsive" style="width:100%" alt="Image"></div>
                    <div class="panel-footer">名稱價格</div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">商品6</div>
                    <div class="panel-body"><img src="" class="img-responsive" style="width:100%" alt="Image"></div>
                    <div class="panel-footer">名稱價格</div>
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
