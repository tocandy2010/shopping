<?php
/* Smarty version 3.1.33, created on 2019-08-18 17:23:35
  from 'D:\xampp\htdocs\TaiwanGym\views\home\header.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d596d775e1207_30093896',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1121b9ba7ec093f221eeb0cd38d364e63bb11d1f' => 
    array (
      0 => 'D:\\xampp\\htdocs\\TaiwanGym\\views\\home\\header.html',
      1 => 1566141794,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d596d775e1207_30093896 (Smarty_Internal_Template $_smarty_tpl) {
?><nav class="navbar navbar-inverse">
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
                <?php if ($_smarty_tpl->tpl_vars['loginflag']->value) {?>
                <li><a href="#"><span class="glyphicon glyphicon-piggy-bank"></span>
                        Addvalue</a></li>
                <li><a href="<?php echo URL;?>
customerModify/editinfo"><span class="glyphicon glyphicon glyphicon-pencil"></span>
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
</nav><?php }
}
