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
}
