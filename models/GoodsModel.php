<?php

class GoodsModel extends Model 
{
    protected $table = "goods";
    protected $pk = "gid";

    /*
     * 根據商品分類號碼取所有狀態為1的商品商品
     */
    public function getTypeAll($tnum)
    {
        $condition = "tnum = {$tnum} and released = 1 order by gid desc";
        return $this->getAll($condition);
    }


}
