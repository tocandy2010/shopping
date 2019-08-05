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
     *  新增購物車
     */
    public function add($id = false)
    {
        $gid = $_POST['gid'];
        $DBGoods = $this->DBGoods;
        $goodsInfo = $DBGoods->findOne($gid);
        if (is_numeric($gid) && !empty($goodsInfo)) {
            if (isset($_COOKIE['cart']) && !empty($_COOKIE['cart']) && !is_null($_COOKIE['cart'])) {
                $cart = json_decode($_COOKIE['cart']);
                ##過濾後的購物車內容放這
                $cartdata = [];
                ## 過濾購物車
                foreach ($cart as $cgid => $cgnum) {
                    if (is_numeric($cgid) && is_numeric($cgnum)) {
                        $cartdata[$cgid] = $cgnum;
                    }
                }

                ## 購物車中已經有商品則回傳以加入購物車
                if (array_key_exists($gid, $cartdata)) {
                    $addInfo = ['addinfo' => 'already'];
                    echo json_encode($addInfo);
                    exit;
                } else {
                    $cartdata[$gid] = 1;
                }
            } else {
                $cartdata[$gid] = 1;
            }
            $cartdata = json_encode($cartdata);
            setcookie('cart', $cartdata ,time()+3600,"/");
            $addInfo = ['addinfo' => 'success'];
            echo json_encode($addInfo);
            exit;
        } 

        $addInfo = ['addinfo' => 'fail'];
        echo json_encode($addInfo);
        exit;
    }

    /*
     *  商品詳細頁面
     */
    public function create($res = false)
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
        ##取得商品資訊
        $DBgoods = $this->DBgoods;
        $goodsInfo = $DBgoods->findOne($res[0]);
        if (empty($goodsInfo)) {
            header('Location:../index/index');
            exit;
        }

        ##標記是否以加入購物車
        $incartflag = false;
        if (isset($_COOKIE['cart']) && !empty($_COOKIE['cart']) && !is_null($_COOKIE['cart'])) {
            $cart = json_decode($_COOKIE['cart']);
            foreach($cart as $cgid => $cgnum) {
                if ($cgid === $res[0]) {
                    $incartflag = true;
                }
            }
        }

        $this->smarty->assign('userinfo', $userInfo);
        $this->smarty->assign('incartflag', $incartflag);
        $this->smarty->assign('goodsinfo', $goodsInfo);
        return $this->smarty->display('home/goods/goodsdetial.html');

    }
}
