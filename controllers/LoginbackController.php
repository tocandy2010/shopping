<?php

class LoginbackController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    /*
     *  首頁
     */
    public function index($reg = false)
    {
        return $this->smarty->display('back/login/login.html');
    }


    public function create()
    {
        return $this->smarty->display('back/login/reg.html');
    }

    /*
     * 新增管理員
     */
    public function add()
    {
        $regInfo['account'] = $this->helper->removeAllSpace($_POST['account']);
        $regInfo['password'] = htmlspecialchars($_POST['password'], ENT_QUOTES);
        $regInfo['repassword'] = htmlspecialchars($_POST['repassword'], ENT_QUOTES);

        ## 設定傳入資料要驗證的格式
        $verification = [
            'account' => array('length' => '6~6'),
            'password' => array('length' => "6~20"),
            'repassword' => array('length' => "6~20"),
        ];

        ##針對設定格式驗證表單
        $errorMessage = $this->helper->checkForm($regInfo, $verification);
        if (!empty($this->helper->checkForm($regInfo, $verification))) {
            echo json_encode(['reginfo' => $errorMessage]);
            exit;
        }

        $patt = "/[A-Za-z0-9]/";
        if (preg_match_all($patt, $regInfo['account']) <= 0) {
            $error['account'] = "帳號不可包含特殊符號";
            echo json_encode(['reginfo' => $error]);
            exit;
        }

        if ($regInfo['password'] !== $regInfo['repassword']) {
            $error['repassword'] = "確認密碼與密碼不相同";
            echo json_encode(['reginfo' => $error]);
            exit;
        } else {
            unset($regInfo['repassword']);
        }

        date_default_timezone_set("Asia/Taipei");
        $regInfo['createTime'] = time();
        $regInfo['password'] = password_hash($regInfo['password'], PASSWORD_DEFAULT);

        $DBAdmin = $this->DBAdmin;
        if ($DBAdmin->add($regInfo) === 1) {
            echo json_encode(['reginfo' => "success"]);
            exit;
        } else {
            echo json_encode(['reginfo' => "fail"]);
            exit;
        }
    }

    /*
     * 管理員登入
     */

    public function loginCheck()
    {
        $loginInfo['account'] = $_POST['account'];
        $loginInfo['password'] = $_POST['password'];
        $loginInfo['vcode'] = $_POST['vcode'];

        ##檢查驗證碼
        Session::init();
        if (Session::get('vcode') !== $loginInfo['vcode']) {
            echo json_encode(['logininfo' => ['error' => '驗證碼錯誤']]);
            exit;
        } else {
            Session::destroy();
        }

        $DBAdmin = $this->DBAdmin;
        $loginInfo['account'] = htmlspecialchars($loginInfo['account'], ENT_QUOTES);
        $userInfo = $DBAdmin->getOne(['account' => $loginInfo['account']]);

        ## 檢查登入帳號密碼
        if (empty($userInfo)) {
            $error['error'] = "帳號密碼錯誤";
            echo json_encode(['logininfo' => $error]);
            exit;
        }
        $loginInfo['password'] = htmlspecialchars($loginInfo['password'], ENT_QUOTES);
        $password = password_verify($loginInfo['password'], $userInfo['password']);
        if ($password === false) {
            $error['error'] = "帳號密碼錯誤";
            echo json_encode(['logininfo' => $error]);
            exit;
        }

        $token = $this->getToken($userInfo['aid']);
        if ($DBAdmin->update(['token' => $token], $userInfo['aid']) === 1) {
            setcookie('admintoken', $token, time() + 3600, '/');
            $message = ['logininfo' => "success"];
            echo json_encode($message);
        } else {
            $message = ['logininfo' => "fail"];
            echo json_encode($message);
        }
    }

    /*
     * 產生token值
     */
    protected function getToken($id)
    {
        $str = "abcdefghijklmnopqrstuvwxyz";
        $str .= strtoupper($str);
        $str .= "0123456789";
        $str .= "+-*/$.?:";
        $str = str_repeat($str, 10);
        $str = str_shuffle($str);
        $token = substr($str, 0, 50) . $id;
        return $token;
    }

    public function logout()
    {
        setcookie('admintoken', 0, time()-10, "/");
        header("Location:index");
    }
}
