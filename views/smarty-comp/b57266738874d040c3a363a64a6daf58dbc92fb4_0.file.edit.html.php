<?php
/* Smarty version 3.1.33, created on 2019-08-16 08:19:21
  from 'C:\xampp\htdocs\TaiwanGYM\views\back\login\edit.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d564ae98266a3_92386152',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b57266738874d040c3a363a64a6daf58dbc92fb4' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TaiwanGYM\\views\\back\\login\\edit.html',
      1 => 1565936355,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d564ae98266a3_92386152 (Smarty_Internal_Template $_smarty_tpl) {
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

        #username {
            cursor: default;
            color: white;
        }

        #username:hover {
            cursor: default;
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
                    <li><a href="<?php echo URL;?>
loginback/edit/<?php echo $_smarty_tpl->tpl_vars['userinfo']->value['aid'];?>
"><span
                                class="glyphicon glyphicon glyphicon-pencil"></span> Modify</a></li>
                    <li><a href="<?php echo URL;?>
loginback/logout"><span class="glyphicon glyphicon glyphicon-log-out"></span>
                            Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid text-center">
        <div class="row content">
            <div class="col-sm-2 sidenav"></div>
            <div class="col-sm-8 text-left">
                <form class="form-horizontal">
                    <!-- Password input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="password">舊密碼</label>
                        <div class="col-md-4">
                            <input id="oldpassword" name="oldpassword" type="password" placeholder=""
                                class="form-control input-md" autocomplete="off">
                            <span class="help-block">請輸入原密碼
                                <span class="errorinfo" id="oldpasswordinfo">&nbsp</span>
                            </span>
                        </div>
                    </div>

                    <!-- Password input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="password">新密碼</label>
                        <div class="col-md-4">
                            <input id="password" name="password" type="password" placeholder=""
                                class="form-control input-md" autocomplete="off">
                            <span class="help-block">請輸入6~20位
                                <span class="errorinfo" id="passwordinfo">&nbsp</span>
                            </span>
                        </div>
                    </div>

                    <!-- Password input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="password">確認密碼</label>
                        <div class="col-md-4">
                            <input id="repassword" name="repassword" type="password" placeholder=""
                                class="form-control input-md" autocomplete="off">
                            <input type="hidden" id='gid' value="<?php echo $_smarty_tpl->tpl_vars['userinfo']->value['aid'];?>
">
                            <span class="help-block">請再輸入一次密碼
                                <span class="errorinfo" id="repasswordinfo">&nbsp</span>
                            </span>
                        </div>
                    </div>
                    <!-- Button (Double) -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="button1id"></label>
                        <div class="col-md-8">
                            <button type="button" id="editsend" class="btn btn-info">edit</button>
                            <a href="<?php echo URL;?>
indexback/index"><button type="button"
                                    class="btn btn-danger">Cancel</button></a>
                            <span class="errorinfo" id='errorinfo'>&nbsp</span>
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
</body>

</html>

<?php echo '<script'; ?>
 src='<?php echo URL;?>
public/js/helper.js'><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>

    let oldpasswordflag = false;
    let passwordflag = false;
    let repasswordflag = false;

    $('#oldpassword').blur(function () {
        let oldpassword = $(this).val();
        if (checkInput(oldpassword, 'notempty') === false) {
            $("#oldpasswordinfo").html("請輸入舊密碼");
        } else {
            oldpasswordflag = true;
            $("#oldpasswordinfo").html("&nbsp");
        }
    })

    $('#password').blur(function () {
        let password = $(this).val();
        if (checkInput(password, 'length', "6~20") === false) {
            $("#passwordinfo").html("密碼長度錯誤");
        } else {
            passwordflag = true;
            $("#passwordinfo").html("&nbsp");
        }
    })

    $('#repassword').blur(function () {
        $('#repasswordinfo').html("&nbsp");
    })

 



    $("#editsend").click(function () {
        
        let aid = $('#gid').val();
        let oldpassword = $('#oldpassword').val();
        let password = $('#password').val();
        let repassword = $('#repassword').val();
        let formname = ['oldpassword', 'password', 'repassword'];
        for (error of formname) {
            $('#' + error + 'info').html("&nbsp");
        }

        if (password !== repassword || password === "") {
            $("#repasswordinfo").html("確認密碼錯誤")
        } else {
            repasswordflag = true;
        }

        formname.forEach(function (item) {
            if ($("#" + item).val() === '') {
                $("#" + item).focus();
            }
        })

        if (!(oldpasswordflag && passwordflag && repasswordflag)) {
            return false;
        }

        $.ajax({
            url: "../update",
            type: "PUT",
            dataType: "json",
            data: {
                'aid': aid,
                'oldpassword': oldpassword,
                'password': password,
                'repassword': repassword,
            },
            success: function (result) {
                if (result.editinfo === 'success') {
                    alert('密碼修改成功')
                    $(window).attr('location', '<?php echo URL;?>
indexback/index');
                } else if (result.editinfo === 'fail') {
                    $('#errorinfo').html("密碼修改失敗");
                } else if (result.editinfo) {
                    for (error of formname) {
                        $('#' + error + 'info').html(result.editinfo[error]);
                    }
                } else {
                    $('#errorinfo').html("錯誤");
                }
            }
        });
    })
<?php echo '</script'; ?>
><?php }
}
