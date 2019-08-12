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
    public function getOrders($id = false, $condition = [])
    {
        $sql = "select count(onum) as buynum,onum,status,sum(price*number) as total,address,createTime from {$this->table} ";
        if ($id !== false) {
            $sql .= "where cid = {$id} ";
            if (!empty($condition)) {
                $key = array_keys($condition)[0];
                $value = array_values($condition)[0];
                $sql .= "and {$key} like '%{$value}%' ";
            }
            $sql .="group by onum order by createTime desc";
        } else {
            if (!empty($condition)) {
                $key = array_keys($condition)[0];
                $value = array_values($condition)[0];
                $sql .= "where {$key} like '%{$value}%' ";
            }
            $sql .= "group by onum order by createTime desc";
        }
        $res = $this->db->prepare($sql);
        $res->execute();
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOrderGoods($onum)
    {
        $sql = "select o.onum,o.gid,o.name, o.price, o.number, (o.price*o.number) as sumprice, g.gimg 
        from orders as o 
        left join 
        goods as g 
        on o.gid = g.gid 
        where onum = {$onum}";
        $res = $this->db->prepare($sql);
        $res->execute();
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

    public function editOrders($arr,$onum)
    {
        $key = array_keys($arr)[0];
        $value = array_values($arr)[0];
        $sql = "update orders set {$key} = {$value} where onum = {$onum}";
        $res = $this->db->prepare($sql);
        $res->execute();
        return $this->affectedRows($res);
    }
}
