<?php
/* Smarty version 3.1.33, created on 2019-08-18 16:24:51
  from 'D:\xampp\htdocs\TaiwanGYM\views\home\index.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d595fb3a87dc5_11955051',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2c1c3fb3d0e8c4a780393b1b1dc0e218660554a5' => 
    array (
      0 => 'D:\\xampp\\htdocs\\TaiwanGYM\\views\\home\\index.html',
      1 => 1566138288,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:\\xampp\\htdocs\\TaiwanGym\\views\\home\\header.html' => 1,
  ),
),false)) {
function content_5d595fb3a87dc5_11955051 (Smarty_Internal_Template $_smarty_tpl) {
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
            margin-bottom: 0px;
        }

        /* Add a gray background color and some padding to the footer */
        footer {
            background-color: #444444;
            padding: 25px;
            color: white;
        }

        #headerimg {
            background-image: url('<?php echo URL;?>
public/homeimg/headerimg/index.png');
            background-repeat: no-repeat;
            background-size: 100% 100%;
            height: 837px;
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

        .toggleable {
            font-size: 18px;
            height: 40px;
            line-height: 40px;
            width: 377px;
            text-align: center;
            line-height: 14px;
            background-color: #444444;
            color: white;
            font-family: Microsoft JhengHei;
        }

        .showtab {
            border: 1px solid black;
            height: 800px;
            margin-bottom: 10%;
            font-size: 25px;
        }

        #checkcookie {
            text-align: center;
        }
    </style>
</head>

<body>
<?php $_smarty_tpl->_subTemplateRender('file:\xampp\htdocs\TaiwanGym\views\home\header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <div class="jumbotron" id='headerimg'>
        <div class="container text-center"></div>
        <div id='checkcookie'></div>
    </div>
    <!-- <div class="container">
        <ul class="nav nav-pills">
            <li class="active" class='toggleable'><a data-toggle="pill" href="#home" class='toggleable'>熱銷商品</a></li>
            <li><a data-toggle="pill" href="#menu1" class='toggleable'>專屬推薦</a></li>
            <li><a data-toggle="pill" href="#menu2" class='toggleable'>夏日運動</a></li>
        </ul>

        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
                <h3></h3>
                <div class='showtab'>熱銷商品</div>
            </div>
            <div id="menu1" class="tab-pane fade">
                <h3></h3>
                <div class='showtab'>專屬推薦</div>
            </div>
            <div id="menu2" class="tab-pane fade">
                <h3></h3>
                <div class='showtab'>夏日運動</div>
            </div>
        </div>
    </div> -->
    <footer class="container-fluid text-center">
        <p>© 2019 Hogan Online shopping Mall</p>
    </footer>

</body>

</html>

<?php echo '<script'; ?>
>

    $().ready(function () {
        let checkcookie = $("#checkcookie");
        if (navigator.cookieEnabled == true) {
            checkcookie.html();
            checkcookie.attr('class', "");
        }
        else {
            checkcookie.attr('class', "alert alert-danger");
            checkcookie.html("偵測到您尚未開啟<strong>COOKIE</strong>這將導致您無法使用購物車");

        }
    })

<?php echo '</script'; ?>
><?php }
}
