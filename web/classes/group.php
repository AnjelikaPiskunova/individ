<?php


class group extends Table
{
    public $group_id=0;
    public $name='';
    public function validate()
    {
        if(!empty($this->name)){
            return true;
        }
        return false;
    }

}