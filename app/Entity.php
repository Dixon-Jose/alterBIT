<?php

namespace App;

use Moloquent;

class Entity extends Moloquent
{
  protected $connection = 'mongodb';
  public function getNameAttribute($value){
    return strtolower($value);
  }
}
