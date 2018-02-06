<?php

namespace App;

use Moloquent;

class Suggestion extends Moloquent
{
    protected $guarded = ['_token'];
    public $timestamps = false;

//     public function setAttribute($property,$value){
//         $this->$property=strtolower($value);
//     }
 }
