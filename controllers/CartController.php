<?php

class CartController extends controller 
{
    public function index()
    {
        setcookie('cart', 1234 ,time() + 3600,'/');
        var_dump($_COOKIE['cart']);
        $goods = [];
        if (isset($_COOKIE['cart']) && !empty($_COOKIE['cart'])) {
            $cart = json_decode($_COOKIE['cart']);
            $cartgoods = [];
            foreach ($cart as $k=>$v) {
                echo $k;
                if (is_numeric($k) ||  $k > 0) {
                    $cartgoods[$k] = $v;
                }
            }
            $DBGoods = $this->DBGoods;
            $gid = implode(',', array_keys($cartgoods));
            $goods = $DBGoods->getAll("gid in (" . $gid . ")");
            var_dump($goods);
        } else {
            setcookie('cart', '' ,time() + 3600, "/");
        }
        $this->smarty->assign('goods',$goods);
        $this->smarty->display('home/goods/cart.html');
    }

    public function setCart($res = false)
    {
        // ##檢查接收的商品id
        // if (!is_numeric($res[0]) || $res[0] <= 0) {
        //     header("Location:../index/index");
        // }
        // $gid = $res[0];
        // $DBGoods = $this->DBGoods;
        // $goodsInfo = $DBGoods->findOne($gid);
        // if (empty($goodsInfo)) {
        //     header("Location:../index/index");
        // }

        // ##檢查接收的商品數量
        // if (isset($_POST['num']) || is_numeric($_POST['num'])) {
        //     $gnum = $_POST['num'];
        // } else {
        //     $gnum = 1;
        // } 
        
        var_dump($_COOKIE['cart']);
        exit;

        if (!isset($_COOKIE['cart'])) {
            setcookie('cart', '' ,time() + 3600, "/");
        } 

        $cart = json_decode($_COOKIE['cart']);

        var_dump($cart);
        exit;

        foreach ($cart as $cgid => $cgnum) {
            if (!is_numeric($gid) || !is_numeric($cgnum)) {
                unset($cart[$gid]);
            }
        }

        var_dump($gid);


    }
}
