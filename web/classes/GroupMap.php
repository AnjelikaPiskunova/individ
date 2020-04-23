<?php


class GroupMap extends BaseMap
{
    public function arrGroups(){
        $res = $this->db->query("SELECT group_id AS id, name AS value FROM gruppa");
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

}