<?php

class GoodsModel extends Model 
{
    protected $table = "goods";
    protected $pk = "gid";

    /*
     * 根據商品分類號碼取所有狀態為1的商品商品
     */
    public function getTypeAll($tnum, $search = "")
    {
        $condition = "tnum = {$tnum} and released = 1 and name like '%{$search}%' order by gid desc";
        return $this->getAll($condition);
        // $condition = "tnum = {$tnum} and released = 1 order by gid desc";
        // return $this->getAll($condition);
    }

    public function getGoodsName($name)
    {
        $condition = "name = '{$name}'";
        return $this->getAll($condition);
    }
}
