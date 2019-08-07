<?php
/* Smarty version 3.1.33, created on 2019-08-07 05:31:20
  from 'C:\xampp\htdocs\TaiwanGYM\views\home\login\login.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d4a4608dee2a5_50317427',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd1b3d0ee98eca8a92b35c549743021159f63433a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TaiwanGYM\\views\\home\\login\\login.html',
      1 => 1565148679,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d4a4608dee2a5_50317427 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <title>Login in to TaiwanGym</title>
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

        #vcodeimg {
            position: relative;
            left: 0%;
            top: 15px;
        }

        .loginwall {
            border: 2px solid gray;
            width: 33%;
            box-shadow: 3px 3px 5px 6px #b9b5b5;
        }

        .errorinfo {
            color: darkred;
            font-weight: bold;
            letter-spacing: 0.5px
        }

        #loginsend {
            position: relative;
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

            .loginwall {
                width: auto
            }

            #vcode {
                width: 50%
            }

            #vcodeimg {
                position: absolute;
                left: 55%;
                top: 63%
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
index/index">Home</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="<?php echo URL;?>
/goods/index/jog">Jog</a></li>
                    <li><a href="<?php echo URL;?>
/goods/index/ski">Ski</a></li>
                    <li><a href="<?php echo URL;?>
/goods/index/boxing">Boxing</a></li>
                    <li><a href="<?php echo URL;?>
/goods/index/yoga">Yoga</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?php echo URL;?>
cart/index"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a>
                    <li><a href="<?php echo URL;?>
login/index"><span class="glyphicon glyphicon glyphicon-log-in"></span>
                            Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid text-center">
        <div class="row content">
            <div class="col-sm-4 sidenav"></div>
            <div class="col-sm-7 text-left loginwall">
                <form class="form-horizontal">
                    <!-- Text input-->
                    <div class="form-group">
                        <h1>會員登入</h1>
                        <div class="col-md-10">
                            <label for="email">Email</label>
                            <input id="email" name="email" type="text" placeholder="your E-mail"
                                class="form-control input-md" autocomplete="off">
                            <span class="help-block">
                                <span class="errorinfo" id='emailinfo'>&nbsp</span></span>
                        </div>
                    </div>

                    <!-- Password input-->
                    <div class="form-group">

                        <div class="col-md-10">
                            <label for="password">password</label>
                            <input id="password" name="password" type="password" placeholder="your password"
                                class="form-control input-md" autocomplete="off">
                            <span class="help-block">
                                <span class="errorinfo" id='passwordinfo'>&nbsp</span></span>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">

                        <div class="col-md-5">
                            <label for="textinput"></label>
                            <input id="vcode" name="vcode" type="text" placeholder="" class="form-control input-md"
                                autocomplete="off">
                            <span class="help-block">點圖片換驗證碼</span>
                        </div>
                        <img src="<?php echo URL;?>
public/vcode/vcode.php" alt="驗證碼" id='vcodeimg'>
                    </div>

                    <!-- Button (Double) -->
                    <div class="form-group">
                        <div class="col-md-8">
                            <label for="button1id"></label>
                            <a href="<?php echo URL;?>
login/create"><button type="button" class="btn btn-default">Join
                                    us</button></a>
                            <button type="button" id="loginsend" class="btn btn-success ">Login</button>
                            <span class="errorinfo" id='errorinfo'>&nbsp</span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-4 sidenav"></div>
        </div>
    </div>
    <footer class="container-fluid text-center">
        <p>© 2019 Hogan Online shopping Mall</p>
    </footer>

</body>

</html>

<?php echo '<script'; ?>
>

    $('#vcodeimg').click(function () {
        this.src = "<?php echo URL;?>
public/vcode/vcode.php?" + Math.random();
    })

    $("#loginsend").click(function () {
        let eamil = $('#email').val();
        let password = $('#password').val();
        let vcode = $('#vcode').val();
        let formname = ['email', 'password', 'error'];
        for(error of formname) {
                $('#' + error + 'info').html("&nbsp");
            }

        $.ajax({
            url: "loginCheck",
            type: "POST",
            dataType: "json",
            data: {
                'email': eamil,
                'password': password,
                'vcode': vcode,
            },
            success: function (result) {
                if (result.logininfo === 'success') {
                    $(window).attr('location', '<?php echo URL;?>
/index/index');
                } else if (result.logininfo === 'fail') {
                    $('#errorinfo').html("登入失敗");
                    changevcode()
                } else if (result.logininfo) {
                    for (error of formname) {
                        $('#' + error + 'info').html(result.logininfo[error]);
                    }
                    changevcode()
                } else {
                    $('#errorinfo').html("錯誤");
                    changevcode()
                }
            }
        });
    })

    function changevcode() {
        $("#vcodeimg").click();
    }


<?php echo '</script'; ?>
><?php }
}
