<?php


class base
{
    public $error;
    public $cn;
    public $search;

    public function makeDelete($value){
        $this->id =$value;
        if($this->Delete())
        {
            return 'Data Deleted';
        }
        else{
            return $this->error;
        }
    }
}