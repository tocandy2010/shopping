<?php

class OrderController extends Controller
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
        //parse_str(file_get_contents('php://input'), $data);
        echo 123;
    }

    /*
     *  新增頁面
     */
    public function create()
    {
        echo "create";
    }

    /*
     *  新增處理
     */
    public function add($id = false)
    {
        echo "add";
        var_dump($this->model);
        $this->view->render("home/index");
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
     *  刪除處裡
     */
    public function delete()
    {
        echo "delete";
    }

    public function cart()
    {
        ##判斷使用者登入
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
        return $this->smarty->display('home/goods/cart.html');
    }
}
