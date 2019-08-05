<?php

class CartController extends controller 
{
    /*
     * 購物車首頁
     */
    public function index()
    {
        $goods = [];
        if (isset($_COOKIE['cart']) && !empty($_COOKIE['cart'])) {
            $cart = json_decode($_COOKIE['cart']);
            $cartgoods = [];
            foreach ($cart as $k=>$v) {
                if (is_numeric($k) ||  $k > 0) {
                    $cartgoods[$k] = $v;
                }
            }
            $DBGoods = $this->DBGoods;
            $gid = implode(',', array_keys($cartgoods));
            $gid = $gid === '' ?-1:$gid;
            $goods = $DBGoods->getAll("gid in (" . $gid . ")");
            foreach($goods as $key => $goodsInfo) {
                if (array_key_exists($goodsInfo['gid'], $cartgoods)) {
                    $goods[$key]['buynum'] = $cartgoods[$goodsInfo['gid']];
                    $goods[$key]['sumprice'] = $goods[$key]['price'] * $goods[$key]['buynum'];
                }
            }
        } else {
            $cart[0] = 'cart';
            setcookie('cart',  json_encode($cart), time()+3600, "/");
        }
        $this->smarty->assign('goods',$goods);
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
        setcookie('cart',  $newcart, time()+3600, "/");
        $sumprice = $goodsInfo['price'] * $gnum;
        $setCartinfo = ['setcartinfo' => $sumprice];
        echo json_encode($setCartinfo);
    }

    /*
     * 刪除購物車
     */
    public function delete()
    {
        parse_str(file_get_contents('php://input'), $data);
        if (isset($_COOKIE['cart']) && !empty($_COOKIE['cart'])) {
            $cart = json_decode($_COOKIE['cart']);
            foreach ($cart as $cgid => $cgnum) {
                if ($cgid === $data['gid']) {
                    unset($cart->$cgid);
                }
            }

            $cart = json_encode($cart);
            setcookie('cart', $cart, time()+3600, '/');
            $setCartInfo = ['setcartinfo' => 'success'];
            echo json_encode($setCartInfo);
        }
    }

    public function checkOut()
    {
        ##檢查使用者是否登入
        if (!isset($_COOKIE['token']) || empty($_COOKIE['token'])) {
            $checkOutInfo = ['checkoutinfo' => 'notlogin'];
            echo json_encode($checkOutInfo);
            exit;
        }
        $token = $_COOKIE['token'];
        $DBCustomer = $this->DBCustomer;
        $userInfo = $DBCustomer->getOne(['token' => $token]);
        if (empty($userInfo)) {
            $checkOutInfo = ['checkoutinfo' => 'tokenfail'];
            echo json_encode($checkOutInfo);
            exit;
        }

        ##檢查購物車
        if (isset($_COOKIE['cart']) && !empty($_COOKIE['cart'])) {
            $cart = json_decode($_COOKIE['cart']);
            $cartdata = [];
            foreach ($cart as $cgid => $cgnum) {
                if (is_numeric($cgid) && is_numeric($cgnum)) {
                    if ($cgnum < 1) {
                        $cartdata[$cgid] = 1;
                    } else {
                        $cartdata[$cgid] = $cgnum;
                    }
                    
                }
            }

            ##根據購物車取商品
            $DBGoods = $this->DBGoods;
            $gid = implode(',',array_keys($cartdata));
            $goodsInfo = $DBGoods->getAll("gid in (" . $gid . ")");

            if (empty($goodsInfo)) {
                $checkOutInfo = ['checkoutinfo' => 'fail'];
                echo json_encode($checkOutInfo);
                exit;
            }

            ##訂單成立
            $DBOrders = $this->DBOrders;
            $DBOrders->setBeginTransaction();
            ## 寫入訂單發現庫存不足時傳入商品id放這
            $errorStockId = [];
            foreach ($goodsInfo as $key => $goods) {
                $orderInfo = [];
                // if ($goods['stock'] >= $goods['gid']) {
                //     $goodsInfo[$key]['num'] = $cartdata[$goods['gid']];
                // } else {
                //     $goodsInfo[$key]['num'] = $goodsInfo[$key]['stock'];
                // }

                $goodsInfo[$key]['num'] = $cartdata[$goods['gid']];

                $DBGoods->update(['stock' => ($goods['stock'] - $goodsInfo[$key]['num'])], $goods['gid']);
                if (($goods['stock'] - $goodsInfo[$key]['num']) < 0) {
                    array_push($errorStockId, $goods['gid']);
                }

                $orderInfo['onum'] = (string) date("YmdHis").$userInfo['cid'];
                $orderInfo['cid'] = $userInfo['cid'];
                $orderInfo['gid'] = $goods['gid'];
                $orderInfo['name'] = $goods['name'];
                $orderInfo['price'] = $goods['price'];
                $orderInfo['number'] = $goodsInfo[$key]['num'];
                $orderInfo['address'] = $userInfo['address'];
                $orderInfo['createTime'] = time();
                if ($DBOrders->add($orderInfo) !== 1 ) {
                    $checkOutInfo = ['checkoutinfo' => 'fail'];
                    echo json_encode($checkOutInfo);
                    exit;
                }
            }

            ## 無發現庫存部則情況則提交
            if (empty($errorStockId)) {
                 $DBOrders->setCommit();
                $checkOutInfo = ['checkoutinfo' => 'success'];
                echo json_encode($checkOutInfo);
                exit;
            } else {
                ## 有庫存不足的商品則回滾，並回報
                $DBOrders->setRollBack();
                $checkOutInfo = ['checkoutinfo' => $errorStockId];
                echo json_encode($checkOutInfo);
                exit;
            }

        }
    }
}
