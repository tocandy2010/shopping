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
        $userInfo = $this->userInfo;
        $loginflag = $this->loginflag;
        $this->smarty->assign('loginflag', $loginflag);
        $this->smarty->assign('userinfo', $userInfo);
        return $this->smarty->display('home/index.html');
    }
}
