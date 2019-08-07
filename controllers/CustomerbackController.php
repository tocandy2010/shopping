<?php

class CustomerbackController extends controller
{
    /*
     * 會員管理
     */
    public function index()
    {
        if (!isset($_COOKIE['admintoken']) || empty($_COOKIE['admintoken'])) {
            header("Location: ../loginback/index");
            exit;
        } else {
            $DBAdmin = $this->DBAdmin;
            $userInfo = $DBAdmin->getOne(['token' => $_COOKIE['admintoken']]);
            if (empty($userInfo)) {
                header("Location: ../loginback/index");
                exit;
            }
        }
        $loginflag = true;
        $DBCustomer = $this->DBCustomer;
        $customer = $DBCustomer->getAll();
        ## 轉換顯示時間格式
        if (!empty($customer)) {
            foreach ($customer as $key=>$info) {
                date_default_timezone_set("Asia/Taipei");
                $customer[$key]['regTime'] = date('Y-m-d H:i:s', $info['regTime']);
            }
        }
        $this->smarty->assign('loginflag', $loginflag);
        $this->smarty->assign('customer', $customer);
        $this->smarty->display("back/customer/customer.html");
    }

    public function setCustonerStatus()
    {
        ## 驗證此用者登入
        if (!isset($_COOKIE['admintoken']) || empty($_COOKIE['admintoken'])) {
            echo json_encode(['setstatus' => "notlogin"]);
            exit;
        } else {
            $DBAdmin = $this->DBAdmin;
            $userInfo = $DBAdmin->getOne(['token' => $_COOKIE['admintoken']]);
            if (empty($userInfo)) {
                echo json_encode(['setstatus' => "notlogin"]);
                exit;
            }
        }

        ## 接收並檢查接收變數
        parse_str(file_get_contents('php://input'), $data);
        if (!isset($data) || empty($data)) {
            echo json_encode(['setstatus' => "fail"]);
            exit;
        } else {
            $cid = $data['cid'];
            $status = $data['status'];
        }

        ## 驗證並取得該顧客資訊
        $DBCustomer = $this->DBCustomer;
        $customerInfo = $DBCustomer->findOne($cid);
        if (empty($customerInfo)) {
            echo json_encode(['setstatus' => "fail"]);
            exit;
        }

        ## 修改 released 狀態
        $status = $status === '1' ? 0 : 1;
        if ($DBCustomer->update(['released' => $status], $cid) === 1) {
            echo json_encode(['setstatus' => "success"]);
            exit;
        } else {
            echo json_encode(['setstatus' => "fail"]);
            exit;
        }
    }
}
