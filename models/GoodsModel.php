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
        $condition = "tnum = {$tnum} and  name like '%{$search}%' order by gid desc";
        return $this->getAll($condition);
    }

    public function getTypeReleaseGoods($tnum, $search = "")
    {
        $condition = "tnum = {$tnum} and released = 1 and name like '%{$search}%' order by gid desc";
        return $this->getAll($condition);
    }

    /*
     * 使用商品名稱找商品
     */
    public function getGoodsName($name)
    {
        $condition = "name = '{$name}'";
        return $this->getAll($condition);
    }

    public function getReleasedGoods($gid) {
        $condition = "gid in (" . $gid . ") and released = '1' for update";
        return $this->getAll($condition);
    }
}
