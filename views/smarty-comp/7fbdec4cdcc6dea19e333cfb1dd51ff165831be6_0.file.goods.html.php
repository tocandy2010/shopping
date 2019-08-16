<?php
/* Smarty version 3.1.33, created on 2019-08-16 13:39:00
  from 'C:\xampp\htdocs\TaiwanGYM\views\back\goods\goods.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d56417434bc32_76127108',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7fbdec4cdcc6dea19e333cfb1dd51ff165831be6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TaiwanGYM\\views\\back\\goods\\goods.html',
      1 => 1565933939,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d56417434bc32_76127108 (Smarty_Internal_Template $_smarty_tpl) {
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

        .goodsimg {
            max-width: 100%;
            margin: auto;
        }

        td {
            width: 5%;
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
            left: -8%;
        }

        .add {
            position: absolute;
            top: 3px;
            left: 89%
        }

        #newbtn {
            position: relative;
            left: 70%
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

    <div class="jumbotron" id='headerimg'>
        <div class="container text-center"></div>
    </div>

    <div class="container-fluid">
        <div class="row content">
            <!-- <div class="col-sm-2 sidenav"></div> -->
            <!-- <div class="col-sm-8 text-left"> -->
                <ol class="breadcrumb glyphicon glyphicon-home" id='breadcrumbs'>
                    <li><a href="<?php echo URL;?>
indexback/index">Home</a></li>
                    <li>商品管理</li>
                </ol>
                <div class="container-fluid">
                    <p>
                        <h2>商品管理</h2>
                        <a href="<?php echo URL;?>
goodsback/create" id='newbtn'>
                            <button type="button"
                                class="btn btn-primary btn-lg glyphicon glyphicon-plus">&nbspNew</button>
                        </a>
                    </p>
                    <p>&nbsp</p>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>商品圖片</th>
                                <th>商品名稱</th>
                                <th>單價</th>
                                <th>庫存量</th>
                                <th>上架時間</th>
                                <th>商品狀態</th>
                            </tr>
                        </thead>
                        <div class="dropdown">
                            <span>分類篩選</span>
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <?php echo $_smarty_tpl->tpl_vars['typename']->value;?>

                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['gtype']->value, 'gtypeInfo');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['gtypeInfo']->value) {
?>
                                <li><a
                                        href="<?php echo URL;?>
goodsback/index?type=<?php echo $_smarty_tpl->tpl_vars['gtypeInfo']->value['tnum'];?>
"><?php echo $_smarty_tpl->tpl_vars['gtypeInfo']->value['name'];?>
</a>
                                </li>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </ul>
                        </div>
                        <tbody>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['goods']->value, 'goodsinfo');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['goodsinfo']->value) {
?>
                            <tr>
                                <td>
                                    <img class="img-responsive" src="<?php echo URL;
echo $_smarty_tpl->tpl_vars['goodsinfo']->value['gimg'];?>
"
                                        style="max-width: 30%;margin:auto;" alt="Cinque Terre">
                                </td>
                                <td><span class='goodsname'><?php echo $_smarty_tpl->tpl_vars['goodsinfo']->value['name'];?>
<span></td>
                                <td>NT$<span><?php echo $_smarty_tpl->tpl_vars['goodsinfo']->value['price'];?>
</span></td>
                                <td><?php echo $_smarty_tpl->tpl_vars['goodsinfo']->value['stock'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['goodsinfo']->value['addTime'];?>
</td>
                                <td data-gid="1" class='edit'>
                                    <a href="<?php echo URL;?>
goodsback/edit/<?php echo $_smarty_tpl->tpl_vars['goodsinfo']->value['gid'];?>
"><button type="button"
                                            class="btn btn-info">Edit</button></a>
                                    <?php if ($_smarty_tpl->tpl_vars['goodsinfo']->value['released'] === '1') {?>
                                    <button type="button" class="btn btn-success released" data-value='1'
                                        data-gid="<?php echo $_smarty_tpl->tpl_vars['goodsinfo']->value['gid'];?>
">Open</button>
                                    <?php } else { ?>
                                    <button type="button" class="btn btn-danger released" data-value='0'
                                        data-gid="<?php echo $_smarty_tpl->tpl_vars['goodsinfo']->value['gid'];?>
">Close</button>
                                    <?php }?>
                                </td>
                            </tr>
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </tbody>
                    </table>
                </div>
            <!-- </div> -->
            <!-- <div class="col-sm-2 sidenav"></div> -->
        </div>
    </div>
    <footer class="container-fluid text-center">
        <p>© 2019 Hogan Online shopping Mall</p>
    </footer>
</body>

</html>

<?php echo '<script'; ?>
>

    //變更商品狀態商品
    $('.released').click(function () {
        let status = $(this).attr('data-value');
        let gid = $(this).attr('data-gid');
        let _this = this;
        $.ajax({
            url: 'setGoodStatus',
            dataType: "json",
            type: 'PUT',
            data: {
                'gid': gid,
                'status': status,
            },
            success: function (result) {
                if (result['info'] === true) {
                    if (result['status'] !== 1) {
                        $(_this).attr('class', "btn btn-danger released");
                        $(_this).attr('data-value', "0");
                        $(_this).html("Close");
                    } else {
                        $(_this).attr('class', "btn btn-success released");
                        $(_this).attr('data-value', "1");
                        $(_this).html("Open");
                    }
                } else if (result['info'] === false) {
                    if (result['message'] !== '') {
                        alert(result['message']);
                    }
                    if (result['redirect'] !== "") {
                        $(window).attr('location', result['redirect']);
                    }
                } else {
                    alert('操作失敗')
                }
            }
        });
    });

<?php echo '</script'; ?>
><?php }
}
