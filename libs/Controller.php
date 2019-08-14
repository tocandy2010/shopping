<?php

class Controller
{
    protected $loginflag = null;
    protected $userInfo = [];
    /*
     * 主控制器讓其他控制器繼承
     * 連接view
     */
    function __construct()
    {
        $this->view = new View();
        $this->smarty = new Mysmarty();
        $this->helper = new Helper();
        // $path = URL . "login/index";

        if (!isset($_COOKIE['token']) || empty($_COOKIE['token'])) {
            $this->loginflag = false;
        } else {
            $DBCustomer = $this->DBCustomer;
            $userInfo = $DBCustomer->getOne(['token' => $_COOKIE['token']]);
            if (empty($userInfo) || $userInfo['released'] !== '1') {
                $this->loginflag = false;
            } else {
                $this->loginflag = true;
                $this->userInfo = $userInfo;
            }
        }
    }

    function __get($modelname)
    {
        if (substr($modelname, 0, 2) === "DB") {
            $name = substr($modelname, 2);
            $path = 'models/' . $name . 'Model.php';
            if (file_exists($path)) {
                require($path);
                $modelname = $name . 'Model';
                $this->{"DB{$name}"} = new $modelname;
                return new $modelname;
            }
        }
    }
}
