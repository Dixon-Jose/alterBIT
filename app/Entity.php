<?php

namespace App;

use Moloquent;

class Entity extends Moloquent
{
  protected $collection = 'entities';
  protected $primaryKey = '_id';
  protected $connection = 'mongodb';

  public function getNameAttribute($value){
    return strtolower($value);
  }

}
