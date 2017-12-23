<?php

namespace App;

class Post{

  public function create($session)
  {
    $posts=['head'=>'Dixaaa ki maa ka','para'=>'Dixaaa ha tatti'];
    $session->put('posts',$posts);
    return $session->get('posts');
  }
}
