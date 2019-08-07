<?php
/* Smarty version 3.1.33, created on 2019-08-08 00:40:41
  from 'D:\xampp\htdocs\TaiwanGYM\views\back\orders\orders.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d4aff097229c5_91045405',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '29f579936f0044b7492026702eb6d7e6384f8ec5' => 
    array (
      0 => 'D:\\xampp\\htdocs\\TaiwanGYM\\views\\back\\orders\\orders.html',
      1 => 1565195999,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d4aff097229c5_91045405 (Smarty_Internal_Template $_smarty_tpl) {
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
            height: 711px
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
                    <?php if ((($tmp = @$_smarty_tpl->tpl_vars['loginflag']->value)===null||$tmp==='' ? false : $tmp)) {?>
                    <li><a href="<?php echo URL;?>
loginback/edit/<?php echo $_smarty_tpl->tpl_vars['userinfo']->value['aid'];?>
"><span class="glyphicon glyphicon glyphicon-pencil"></span> Modify</a></li>
                    <li><a href="<?php echo URL;?>
loginback/logout"><span class="glyphicon glyphicon glyphicon-log-out"></span>
                            Logout</a></li>
                    <?php } else { ?>
                    <li><a href="<?php echo URL;?>
loginback/index"><span class="glyphicon glyphicon glyphicon-log-in"></span>
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
                    <p>
                        <h2>訂單管理</h2>
                    </p>
                    <p>&nbsp</p>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>訂單編號</th>
                                <th>商品總件數</th>
                                <th>商品總價格</th>
                                <th>商品</th>
                                <th>收件地址</th>
                                <th>成立時間</th>
                                <th>訂單狀態</th>
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
                                <td><?php echo $_smarty_tpl->tpl_vars['ordersinfo']->value['total'];?>
</td>
                                <td class="checkorder"><a
                                        href="<?php echo URL;?>
orderback/showGoods/<?php echo $_smarty_tpl->tpl_vars['ordersinfo']->value['onum'];?>
">查看訂單商品</a></td>
                                <td class='address'><?php echo $_smarty_tpl->tpl_vars['ordersinfo']->value['address'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['ordersinfo']->value['createTime'];?>
</td>
                                <td>訂單成立</td>
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
    <footer class="container-fluid text-center">
        <p>© 2019 Hogan Online shopping Mall</p>
    </footer>
</body>

</html>

<?php echo '<script'; ?>
>

<?php echo '</script'; ?>
><?php }
}
