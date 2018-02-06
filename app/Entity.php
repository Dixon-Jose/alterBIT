<?php

namespace App;

use Moloquent;

class Entity extends Moloquent
{
  public function getNameAttribute($value){
    return strtolower($value);
  }
}
