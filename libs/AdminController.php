<?php

class AdminController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        $checkOutInfo = [
            'info' => false,
            'message' => '',
            'error' => '',
            'redirect' => '',
        ];

        $path = URL . "loginback/index";
        // $logincheck = URL . "loginback/loginCheck";

        // $url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        // if ($path !== $url && $url !== $logincheck) {
            if (!isset($_COOKIE['admintoken']) || empty($_COOKIE['admintoken'])) {
                if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === "xmlhttprequest") {
                    $checkOutInfo = [
                        'info' => false,
                        'message' => "請先會員登入",
                        'error' => '',
                        'redirect' => $path,
                    ];
                    echo json_encode($checkOutInfo);
                    exit;
                }
                header("Location:{$path}");
                exit;
            } else {
                $DBAdmin = $this->DBAdmin;
                $userInfo = $DBAdmin->getOne(['token' => $_COOKIE['admintoken']]);
                if (empty($userInfo)) {
                    if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === "xmlhttprequest") {
                        $checkOutInfo = [
                            'info' => false,
                            'message' => "請先會員登入",
                            'error' => '',
                            'redirect' => $path,
                        ];
                        echo json_encode($checkOutInfo);
                        exit;
                    }
                    header("Location:{$path}");
                    exit;
                } else {
                    $this->loginflag = true;
                    $this->userInfo = $userInfo;
                }
            // }
        }
    }
}
