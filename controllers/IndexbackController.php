<?php

class IndexbackController extends Controller 
{
    public function __construct(){
        parent:: __construct();
    }

    /*
     *  首頁
     */
    public function index($reg = false)
    {
        return $this->smarty->display('back/index.html');
    }
}
