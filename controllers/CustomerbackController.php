<?php

class CustomerbackController extends Admincontroller
{
    /*
     * 會員管理
     */
    public function index()
    {
        $userInfo = $this->userInfo;

        $loginFlag = true;
        $DBCustomer = $this->DBCustomer;
        $customer = $DBCustomer->getAll();
        ## 轉換顯示時間格式
        if (!empty($customer)) {
            foreach ($customer as $key=>$info) {
                date_default_timezone_set("Asia/Taipei");
                $customer[$key]['regTime'] = date('Y-m-d H:i:s', $info['regTime']);
            }
        }
        $this->smarty->assign('loginflag', $loginFlag);
        $this->smarty->assign('userinfo', $userInfo);
        $this->smarty->assign('customer', $customer);
        $this->smarty->display("back/customer/customer.html");
    }

    public function setCustonerStatus()
    {
        // ## 驗證此用者登入
        // if (!isset($_COOKIE['admintoken']) || empty($_COOKIE['admintoken'])) {
        //     echo json_encode(['setstatus' => "notlogin"]);
        //     exit;
        // } else {
        //     $DBAdmin = $this->DBAdmin;
        //     $userInfo = $DBAdmin->getOne(['token' => $_COOKIE['admintoken']]);
        //     if (empty($userInfo)) {
        //         echo json_encode(['setstatus' => "notlogin"]);
        //         exit;
        //     }
        // }

        $userInfo = $this->userInfo;

        ## 接收並檢查接收變數
        parse_str(file_get_contents('php://input'), $data);
        if (!isset($data) || empty($data)) {
            $info = [
                'info' => false,
                'message' => '錯誤',
            ];
            echo json_encode($info);
            exit;
        } else {
            $cid = $data['cid'];
            $status = $data['status'];
        }

        ## 驗證並取得該顧客資訊
        $DBCustomer = $this->DBCustomer;
        $customerInfo = $DBCustomer->findOne($cid);
        if (empty($customerInfo)) {
            $info = [
                'info' => false,
                'message' => '錯誤',
            ];
            echo json_encode($info);
            exit;
        }

        ## 修改 released 狀態
        $status = $status === '1' ? 0 : 1;
        if ($DBCustomer->update(['released' => $status], $cid) !== 1) {
            $info = [
                'info' => false,
                'message' => '錯誤',
            ];
            echo json_encode($info);
            exit;
        }

        $info = [
            'info' => true,
            'status' => $status,
        ];
        echo json_encode($info);
        exit;
    }
}
