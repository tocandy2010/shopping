<?php

class LoginController extends Controller
{

    public function __construct()
    {
        parent::__construct();
        // var_dump($this->loadModel("Customer")->getAll());
    }

    public function index($reg = false)
    {
        var_dump($this->DBCustomer->getAll());
        return $this->smarty->display("home/login/login.html");
    }

    /*
     *  新增頁面
     */
    public function create()
    {
        $this->smarty->assign('headimg', "");
        return $this->smarty->display('home/login/reg.html');
    }

    /*
     *  新增處理
     */
    public function add()
    {
        $reginfo['email'] = $_POST['email'];
        $reginfo['password'] = $_POST['password'];
        // $reginfo['repassword'] = $_POST['repassword'];
        $reginfo['name'] = $_POST['name'];
        $reginfo['phone'] = $_POST['phone'];
        $reginfo['address'] = $_POST['address'];
        $reginfo['regTime'] = time();

        if ($this->model->add($reginfo) === 1) {
            $reginfo = ['reginfo' => "success"];
            echo json_encode($reginfo);
        } else {
            $reginfo = ['reginfo' => "fail"];
            echo json_encode($reginfo);
        }
    }

    /*
     *  修改頁面
     */
    public function edit()
    {
        echo "edit";
    }

    /*
     *  修改處理
     */
    public function update($id = false)
    { }

    /*
     *  登出
     */
    public function logout()
    {
        header("Location:" . URL . "login/index");
    }

    /*
     *  登入驗證
     */
    public function loginCheck()
    {
        $logininfo['email'] = $_POST['email'];
        $logininfo['password'] = $_POST['password'];
        $logininfo['vcode'] = $_POST['vcode'];
        $token = $this->holp->getUser();
        $chekc = true;
        if ($chekc === true) {
            $logininfo = ['logininfo' => 'success'];
            echo json_encode($logininfo);
        } else {
            $logininfo = ['logininfo' => 'fail'];
            echo json_encode($logininfo);
        }
    }

    protected function getToken($id)
    {
        $str = "abcdefghijklmnopqrstuvwxyz";
        $str .= strtoupper($str);
        $str .= "0123456789";
        $str .= "+-*/$.?:";
        $str = str_repeat($str, 10);
        $str = str_shuffle($str);
        $token = substr($str, 0, 50) . $id;
        return $token;
    }
}
