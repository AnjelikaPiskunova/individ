<?php


class ReceptMap extends BaseMap
{
    public function arrRecepts(){
        $res = $this->db->query("SELECT recept_id AS id, name AS value FROM recept");
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }


    public function findById($id=null){
        if ($id) {
            $res = $this->db->query("SELECT recept_id, name, opisanie, user_id, operation_id, group_id, postavshik_id ". "FROM recept WHERE recept_id = $id");
            return $res->fetchObject("Recept");
        }
        return new Recept();
    }
    
    public function save(Recept $recept){
        if ($recept->validate()) {
            if ($recept->recept_id == 0) {
                return $this->insert($recept);
            } 
            else {
                return $this->update($recept);
            }
        }
        return false;
    }

    private function insert(Recept $recept){
        $name = $this->db->quote($recept->name);
        $opisanie = $this->db->quote($recept->opisanie);
        if ($this->db->exec("INSERT INTO recept(recept_id, name, opisanie, user_id, operation_id, group_id, postavshik_id) VALUES($recept->recept_id, $name, $opisanie, $recept->user_id, $recept->operation_id, $recept->group_id, $recept->postavshik_id )") == 1) {
            return true;
        }
    return false;
    }

    private function update(Recept $recept){
        $name = $this->db->quote($recept->name);
        if ( $this->db->exec("UPDATE recept SET name = $name,". " recept_id=$recept->recept_id, opisanie= $recept->opisanie, user_id=$recept->user_id, operation_id=$recept->operation_id, group_id=$recept->group_id, postavshik_id=$recept->postavshik_id WHERE recept_id = ".$recept->recept_id) == 1) {
            return true;
        }
        return false;
    }

    public function findAll($ofset=0, $limit=30){
        $res = $this->db->query("SELECT recept_id, name, opisanie, user_id, operation_id, group_id, postavshik_id". " FROM recept LIMIT $ofset,$limit");
        return $res->fetchAll(PDO::FETCH_OBJ);
    }

    public function count(){
        $res = $this->db->query("SELECT COUNT(*) AS cnt FROM recept");
        return $res->fetch(PDO::FETCH_OBJ)->cnt;
    }

    public function findViewById($id=null){
        if ($id) {
            $res = $this->db->query("SELECT recept_id, name, opisanie, user_id, operation_id, group_id, postavshik_id". " FROM recept WHERE recept_id =$id");
            return $res->fetch(PDO::FETCH_OBJ);
        }
    return false;
    }

}