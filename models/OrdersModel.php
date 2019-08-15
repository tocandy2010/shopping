<?php

class OrdersModel extends Model
{
    protected $table = "orders";

    /*
     * 打開事務
     */
    public function setBeginTransaction()
    {
        return $this->db->beginTransaction();
    }

    /*
     * 事務回滾
     */
    public function setRollBack()
    {
        return $this->db->rollBack();
    }

    /*
     * 事務提交
     */
    public function setCommit()
    {
        return $this->db->commit();
    }

    /*
     * 根據使用者取得該所有訂單紀錄
     */
    public function getOrders($id = false, $condition = [], $offset = false, $length = false)
    {
        $sql = "select count(onum) as buynum,onum,status,sum(price*number) as total,address,createTime from {$this->table} ";
        if ($id !== false) {
            $sql .= "where cid = {$id} ";
            if (!empty($condition)) {
                $key = array_keys($condition)[0];
                $value = array_values($condition)[0];
                $sql .= "and {$key} like '%{$value}%' ";
            }
            $sql .="group by onum order by createTime desc ";
            if ($offset !== false && $length !== false) {
                $sql .= "limit {$offset},{$length} ";
            }
        } else {
            if (!empty($condition)) {
                $key = array_keys($condition)[0];
                $value = array_values($condition)[0];
                $sql .= "where {$key} like '%{$value}%' ";
            }
            $sql .= "group by onum order by createTime desc ";
            if ($offset !== false && $length !== false) {
                $sql .= "limit {$offset},{$length} ";
            }
        }
        // return $sql;
        $res = $this->db->prepare($sql);
        $res->execute();
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

    /*
     * 根據訂單編號回傳商品訊息
     */
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

    /*
     * 修改訂單狀態
     */
    public function editOrders($arr,$onum)
    {
        $key = array_keys($arr)[0];
        $value = array_values($arr)[0];
        $sql = "update orders set {$key} = {$value} where onum = {$onum}";
        $res = $this->db->prepare($sql);
        $res->execute();
        return $this->affectedRows($res);
    }

    /*
     * 寫入所有訂單
     */
    public function createOrder($order)
    {
        $sql = "insert into {$this->table} () values ";
        foreach ($order as $orderInfo) {
            $sql .= "(" . $orderInfo['onum'] . ",";
            $sql .= $orderInfo['cid'] . ",";
            $sql .= $orderInfo['gid'] . ",";
            $sql .= "'{$orderInfo['name']}'" . ",";
            $sql .= $orderInfo['price'] . ",";
            $sql .= $orderInfo['number'] . ",";
            $sql .= "'{$orderInfo['address']}'" . ",";
            $sql .= $orderInfo['status'] . ",";
            $sql .= $orderInfo['createTime'] . "),";
        }
        $sql = rtrim($sql, ',');
        $res = $this->db->prepare($sql);
        $res->execute();
        return $this->affectedRows($res);
    }
}
