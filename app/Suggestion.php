<?php

namespace App;

use Moloquent;

class Suggestion extends Moloquent
{
    protected $connection = 'mongodb';
    protected $guarded = ['_token'];
    public $timestamps = false;

    // public function setAttribute($key,$value){
    //     if(is_string($value) && $key!='imgurl'){
    //     $this->attributes[$key]=strtolower($value);}
    //     else
    //     $this->attibutes[$key]=$value;
    // }
 }
