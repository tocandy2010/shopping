<?php
/* Smarty version 3.1.33, created on 2019-08-07 17:31:44
  from 'D:\xampp\htdocs\TaiwanGYM\views\back\goods\newgoods.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d4aeee0144f34_00587510',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '281fe4731621c1f073139feaae95e8602fc5eea8' => 
    array (
      0 => 'D:\\xampp\\htdocs\\TaiwanGYM\\views\\back\\goods\\newgoods.html',
      1 => 1565191607,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d4aeee0144f34_00587510 (Smarty_Internal_Template $_smarty_tpl) {
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
ordersback/index">訂單管理</a></li>
                    <li><a href="<?php echo URL;?>
Customerback/index">會員管理</a></li>
                    <li><a href="<?php echo URL;?>
goodsback/index">商品管理</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?php echo URL;?>
login/index"><span class="glyphicon glyphicon glyphicon-log-in"></span>
                            Login</a></li>
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
                                <option value="<?php echo $_smarty_tpl->tpl_vars['typeinfo']->value['tnum'];?>
"><?php echo $_smarty_tpl->tpl_vars['typeinfo']->value['name'];?>
</option>
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
                                autocomplete="off">
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
                                autocomplete="off" min='1'>
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
                                autocomplete="off" min='1'>
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
                                autocomplete="off">
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
                                class="form-control input-md" autocomplete="off">
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
                url: "add",
                type: "POST",
                dataType: "json",
                cache: false,
                processData: false,
                contentType: false,
                data: formData,
                success: function (result) {
                    console.log(result.addinfo);
                    if (result.addinfo === 'success') {
                        alert("新增商品成功");
                        $(window).attr('location', '<?php echo URL;?>
goodsback/index');
                    } else if (result.addinfo === 'notlogin') {
                        alert("請先登入");
                        $(window).attr('location', '<?php echo URL;?>
loginback/index');
                    } else if (result.addinfo === 'fail') {
                        $('#errorinfo').html("新增商品失敗");
                    } else if (result.addinfo) {
                        for (error of formname) {
                            $('#' + error + 'info').html(result.addinfo[error]);
                        }
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
