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

        if (!isset($_COOKIE['admintoken']) || empty($_COOKIE['admintoken'])) {
            header("Location: ../loginback/index");
            exit;
        } else {
            $DBAdmin = $this->DBAdmin;
            $userInfo = $DBAdmin->getOne(['token' => $_COOKIE['admintoken']]);
            if (empty($userInfo)) {
                header("Location: ../loginback/index");
                exit;
            }
        }

        $loginflag = true;
        $this->smarty->assign('loginflag', $loginflag);
        return $this->smarty->display('back/index.html');
    }
}
