<?php


class operation extends Table
{
    public $operation_id=0;
    public $name='';
    public function validate()
    {
        if(!empty($this->name)){
            return true;
        }
        return false;
    }

}