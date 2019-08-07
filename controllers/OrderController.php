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
        ##檢查使用者是否登入
        if (!isset($_COOKIE['token']) || empty($_COOKIE['token'])) {
            header("Location:../index/index");
            exit;
        }

        ## 檢查用戶合法性
        $token = $_COOKIE['token'];
        $DBCustomer = $this->DBCustomer;
        $userInfo = $DBCustomer->getOne(['token' => $token]);
        if (empty($userInfo) || $userInfo['released'] !== '1') {
            header("Location:../index/index");
            exit;
        }

        $DBOrders = $this->DBOrders;
        $orderInfo = $DBOrders->getOrders($userInfo['cid']);
        if (!empty($orderInfo)) {
            foreach ($orderInfo as $key => $info) {
                date_default_timezone_set("Asia/Taipei");
                $orderInfo[$key]['createTime'] = date("Y-m-d H:i:s", $info['createTime']);
            }
        }

        $loginFlag = !empty($userInfo);

        $this->smarty->assign('userinfo', $userInfo);
        $this->smarty->assign('loginflag', $loginFlag);
        $this->smarty->assign('orders', $orderInfo);
        $this->smarty->display("home/orders/myorders.html");
    }

    public function showGoods($reg = false)
    {
        ##檢查使用者是否登入
        if (!isset($_COOKIE['token']) || empty($_COOKIE['token'])) {
            $path = URL . "login/index";
            header("Location: {$path}");
            exit;
        }

        ## 檢查用戶合法性
        $token = $_COOKIE['token'];
        $DBCustomer = $this->DBCustomer;
        $userInfo = $DBCustomer->getOne(['token' => $token]);
        if (empty($userInfo) || $userInfo['released'] !== '1') {
            $path = URL . "login/index";
            header("Location: {$path}");
            exit;
        }

        ## 檢查訂單編號
        if (empty($reg[0]) || !is_numeric($reg[0])) {
            $path = URL . "index/index";
            header("Location: {$path}");
            exit;
        } else {
            $onum = $reg[0];
        }

        ## 檢查訂單是否存 並且屬於該登入使用者
        $DBOrders = $this->DBOrders;
        $orderInfo = $DBOrders->getOne(['onum' => $onum]);
        if (empty($orderInfo) || $orderInfo['cid'] !== $userInfo['cid']) {
            $path = URL . "index/index";
            header("Location: {$path}");
            exit;
        }

        $goodsInfo = $DBOrders->getOrderGoods($onum);

        $loginFlag = !empty($userInfo);

        $this->smarty->assign('userinfo', $userInfo);
        $this->smarty->assign('goods', $goodsInfo);
        $this->smarty->assign('loginflag', $loginFlag);
        $this->smarty->display("home/orders/ordergoods.html");
    }
}
