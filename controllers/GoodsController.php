<?php

class GoodsController extends Controller
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
        ##不符合商品分類則轉到首頁
        $goodstype = ['jog', 'ski', 'boxing', 'yoga'];
        if (!in_array(strtolower($reg[0]), $goodstype)) {
            header("location: ../../index/index");
            exit;
        }

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

        $this->smarty->assign('headimg', $reg[0]);
        $this->smarty->assign('userinfo', $userInfo);
        return $this->smarty->display('home/goods/goods.html');
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

    public function show($res = false)
    {
        ##檢查商品參數
        if (!isset($res[0]) || empty($res[0]) || !is_numeric($res[0])) {
            header('Location:../index/index');
            exit;
        }

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

        // ##取得商品資訊
        // $DBgoods = $this->DBgoods;
        // $goodsInfo = $DBgoods->findOne($res[0]);
        // if (empty($gooodsInfo)) {
        //     header('Location:../index/index');
        //     exit;
        // }
        
        // $this->smarty->assign('userinfo', $userInfo);
        // $this->smarty->assign('goodsinfo', $goodsInfo);
        return $this->smarty->display('home/goods/goodsdetial.html');

    }
}
