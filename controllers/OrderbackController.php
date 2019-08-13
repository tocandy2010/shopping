<?php

class OrderbackController extends Controller
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
        $path = URL . "loginback/index";
        ##檢查使用者是否登入
        if (!isset($_COOKIE['admintoken']) || empty($_COOKIE['admintoken'])) {
            header("Location:{$path}");
            exit;
        }

        ## 檢查用戶合法性
        $token = $_COOKIE['admintoken'];
        $DBAdmin = $this->DBAdmin;
        $userInfo = $DBAdmin->getOne(['token' => $token]);
        if (empty($userInfo)) {
            header("Location:{$path}");
            exit;
        }

        ## 取得訂單資訊
        $DBOrders = $this->DBOrders;
        $orderInfo = $DBOrders->getOrders();
        if (!empty($orderInfo)) {
            foreach ($orderInfo as $key => $info) {
                date_default_timezone_set("Asia/Taipei");
                $orderInfo[$key]['createTime'] = date("Y-m-d H:i:s", $info['createTime']);
            }
        }

        ##取得狀態資訊
        $DBOstatus = $this->DBOstatus;
        $ostatusInfo = $DBOstatus->getAll();

        ## 根據status加入狀態名稱
        foreach ($orderInfo as $orderk => $orderv) {
            foreach ($ostatusInfo as $ostausk => $ostausv) {
                if ($orderv['status'] === $ostausv['onum']) {
                    $orderInfo[$orderk]['statusName'] = $ostausv['name'];
                    break;
                }
            }
        }

        $loginFlag = !empty($userInfo);

        $this->smarty->assign('userinfo', $userInfo);
        $this->smarty->assign('ostatus', $ostatusInfo);
        $this->smarty->assign('loginflag', $loginFlag);
        $this->smarty->assign('orders', $orderInfo);
        $this->smarty->display("back/orders/orders.html");
    }

    public function showGoods($reg = false)
    {
        $path = URL . "loginback/index";
        ##檢查使用者是否登入
        if (!isset($_COOKIE['admintoken']) || empty($_COOKIE['admintoken'])) {
            header("Location: {$path}");
            exit;
        }

        ## 檢查用戶合法性
        $token = $_COOKIE['admintoken'];
        $DBAdmin = $this->DBAdmin;
        $userInfo = $DBAdmin->getOne(['token' => $token]);
        if (empty($userInfo)) {
            header("Location: {$path}");
            exit;
        }

        ## 檢查訂單編號
        if (empty($reg[0]) || !is_numeric($reg[0])) {
            header("Location: {$path}");
            exit;
        } else {
            $onum = $reg[0];
        }

        ## 檢查訂單是否存 並且屬於該登入使用者
        $DBOrders = $this->DBOrders;
        $orderInfo = $DBOrders->getOne(['onum' => $onum]);
        if (empty($orderInfo)) {
            header("Location: {$path}");
            exit;
        }

        $goodsInfo = $DBOrders->getOrderGoods($onum);

        $loginFlag = !empty($userInfo);

        $this->smarty->assign('userinfo', $userInfo);
        $this->smarty->assign('goods', $goodsInfo);
        $this->smarty->assign('loginflag', $loginFlag);
        $this->smarty->display("back/orders/ordergoods.html");
    }

    public function editstatus()
    {
        $path = URL . "loginback/index";
        ##檢查使用者是否登入
        if (!isset($_COOKIE['admintoken']) || empty($_COOKIE['admintoken'])) {
            header("Location:{$path}");
            exit;
        }

        ## 檢查用戶合法性
        $token = $_COOKIE['admintoken'];
        $DBAdmin = $this->DBAdmin;
        $userInfo = $DBAdmin->getOne(['token' => $token]);
        if (empty($userInfo)) {
            header("Location:{$path}");
            exit;
        }

        parse_str(file_get_contents('php://input'), $data);

        ## 檢查狀態參數
        if (!is_numeric($data['status']) || !is_numeric($data['onum']) || empty($data)) {
            $editinfo = [
                ["info" => false],
                ["message" => '狀態碼或訂單編號錯誤']
            ];
            echo json_encode(['editinfo' => $editinfo]);
            exit;
        } else {
            $status = $data['status'];
        }

        ## 檢查狀態碼合法性
        $DBOstatus = $this->DBOstatus;
        $statusInfo = $DBOstatus->getOne(['onum' => $status]);
        if (empty($statusInfo)) {
            $editinfo = [
                ["info" => false],
                ["message" => '找不到此狀態號碼']
            ];
            echo json_encode(['editinfo' => $editinfo]);
            exit;
        }

        ## 檢查訂單號碼是否存在
        $DBOrders = $this->DBOrders;
        $orderInfo = $DBOrders->getOne(['onum' => $data['onum']]);
        if (empty($orderInfo)) {
            $editinfo = [
                ["info" => false],
                ["message" => '找不到此訂單']
            ];
            echo json_encode(['editinfo' => $editinfo]);
            exit;
        }

        ## 檢查是否已入庫
        if ($orderInfo['status'] === '3') {
            $editinfo = [
                ["info" => false],
                ["message" => '此訂單已結單']
            ];
            echo json_encode(['editinfo' => $editinfo]);
            exit;
        }

        if ($DBOrders->editOrders(['status' => $status], $orderInfo['onum']) !== 1 ){
            $editinfo = [
                "info" => false,
                "message" => '修改失敗'
            ];
            echo json_encode(['editinfo' => $editinfo]);
            exit;
        }

        $editinfo = [
            "info" => true,
            "message" => $status,
            "statusname" => $statusInfo['name'],
        ];
        echo json_encode(['editinfo' => $editinfo]);
        exit;
    }
}
