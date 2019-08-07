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
        if (!isset($_COOKIE['admintoken']) || empty($_COOKIE['admintoken'])) {
            header("Location: ../loginback/index");
            exit;
        } else {
            $DBAdmin = $this->DBAdmin;
            $userInfo = $DBAdmin->getOne(['token' => $_COOKIE['admintoken']]);
            if (empty($userInfo)) {
                header("Location: ../loginback/index");
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
        return $this->smarty->display('back/goods/goods.html');
    }

    public function create()
    {
        $DBGtype = $this->DBGtype;
        $typeinfo = $DBGtype->getAll();
        $this->smarty->assign('type',$typeinfo);
        return $this->smarty->display('back/goods/newgoods.html');
    }

    public function add()
    {
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
            $error['gimg'] ='未上傳商品圖片';
        } else if ($gimg['error'] !== 0) {
            $addInfo['gimg'] ='上傳失敗';
        }
        if (!empty($error)) {
            echo json_encode(['addinfo' => $error]);
            exit;
        }
        $gimgtype = explode('/', $gimg['type']);
        if ($gimgtype[0] !== 'image') {
            $error['gimg'] ='上傳了非圖片文件';
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
        if (move_uploaded_file($gimg['tmp_name'], $path . $addInfo['name'] .".png")) {
            $addInfo['gimg'] = $path . $addInfo['name'] .".png";
        } else {
            $error['gimg'] ='上傳失敗';
            echo json_encode(['addinfo' => $error]);
            exit;
        }

        date_default_timezone_set("Asia/Taipei");
        $addInfo['addTime'] = time();
        $addInfo['name'] = htmlspecialchars($addInfo['name'], ENT_QUOTES);
        $addInfo['uses'] = htmlspecialchars($addInfo['uses'], ENT_QUOTES);
        $addInfo['material'] = htmlspecialchars($addInfo['material'], ENT_QUOTES);

        if (file_exists($path . $addInfo['name'] .".png")) {
            if ($DBGoods->add($addInfo) === 1) {
                echo json_encode(['addinfo' => 'success']);
                exit;
            } else {
                echo json_encode(['addinfo' => 'fail']);
                exit;
            }
        } else {
            $error['gimg'] ='上傳失敗';
            echo json_encode(['addinfo' => $error]);
            exit;
        }
    }

    public function setGoodStatus()
    {
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
        
        parse_str(file_get_contents('php://input'), $data);
        if (!isset($data) || empty($data)) {
            echo json_encode(['setstatus' => "fail"]);
            exit;
        } else {
            $gid = $data['gid'];
            $status = $data['status'];
        }



        $DBGoods = $this->DBGoods;
        $goodsInfo = $DBGoods->findOne($gid);
        if (empty($goodsInfo)) {
            json_encode(['setstatus' => "fail"]);
            exit;
        }

        $status = $status === '1' ? 0 : 1;

        if ($DBGoods->update(['released' => $status], $gid) === 1) {
            echo json_encode(['setstatus' => "success"]);
            exit;
        } else {
            echo json_encode(['setstatus' => "fail"]);
            exit;
        }
    }
}
