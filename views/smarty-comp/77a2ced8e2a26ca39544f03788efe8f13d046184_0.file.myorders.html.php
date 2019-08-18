<?php
/* Smarty version 3.1.33, created on 2019-08-18 22:08:42
  from 'D:\xampp\htdocs\TaiwanGYM\views\home\orders\myorders.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d595bea33e730_66787155',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '77a2ced8e2a26ca39544f03788efe8f13d046184' => 
    array (
      0 => 'D:\\xampp\\htdocs\\TaiwanGYM\\views\\home\\orders\\myorders.html',
      1 => 1566137319,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:\\xampp\\htdocs\\TaiwanGym\\views\\home\\header.html' => 1,
  ),
),false)) {
function content_5d595bea33e730_66787155 (Smarty_Internal_Template $_smarty_tpl) {
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
    <?php $_smarty_tpl->_subTemplateRender('file:\xampp\htdocs\TaiwanGym\views\home\header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <div class="jumbotron" id='headerimg'>
        <div class="container text-center"></div>
    </div>

    <div class="container-fluid">
        <div class="row content">
            <div class="container-fluid">
                <ol class="breadcrumb glyphicon glyphicon-home" id='breadcrumbs'>
                    <li><a href="<?php echo URL;?>
index/index">Home</a></li>
                    <li>Myorder</li>
                </ol>
                <h2>我的訂單紀錄</h2>
                <form class="form-inline" actuin="<?php echo URL;?>
/orders/index" method="get">
                    <input type="text" class="form-control" name='search' id="search" placeholder="搜尋訂單編號"
                        value="<?php echo $_smarty_tpl->tpl_vars['searchdata']->value;?>
">
                    <button type="submit" id="searchsend" class="btn btn-info">search</button>
                </form>
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
