<?php

class GoodsController extends Controller 
{
    public function __construct(){
        parent:: __construct();
    }

    /*
     *  首頁
     */
    public function index($reg = false)
    {
        if($reg === false || empty($reg)) {
            header("Location: ../index/index");
        }
        $this->smarty->assign('headimg',$reg[0]);
        return $this->smarty->display('home/goods/goods.html');
    }

    /*
     *  新增頁面
     */
    public function create()
    {
        echo "create";
    }

    /*
     *  新增處理
     */
    public function add($id = false)
    {
        echo "add";
        var_dump($this->model);
        $this->view->render("home/index");
    }

    /*
     *  修改頁面
     */
    public function edit()
    {
        echo "edit";
    }

    /*
     *  修改處理
     */
    public function update($id = false)
    {

    }

    /*
     *  刪除處裡
     */
    public function delete()
    {
        echo "delete";
    }
}
