<?php
/* Smarty version 3.1.33, created on 2019-08-14 22:50:38
  from 'D:\xampp\htdocs\TaiwanGYM\views\back\customer\customer.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d541fbe3a1bb5_58765158',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '12fb3d66bbd58a7a32197c69b2dd0cdcea02f56b' => 
    array (
      0 => 'D:\\xampp\\htdocs\\TaiwanGYM\\views\\back\\customer\\customer.html',
      1 => 1565793222,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d541fbe3a1bb5_58765158 (Smarty_Internal_Template $_smarty_tpl) {
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

        .eamil {
            text-align: left;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }

        .address{
            width:30%
        }

        .edit {
            width:20%
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
"><span class="glyphicon glyphicon glyphicon-pencil"></span> Modify</a></li>
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
            <div class="col-sm-2 sidenav"></div>
            <div class="col-sm-8 text-left">
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
                                <th>操作</th>
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
                                    <button type="button" class="btn btn-success released" 
                                    data-value='1' data-gid="<?php echo $_smarty_tpl->tpl_vars['customerinfo']->value['cid'];?>
">Open</button>
                                    <?php } else { ?>
                                    <button type="button" class="btn btn-danger released" 
                                        data-value='0' data-gid="<?php echo $_smarty_tpl->tpl_vars['customerinfo']->value['cid'];?>
">Hide</button>
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

    //變更商品狀態商品
    $('.released').click(function(){
        let status = $(this).attr('data-value');
        let cid = $(this).attr('data-gid');
        let _this = this;
        $.ajax({
            url: 'setCustonerStatus',
            dataType: "json",
            type: 'PUT',
            data: {
                'cid' : cid,
                'status' : status,
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
                        $(_this).html("Hide");
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
