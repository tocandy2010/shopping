<?php
/* Smarty version 3.1.33, created on 2019-08-02 11:45:31
  from 'C:\xampp\htdocs\TaiwanGYM\views\home\goods\cart.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d44063ba54b51_46800034',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '21db822911640099cfa7b9d269bd2250cd03c75b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TaiwanGYM\\views\\home\\goods\\cart.html',
      1 => 1564739118,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d44063ba54b51_46800034 (Smarty_Internal_Template $_smarty_tpl) {
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
            height: 691px
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
            background-color: #444444;
            padding: 25px;
            color: white;
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

        .goodsimg {
            max-width: 100%;
            margin: auto;
        }

        td {
            width: 20%;
        }

        .goodsname {
            text-align: center;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
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
goods/index/jog">Jog</a></li>
                    <li><a href="<?php echo URL;?>
goods/index/ski">Ski</a></li>
                    <li><a href="<?php echo URL;?>
goods/index/boxing">Boxing</a></li>
                    <li><a href="<?php echo URL;?>
goods/index/yoga">Yoga</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
                    <?php if ((($tmp = @$_smarty_tpl->tpl_vars['loginflag']->value)===null||$tmp==='' ? false : $tmp)) {?>
                    <li><a href="#"><span class="glyphicon glyphicon glyphicon-pencil"></span> Modify</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-list-alt"></span>
                        Myorder</a></li>
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

    <div class="container-fluid" style="margin-bottom: 20px">
        <div class="row content" style="margin-left:50px">
            <div class="col-sm-2 sidenav"></div>
            <div class="col-sm-8 text-left">
                <div class="container-fluid">
                    <h2>我的購物車</h2>
                    <p>&nbsp</p>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th></th>
                                <th >商品名稱</th>
                                <th>單價</th>
                                <th>購買數量</th>
                                <th>小計</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <a href="">
                                        <img class="img-responsive" src="<?php echo URL;?>
public/homeimg/goodsimg/test.png"
                                            style="max-width: 30%;margin:auto;" alt="Cinque Terre">
                                    </a>
                                </td>
                                <td><a href='#'><span class='goodsname'>商品名商品名稱商品名稱商品商品名稱商品名稱商品名稱名稱稱商品名稱商品名稱商品名稱商品名稱商品名稱<span></a></td>
                                <td>NT$<span>123</span></td>
                                <td>
                                    <div class="form-group row">
                                        <div class="col-md-7">
                                            <input class="form-control" type="number" min='1' id="example-number-input">
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div>NT$<span>123456</span></div>
                                </td>
                                <td><button type="button" class="btn btn-danger">Delete</button></td>
                            </tr>
                            <tr>
                                <td id='Checkout' colspan="6">
                                        <button type="button" class="btn btn-primary btn-block" id='checkout'>結帳</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
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
