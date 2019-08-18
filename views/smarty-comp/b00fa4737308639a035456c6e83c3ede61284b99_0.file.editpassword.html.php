<?php
/* Smarty version 3.1.33, created on 2019-08-18 16:47:10
  from 'D:\xampp\htdocs\TaiwanGYM\views\home\login\editpassword.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d5964ee156f60_56891895',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b00fa4737308639a035456c6e83c3ede61284b99' => 
    array (
      0 => 'D:\\xampp\\htdocs\\TaiwanGYM\\views\\home\\login\\editpassword.html',
      1 => 1566137915,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:\\xampp\\htdocs\\TaiwanGym\\views\\home\\header.html' => 1,
  ),
),false)) {
function content_5d5964ee156f60_56891895 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <title>修改密碼</title>
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
            font-size: 16px;
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

        .formtitle {
            text-align: center;
            padding-bottom: 2%;
            font-weight: bold
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
    <?php $_smarty_tpl->_subTemplateRender('file:\xampp\htdocs\TaiwanGym\views\home\header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <div class="container-fluid text-center">
        <div class="row content">
            <div class="col-sm-2 sidenav"></div>
            <div class="col-sm-8 text-left">
                <div class="container">
                    <ul class="nav nav-tabs">
                        <li><a href="<?php echo URL;?>
login/editinfo">Account</a></li>
                        <li class="active"><a href="#">Security</a></li>
                    </ul>
                </div>
                <h3 class='formtitle'>Change&nbspPassword</h3>
                <form class="form-horizontal">
                    <!-- Password input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="password">Old&nbsppassword</label>
                        <div class="col-md-4">
                            <input id="oldpassword" name="oldpassword" type="password" class="form-control input-md"
                                autocomplete="off">
                            <span class="help-block">請輸入舊密碼
                                <span class="errorinfo" id="oldpasswordinfo"></span>
                            </span>
                        </div>
                    </div>

                    <!-- Password input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="password">New&nbsppassword</label>
                        <div class="col-md-4">
                            <input id="password" name="password" type="password" class="form-control input-md"
                                autocomplete="off">
                            <span class="help-block">請輸入6~20位
                                <span class="errorinfo" id="passwordinfo"></span>
                            </span>
                        </div>
                    </div>

                    <!-- Password input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="password">repassword</label>
                        <div class="col-md-4">
                            <input id="repassword" name="repassword" type="password" class="form-control input-md"
                                autocomplete="off">
                            <span class="help-block">請再輸入一次新密碼
                                <span class="errorinfo" id="repasswordinfo"></span>
                            </span>
                        </div>
                    </div>

                    <!-- Button (Double) -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="button1id"></label>
                        <div class="col-md-8">
                            <button type="button" id="regsend" class="btn btn-info">Update&nbsppassword</button>
                            <a href="<?php echo URL;?>
index/index"><button type="button"
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


    $("#regsend").click(function () {
        let oldpassword = $('#oldpassword').val();
        let password = $('#password').val();
        let repassword = $('#repassword').val();
        let formname = ['oldpassword', 'password', 'repassword'];

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

        for (error of formname) {
            $('#' + error + 'info').html("");
        }

        $.ajax({
            url: "update",
            type: "PUT",
            dataType: "json",
            data: {
                'oldpassword': oldpassword,
                'password': password,
                'repassword': repassword,
            },
            success: function (result) {
                if (result.info === false) {
                    alert(result.message);
                    if (result.error !== '') {
                        for (error of formname) {
                            $('#' + error + 'info').html(result.error[error]);
                        }
                    }
                } else if (result.info === true) {
                    alert(result.message);
                    $(window).attr('location', '<?php echo URL;?>
index/index');
                } else {
                    alert('修改失敗');
                    $(window).attr('location', '<?php echo URL;?>
index/index');
                }
            }
        });
    })



<?php echo '</script'; ?>
><?php }
}
