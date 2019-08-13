<?php
/* Smarty version 3.1.33, created on 2019-08-13 18:17:58
  from 'D:\xampp\htdocs\TaiwanGYM\views\home\goods\cart.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d52e2b6bb31e3_74146042',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '311e6a4c0f34b608e7e923c0dfeb9c6548f53378' => 
    array (
      0 => 'D:\\xampp\\htdocs\\TaiwanGYM\\views\\home\\goods\\cart.html',
      1 => 1565713060,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d52e2b6bb31e3_74146042 (Smarty_Internal_Template $_smarty_tpl) {
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

            tr {
                width: auto
            }

        }

        .goodsimg {
            max-width: 100%;
            margin: auto;
        }

        td {
            width: 10%;
        }

        .goodsname {
            text-align: left;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }

        .gless {
            position: absolute;
            top: 3px;
            left: -4%;
        }

        .add {
            position: absolute;
            top: 3px;
            left: 93%
        }

        #checkcookie {
            text-align: center;
        }

        .errorinfo {
            color: darkred;
            font-weight: bold;
            letter-spacing: 0.5px
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
order/index"><span class="glyphicon glyphicon-list-alt"></span>
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

    <div class="container-fluid">
        <div class="row content">
            <div class="col-sm-2 sidenav"></div>
            <div class="col-sm-8 text-left">
                <div class="container-fluid">
                    <h2>我的購物車</h2>
                    <div id='checkcookie'></div>
                    <p>&nbsp</p>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th></th>
                                <th>商品名稱</th>
                                <th>單價</th>
                                <th>購買數量</th>
                                <th>小計</th>
                                <th>取消購買</th>
                                <th>備註</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['goods']->value, 'goodsinfo');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['goodsinfo']->value) {
?>
                            <tr>
                                <td>
                                    <a href="<?php echo URL;?>
goods/create/<?php echo $_smarty_tpl->tpl_vars['goodsinfo']->value['gid'];?>
">
                                        <img class="img-responsive" src="<?php echo URL;
echo $_smarty_tpl->tpl_vars['goodsinfo']->value['gimg'];?>
"
                                            style="max-width: 30%;margin:auto;" alt="Cinque Terre">
                                    </a>
                                </td>
                                <td>
                                    <a href="<?php echo URL;?>
goods/create/<?php echo $_smarty_tpl->tpl_vars['goodsinfo']->value['gid'];?>
">
                                        <span class='goodsname'><?php echo $_smarty_tpl->tpl_vars['goodsinfo']->value['name'];?>
<span>
                                    </a>
                                </td>
                                <td>NT$<span id="price<?php echo $_smarty_tpl->tpl_vars['goodsinfo']->value['gid'];?>
"><?php echo $_smarty_tpl->tpl_vars['goodsinfo']->value['price'];?>
</span></td>
                                <td>
                                    <div class="form-group row">
                                        <div class="col-md-10">
                                            <input class="form-control gnum" type="number"
                                                data-gid="<?php echo $_smarty_tpl->tpl_vars['goodsinfo']->value['gid'];?>
" min='1' max="<?php echo $_smarty_tpl->tpl_vars['goodsinfo']->value['stock'];?>
"
                                                id="gnum<?php echo $_smarty_tpl->tpl_vars['goodsinfo']->value['gid'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['goodsinfo']->value['buynum'];?>
">
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div>NT$<span id="sum<?php echo $_smarty_tpl->tpl_vars['goodsinfo']->value['gid'];?>
"><?php echo $_smarty_tpl->tpl_vars['goodsinfo']->value['sumprice'];?>
</span></div>
                                </td>
                                <td data-gid="<?php echo $_smarty_tpl->tpl_vars['goodsinfo']->value['gid'];?>
" class='del'>
                                    <button type="button" class="btn btn-danger">Delete</button>
                                </td>
                                <td><span class='errorinfo' id="errorstock<?php echo $_smarty_tpl->tpl_vars['goodsinfo']->value['gid'];?>
"></span></td>
                            </tr>
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            <tr>
                                <td id='Checkout' colspan="7">
                                    <?php if ($_smarty_tpl->tpl_vars['checkoutbtn']->value) {?>
                                    <button type="button" class="btn btn-primary btn-block" id='checkout'>結帳</button>
                                    <?php } else { ?>
                                    <button type="button" class="btn btn-primary btn-block" disabled
                                        id='checkout'>結帳</button>
                                    <?php }?>
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

    //計算小記價格
    $('.gnum').change(function () {
        let max = parseInt($(this).attr("max"));
        let gid = $(this).attr("data-gid");
        let gnum = parseInt($(this).val());
        let price = parseInt($("#price" + gid).html());

        if (gnum > max) {
            gnum = max;
            $(this).val(max);
        }

        if (gnum < 1 || isNaN(gnum)) {
            gnum = 1;
            $(this).val(1);
        }
        sum = price * gnum;
        $("#sum" + gid).html(sum);
    })



    //計算小記價格及最大購故數量限制
    $('.gnum').click(function () {
        let max = $(this).attr("data-max");
        let gid = $(this).attr("data-gid");
        let gnum = $(this).val();
        let price = parseInt($("#price" + gid).html());

        if (gnum >= max) {
            gnum = max;
        }
        sum = price * gnum;

        $("#sum" + gid).html(sum);
    })

    //將實際購買數量上傳到購物車內
    $('.gnum').blur(function () {
        let gnum = $(this).val();
        let gid = $(this).attr("data-gid");
        let max = $(this).attr("max");
        if (gnum < 1) {
            $(this).val(1);
            gnum = 1;
        }
        if (parseInt(gnum) > parseInt(max)) {
            $(this).val(parseInt(max));
            gnum = max;
        }
        $.ajax({
            url: 'setCart/' + gid,
            dataType: "json",
            type: 'POST',
            data: {
                'gnum': gnum,
            },
            success: function (result) {
                if (result.setcartinfo === 'fail') {
                    alert("新增失敗");
                } else if (result.setcartinfo) {
                    $('#sum' + gid).html(result.setcartinfo);
                }
            }
        });
    })

    //刪除商品
    $('.del').click(function () {
        let gid = $(this).attr("data-gid");
        let _this = this;
        $.ajax({
            url: 'delete/' + gid,
            dataType: "json",
            type: 'DELETE',
            data: {
                'gid': gid,
            },
            success: function (result) {
                if (result.setcartinfo === 'success') {
                    $(_this).parent().remove();
                } else {
                    alert('刪除失敗');
                }
            }
        });
    })

    //結帳
    $('#checkout').click(function () {
        $.ajax({
            url: 'checkout',
            dataType: "json",
            type: 'POST',
            success: function (result) {
                console.log(result);
                if (result.checkoutinfo === 'fail') {
                    alert('結帳失敗');
                } else if (result.checkoutinfo === 'success') {
                    // $(window).attr('location', '<?php echo URL;?>
/order/index');
                    alert('訂單已成立');
                } else if (result.checkoutinfo === 'notlogin') {
                    alert('請先登入會員');
                    // $(window).attr('location', '<?php echo URL;?>
/login/index');
                } else if (result.checkoutinfo === 'luckbtn') {
                    alert('目前購物車內沒有任何商品');
                    $("#checkout").attr('disabled', true);

                } else if (result.checkoutinfo) {
                    for (id of result.checkoutinfo) {
                        $("#errorstock" + id).html("此商品庫存不足請重新整理頁面");
                    }
                } else {
                    alert("發生錯誤");
                }
            }
        });
    })

<?php echo '</script'; ?>
><?php }
}
