<?php

class CartController extends Controller
{
    /*
     * 購物車首頁
     */
    public function index()
    {
        $userInfo = $this->userInfo;
        $loginflag = $this->loginflag;

        ## 檢查過濾購物車商品
        $goods = [];
        if (isset($_COOKIE['cart']) && !empty($_COOKIE['cart'])) {
            $cart = json_decode($_COOKIE['cart']);
            $cartgoods = [];
            foreach ($cart as $gid => $cgnum) {
                if ((is_numeric($gid) &&  $gid > 0) && (is_numeric($cgnum) && $cgnum > 0)) {
                    $cartgoods[$gid] = $cgnum;
                }
            }
            $DBGoods = $this->DBGoods;
            $gid = implode(',', array_keys($cartgoods));
            $gid = $gid === '' ? -1 : $gid;
            $goods = $DBGoods->getReleasedGoods($gid);

            ## 取得購物車商品並判斷購物車商品是否大於庫存，大於則為庫存最大值
            if (!empty($goods)) {
                foreach ($goods as $key => $goodsInfo) {
                    if (array_key_exists($goodsInfo['gid'], $cartgoods)) {
                        if ($goodsInfo['stock'] <= 0) {
                            unset($cartgoods[$goodsInfo['gid']]);
                            unset($goods[$key]);
                        } else {
                            $goods[$key]['buynum'] = $cartgoods[$goodsInfo['gid']] >= $goodsInfo['stock'] ? $goodsInfo['stock'] : $cartgoods[$goodsInfo['gid']];
                            $goods[$key]['sumprice'] = $goods[$key]['price'] * $goods[$key]['buynum'];
                        }
                    }
                }
            } else {
                $goods = [];
            }
        } else {
            $cartgoods[0] = 'cart';
        }
        setcookie('cart',  json_encode($cartgoods), time() + 3600, "/");

        ## 購物車是空的則關閉結帳按鈕
        $checkOutBtn = !empty($goods);

        $this->smarty->assign('loginflag', $loginflag);
        $this->smarty->assign('checkoutbtn', $checkOutBtn);
        $this->smarty->assign('userinfo', $userInfo);
        $this->smarty->assign('goods', $goods);
        $this->smarty->display('home/goods/cart.html');
    }

    /*
     * 購物車修改
     */
    public function setCart($res = false)
    {
        ## 檢查接收的商品id
        if (!is_numeric($res[0]) || $res[0] <= 0 || !isset($_COOKIE['cart'])) {
            $setCartinfo = ['setcartinfo' => 'fail'];
            echo json_encode($setCartinfo);
            exit;
        }

        ## 根據商品 id 獲得商品訊息
        $gid = $res[0];
        $DBGoods = $this->DBGoods;
        $goodsInfo = $DBGoods->findOne($gid);
        if ($goodsInfo === false) {
            $setCartinfo = ['setcartinfo' => 'fail'];
            echo json_encode($setCartinfo);
            exit;
        }

        ## 檢查接收的商品數量
        if (isset($_POST['gnum']) || is_numeric($_POST['gnum']) || $_POST['gnum'] >= 1) {
            $gnum = $_POST['gnum'];
        } else {
            $gnum = 1;
        }

        $cart = json_decode($_COOKIE['cart']);
        $cartdata = [];
        foreach ($cart as $cgid => $cgnum) {
            if (is_numeric($cgid) && is_numeric($cgnum)) {
                $cartdata[$cgid] = $cgnum;
            }
        }

        ## 傳入的數量超過庫存量就等於最大庫存量
        if ($gnum > $goodsInfo['stock']) {
            $gnum = $goodsInfo['stock'];
        }

        $cartdata[$gid] = $gnum;

        $newcart = json_encode($cartdata);
        setcookie('cart',  $newcart, time() + 3600, "/");
        $sumprice = $goodsInfo['price'] * $gnum;
        $setCartinfo = ['setcartinfo' => $sumprice];
        echo json_encode($setCartinfo);
    }

    /*
     * 刪除購物車的商品
     */
    public function delete()
    {
        parse_str(file_get_contents('php://input'), $data);

        if (isset($_COOKIE['cart']) && !empty($_COOKIE['cart'])) {
            $cart = json_decode($_COOKIE['cart']);
            $cartdata = [];
            foreach ($cart as $cgid => $cgnum) {
                if ($cgid !== $data['gid']) {
                    $cartdata[$cgid] = $cgnum;
                }
            }

            $cartdata = json_encode($cartdata);
            setcookie('cart', $cartdata, time() + 3600, '/');
            $setCartInfo = ['setcartinfo' => 'success'];
            echo json_encode($setCartInfo);
        }
    }

    /*
     * 結帳
     */
    public function checkOut()
    {
        $info = [
            'info' => false,
            'message' => '購物車內無任何商品',
            'error' => [],
            'redirect' => '',
            'errorstock' => [],
        ];
        
        ## 檢查使用者是否登入
        if ($this->loginflag === false) {
            $info['info'] = false;
            $info['message'] = '請先登入會員';
            $info['redirect'] = URL . "login/index";
            echo json_encode($info);
            exit;
        }

        ## 取得登入者資訊
        $userInfo = $this->userInfo;

        ## 檢查購物車
        if (isset($_COOKIE['cart']) && !empty($_COOKIE['cart'])) {
            $cart = json_decode($_COOKIE['cart']);
            $cartdata = [];
            foreach ($cart as $cgid => $cgnum) {
                if ((is_numeric($cgid)) && ($cgid > 0) && is_numeric($cgnum)) {
                    if ($cgnum < 1) {
                        $cartdata[$cgid] = 1;
                    } else {
                        $cartdata[$cgid] = $cgnum;
                    }
                }
            }

            ## 檢查購物車是否有商品
            if (empty($cartdata)) {
                $info['info'] = false;
                $info['message'] = '購物車內無任何商品';
                $info['luckbtn'] = true;
                echo json_encode($info);
                exit;
            }

            ## 訂單成立
            $DBOrders = $this->DBOrders;
            $DBOrders->setBeginTransaction();

            ## 根據購物車取商品
            $DBGoods = $this->DBGoods;
            $gid = implode(',', array_keys($cartdata));
            $goodsInfo = $DBGoods->getReleasedGoods($gid);

            if (empty($goodsInfo)) {
                $info['info'] = false;
                $info['message'] = '操作失敗';
                $info['luckbtn'] = true;
                echo json_encode($info);
                exit;
            }

            ## 寫入訂單發現庫存不足時傳入商品id放這
            $errorStockId = [];

            ## 訂單訊息放這
            $addOrderInfo = [];

            ## 產生訂單編號
            $onum = date("YmdHis") . $userInfo['cid'];

            foreach ($goodsInfo as $key => $goods) {
                $orderInfo = [];
                $goodsInfo[$key]['num'] = $cartdata[$goods['gid']];

                $DBGoods->update(['stock' => ($goods['stock'] - $goodsInfo[$key]['num'])], $goods['gid']);

                ## 檢查商品是否足夠
                if (($goods['stock'] - $goodsInfo[$key]['num']) < 0) {
                    array_push($errorStockId, $goods['gid']);
                }

                ## 編寫訂單資訊內容
                $orderInfo = [
                    'onum' => $onum,
                    'cid' => $userInfo['cid'],
                    'gid' => $goods['gid'],
                    'name' => $goods['name'],
                    'price' => $goods['price'],
                    'number' => $goodsInfo[$key]['num'],
                    'status' => 1,
                    'address' => $userInfo['address'],
                    'createTime' => time(),
                ];

                ## 每筆商品資訊存入陣列
                array_push($addOrderInfo, $orderInfo);
            }

            ## 有庫存不足的商品則資料庫回滾，並回報
            if (!empty($errorStockId)) {
                $DBOrders->setRollBack();
                $info['info'] = false;
                $info['message'] = '部分商品庫存數量不足';
                $info['errorstock'] = $errorStockId;
                $info['luckbtn'] = true;
                echo json_encode($info);
                exit;
            }

            

            ## 寫入訂單
            if (empty($addOrderInfo) || ($DBOrders->createOrder($addOrderInfo) !== count($addOrderInfo))) {
                $DBOrders->setRollBack();
                $info['info'] = false;
                $info['message'] = '操作失敗';
                $info['luckbtn'] = true;
                echo json_encode($info);
                exit;
            }

            ## 訂單成立 清空購物車
            setcookie('cart', json_encode(['-1' => '-1']), time() + 3600, "/");
            $DBOrders->setCommit();
            $info['info'] = true;
            $info['message'] = '訂單已成立';
            $info['redirect'] = URL . "order/index";
            echo json_encode($info);
            exit;
        }
    }
}
