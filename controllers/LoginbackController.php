<?php

class LoginbackController extends AdminController
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
        if (isset($_COOKIE['admintoken'])) {
            unset($_COOKIE['admintoken']);
        }
        setcookie('admintoken', '', time()-3600, "/");
        $path = URL . 'loginback/index';
        header("Location:{$path}");
    }


    public function edit($reg = false)
    {

        $loginflag = $this->loginflag;
        $userInfo = $this->userInfo;

        $this->smarty->assign('userinfo', $userInfo);
        $this->smarty->assign('loginflag', $loginflag);
        $this->smarty->display("back/login/edit.html");
    }

    public function update()
    {
        $loginflag = $this->loginflag;
        if ($loginflag === false) {
            $checkOutInfo = [
                'info' => false,
                'message' => "請先會員登入",
            ];
            echo json_encode($checkOutInfo);
            exit;
        }

        $userInfo = $this->userInfo;

        ##接收參數
        parse_str(file_get_contents('php://input'), $editInfo);
        foreach ($editInfo as $key => $info) {
            $editInfo[$key] = htmlspecialchars($info, ENT_QUOTES);
        }

        if ($editInfo['aid'] != $userInfo['aid']) {
            $path = URL . "loginback/index";
            setcookie('admintoken', 0, time() - 10, "/");
            header("Location: {$path}");
            exit;
        } else {
            $aid = $editInfo['aid'];
        }

        ## 設定傳入資料要驗證的格式
        $verification = [
            'oldpassword' => array('notempty' => "0"),
            'password' => array('length' => "6~20"),
            'repassword' => array('length' => "6~20"),
        ];

        ##針對設定格式驗證表單
        $errorMessage = $this->helper->checkForm($editInfo, $verification);
        if (!empty($this->helper->checkForm($editInfo, $verification))) {
            echo json_encode(['editinfo' => $errorMessage]);
            exit;
        }

        if (!password_verify($editInfo['oldpassword'], $userInfo['password'])) {
            $error['oldpassword'] = "舊密碼不正確";
            echo json_encode(['editinfo' => $error]);
            exit;
        } 

        if ($editInfo['password'] !== $editInfo['repassword']) {
            $error['repassword'] = "確認密碼不正確";
            echo json_encode(['editinfo' => $error]);
            exit;
        }

        unset($editInfo['aid']);
        unset($editInfo['repassword']);
        unset($editInfo['oldpassword']);
        $password =  password_hash($editInfo['password'], PASSWORD_DEFAULT);
        $DBAdmin = $this->DBAdmin;
        if ($DBAdmin->update(['password' => $password], $aid) !== 1) {
            echo json_encode(['editinfo' => "fail"]);
            exit;
        }
        echo json_encode(['editinfo' => "success"]);
            exit;
    }
}
