<?php

class GoodsbackController extends AdminController
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

        ## 判斷商品分類參數
        $type = ((isset($_GET['type']) && is_numeric($_GET['type']) && ($_GET['type'] >= 1))) ? $_GET['type'] : 1;

        ## 獲取商品分類
        $DBGtype = $this->DBGtype;
        $gtypeInfo = $DBGtype->getAll();

        ## 檢查商品分類參數是否存在,不存在則找分類最小數字
        $typeinfo = $DBGtype->getOne(['tnum' =>  $type]);
        $mintype = min($gtypeInfo);
        $type = !empty($typeinfo) ? $type : $mintype['tnum'];

        ## 獲得商品資訊
        $DBGoods = $this->DBGoods;
        $goodsInfo = $DBGoods->getTypeAll($type);
        if (!empty($goodsInfo)) {
            date_default_timezone_set("Asia/Taipei");
            foreach ($goodsInfo as $key => $item) {
                date_default_timezone_set("Asia/Taipei");
                $goodsInfo[$key]['addTime'] = date("Y-m-d H:i:s", $item['addTime']);
            }
        }

        $this->smarty->assign('typename', $typeinfo['name']);
        $this->smarty->assign('gtype', $gtypeInfo);
        $this->smarty->assign('goods', $goodsInfo);
        $this->smarty->assign('userinfo', $userInfo);
        return $this->smarty->display('back/goods/goods.html');
    }

    /*
     * 新增商品頁面
     */
    public function create()
    {
        ## 取得登入資訊
        $userInfo = $this->userInfo;

        $DBGtype = $this->DBGtype;
        $typeinfo = $DBGtype->getAll();
        $loginflag = true;
        $this->smarty->assign('type', $typeinfo);
        $this->smarty->assign('userinfo', $userInfo);
        $this->smarty->assign('loginflag', $loginflag);
        return $this->smarty->display('back/goods/newgoods.html');
    }

    /*
     * 新增商品
     */
    public function add()
    {
        $info = [
            'info' => false,
            'message' => '',
            'error' => '',
            'redirect' => '',
        ];

        ## 檢查商品分類
        if (isset($_POST['tnum'])) {
            $addInfo['tnum'] = $_POST['tnum'];
        } else {
            $error['tnum'] = "商品分類未選擇";
            $info = [
                'info' => false,
                'message' => '',
                'error' => $error,
                'redirect' => '',
            ];
            echo json_encode($info);
            exit;
        }
        $addInfo['name'] = trim($_POST['name']);
        $addInfo['price'] = $_POST['price'];
        $addInfo['stock'] = $_POST['stock'];
        $addInfo['uses'] = trim($_POST['uses']);
        $addInfo['material'] = trim($_POST['material']);

        ## 檢查上傳圖片
        $gimg = $_FILES['gimg'];
        $error = [];
        if ($gimg['error'] === 4) {
            $error['gimg'] = '未上傳商品圖片';
        } else if ($gimg['error'] !== 0) {
            $error['gimg'] = '上傳失敗';
        }
        if (!empty($error)) {
            $info = [
                'info' => false,
                'message' => '',
                'error' => $error,
                'redirect' => '',
            ];
            echo json_encode($info);
            exit;
        }
        $gimgtype = explode('/', $gimg['type']);
        if ($gimgtype[0] !== 'image') {
            $error['gimg'] = '上傳了非圖片文件';
        }
        if (!empty($error)) {
            $info = [
                'info' => false,
                'message' => '',
                'error' => $error,
                'redirect' => '',
            ];
            echo json_encode($info);
            exit;
        }

        ## 設定傳入資料要驗證的格式
        $verification = [
            'name' => array('length' => '1~20'),
            'price' => array('between' => "1~100000"),
            'stock' => array('between' => "1~50000"),
            'uses' => array('length' => '1~100'),
            'material' => array('length' => '1~100'),
        ];
        ## 對設定格式驗證表單
        $errorMessage = $this->helper->checkForm($addInfo, $verification);
        if (!empty($this->helper->checkForm($addInfo, $verification))) {
            $info = [
                'info' => false,
                'message' => '',
                'error' => $errorMessage,
                'redirect' => '',
            ];
            echo json_encode($info);
            exit;
        }

        ## 驗證商品分類
        $DBGtype = $this->DBGtype;
        $typeinfo = $DBGtype->getOne(['tnum' => $addInfo['tnum']]);
        if (empty($typeinfo)) {
            $error['tnum'] = "商品分類錯誤";
            $info = [
                'info' => false,
                'message' => '',
                'error' => $error,
                'redirect' => '',
            ];
            echo json_encode($info);
            exit;
        } else {
            $addInfo['tnum'] = $typeinfo['tnum'];
        }

        ## 檢查商品名稱是否重複
        $DBGoods = $this->DBGoods;
        $checkName = $DBGoods->getOne(['name' => $addInfo['name']]);
        if (!empty($checkName)) {
            $error['name'] = "商品名稱已被使用";
            $info = [
                'info' => false,
                'message' => '',
                'error' => $error,
                'redirect' => '',
            ];
            echo json_encode($info);
            exit;
        }

        ## 上傳商品圖片到指定資料夾
        $path = "public/homeimg/goodsimg/";
        if (move_uploaded_file($gimg['tmp_name'], $path . $addInfo['name'] . ".png")) {
            $addInfo['gimg'] = $path . $addInfo['name'] . ".png";
        } else {
            $error['gimg'] = '圖片上傳失敗';
            $info = [
                'info' => false,
                'message' => '',
                'error' => $error,
                'redirect' => '',
            ];
            echo json_encode($info);
            exit;
        }

        date_default_timezone_set("Asia/Taipei");
        $addInfo['addTime'] = time();
        $addInfo['name'] = htmlspecialchars($addInfo['name'], ENT_QUOTES);
        $addInfo['uses'] = htmlspecialchars($addInfo['uses'], ENT_QUOTES);
        $addInfo['material'] = htmlspecialchars($addInfo['material'], ENT_QUOTES);

        if (!file_exists($path . $addInfo['name'] . ".png")) {
            $error['gimg'] = '上傳失敗';
            $info = [
                'info' => false,
                'message' => '',
                'error' => $error,
                'redirect' => '',
            ];
            echo json_encode($info);
            exit;
        }

        if ($DBGoods->add($addInfo) !== 1) {
            $info = [
                'info' => false,
                'message' => "錯誤",
                'error' => '',
                'redirect' => '',
            ];
            echo json_encode($info);
            exit;
        }

        $info = [
            'info' => true,
            'message' => "成功新增商品",
            'error' => '',
            'redirect' => URL . "goodsback/index",
        ];
        echo json_encode($info);
        exit;
    }

    /*
     * 修改商品上架與下架
     */
    public function setGoodStatus()
    {
        $info = [
            'info' => false,
            'message' => '',
            'error' => '',
            'status' => '',
        ];

        ## 接收參數
        parse_str(file_get_contents('php://input'), $data);
        if (!isset($data) || empty($data)) {
            $info['info'] = false;
            $info['message'] = '操作失敗';
            echo json_encode($info);
            exit;
        } else {
            $gid = $data['gid'];
            $status = $data['status'];
        }

        ## 檢查狀態碼是否存在
        $DBGoods = $this->DBGoods;
        $goodsInfo = $DBGoods->findOne($gid);
        if (empty($goodsInfo)) {
            $info['info'] = false;
            $info['message'] = '操作失敗';
            echo json_encode($info);
            exit;
        }

        ## 變更狀態碼
        $status = $status === '1' ? 0 : 1;
        if ($DBGoods->update(['released' => $status], $gid) !== 1) {
            $info['info'] = false;
            $info['message'] = '操作失敗';
            echo json_encode($info);
            exit;
        }
        $info['info'] = true;
        $info['status'] = $status;
        echo json_encode($info);
        exit;
    }

    /*
     * 修改商品頁面
     */
    public function edit($reg = false)
    {
        $userInfo = $this->userInfo;

        if (!is_numeric($reg[0])) {
            $path = URL . "loginback/index";
            setcookie('admintoken', 0, time() - 10, "/");
            header("Location: {$path}");
        } else {
            $gid = $reg[0];
        }

        ## 根據 id 找商品
        $DBGoods = $this->DBGoods;
        $goodsInfo = $DBGoods->findOne($gid);
        if (empty($goodsInfo)) {
            $path = URL . "loginback/index";
            setcookie('admintoken', 0, time() - 10, "/");
            header("Location: {$path}");
        }

        $DBGtype = $this->DBGtype;
        $typeinfo = $DBGtype->getAll();

        foreach ($typeinfo as $info) {
            if ((int)$goodsInfo['tnum'] === $info['tnum']) {
                $goodsInfo['typename'] = $info['name'];
            }
        }

        $this->smarty->assign('type', $typeinfo);
        $this->smarty->assign('userinfo', $userInfo);
        $this->smarty->assign('goods', $goodsInfo);
        $this->smarty->display("back/goods/editgoods.html");
    }

    /*
     * 修改商品資訊
     */
    public function update()
    {
        ## json 回傳格式
        $info = [
            'info' => false,
            'message' => '',
            'error' => '',
            'redirect' => '',
        ];

        ## 檢查是否有接收到商品id
        if (isset($_POST['gid']) && is_numeric($_POST['gid'])) {
            $gid = $_POST['gid'];
        } else {
            $info['info'] = false;
            $info['message'] = "操作失敗";
            echo json_encode($info);
            exit;
        }

        ## 檢查商品id
        $DBGoods = $this->DBGoods;
        $goodsInfo = $DBGoods->findOne($gid);
        if (empty($goodsInfo)) {
            $info['info'] = false;
            $info['message'] = "無此商品";
            echo json_encode($info);
            exit;
        }

        ## 接收參數
        if (isset($_POST['tnum'])) {
            $editInfo['tnum'] = $_POST['tnum'];
        } else {
            $error['tnum'] = "未選擇商品分類";
            $info['info'] = false;
            $info['error'] = $error;
            echo json_encode($info);
            exit;
        }
        $editInfo['name'] = trim($_POST['name']);
        $editInfo['price'] = $_POST['price'];
        $editInfo['stock'] = $_POST['stock'];
        $editInfo['uses'] = trim($_POST['uses']);
        $editInfo['material'] = trim($_POST['material']);

        ## 設定傳入資料要驗證的格式
        $verification = [
            'name' => array('length' => '1~20'),
            'price' => array('between' => "1~100000"),
            'stock' => array('between' => "1~50000"),
            'uses' => array('length' => '1~100'),
            'material' => array('length' => '1~100'),
        ];
        ## 對設定格式驗證表單
        $errorMessage = $this->helper->checkForm($editInfo, $verification);
        if (!empty($this->helper->checkForm($editInfo, $verification))) {
            $info['info'] = false;
            $info['error'] = $errorMessage;
            echo json_encode($info);
            exit;
        }

        ## 檢查商品名稱是否重複
        $checkName = $DBGoods->getGoodsName($editInfo['name']);
        foreach ($checkName as $info) {
            if ("{$info['gid']}" !== "{$gid}") {
                $error['name'] = "此商品名稱已被使用";
                $info['info'] = false;
                $info['error'] = $error;
                echo json_encode($info);
                exit;
            }
        }

        ## 如果有上傳圖片則檢查上傳圖片
        if (isset($_FILES['gimg']) && $_FILES['gimg']['error'] !== 4) {
            $gimg = $_FILES['gimg'];
            if ($gimg['error'] !== 0) {
                $error['gimg'] = "上傳失敗";
                $info['message'] = '';
                $info['info'] = false;
                $info['error'] = $error;
                echo json_encode($info);
                exit;
            }
            $gimgtype = explode('/', $gimg['type']);
            if ($gimgtype[0] !== 'image') {
                $error['gimg'] = "上傳了非圖片文件";
                $info['info'] = false;
                $info['message'] = '';
                $info['error'] = $error;
                echo json_encode($info);
                exit;
            }

            ## 上傳商品圖片到指定資料夾
            $path = "public/homeimg/goodsimg/";
            if (file_exists($path . $editInfo['name'] . ".png")) {
                unlink($path . $editInfo['name'] . ".png");
            }
            if (move_uploaded_file($gimg['tmp_name'], $path . $editInfo['name'] . ".png")) {
                $editInfo['gimg'] = $path . $editInfo['name'] . ".png";
            } else {
                $info['info'] = false;
                $info['message'] = "上傳失敗";
                echo json_encode($info);
                exit;
            }
        }

        ## 特定符號轉義
        $editInfo['name'] = htmlspecialchars($editInfo['name'], ENT_QUOTES);
        $editInfo['uses'] = htmlspecialchars($editInfo['uses'], ENT_QUOTES);
        $editInfo['material'] = htmlspecialchars($editInfo['material'], ENT_QUOTES);

        ## 檢查是否有實際修改資料
        unset($goodsInfo['gid']);
        unset($goodsInfo['released']);
        unset($goodsInfo['addTime']);
        if (!isset($editInfo['gimg'])) {
            unset($goodsInfo['gimg']);
        }

        ## 檢查是否有修改商品訊息
        if (empty(array_diff($goodsInfo, $editInfo)) && !isset($gimg)) {
            $info['info'] = true;
            $info['message'] = "未做任何修改";
            $info['redirect'] = URL . 'indexback/index';
            echo json_encode($info);
            exit;
        }
        
        ## 只有變更圖片 未修改訊息
        if (isset($gimg) && empty(array_diff($goodsInfo, $editInfo))) {
            $info['info'] = true;
            $info['message'] = "修改成功";
            $info['redirect'] = URL . "goodsback/index";
            echo json_encode($info);
            exit;
        }

        ## 判斷是否有修改成功
        if ($DBGoods->update($editInfo, $gid) !== 1) {
            $info['info'] = false;
            $info['message'] = "修改失敗";
            echo json_encode($info);
            exit;
        }

        $info['info'] = true;
        $info['message'] = "修改成功";
        $info['redirect'] = URL . 'goodsback/index';
        echo json_encode($info);
        exit;
    }
}
