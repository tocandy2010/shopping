<?php

class IndexController extends Controller 
{
    public function __construct(){
        parent:: __construct();
    }

    /*
     *  首頁
     */
    public function index($reg = false)
    {
        if (!isset($_COOKIE['token']) || empty($_COOKIE['token'])) {
            $userInfo = [];
        } else {
            $DBCustomer = $this->DBCustomer;
            $userInfo = $DBCustomer->getOne(['token' => $_COOKIE['token']]);
            if (!empty($userInfo)) {
                $this->smarty->assign('loginflag', true);
            }
        }
        $this->smarty->assign('userinfo', $userInfo);
        return $this->smarty->display('home/index.html');
    }
}
