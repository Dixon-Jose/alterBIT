<?php

namespace App;

use Moloquent;

class Entity extends Moloquent
{
  protected $connection = 'mongodb';
  protected $fillable = ['_id','name','description','imgurl','alternatives','tags','category'];
  public function getNameAttribute($value){
    return strtolower($value);
  }
}
