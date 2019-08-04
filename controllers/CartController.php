<?php

class CartController extends controller 
{
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
        } else {
            $cart[0] = 'cart';
            setcookie('cart',  json_encode($cart), time()+3600, "/");
        }
        $this->smarty->assign('goods',$goods);
        $this->smarty->display('home/goods/cart.html');
    }

    public function setCart($res = false)
    {
        ##檢查接收的商品id
        if (!is_numeric($res[0]) || $res[0] <= 0 || !isset($_COOKIE['cart'])) {
            $setCartinfo['setCartinfo'] = 'fail';
            exit;
        }
        $gid = $res[0];
        $DBGoods = $this->DBGoods;
        $goodsInfo = $DBGoods->findOne($gid);

        if ($goodsInfo === false) {
            $setCartinfo['setCartinfo'] = 'fail';
            exit;
        }
        ##檢查接收的商品數量
        if (isset($_POST['gnum']) || is_numeric($_POST['gnum'])) {
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

        if ($gnum > $goodsInfo['stock']) {
            $gnum = $goodsInfo['stock'];
        }

        $newcart = json_encode($cartdata);
        setcookie('cart',  $newcart, time()+3600, "/");
        $setCartinfo['setCartinfo'] = 'success';
        echo 13;
    }
}
