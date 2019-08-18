<?php

class AdminModifyController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function edit($reg = false)
    {

        $userInfo = $this->userInfo;

        $this->smarty->assign('userinfo', $userInfo);
        $this->smarty->display("back/modify/edit.html");
    }

    public function update()
    {
        ## 接收使用者資訊
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

        ## 針對設定格式驗證表單
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
