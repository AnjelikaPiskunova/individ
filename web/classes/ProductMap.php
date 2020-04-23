<?php


class ProductMap extends BaseMap
{


    public function findById($id=null){
        if ($id) {
            $res = $this->db->query("SELECT product_id, name, recept_id". "FROM product WHERE product_id = $id");
            return $res->fetchObject("Product");
        }
        return new Product();
    }
    
    public function save(Product $product){
        if ($product->validate()) {
            if ($product->product_id == 0) {
                return $this->insert($product);
            } 
            else {
                return $this->update($product);
            }
        }
        return false;
    }

    private function insert(Product $product){
        $name = $this->db->quote($product->name);
        if ($this->db->exec("INSERT INTO product(product_id, name, recept_id) VALUES($product->product_id, $name, $product->recept_id)") == 1) {
            return true;
        }
    return false;
    }

    private function update(Product $product){
        $name = $this->db->quote($product->name);
        if ( $this->db->exec("UPDATE product SET name = $name,". " recept_id=$product->recept_id WHERE product_id = ".$product->product_id) == 1) {
            return true;
        }
        return false;
    }

    public function findAll($ofset=0, $limit=30){
        $res = $this->db->query("SELECT product_id, name, recept_id". " FROM product LIMIT $ofset,$limit");
        return $res->fetchAll(PDO::FETCH_OBJ);
    }

    public function count(){
        $res = $this->db->query("SELECT COUNT(*) AS cnt FROM product");
        return $res->fetch(PDO::FETCH_OBJ)->cnt;
    }

    public function findViewById($id=null){
        if ($id) {
            $res = $this->db->query("SELECT product_id, name, recept_id". " FROM product WHERE product_id =$id");
            return $res->fetch(PDO::FETCH_OBJ);
        }
    return false;
    }


}