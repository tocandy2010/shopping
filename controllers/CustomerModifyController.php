<?php

class CustomerModifyController extends CustomerController
{

    public function __construct()
    {
        parent::__construct();
    }

    /*
     *  修改使用者資訊頁面
     */
    public function editInfo()
    {
        $path = URL . "login/index";
        $loginflag = $this->loginflag;

        if ($loginflag === false) {
            header("Location:{$path}");
            exit;
        }

        $userInfo = $this->userInfo;

        $this->smarty->assign('loginflag', $loginflag);
        $this->smarty->assign('userinfo', $userInfo);
        $this->smarty->display("home/modify/editinfo.html");
    }

    /*
     *  修改密碼頁面
     */
    public function editpassword()
    {
        $path = URL . "login/index";
        $loginflag = $this->loginflag;

        if ($loginflag === false) {
            header("Location:{$path}");
            exit;
        }

        $userInfo = $this->userInfo;

        $this->smarty->assign('loginflag', $loginflag);
        $this->smarty->assign('userinfo', $userInfo);
        $this->smarty->display("home/modify/editpassword.html");
    }

    /*
     *  修改處理,修改密碼及修改使用者資訊共用
     */
    public function update($id = false)
    {
        ## 回傳格式 info = boolean,message = 說明,error=欄位訊息
        $message = [
            'info' => true,
            'message' => "",
            'error' => false,
        ];

        ## 驗證登入
        $path = URL . "login/index";
        $loginflag = $this->loginflag;
        if ($loginflag === false) {
            header("Location:{$path}");
            exit;
        }
        $userInfo = $this->userInfo;

        ## 接收修改參數
        parse_str(file_get_contents('php://input'), $data);
        $info = ['name', 'phone', 'address'];
        $password = ['oldpassword', 'password', 'repassword'];
        $datakey = array_keys($data);

        ## 根據參數設定傳入資料要驗證的格式
        if (empty(array_diff($info, $datakey))) {
            $editInfo = [
                'name' => htmlspecialchars(trim($data['name']), ENT_QUOTES),
                'phone' => $data['phone'],
                'address' => htmlspecialchars(trim($data['address']), ENT_QUOTES),
            ];

            $verification = [
                'name' => array('length' => '1~30'),
                'phone' => array('phone' => "20"),
                'address' => array('length' => '6~50'),
            ];
        } else if (empty(array_diff($password, $datakey))) {
            $editInfo = [
                'oldpassword' => htmlspecialchars($data['oldpassword'], ENT_QUOTES),
                'password' => $data['password'],
                'repassword' => $data['repassword'],
            ];

            $verification = [
                'oldpassword' => array('notempty' => '0'),
                'password' => array('length' => "6~20"),
                'repassword' => array('notempty' => '0'),
            ];
        } else {
            $message = [
                'info' => false,
                'message' => "欄位輸入不正確",
            ];
            echo json_encode($message);
            exit;
        }

        ## 針對設定格式驗證表單
        $errorMessage = $this->helper->checkForm($editInfo, $verification);
        if (!empty($this->helper->checkForm($editInfo, $verification))) {
            $message = [
                'info' => false,
                'message' => '填寫欄位有誤',
                'error' => $errorMessage,
            ];
            echo json_encode($message);
            exit;
        }

        ## 修改密碼的檢查
        if (isset($editInfo['oldpassword'])) {
            $editInfo['oldpassword'] = $editInfo['password'];

            if (!password_verify($editInfo['oldpassword'], $userInfo['password'])) {
                $error['oldpassword'] = "舊密碼錯誤";
                $message = [
                    'info' => false,
                    'message' => '填寫欄位有誤',
                    'error' => $error,
                ];
                echo json_encode($message);
                exit;
            }

            if ($editInfo['password'] !== $editInfo['repassword']) {
                $error['repassword'] = "確認密碼錯誤";
                $message = [
                    'info' => false,
                    'message' => '填寫欄位有誤',
                    'error' => $error,
                ];
                echo json_encode($message);
                exit;
            }

            if (password_verify($editInfo['password'], $userInfo['password'])) {
                $message['info'] = false;
                $message['message'] = '填寫欄位有誤';
                $message['error'] = ['password' => "請勿與舊密碼相同"];
                echo json_encode($message);
                exit;
            }
            unset($editInfo['oldpassword']);
            unset($editInfo['repassword']);
            $editInfo['password'] = password_hash($editInfo['password'], PASSWORD_DEFAULT);
        } else {
            ## 判斷 info 有沒有修改
            $user = [
                'name' => $userInfo['name'],
                'phone' => $userInfo['phone'],
                'address' => $userInfo['address'],
            ];

            if (count(array_intersect($editInfo, $user)) === count($editInfo)) {
                $message = [
                    'info' => true,
                    'message' => '本次未有任何修改',
                ];
                echo json_encode($message);
                exit;
             }
        }

        ## 修改訊息
        $DBCustomer = $this->DBCustomer;
        if ($DBCustomer->update($editInfo, $userInfo['cid']) !== 1) {
            $message = [
                'info' => false,
                'message' => '修改失敗',
            ];
            echo json_encode($message);
            exit;
        }

        $message = [
            'info' => true,
            'message' => '修改成功',
        ];
        echo json_encode($message);
        exit;
    }
}
