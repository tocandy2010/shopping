<?php
/* Smarty version 3.1.33, created on 2019-08-15 17:13:58
  from 'C:\xampp\htdocs\TaiwanGYM\views\home\orders\myorders.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d552256ad0e60_53161970',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '60e5fc6dac335c8bd869f988d17eec02d58cbcd6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TaiwanGYM\\views\\home\\orders\\myorders.html',
      1 => 1565860437,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d552256ad0e60_53161970 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <title>Myorder</title>
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
            height: 632px
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

        .eamil {
            text-align: left;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }

        .address {
            width: 40%
        }

        .checkorder {
            font-size: 15px;
        }

        .page {
            text-align: center;
        }

        #breadcrumbs {
            background-color: white;
            font-size: 18px;
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

    <div class="jumbotron" id='headerimg'>
        <div class="container text-center"></div>
    </div>

    <div class="container-fluid">
        <div class="row content">
            <div class="col-sm-2 sidenav"></div>
            <div class="col-sm-8 text-left">
                <div class="container-fluid">

                    <div class="container">
                        <ol class="breadcrumb glyphicon glyphicon-home" id='breadcrumbs'>
                            <li><a href="<?php echo URL;?>
index/index">Home</a></li>
                            <li>Myorder</li>
                            <!-- <li class="active">goodsname</li> -->
                        </ol>
                        <h2>我的訂單紀錄</h2>
                        <form class="form-inline" actuin="<?php echo URL;?>
/orders/index" method="get">
                            <input type="text" class="form-control" name='search' id="search" placeholder="搜尋訂單編號"
                                value="<?php echo $_smarty_tpl->tpl_vars['searchdata']->value;?>
">
                            <button type="submit" id="searchsend" class="btn btn-info">search</button>
                        </form>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>訂單編號</th>
                                <th>購買商品總件數</th>
                                <th>商品</th>
                                <th>收件地址</th>
                                <th>成立時間</th>
                                <form action="">
                                    <td class="dropdown">
                                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            狀態
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                            <li><a href="<?php echo URL;?>
order/index">全部</a></li>
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ostatus']->value, 'ostatusInfo');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['ostatusInfo']->value) {
?>
                                            <li>
                                                <a
                                                    href="<?php echo URL;?>
order/index?status=<?php echo $_smarty_tpl->tpl_vars['ostatusInfo']->value['onum'];?>
"><?php echo $_smarty_tpl->tpl_vars['ostatusInfo']->value['name'];?>
</a>
                                            </li>
                                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                        </ul>
                                    </td>
                                </form>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['orders']->value, 'ordersinfo');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['ordersinfo']->value) {
?>
                            <tr>
                                <td class='eamil'><?php echo $_smarty_tpl->tpl_vars['ordersinfo']->value['onum'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['ordersinfo']->value['buynum'];?>
</td>
                                <td class="checkorder"><a href="<?php echo URL;?>
order/showGoods/<?php echo $_smarty_tpl->tpl_vars['ordersinfo']->value['onum'];?>
">訂單商品</a>
                                </td>
                                <td class='address'><?php echo $_smarty_tpl->tpl_vars['ordersinfo']->value['address'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['ordersinfo']->value['createTime'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['ordersinfo']->value['statusname'];?>
</td>
                            </tr>
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-sm-2 sidenav"></div>
        </div>
    </div>
    <div class="container-fluid page">
        <span class='pull-center'>
            <ul class="pagination">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pagenum']->value, 'pnum');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['pnum']->value) {
?>
                <?php if ($_smarty_tpl->tpl_vars['pnum']->value === $_smarty_tpl->tpl_vars['nowpage']->value) {?>
                <li class='active'><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
page=<?php echo $_smarty_tpl->tpl_vars['pnum']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['pnum']->value;?>
</a></li>
                <?php } else { ?>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
page=<?php echo $_smarty_tpl->tpl_vars['pnum']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['pnum']->value;?>
</a></li>
                <?php }?>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </ul>
        </span>
    </div>
    <footer class="container-fluid text-center">
        <p>© 2019 Hogan Online shopping Mall</p>
    </footer>
</body>

</html><?php }
}
