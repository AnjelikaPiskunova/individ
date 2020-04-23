<?php


class product extends Table
{
    public $product_id=0;
    public $name='';
    public $recept_id=0;
    public function validate()
    {
        if(!empty($this->name)&&
        !empty($this->recept_id)){
            return true;
        }
        return false;
    }

}