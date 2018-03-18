<?php

namespace App\Http\Controllers;

use App\Suggestion;
use App\Entity;
use Illuminate\Http\Request;

class SuggestionController extends Controller
{
    public function store(Request $request)
    {
        if($request->name&&$request->description&&$request->category)
        if(Suggestion::create($request->all()))
        return "success";
        else
        return "Try Again. Server Error";
    }

}
