<?php


class recept extends Table
{
    public $recept_id=0;
    public $name='';
    public $opisanie='';
    public $user_id=0;
    public $operation_id=0;
    public $group_id=0;
    public $postavshik_id=0;
    public function validate()
    {
        if(!empty($this->name)&&
        !empty($this->opisanie)&&
        !empty($this->user_id)&&
        !empty($this->operation_id)&&
        !empty($this->group_id)&&
        !empty($this->postavshik_id)){
            return true;
        }
        return false;
    }

}