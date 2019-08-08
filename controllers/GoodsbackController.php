<?php

class GoodsbackController extends Controller
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
        ## 檢查使用者登入
        $path = URL . "loginback/index";
        if (!isset($_COOKIE['admintoken']) || empty($_COOKIE['admintoken'])) {
            header("Location: {$path}");
            exit;
        } else {
            $DBAdmin = $this->DBAdmin;
            $userInfo = $DBAdmin->getOne(['token' => $_COOKIE['admintoken']]);
            if (empty($userInfo)) {
                setcookie('admintoken', 0, time() - 10, "/");
                header("Location: {$path}");
                exit;
            }
        }

        $DBGoods = $this->DBGoods;
        $goodsInfo = $DBGoods->getAll();
        if (!empty($goodsInfo)) {
            date_default_timezone_set("Asia/Taipei");
            foreach ($goodsInfo as $key => $item) {
                date_default_timezone_set("Asia/Taipei");
                $goodsInfo[$key]['addTime'] = date("Y-m-d H:i:s", $item['addTime']);
            }
        }

        $loginFlag = true;
        $this->smarty->assign('goods', $goodsInfo);
        $this->smarty->assign('loginflag', $loginFlag);
        $this->smarty->assign('userinfo', $userInfo);
        return $this->smarty->display('back/goods/goods.html');
    }

    /*
     * 新增商品頁面
     */
    public function create()
    {
        $path = URL . "loginback/index";
        if (!isset($_COOKIE['admintoken']) || empty($_COOKIE['admintoken'])) {
            header("Location: {$path}");
            exit;
        } else {
            $DBAdmin = $this->DBAdmin;
            $userInfo = $DBAdmin->getOne(['token' => $_COOKIE['admintoken']]);
            if (empty($userInfo)) {
                setcookie('admin', 0, time() - 10, "/");
                header("Location: {$path}");
                exit;
            }
        }

        $DBGtype = $this->DBGtype;
        $typeinfo = $DBGtype->getAll();
        $this->smarty->assign('type', $typeinfo);
        return $this->smarty->display('back/goods/newgoods.html');
    }

    /*
     * 新增商品
     */
    public function add()
    {
        ## 檢查登入
        if (!isset($_COOKIE['admintoken']) || empty($_COOKIE['admintoken'])) {
            echo json_encode(['addinfo' => "notlogin"]);
            exit;
        } else {
            $DBAdmin = $this->DBAdmin;
            $userInfo = $DBAdmin->getOne(['token' => $_COOKIE['admintoken']]);
            if (empty($userInfo)) {
                echo json_encode(['addinfo' => "notlogin"]);
                exit;
            }
        }

        ## 檢查商品分類
        if (isset($_POST['tnum'])) {
            $addInfo['tnum'] = $_POST['tnum'];
        } else {
            $error['tnum'] = "商品分類未選擇";
            echo json_encode(['addinfo' => $error]);
            exit;
        }
        $addInfo['name'] = trim($_POST['name']);
        $addInfo['price'] = $_POST['price'];
        $addInfo['stock'] = $_POST['stock'];
        $addInfo['uses'] = trim($_POST['uses']);
        $addInfo['material'] = trim($_POST['material']);


        ## 檢查上傳圖片
        $gimg = $_FILES['gimg'];
        if ($gimg['error'] === 4) {
            $error['gimg'] = '未上傳商品圖片';
        } else if ($gimg['error'] !== 0) {
            $addInfo['gimg'] = '上傳失敗';
        }
        if (!empty($error)) {
            echo json_encode(['addinfo' => $error]);
            exit;
        }
        $gimgtype = explode('/', $gimg['type']);
        if ($gimgtype[0] !== 'image') {
            $error['gimg'] = '上傳了非圖片文件';
        }
        if (!empty($error)) {
            echo json_encode(['addinfo' => $error]);
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
            echo json_encode(['addinfo' => $errorMessage]);
            exit;
        }

        ## 驗證商品分類
        $DBGtype = $this->DBGtype;
        $typeinfo = $DBGtype->getOne(['tnum' => $addInfo['tnum']]);
        if (empty($typeinfo)) {
            $error['tnum'] = "商品分類錯誤";
            echo json_encode(['addinfo' => $error]);
            exit;
        } else {
            $addInfo['tnum'] = $typeinfo['tnum'];
        }

        ## 檢查商品名稱是否重複
        $DBGoods = $this->DBGoods;
        $checkName = $DBGoods->getOne(['name' => $addInfo['name']]);
        if (!empty($checkName)) {
            $error['name'] = "商品名稱已被使用";
            echo json_encode(['addinfo' => $error]);
            exit;
        }

        ## 上傳商品圖片到指定資料夾
        $path = "public/homeimg/goodsimg/";
        if (move_uploaded_file($gimg['tmp_name'], $path . $addInfo['name'] . ".png")) {
            $addInfo['gimg'] = $path . $addInfo['name'] . ".png";
        } else {
            $error['gimg'] = '上傳失敗';
            echo json_encode(['addinfo' => $error]);
            exit;
        }

        date_default_timezone_set("Asia/Taipei");
        $addInfo['addTime'] = time();
        $addInfo['name'] = htmlspecialchars($addInfo['name'], ENT_QUOTES);
        $addInfo['uses'] = htmlspecialchars($addInfo['uses'], ENT_QUOTES);
        $addInfo['material'] = htmlspecialchars($addInfo['material'], ENT_QUOTES);

        if (file_exists($path . $addInfo['name'] . ".png")) {
            if ($DBGoods->add($addInfo) === 1) {
                echo json_encode(['addinfo' => 'success']);
                exit;
            } else {
                echo json_encode(['addinfo' => 'fail']);
                exit;
            }
        } else {
            $error['gimg'] = '上傳失敗';
            echo json_encode(['addinfo' => $error]);
            exit;
        }
    }

    /*
     * 修改商品上架與下架
     */
    public function setGoodStatus()
    {
        ## 檢查登入
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

        ## 接收參數
        parse_str(file_get_contents('php://input'), $data);
        if (!isset($data) || empty($data)) {
            echo json_encode(['setstatus' => "fail"]);
            exit;
        } else {
            $gid = $data['gid'];
            $status = $data['status'];
        }

        ## 檢查狀態碼是否存在
        $DBGoods = $this->DBGoods;
        $goodsInfo = $DBGoods->findOne($gid);
        if (empty($goodsInfo)) {
            json_encode(['setstatus' => "fail"]);
            exit;
        }

        ## 變更狀態碼
        $status = $status === '1' ? 0 : 1;
        if ($DBGoods->update(['released' => $status], $gid) === 1) {
            echo json_encode(['setstatus' => "success"]);
            exit;
        } else {
            echo json_encode(['setstatus' => "fail"]);
            exit;
        }
    }

    /*
     * 修改商品頁面
     */
    public function edit($reg = false)
    {
        ## 檢查是否登入
        $path = URL . "loginback/index";
        if (!isset($_COOKIE['admintoken']) || empty($_COOKIE['admintoken'])) {
            setcookie('admintoken', 0, time() - 10, "/");
            header("Location: {$path}");
            exit;
        } else {
            $DBAdmin = $this->DBAdmin;
            $userInfo = $DBAdmin->getOne(['token' => $_COOKIE['admintoken']]);
            if (empty($userInfo)) {
                setcookie('admintoken', 0, time() - 10, "/");
                header("Location: {$path}");
                exit;
            }
        }

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
        $loginFlag = !empty($userInfo);


        $this->smarty->assign('type', $typeinfo);
        $this->smarty->assign('loginflag', $loginFlag);
        $this->smarty->assign('goods', $goodsInfo);
        $this->smarty->display("back/goods/editgoods.html");
    }

    /*
     * 修改商品資訊
     */
    public function update()
    {
        ## 回傳格式
        $messageInfo = [
            "info" => true,
            "message" => null,
        ];

        ## 驗證使用者登入
        if (!isset($_COOKIE['admintoken']) || empty($_COOKIE['admintoken'])) {
            $messageInfo['info'] = false;
            $messageInfo['message'] = "未登入";
            echo json_encode($messageInfo);
            exit;
        } else {
            $DBAdmin = $this->DBAdmin;
            $userInfo = $DBAdmin->getOne(['token' => $_COOKIE['admintoken']]);
            if (empty($userInfo)) {
                $messageInfo['info'] = false;
                $messageInfo['message'] = "使用者憑證錯誤";
                echo json_encode($messageInfo);
                exit;
            }
        }

        ## 檢查是否有接收到商品id
        if (isset($_POST['gid']) && is_numeric($_POST['gid'])) {
            $gid = $_POST['gid'];
        } else {
            $messageInfo['info'] = false;
            $messageInfo['message'] = "無此商品";
            echo json_encode($messageInfo);
            exit;
        }


        ## 接收參數
        if (isset($_POST['tnum'])) {
            $editInfo['tnum'] = $_POST['tnum'];
        } else {
            $messageInfo['info'] = false;
            $messageInfo['message'] = "未選擇商品分類";
            echo json_encode($messageInfo);
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
            echo json_encode(['addinfo' => $errorMessage]);
            exit;
        }

        ## 檢查商品名稱是否重複
        $DBGoods = $this->DBGoods;
        $checkName = $DBGoods->getGoodsName($editInfo['name']);

        foreach ($checkName as $info) {
            if ("{$info['gid']}" !== "{$gid}") {
                $messageInfo['info'] = false;
                $messageInfo['message'] = "此商品名稱已被使用";
                echo json_encode($messageInfo);
                exit;
            }
        }

        ## 檢查商品id
        $goodsInfo = $DBGoods->findOne($gid);
        if (empty($goodsInfo)) {
            $messageInfo['info'] = false;
            $messageInfo['message'] = "無此商品";
            echo json_encode($messageInfo);
            exit;
        }

        ## 如果有上傳圖片則檢查上傳圖片
        if (isset($_FILES['gimg']) && $_FILES['gimg']['error'] !== 4) {
            $gimg = $_FILES['gimg'];
            if ($gimg['error'] !== 0) {
                $messageInfo['info'] = false;
                $messageInfo['message'] = "上傳失敗";
            }
            if (!empty($messageInfo['info'] === false)) {
                echo json_encode($messageInfo);
                exit;
            }
            $gimgtype = explode('/', $gimg['type']);
            if ($gimgtype[0] !== 'image') {
                $messageInfo['info'] = false;
                $messageInfo['message'] = "上傳了非圖片文件";
            }
            if (!empty($messageInfo['info'] === false)) {
                echo json_encode($messageInfo);
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
                $messageInfo['info'] = false;
                $messageInfo['message'] = "上傳失敗";
                echo json_encode($messageInfo);
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
        if (empty(array_diff($goodsInfo, $editInfo))) {
            $messageInfo['info'] = true;
            $messageInfo['message'] = "未做任何修改";
            echo json_encode($messageInfo);
            exit;
        }

        ## 判斷是否有修改
        if ($DBGoods->update($editInfo, $gid) !== 1) {
            $messageInfo['info'] = false;
            $messageInfo['message'] = "修改失敗";
            echo json_encode($messageInfo);
            exit;
        }

        $messageInfo['info'] = true;
        $messageInfo['message'] = "修改成功";
        if (isset($editInfo['gimg'])) {
            $messageInfo['path'] = $editInfo['gimg'];
        }
        echo json_encode($messageInfo);
        exit;
    }
}
