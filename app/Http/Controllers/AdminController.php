<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Suggestion;
use App\Entity;


class AdminController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth');
    }

    public function entityStore(Request $request){
        return "success";
    }

    public function suggestions(){
        return Suggestion::simplePaginate();
    }

    public function delSuggestion(Request $request){
        if($request->id){
            if(Suggestion::destroy($request->id))
            return "Deleted";
            else
            return "Server Error, Please try again";
        }
        else
            return "Server Error, Please try again";
    }
}
