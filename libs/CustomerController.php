<?php

class CustomerController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        $checkOutInfo = [
            'info' => false,
            'message' => ''
        ];

        $path = URL . "login/index";
        if (!isset($_COOKIE['token']) || empty($_COOKIE['token'])) {
            if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === "xmlhttprequest") {
                $checkOutInfo['info'] = false;
                $checkOutInfo['message'] = "請先會員登入";
                echo json_encode($checkOutInfo);
                exit;
            }
            header("Location:{$path}");
            exit;
        } else {
            $DBCustomer = $this->DBCustomer;
            $userInfo = $DBCustomer->getOne(['token' => $_COOKIE['token']]);
            if (empty($userInfo) || $userInfo['released'] !== '1') {
                if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === "xmlhttprequest") {
                    $checkOutInfo['message'] = "請先會員登入";
                    echo json_encode($checkOutInfo);
                    exit;
                }
                header("Location:{$path}");
                exit;
            } else {
                $this->loginflag = true;
                $this->userInfo = $userInfo;
            }
        }
    }
}
