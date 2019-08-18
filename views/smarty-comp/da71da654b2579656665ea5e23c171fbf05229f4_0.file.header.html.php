<?php
/* Smarty version 3.1.33, created on 2019-08-18 17:28:44
  from 'D:\xampp\htdocs\TaiwanGym\views\back\header.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d596eac5bcaa2_10478351',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'da71da654b2579656665ea5e23c171fbf05229f4' => 
    array (
      0 => 'D:\\xampp\\htdocs\\TaiwanGym\\views\\back\\header.html',
      1 => 1566142104,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d596eac5bcaa2_10478351 (Smarty_Internal_Template $_smarty_tpl) {
?><nav class="navbar navbar-inverse">
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
adminmodify/edit/<?php echo $_smarty_tpl->tpl_vars['userinfo']->value['aid'];?>
">
                        <span class="glyphicon glyphicon glyphicon-pencil"></span> Modify</a></li>
                <li><a href="<?php echo URL;?>
loginback/logout"><span class="glyphicon glyphicon glyphicon-log-in"></span>
                        Logout</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">

        </div>
    </div>
</nav><?php }
}
