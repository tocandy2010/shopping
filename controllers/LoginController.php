<?php

class LoginController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    /*
     * 首頁
     */
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

    // /*
    //  *  修改使用者資訊頁面
    //  */
    // public function editInfo()
    // {
    //     $path = URL . "login/index";
    //     $loginflag = $this->loginflag;

    //     if ($loginflag === false) {
    //         header("Location:{$path}");
    //         exit;
    //     }

    //     $userInfo = $this->userInfo;

    //     $this->smarty->assign('loginflag', $loginflag);
    //     $this->smarty->assign('userinfo', $userInfo);
    //     $this->smarty->display("home/modify/editinfo.html");
    // }

    // /*
    //  *  修改密碼頁面
    //  */
    // public function editpassword()
    // {
    //     $path = URL . "login/index";
    //     $loginflag = $this->loginflag;

    //     if ($loginflag === false) {
    //         header("Location:{$path}");
    //         exit;
    //     }

    //     $userInfo = $this->userInfo;

    //     $this->smarty->assign('loginflag', $loginflag);
    //     $this->smarty->assign('userinfo', $userInfo);
    //     $this->smarty->display("home/modify/editpassword.html");
    // }

    // /*
    //  *  修改處理,修改密碼及修改使用者資訊共用
    //  */
    // public function update($id = false)
    // {
    //     ## 回傳格式 info = boolean,message = 說明,error=欄位訊息
    //     $message = [
    //         'info' => true,
    //         'message' => "",
    //         'error' => false,
    //     ];

    //     ## 驗證登入
    //     $path = URL . "login/index";
    //     $loginflag = $this->loginflag;
    //     if ($loginflag === false) {
    //         header("Location:{$path}");
    //         exit;
    //     }
    //     $userInfo = $this->userInfo;

    //     ## 接收修改參數
    //     parse_str(file_get_contents('php://input'), $data);
    //     $info = ['name', 'phone', 'address'];
    //     $password = ['oldpassword', 'password', 'repassword'];
    //     $datakey = array_keys($data);

    //     ## 根據參數設定傳入資料要驗證的格式
    //     if (empty(array_diff($info, $datakey))) {
    //         $editInfo = [
    //             'name' => htmlspecialchars(trim($data['name']), ENT_QUOTES),
    //             'phone' => $data['phone'],
    //             'address' => htmlspecialchars(trim($data['address']), ENT_QUOTES),
    //         ];

    //         $verification = [
    //             'name' => array('length' => '1~30'),
    //             'phone' => array('phone' => "20"),
    //             'address' => array('length' => '6~50'),
    //         ];
    //     } else if (empty(array_diff($password, $datakey))) {
    //         $editInfo = [
    //             'oldpassword' => htmlspecialchars($data['oldpassword'], ENT_QUOTES),
    //             'password' => $data['password'],
    //             'repassword' => $data['repassword'],
    //         ];

    //         $verification = [
    //             'oldpassword' => array('notempty' => '0'),
    //             'password' => array('length' => "6~20"),
    //             'repassword' => array('notempty' => '0'),
    //         ];
    //     } else {
    //         $message = [
    //             'info' => false,
    //             'message' => "欄位輸入不正確",
    //         ];
    //         echo json_encode($message);
    //         exit;
    //     }

    //     ## 針對設定格式驗證表單
    //     $errorMessage = $this->helper->checkForm($editInfo, $verification);
    //     if (!empty($this->helper->checkForm($editInfo, $verification))) {
    //         $message = [
    //             'info' => false,
    //             'message' => '填寫欄位有誤',
    //             'error' => $errorMessage,
    //         ];
    //         echo json_encode($message);
    //         exit;
    //     }

    //     ## 修改密碼的檢查
    //     if (isset($editInfo['oldpassword'])) {
    //         $editInfo['oldpassword'] = $editInfo['password'];

    //         if (!password_verify($editInfo['oldpassword'], $userInfo['password'])) {
    //             $error['oldpassword'] = "舊密碼錯誤";
    //             $message = [
    //                 'info' => false,
    //                 'message' => '填寫欄位有誤',
    //                 'error' => $error,
    //             ];
    //             echo json_encode($message);
    //             exit;
    //         }

    //         if ($editInfo['password'] !== $editInfo['repassword']) {
    //             $error['repassword'] = "確認密碼錯誤";
    //             $message = [
    //                 'info' => false,
    //                 'message' => '填寫欄位有誤',
    //                 'error' => $error,
    //             ];
    //             echo json_encode($message);
    //             exit;
    //         }

    //         if (password_verify($editInfo['password'], $userInfo['password'])) {
    //             $message['info'] = false;
    //             $message['message'] = '填寫欄位有誤';
    //             $message['error'] = ['password' => "請勿與舊密碼相同"];
    //             echo json_encode($message);
    //             exit;
    //         }
    //         unset($editInfo['oldpassword']);
    //         unset($editInfo['repassword']);
    //         $editInfo['password'] = password_hash($editInfo['password'], PASSWORD_DEFAULT);
    //     } else {
    //         ## 判斷 info 有沒有修改
    //         $user = [
    //             'name' => $userInfo['name'],
    //             'phone' => $userInfo['phone'],
    //             'address' => $userInfo['address'],
    //         ];

    //         if (count(array_intersect($editInfo, $user)) === count($editInfo)) {
    //             $message = [
    //                 'info' => true,
    //                 'message' => '本次未有任何修改',
    //             ];
    //             echo json_encode($message);
    //             exit;
    //          }
    //     }

    //     ## 修改訊息
    //     $DBCustomer = $this->DBCustomer;
    //     if ($DBCustomer->update($editInfo, $userInfo['cid']) !== 1) {
    //         $message = [
    //             'info' => false,
    //             'message' => '修改失敗',
    //         ];
    //         echo json_encode($message);
    //         exit;
    //     }

    //     $message = [
    //         'info' => true,
    //         'message' => '修改成功',
    //     ];
    //     echo json_encode($message);
    //     exit;
    // }

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
        $info = [
            'info' => false,
            'message' => '',
            'error' => '',
        ];

        $loginInfo['email'] = $_POST['email'];
        $loginInfo['password'] = $_POST['password'];
        $loginInfo['vcode'] = $_POST['vcode'];
        
        ## 檢查驗證碼
        Session::init();
        if (Session::get('vcode') !== $loginInfo['vcode']) {
            $error['error'] = '驗證碼錯誤';
            $info['info'] = false;
            $info['message'] = '';
            $info['error'] = $error;
            echo json_encode($info);
            exit;
        } else {
            Session::destroy();
        }
        ## 設定傳入資料要驗證的格式
        $verification = [
            'email' => array('email' => '0'),
            'vcode' => array('notempty' => '0'),
        ];

        ## 針對設定格式驗證表單
        $errorMessage = $this->helper->checkForm($loginInfo, $verification);
        if (!empty($this->helper->checkForm($loginInfo, $verification))) {
            $info['info'] = false;
            $info['message'] = '';
            $info['error'] = $errorMessage;
            echo json_encode($info);
            exit;
        }

        ## 使用$this->DB加上Model名稱即實體化
        $DBCustomer = $this->DBCustomer;

        ## 檢查登入帳號密碼
        $userInfo = $DBCustomer->getOne(['email' => $loginInfo['email']]);
        $password = password_verify($loginInfo['password'], $userInfo['password']);
        if (empty($userInfo) || $password === false) {
            $error['password'] = "Email或密碼不正確";
            $error['email'] = "Email或密碼不正確";
            $info['info'] = false;
            $info['message'] = '';
            $info['error'] = $error;
            echo json_encode($info);
            exit;
        }

        if ($userInfo['released'] === '0') {
            $error['email'] = "此帳號已遭停權";
            $info['info'] = false;
            $info['message'] = '';
            $info['error'] = $error;
            echo json_encode($info);
            exit;
        }

        $token = $this->getToken($userInfo['cid']);

        if ($DBCustomer->update(['token' => $token], $userInfo['cid']) !== 1) {
            $error['error'] = "錯誤";
            $info['info'] = false;
            $info['message'] = '';
            $info['error'] = $error;
            echo json_encode($info);
            exit;
        }
        setcookie('token', $token, time() + 3600, '/');
        $info['info'] = true;
        $info['message'] = '';
        $info['error'] = '';
        echo json_encode($info);
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
