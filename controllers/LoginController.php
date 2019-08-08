<?php

class LoginController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index($reg = false)
    {
        return $this->smarty->display("home/login/login.html");
    }

    /*
     *  新增頁面
     */
    public function create()
    {
        $this->smarty->assign('headimg', "");
        return $this->smarty->display('home/login/reg.html');
    }

    /*
     *  新增處理
     */
    public function add()
    {
        $reginfo['email'] = $_POST['email'];
        $reginfo['password'] = $_POST['password'];
        $reginfo['repassword'] = $_POST['repassword'];
        $reginfo['name'] = $_POST['name'];
        $reginfo['phone'] = $_POST['phone'];
        $reginfo['address'] = $_POST['address'];

        ## 設定傳入資料要驗證的格式
        $verification = [
            'email' => array('email' => '0'),
            'password' => array('length' => "6~20"),
            'repassword' => array('length' => "6~20"),
            'name' => array('length' => '3~30'),
            'phone' => array('phone' => '0'),
            'address' => array('length' => "1~50"),
        ];

        ##針對設定格式驗證表單
        $errorMessage = $this->helper->checkForm($reginfo, $verification);
        if (!empty($this->helper->checkForm($reginfo, $verification))) {
            echo json_encode(['reginfo' => $errorMessage]);
            exit;
        }

        ##使用$this->DB加上Model名稱即實體化
        $DBCustomer = $this->DBCustomer;

        ##檢查eamil.phone重複
        $notUnique = [];
        $email = $DBCustomer->getOne(['email' => $reginfo['email']]);
        if (!empty($email)) {
            $notUnique['email'] = "此Email已被註冊";
        }
        $phone = $DBCustomer->getOne(['phone' => $reginfo['phone']]);
        if (!empty($phone)) {
            $notUnique['phone'] = "此電話已被註冊";
        }
        if (!empty($notUnique)) {
            echo json_encode(['reginfo' => $notUnique]);
            exit;
        }

        ##檢查確認密碼和秘密碼是否相同
        if ($reginfo['password'] !== $reginfo['repassword']) {
            echo json_encode(['reginfo' => ['repassword' => "確認密碼和密碼不相同"]]);
            exit;
        } else {
            unset($reginfo['repassword']);
        }

        ##密碼加密.姓名符號過濾.產生註冊時間
        $reginfo['name'] = htmlspecialchars($this->helper->removeAllSpace($reginfo['name'], ENT_QUOTES));
        if ($reginfo['name'] === '') {
            echo json_encode(['reginfo' => ['name' => "請輸入姓名"]]);
            exit;
        }
        $reginfo['password'] = htmlspecialchars($reginfo['password'], ENT_QUOTES);
        $reginfo['password'] = password_hash($reginfo['password'], PASSWORD_DEFAULT);
        date_default_timezone_set("Asia/Taipei");
        $reginfo['regTime'] = time();

        ##寫入DB
        if ($DBCustomer->add($reginfo)) {
            $reginfo = ['reginfo' => "success"];
            echo json_encode($reginfo);
        } else {
            $reginfo = ['reginfo' => "fail"];
            echo json_encode($reginfo);
        }
    }

    /*
     *  修改頁面
     */
    public function edit()
    {
        echo "edit";
    }

    /*
     *  修改處理
     */
    public function update($id = false)
    { 
        
    }

    /*
     *  登出
     */
    public function logout()
    {
        setcookie('token', '', time() - 100, '/');
        header("Location:" . URL . "login/index");
    }

    /*
     *  登入驗證
     */
    public function loginCheck()
    {
        $loginInfo['email'] = $_POST['email'];
        $loginInfo['password'] = $_POST['password'];
        $loginInfo['vcode'] = $_POST['vcode'];
        
        ##檢查驗證碼
        Session::init();
        if (Session::get('vcode') !== $loginInfo['vcode']) {
            $error['error'] = '驗證碼錯誤';
            echo json_encode(['logininfo' => $error]);
            // echo json_encode(['logininfo' => ['error' => '驗證碼錯誤']]);
            exit;
        } else {
            Session::destroy();
        }
        ## 設定傳入資料要驗證的格式
        $verification = [
            'email' => array('email' => '0'),
            'password' => array('length' => "6~20"),
            'vcode' => array('notempty' => '0'),
        ];
        
        ##針對設定格式驗證表單
        $errorMessage = $this->helper->checkForm($loginInfo, $verification);
        if (!empty($this->helper->checkForm($loginInfo, $verification))) {
            echo json_encode(['logininfo' => $errorMessage]);
            exit;
        }

        ##使用$this->DB加上Model名稱即實體化
        $DBCustomer = $this->DBCustomer;

        ##檢查登入帳號密碼
        $userInfo = $DBCustomer->getOne(['email' => $loginInfo['email']]);
        $password = password_verify($loginInfo['password'], $userInfo['password']);
        if (empty($userInfo) || $password === false) {
            $error['password'] = "Email或密碼不正確";
            $error['email'] = "Email或密碼不正確";
            echo json_encode(['logininfo' => $error]);
            exit;
        }

        if ($userInfo['released'] === '0') {
            $error['email'] = "此帳號已遭停權";
            echo json_encode(['logininfo' => $error]);
            exit;
        }

        $token = $this->getToken($userInfo['cid']);

        if ($DBCustomer->update(['token' => $token], $userInfo['cid']) === 1) {
            setcookie('token', $token, time() + 3600, '/');
            $reginfo = ['logininfo' => "success"];
            echo json_encode($reginfo);
        } else {
            $reginfo = ['logininfo' => "fail"];
            echo json_encode($reginfo);
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
}
