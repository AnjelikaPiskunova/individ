<?php


class user extends Table
{
    public $user_id=0;
    public $firstname='';
    public $lastname='';
    public $strana='';
    public $god=''; 
    public function validate()
    {
        if(!empty($this->firstname)&&
        !empty($this->lastname)&&
        !empty($this->strana)&&
        !empty($this->god)){
            return true;
        }
        return false;
    }

}