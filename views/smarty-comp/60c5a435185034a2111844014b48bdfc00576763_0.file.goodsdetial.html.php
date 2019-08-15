<?php
/* Smarty version 3.1.33, created on 2019-08-15 17:55:13
  from 'D:\xampp\htdocs\TaiwanGYM\views\home\goods\goodsdetial.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d558061726692_53320611',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '60c5a435185034a2111844014b48bdfc00576763' => 
    array (
      0 => 'D:\\xampp\\htdocs\\TaiwanGYM\\views\\home\\goods\\goodsdetial.html',
      1 => 1565884185,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d558061726692_53320611 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <title>goodsdetail</title>
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
            height: 900px
        }

        /* Set gray background color and 100% height */
        .sidenav {
            padding-top: 20px;
            background-color: white;
            height: 100%;
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
            margin-top: 20px;
        }

        .goodsimg {
            position: relative;
            left: 20%;
            width: 50%;
            height: auto;
        }

        .goodsname {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            letter-spacing: 0.8px;
            font: bold 20px Microsoft JhengHei;
            color: #202528;
            padding-top: 25px;
        }

        .goodsprice {
            width: 97%;
            font-family: fantasy;
            font-size: 20px;
            color: black;
            letter-spacing: 1px;
            padding-top: 10px;
            padding-bottom: 10px;
            text-align: right;

        }

        #checkcookie {
            text-align: center;
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
cart/index"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
                    <?php if ((($tmp = @$_smarty_tpl->tpl_vars['loginflag']->value)===null||$tmp==='' ? false : $tmp)) {?>
                    <li><a href="<?php echo URL;?>
login/editinfo"><span class="glyphicon glyphicon glyphicon-pencil"></span> Modify</a></li>
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

    <div class="container-fluid" style="margin-bottom: 20px">
        <div class="row content">
            <div class="col-sm-2 sidenav"></div>
            <div class="col-sm-8 text-left">
                <ol class="breadcrumb glyphicon glyphicon-home" id='breadcrumbs'>
                    <li><a href="<?php echo URL;?>
index/index">Home</a></li>
                    <li><a href="<?php echo URL;?>
goods/index/<?php echo $_smarty_tpl->tpl_vars['typename']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['typename']->value;?>
</a></li>
                    <li><?php echo $_smarty_tpl->tpl_vars['goodsinfo']->value['name'];?>
</li>
                    <!-- <li class="active">goodsname</li> -->
                </ol>
                <div id='checkcookie'></div>
                <div class="container-fluid">
                    <div class="row" style="margin-top: 40px">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="container-fluid">
                                    <div class="row-content">
                                        <div class="col-sm-6">
                                            <img src="<?php echo URL;
echo $_smarty_tpl->tpl_vars['goodsinfo']->value['gimg'];?>
" class=" goodsimg"
                                                alt="Cinque Terre">
                                        </div>
                                        <div class="col-sm-5 panel panel-default">
                                            <p class="goodsname">商品名稱&nbsp:&nbsp<span><?php echo $_smarty_tpl->tpl_vars['goodsinfo']->value['name'];?>
</span></p>
                                            <p class="goodsprice">NT$<span><?php echo $_smarty_tpl->tpl_vars['goodsinfo']->value['price'];?>
</span></p>
                                            <p class="goodsprice">庫存數量&nbsp:&nbsp<span><?php echo $_smarty_tpl->tpl_vars['goodsinfo']->value['stock'];?>
</span>
                                            </p>
                                            <p>
                                                <?php if (0 >= $_smarty_tpl->tpl_vars['goodsinfo']->value['stock']) {?>
                                                <td><button type="button" class="btn btn-danger btn-block" disabled=true
                                                    data-gid="<?php echo $_smarty_tpl->tpl_vars['goodsinfo']->value['gid'];?>
" id="addcart">缺貨中</button>
                                                </td>
                                                <?php } elseif ($_smarty_tpl->tpl_vars['incartflag']->value) {?>
                                                <td><button type="button" class="btn btn-danger btn-block" disabled=true
                                                        data-gid="<?php echo $_smarty_tpl->tpl_vars['goodsinfo']->value['gid'];?>
" id="addcart">已在入購物車中</button>
                                                </td>
                                                <?php } else { ?>
                                                <td><button type="button" class="btn btn-danger  btn-block"
                                                        data-gid="<?php echo $_smarty_tpl->tpl_vars['goodsinfo']->value['gid'];?>
" id="addcart">加入購物車</button>
                                                </td>
                                                <?php }?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <h3>商品資訊</h3>
                                <div class="content">
                                    <ul>
                                        <li>
                                            <label>運動範圍 : </label>
                                            <span class="value"><?php echo $_smarty_tpl->tpl_vars['goodsinfo']->value['uses'];?>
</span>
                                        </li>
                                        <li>
                                            <label>材質 : </label>
                                            <span class="value"><?php echo $_smarty_tpl->tpl_vars['goodsinfo']->value['material'];?>
</span>
                                        </li>
                                    </ul>
                                </div>
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

    $('#addcart').click(function () {
        let gid = $(this).attr("data-gid");
        if (gid < 1) {
            alert('新增購物車失敗');
            return false;
        }

        $.ajax({
            url: '../add',
            dataType: "json",
            type: 'POST',
            data: {
                'gid': gid,
            },
            success: function (result) {
                if (result.addinfo === "success") {
                    $("#addcart").attr('disabled', true);
                    $("#addcart").html("已加入購物車");
                } else {
                    alert("新增購物車失敗");
                }
            }
        });
    })

<?php echo '</script'; ?>
><?php }
}
