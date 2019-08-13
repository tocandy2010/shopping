<?php

class IndexbackController extends Controller
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
        $path = URL . "loginback/index";
        if (!isset($_COOKIE['admintoken']) || empty($_COOKIE['admintoken'])) {
            header("Location: {$path}");
            exit;
        } else {
            $DBAdmin = $this->DBAdmin;
            $userInfo = $DBAdmin->getOne(['token' => $_COOKIE['admintoken']]);
            if (empty($userInfo)) {
                header("Location: {$path}");
                exit;
            }
        }

        $loginflag = true;
        $this->smarty->assign('loginflag', $loginflag);
        $this->smarty->assign('userinfo', $userInfo);
        return $this->smarty->display('back/index.html');
    }
}
