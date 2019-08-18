<?php
/* Smarty version 3.1.33, created on 2019-08-18 23:30:06
  from 'D:\xampp\htdocs\TaiwanGYM\views\back\orders\orders.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d596efe648e47_65273461',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '29f579936f0044b7492026702eb6d7e6384f8ec5' => 
    array (
      0 => 'D:\\xampp\\htdocs\\TaiwanGYM\\views\\back\\orders\\orders.html',
      1 => 1566137852,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:\\xampp\\htdocs\\TaiwanGym\\views\\back\\header.html' => 1,
  ),
),false)) {
function content_5d596efe648e47_65273461 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <title>訂單管理</title>
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
            margin-bottom: 0px;
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

        .modal-header,
        h4,
        .close {
            background-color: #5cb85c;
            color: white !important;
            text-align: center;
            font-size: 30px;
        }

        .modal-footer {
            background-color: #f9f9f9;
        }

        .errorinfo {
            color: darkred;
            font-weight: bolder;
            text-align: center
        }

        .page {
            text-align: center;
        }

        #breadcrumbs {
            background-color: white;
            font-size: 18px;
        }

        td {
            height: 30px;
        }
    </style>
</head>

<body>
    <?php $_smarty_tpl->_subTemplateRender('file:\xampp\htdocs\TaiwanGym\views\back\header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <div class="jumbotron" id='headerimg'>
        <div class="container text-center"></div>
    </div>
    <div class="container-fluid">
        <div class="row content">
            <ol class="breadcrumb glyphicon glyphicon-home" id='breadcrumbs'>
                <li><a href="<?php echo URL;?>
indexback/index">Home</a></li>
                <li>訂單管理</li>
            </ol>
            <div class="container-fluid">
                <h2>訂單管理</h2>
                <form class="form-inline" actuin="<?php echo URL;?>
/ordersback/index" method="get">
                    <input type="text" class="form-control" name='search' id="search" placeholder="搜尋訂單編號"
                        value="<?php echo $_smarty_tpl->tpl_vars['searchdata']->value;?>
">
                    <button type="submit" id="searchsend" class="btn btn-info">search</button>
                </form>
            </div>
            <div class="container-fluid">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>訂單編號</th>
                            <th>總件數</th>
                            <th>總價格</th>
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
orderback/index">全部</a></li>
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ostatus']->value, 'ostatusInfo');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['ostatusInfo']->value) {
?>
                                        <li>
                                            <a
                                                href="<?php echo URL;?>
orderback/index?status=<?php echo $_smarty_tpl->tpl_vars['ostatusInfo']->value['onum'];?>
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
                            <td id="<?php echo $_smarty_tpl->tpl_vars['ordersinfo']->value['onum'];?>
"><?php echo $_smarty_tpl->tpl_vars['ordersinfo']->value['statusName'];?>
</td>
                            <td>
                                <?php if ($_smarty_tpl->tpl_vars['ordersinfo']->value['status'] !== 3) {?>
                                <button type="button" class="btn btn-info status"
                                    data-status="<?php echo $_smarty_tpl->tpl_vars['ordersinfo']->value['status'];?>
"
                                    data-onum="<?php echo $_smarty_tpl->tpl_vars['ordersinfo']->value['onum'];?>
">edit</button>
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
        </div>
    </div>

    <!-- 模態框 -->
    <div class="container">
        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 style="color:red;"></span>正在修改訂單:<span id='onum'></span> </h4>
                    </div>
                    <div class="modal-body">
                        <form role="form">
                            <div class="form-group">
                                <select id='status' name='status' class="form-control">
                                    <option disabled>狀態</option>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ostatus']->value, 'ostatusInfo');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['ostatusInfo']->value) {
?>
                                    <option class='options' value="<?php echo $_smarty_tpl->tpl_vars['ostatusInfo']->value['onum'];?>
"><?php echo $_smarty_tpl->tpl_vars['ostatusInfo']->value['name'];?>

                                    </option>
                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                </select>
                            </div>
                            <p class='errorinfo' id='errorinfo'>&nbsp</p>
                            <button type="button" id='editstatus'
                                class="btn btn-default btn-success btn-block">Confirm</button>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-default btn-default pull-left" data-dismiss="modal"><span
                                class="glyphicon glyphicon-remove"></span>Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 模態框 -->
    <div class="container-fluid page">
        <span class='pull-center'>
            <ul class="pagination">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pagenum']->value, 'pnum');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['pnum']->value) {
?>
                <?php if ($_smarty_tpl->tpl_vars['pnum']->value !== $_smarty_tpl->tpl_vars['nowpage']->value) {?>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
page=<?php echo $_smarty_tpl->tpl_vars['pnum']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['pnum']->value;?>
</a></li>
                <?php } else { ?>
                <li class='active'><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
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

</html>
<?php echo '<script'; ?>
>

    let onum = null;
    let editbtn = null;
    $().ready(function () {
        $(".status").click(function () {
            onum = $(this).attr('data-onum');
            let status = $(this).attr('data-status');
            let opeion = $('.options');
            $('#onum').html(onum);
            editbtn = this;
            for (let i = 0; i < opeion.length; i++) {
                if ($(opeion[i]).val() === status) {
                    $(opeion[i]).attr('selected', true);
                    $(opeion[i]).attr('disabled', true);
                } else {
                    $(opeion[i]).attr('selected', false);
                    $(opeion[i]).attr('disabled', false);
                }
            }
            $("#myModal").modal();
        });
    });

    $('#editstatus').click(function () {
        let status = $("#status").val();
        if (isNaN(parseInt(status))) {
            alert("無效的修改");
            return false;
        }
        $.ajax({
            url: "editstatus",
            type: "PUT",
            dataType: "json",
            data: {
                'onum': onum,
                'status': status,
            },
            success: function (result) {
                if (result['info'] === true) {
                    $("#myModal").modal('hide');
                    $('#errorinfo').html("&nbsp");
                    $("#" + onum).html(result['statusname']);
                    if (result['message'] === '3') {
                        $(editbtn).remove();
                    } else {
                        let opeion = $('.options');
                        for (let i = 0; i < opeion.length; i++) {
                            if ($(opeion[i]).val() === result['message']) {
                                $(opeion[i]).attr('selected', true);
                                $(opeion[i]).attr('disabled', true);
                                $(editbtn).attr('data-status', result['message']);
                            } else {
                                $(opeion[i]).attr('selected', false);
                                $(opeion[i]).attr('disabled', false);
                            }
                        }
                    }

                } else if (result['info'] === false) {
                    if (result['message'] !== '') {
                        alert(result['message'])
                    }
                    if (result['redirect'] !== "") {
                        $(window).attr('location', result['redirect']);
                    }
                } else {
                    alert('操作失敗')
                }
            }
        });
    })
<?php echo '</script'; ?>
><?php }
}
