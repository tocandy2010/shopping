<?php

class LoginbackController extends Controller 
{
    public function __construct(){
        parent:: __construct();
    }

    /*
     *  首頁
     */
    public function index($reg = false)
    {
        return $this->smarty->display('back/login/login.html');
    }
}
