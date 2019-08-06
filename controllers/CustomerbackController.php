<?php

class CustomerbackController extends controller
{
    /*
     * 會員管理
     */
    public function index()
    {
        if (!isset($_COOKIE['token']) || empty($_COOKIE['token'])) {
            header("Location: ../loginback/index");
            exit;
        } else {
            $DBAdmin = $this->DBAdmin;
            $userInfo = $DBAdmin->getOne(['token' => $_COOKIE['token']]);
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
                $customer[$key]['regTime'] = date('Y-m-d H:i:s', $info['regTime']);
            }
        }
        $this->smarty->assign('loginflag', $loginflag);
        $this->smarty->assign('customer', $customer);
        $this->smarty->display("back/customer/customer.html");
    }
}
