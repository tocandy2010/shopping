<?php
/* Smarty version 3.1.33, created on 2019-08-18 23:30:06
  from 'D:\xampp\htdocs\TaiwanGYM\views\back\customer\customer.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d596efebb1304_78548006',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '12fb3d66bbd58a7a32197c69b2dd0cdcea02f56b' => 
    array (
      0 => 'D:\\xampp\\htdocs\\TaiwanGYM\\views\\back\\customer\\customer.html',
      1 => 1566137796,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:\\xampp\\htdocs\\TaiwanGym\\views\\back\\header.html' => 1,
  ),
),false)) {
function content_5d596efebb1304_78548006 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <title>會員管理</title>
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

            td {
                width: auto
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
            width: 30%
        }

        .edit {
            width: 20%
        }

        #breadcrumbs {
            background-color: white;
            font-size: 18px;
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
                <li>會員管理</li>
            </ol>
            <div class="container-fluid">
                <p>
                    <h2>會員管理</h2>
                </p>
                <p>&nbsp</p>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>會員Email</th>
                            <th>會員姓名</th>
                            <th>手機號碼</th>
                            <th>註冊地址</th>
                            <th>註冊時間</th>
                            <th>會員狀態</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['customer']->value, 'customerinfo');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['customerinfo']->value) {
?>
                        <tr>
                            <td><span class='eamil'><?php echo $_smarty_tpl->tpl_vars['customerinfo']->value['email'];?>
<span></td>
                            <td><?php echo $_smarty_tpl->tpl_vars['customerinfo']->value['name'];?>
</span></td>
                            <td><?php echo $_smarty_tpl->tpl_vars['customerinfo']->value['phone'];?>
</td>
                            <td class='address'><?php echo $_smarty_tpl->tpl_vars['customerinfo']->value['address'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['customerinfo']->value['regTime'];?>
</td>
                            <td class='edit'>
                                <?php if ($_smarty_tpl->tpl_vars['customerinfo']->value['released'] === '1') {?>
                                <button type="button" class="btn btn-success released" data-value='1'
                                    data-gid="<?php echo $_smarty_tpl->tpl_vars['customerinfo']->value['cid'];?>
">Open</button>
                                <?php } else { ?>
                                <button type="button" class="btn btn-danger released" data-value='0'
                                    data-gid="<?php echo $_smarty_tpl->tpl_vars['customerinfo']->value['cid'];?>
">Lock</button>
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
        let cid = $(this).attr('data-gid');
        let _this = this;
        $.ajax({
            url: 'setCustonerStatus',
            dataType: "json",
            type: 'PUT',
            data: {
                'cid': cid,
                'status': status,
            },
            success: function (result) {
                if (result['info'] === false) {
                    if (result['message'] !== '') {
                        alert(result['message'])
                    }
                    if (result['redirect'] !== '') {
                        $(window).attr('location', result['redirect']);
                    }
                } else if (result['info'] === true) {
                    if (result['status'] !== 1) {
                        $(_this).attr('class', "btn btn-danger released");
                        $(_this).attr('data-value', "0");
                        $(_this).html("Lock");
                    } else {
                        $(_this).attr('class', "btn btn-success released");
                        $(_this).attr('data-value', "1");
                        $(_this).html("Open");
                    }
                }


                // if (result.setstatus === 'fail') {
                //     alert("操作失敗");
                // } else if (result.setstatus === 'notlogin') {
                //     alert("請先登入");
                //     $(window).attr('location', '<?php echo URL;?>
loginback/index');
                // } else if (result.setstatus === 'success') {
                //     if (status === '1') {
                //         $(_this).attr('class', "btn btn-danger released");
                //         $(_this).attr('data-value', "0");
                //         $(_this).html("Hide");
                //     } else {
                //         $(_this).attr('class', "btn btn-success released");
                //         $(_this).attr('data-value', "1");
                //         $(_this).html("Open");
                //     }
                // }
            }
        });
    });

<?php echo '</script'; ?>
><?php }
}
