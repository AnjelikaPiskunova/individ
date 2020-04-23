<?php


class PostavshikMap extends BaseMap
{
    public function arrPostavshiks(){
        $res = $this->db->query("SELECT postavshik_id AS id, name AS value FROM postavshik");
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

}