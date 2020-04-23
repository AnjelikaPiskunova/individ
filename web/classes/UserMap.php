<?php


class UserMap extends BaseMap
{
    public function arrUsers(){
        $res = $this->db->query("SELECT user_id AS id, firstname AS value FROM user");
        return $res->fetchAll(PDO::FETCH_ASSOC);
    } 

}