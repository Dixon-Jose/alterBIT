<?php

namespace App;

use Moloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

class Suggestion extends Moloquent
{
    use SoftDeletes;
    protected $connection = 'mongodb';
    protected $guarded = ['_token'];
    public $timestamps = false;

    protected $dates = ['deleted_at'];

    // public function setAttribute($key,$value){
    //     if(is_string($value) && $key!='imgurl'){
    //     $this->attributes[$key]=strtolower($value);}
    //     else
    //     $this->attibutes[$key]=$value;
    // }
 }
