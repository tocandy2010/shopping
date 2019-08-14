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
        ## 檢查商品分類
        $DBGtype = $this->DBGtype;
        $gtype = $DBGtype->getAll();
        $flag = false;
        $tnum = "";
        foreach ($gtype as $type) {
            if ($reg[0] == $type['name']) {
                $flag = true;
                $tnum = $type['tnum'];
            }
        }
        if ($flag === false) {
            $home = URL . "index/index";
            header("Location: {$home}");
        }

        ##判斷使用者登入
        // if (!isset($_COOKIE['token']) || empty($_COOKIE['token'])) {
        //     $userInfo = [];
        // } else {
        //     $DBCustomer = $this->DBCustomer;
        //     $userInfo = $DBCustomer->getOne(['token' => $_COOKIE['token']]);
        //     if (!empty($userInfo)) {
        //         $this->smarty->assign('loginflag', true);
        //     }
        // }

        $userInfo = $this->userInfo;
        $loginflag = $this->loginflag;

        // ## 取得分類所有產品
        $DBGoods = $this->DBGoods;
        if (isset($_GET['search']) && $_GET['search'] !== "") {
            $search = htmlspecialchars($_GET['search'], ENT_QUOTES);
            $goodsInfo = $DBGoods->getTypeAll($tnum, $search);
        } else {
            $search = "";
            $goodsInfo = $DBGoods->getTypeAll($tnum);
        }

        $this->smarty->assign('loginflag', $loginflag);
        $this->smarty->assign('search', $search);
        $this->smarty->assign('goods', $goodsInfo);
        $this->smarty->assign('typename', $reg[0]);
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
        $home = URL . 'index/index';
        ##檢查商品參數
        if (!isset($res[0]) || empty($res[0]) || !is_numeric($res[0])) {
            header("Location:{$home}");
            exit;
        }

        ##判斷使用者登入
        // if (!isset($_COOKIE['token']) || empty($_COOKIE['token'])) {
        //     $userInfo = [];
        // } else {
        //     $DBCustomer = $this->DBCustomer;
        //     $userInfo = $DBCustomer->getOne(['token' => $_COOKIE['token']]);
        //     if (!empty($userInfo)) {
        //         $this->smarty->assign('loginflag', true);
        //     }
        // }
        $userInfo = $this->userInfo;
        $loginflag = $this->loginflag;

        ##取得商品資訊
        $DBgoods = $this->DBgoods;
        $goodsInfo = $DBgoods->findOne($res[0]);
        if (empty($goodsInfo)) {
            header('Location:{$home}');
            exit;
        }

        ## 取得商品分類名稱
        $DBGtype = $this->DBGtype;
        $typeInfo = $DBGtype->getOne(['tnum' => $goodsInfo['tnum']]);
        if (empty($goodsInfo)) {
            header('Location:{$home}');
            exit;
        }

        ##標記是否以加入購物車
        $incartflag = false;
        if (isset($_COOKIE['cart']) && !empty($_COOKIE['cart']) && !is_null($_COOKIE['cart'])) {
            $cart = json_decode($_COOKIE['cart']);
            if (!is_null($cart)) {
                foreach($cart as $cgid => $cgnum) {
                    if ($cgid === $res[0]) {
                        $incartflag = true;
                    }
                }
            }
        }

        $this->smarty->assign('loginflag', $loginflag);
        $this->smarty->assign('userinfo', $userInfo);
        $this->smarty->assign('typename', $typeInfo['name']);
        $this->smarty->assign('incartflag', $incartflag);
        $this->smarty->assign('goodsinfo', $goodsInfo);
        return $this->smarty->display('home/goods/goodsdetial.html');
    }
}
