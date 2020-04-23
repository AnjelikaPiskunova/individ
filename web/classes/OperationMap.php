<?php


class OperationMap extends BaseMap
{
    public function arrOperations(){
        $res = $this->db->query("SELECT operation_id AS id, name AS value FROM operation");
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

}