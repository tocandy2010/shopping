<?php

class OrderbackController extends AdminController
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
        ## 取得登入資訊
        $userInfo = $this->userInfo;
        $loginflag = $this->loginflag;

        ## 取得搜尋GET參數
        $condition = [];
        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $condition['onum'] = htmlspecialchars($_GET['search'], ENT_QUOTES);
            $searchdata = $_GET['search'];
        } else {
            $searchdata = "";
        }

        ## 取得訂單狀態GET參數
        if (isset($_GET['status']) && !empty($_GET['status'])) {
            $condition['status'] = $_GET['status'];
            $statusdata = $_GET['status'];
        } else {
            $statusdata = "";
        }

        ## 分頁
        $DBOrders = $this->DBOrders;
        $perpage = 10;
        $orderlgn = count($DBOrders->getOrders(false, $condition));
        $page = isset($_GET['page']) && is_numeric($_GET['page']) && $_GET['page'] > 1 ? $_GET['page'] : 1;

        $pagetool = new Pagetool($orderlgn, $page, $perpage);
        $pagenum = $pagetool->show();
        $url = $pagetool->getUrl();
        if ($pagetool->getPageTotal() <= $page) {
            $page = $pagetool->getPageTotal();
        }

        ## 取得訂單資訊
        $offset = ($page - 1) * $perpage;
        $orderInfo = $DBOrders->getOrders(false, $condition, $offset, $perpage);
        if (!empty($orderInfo)) {
            foreach ($orderInfo as $key => $info) {
                date_default_timezone_set("Asia/Taipei");
                $orderInfo[$key]['createTime'] = date("Y-m-d H:i:s", $info['createTime']);
            }
        }

        ## 取得狀態資訊
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

        $this->smarty->assign('url', $url);
        $this->smarty->assign('pagenum', $pagenum);
        $this->smarty->assign('nowpage', $page);
        $this->smarty->assign('searchdata', $searchdata);
        $this->smarty->assign('statushdata', $statusdata);
        $this->smarty->assign('userinfo', $userInfo);
        $this->smarty->assign('ostatus', $ostatusInfo);
        $this->smarty->assign('loginflag', $loginflag);
        $this->smarty->assign('orders', $orderInfo);
        $this->smarty->display("back/orders/orders.html");
    }

    public function showGoods($reg = false)
    {
        $userInfo = $this->userInfo;

        $path = URL . "indexback/index";
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

        $this->smarty->assign('onum', $onum);
        $this->smarty->assign('userinfo', $userInfo);
        $this->smarty->assign('goods', $goodsInfo);
        $this->smarty->assign('loginflag', $loginFlag);
        $this->smarty->display("back/orders/ordergoods.html");
    }

    /*
     * 修改訂單狀態
     */
    public function editstatus()
    {
        $info = [
            'info' => false,
            'message' => '',
            'error' => '',
        ];

        parse_str(file_get_contents('php://input'), $data);

        ## 檢查狀態參數
        if (!is_numeric($data['status']) || !is_numeric($data['onum']) || empty($data)) {
            $info = [
                "info" => false,
                "message" => '狀態碼或訂單編號錯誤',
            ];
            echo json_encode($info);
            exit;
        } else {
            $status = $data['status'];
        }

        ## 檢查狀態碼合法性
        $DBOstatus = $this->DBOstatus;
        $statusInfo = $DBOstatus->getOne(['onum' => $status]);
        if (empty($statusInfo)) {
            $info = [
                "info" => false,
                "message" => '找不到此狀態號碼'
            ];
            echo json_encode($info);
            exit;
        }

        ## 檢查訂單號碼是否存在
        $DBOrders = $this->DBOrders;
        $orderInfo = $DBOrders->getOne(['onum' => $data['onum']]);
        if (empty($orderInfo)) {
            $info = [
                "info" => false,
                "message" => '找不到此訂單'
            ];
            echo json_encode($info);
            exit;
        }

        ## 檢查是否已入庫
        if ($orderInfo['status'] === '3') {
            $info = [
                "info" => false,
                "message" => '此訂單已結單'
            ];
            echo json_encode($info);
            exit;
        }

        if ($DBOrders->editOrders(['status' => $status], $orderInfo['onum']) !== 1) {
            $info = [
                "info" => false,
                "message" => '修改失敗'
            ];
            echo json_encode($info);
            exit;
        }

        $info = [
            "info" => true,
            "message" => $status,
            "statusname" => $statusInfo['name'],
        ];
        echo json_encode($info);
        exit;
    }
}
