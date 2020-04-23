<?php


class postavshik extends Table
{
    public $postavshik_id=0;
    public $name='';
    public $adress='';
    public $telefon='';
    public function validate()
    {
        if(!empty($this->name)&&
        !empty($this->adress)&&
        !empty($this->telefon)){
            return true;
        }
        return false;
    }

}