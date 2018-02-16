<?php

namespace App;

use Moloquent;

class Suggestion extends Moloquent
{
    protected $connection = 'mongodb';
    protected $guarded = ['_token'];
    public $timestamps = false;

//     public function setAttribute($property,$value){
//         $this->$property=strtolower($value);
//     }
 }
