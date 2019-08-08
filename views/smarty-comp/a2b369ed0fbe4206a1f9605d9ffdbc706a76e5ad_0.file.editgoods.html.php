<?php
/* Smarty version 3.1.33, created on 2019-08-08 18:48:33
  from 'D:\xampp\htdocs\TaiwanGYM\views\back\goods\editgoods.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d4c526131bfa7_85168070',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a2b369ed0fbe4206a1f9605d9ffdbc706a76e5ad' => 
    array (
      0 => 'D:\\xampp\\htdocs\\TaiwanGYM\\views\\back\\goods\\editgoods.html',
      1 => 1565282912,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d4c526131bfa7_85168070 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <title>join TaiwanGym</title>
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
        /* Remove the navbar's default margin-bottom and rounded borders */
        .navbar {
            margin-bottom: 100px;
            border-radius: 0px;
        }

        /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
        .row.content {
            height: 737px
        }

        /* Set gray background color and 100% height */
        .sidenav {
            padding-top: 20px;
            background-color: white;
            height: 100%;
        }

        /* Set black background color, white text and some padding */
        footer {
            background-color: #444444;
            padding: 25px;
            color: white;
        }

        .errorinfo {
            color: darkred;
            font-weight: bold;
            letter-spacing: 0.5px
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
"><span
                                class="glyphicon glyphicon glyphicon-pencil"></span> Modify</a></li>
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

    <div class="container-fluid text-center">
        <div class="row content">
            <div class="col-sm-2 sidenav"></div>
            <div class="col-sm-8 text-left">
                <form class="form-horizontal" id='addgoodsform' enctype="multipart/form-data">
                    <!-- Single button -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="tnum">商品分類</label>
                        <div class="col-md-4">
                            <select name='tnum' class="form-control">
                                <option selected disabled>Type</option>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['type']->value, 'typeinfo');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['typeinfo']->value) {
?>
                                <?php ob_start();
echo $_smarty_tpl->tpl_vars['typeinfo']->value['tnum'];
$_prefixVariable1 = ob_get_clean();
if ($_smarty_tpl->tpl_vars['goods']->value['tnum'] !== $_prefixVariable1) {?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['typeinfo']->value['tnum'];?>
"><?php echo $_smarty_tpl->tpl_vars['typeinfo']->value['name'];?>
</option>
                                <?php } else { ?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['typeinfo']->value['tnum'];?>
" selected><?php echo $_smarty_tpl->tpl_vars['typeinfo']->value['name'];?>
</option>
                                <?php }?>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </select>
                            <span class="help-block">請選擇此商品所屬分類
                                <span class="errorinfo" id='tnuminfo'></span>
                            </span>
                        </div>
                    </div>
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="name">商品名稱</label>
                        <div class="col-md-4">
                            <input id="name" name="name" type="text" placeholder="" class="form-control input-md"
                                autocomplete="off" value="<?php echo $_smarty_tpl->tpl_vars['goods']->value['name'];?>
">
                            <input type="hidden" id='gid' name='gid' value="<?php echo $_smarty_tpl->tpl_vars['goods']->value['gid'];?>
">
                            <span class="help-block">最多文字限制20
                                <span class="errorinfo" id='nameinfo'></span>
                            </span>
                        </div>
                    </div>

                    <!-- Password input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="price">商品價格</label>
                        <div class="col-md-4">
                            <input id="price" name="price" type="number" placeholder="" class="form-control input-md"
                                autocomplete="off" min='1' value="<?php echo $_smarty_tpl->tpl_vars['goods']->value['price'];?>
">
                            <span class="help-block">請輸入整數價格&nbsp1~100,000
                                <span class="errorinfo" id="priceinfo"></span>
                            </span>
                        </div>
                    </div>

                    <!-- Password input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="stock">上架數量</label>
                        <div class="col-md-4">
                            <input id="stock" name="stock" type="number" placeholder="" class="form-control input-md"
                                autocomplete="off" min='1' value="<?php echo $_smarty_tpl->tpl_vars['goods']->value['stock'];?>
">
                            <span class="help-block">請輸入整數數字&nbsp1~50,000
                                <span class="errorinfo" id="stockinfo"></span>
                            </span>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="uses">商品用途</label>
                        <div class="col-md-4">
                            <input id="uses" name="uses" type="text" placeholder="" class="form-control input-md"
                                autocomplete="off" value="<?php echo $_smarty_tpl->tpl_vars['goods']->value['uses'];?>
">
                            <span class="help-block">請說明商品用途 文字限制30
                                <span class="errorinfo" id="usesinfo"></span>
                            </span>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="material	">商品材質</label>
                        <div class="col-md-4">
                            <input id="material	" name="material" type="text" placeholder=""
                                class="form-control input-md" autocomplete="off" value="<?php echo $_smarty_tpl->tpl_vars['goods']->value['material'];?>
">
                            <span class="help-block">請說明商品用途 文字限制30
                                <span class="errorinfo" id="materialinfo"></span>
                            </span>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="gimg">商品圖片</label>
                        <div class="col-md-4">
                            <input id="gimg" name="gimg" type="file" placeholder="" class="form-control-file"
                                autocomplete="off">
                            <span class="help-block">請上傳商品圖片
                                <span class="errorinfo" id="gimginfo"></span>
                            </span>
                            <!-- <img src="<?php echo URL;
echo $_smarty_tpl->tpl_vars['goods']->value['gimg'];?>
" alt=""> -->
                        </div>
                    </div>

                    <!-- Button (Double) -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="button1id"></label>
                        <div class="col-md-8">
                            <button type="button" id="addgoodssend" class="btn btn-info">Create</button>
                            <a href="<?php echo URL;?>
goodsback/index"><button type="button"
                                    class="btn btn-danger">Cancel</button></a>
                            <span class="errorinfo" id='errorinfo'></span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-2 sidenav"></div>
        </div>
    </div>
    <footer class="container-fluid text-center">
        <p>© 2019 Hogan Online shopping Mall</p>
    </footer>
    <?php echo '<script'; ?>
>
        $("#addgoodssend").click(function () {
            var formData = new FormData($('#addgoodsform')[0]);
            let formname = ['name', 'tnum', 'price', 'stock', 'uses', 'material', 'gimg'];
            for (error of formname) {
                $('#' + error + 'info').html("");
            }

            $.ajax({
                url: "../update",
                type: "POST",
                dataType: "json",
                cache: false,
                processData: false,
                contentType: false,
                data: formData,
                success: function (result) {
                    console.log(result.info);
                    if (result.info === true) {
                        alert(result.message);
                        $(window).attr('location', '<?php echo URL;?>
goodsback/index/index');
                    } else if (result.info === false) {
                        alert(result.message);
                        $(window).attr('location', '<?php echo URL;?>
loginback/index');
                    } else {
                        $('#errorinfo').html("錯誤");
                    }
                }
            });
        })



    <?php echo '</script'; ?>
>
</body>

</html><?php }
}
