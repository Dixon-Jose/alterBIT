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
        try{
            $entity=new Entity;
            $entity->_id=$request->_id;
            $entity->name=$request->name;
            $entity->description=$request->description;
            $entity->category=$request->category;
            $entity->imgurl=$request->imgurl;
            $tags=[];
            foreach($request->tags as $tag){
                if($tag===null)
                break;
                array_push($tags,$tag);
            }
            $entity->tags=$tags;
            if($request->alternatives){
                $entity->alternatives=$request->alternatives;
                foreach($entity->alternatives as $alternative){
                    if(!(Entity::where("_id",$alternative)->push('alternatives',$entity->_id)))
                    throw new Exception("alternative updation failed");
                }
            }    
            if($entity->save())
            return "success";
            else
            throw new Exception("Entity Not Inserted");
        }catch(Exception $e){
            return $e->getMessage();
        }
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
