<?php
/* Smarty version 3.1.33, created on 2019-08-18 17:29:13
  from 'D:\xampp\htdocs\TaiwanGYM\views\back\modify\edit.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d596ec9b598c8_41876221',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a6e18c7818d62ffcd6df36e0e523e544e775884a' => 
    array (
      0 => 'D:\\xampp\\htdocs\\TaiwanGYM\\views\\back\\modify\\edit.html',
      1 => 1566142076,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:\\xampp\\htdocs\\TaiwanGym\\views\\back\\header.html' => 1,
  ),
),false)) {
function content_5d596ec9b598c8_41876221 (Smarty_Internal_Template $_smarty_tpl) {
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
    <?php $_smarty_tpl->_subTemplateRender('file:\xampp\htdocs\TaiwanGym\views\back\header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
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
