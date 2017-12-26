<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Session\Store;
use App\Post;

class PostControl extends Controller
{
  public function display(Store $session)
  {
    $dixon = new Post();
    $dix = $dixon->create($session);
    return view('user_pages.test',['posts'=>$dix]);
  }
}
