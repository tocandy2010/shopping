<?php

class OrdersModel extends Model 
{
    protected $table = "orders";

    public function setBeginTransaction()
    {
        return $this->db->beginTransaction();
    }

    public function setRollBack()
    {
        return $this->db->rollBack();
    }

    public function setCommit()
    {
        return $this->db->commit();
    }

    /*
     * 根據使用者取得該所有訂單紀錄
     */
    public function getMyOrdersNum($id)
    {
        $sql = "select count(onum) as buynum,onum,address,createTime from {$this->table} ";
        $sql .= "where cid = {$id} group by onum order by createTime desc";
        $res = $this->db->prepare($sql);
        $res->execute();
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOrderGoods($onum)
    {
        $sql = "select o.gid,o.name, o.price, o.number, (o.price*o.number) as sumprice, g.gimg 
        from orders as o 
        left join 
        goods as g 
        on o.gid = g.gid 
        where onum = {$onum}";
        $res = $this->db->prepare($sql);
        $res->execute();
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }
}
