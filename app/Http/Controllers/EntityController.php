<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entity;


function getElement($key,$q){
    //search and return the collection
        return Entity::where($key,'like','%'.strtolower($q).'%')->get();
    }

class entityController extends Controller
{
    /*
    * Function to provide the home page with autocomplete by returning json values
    * here value & label is the match on the searched term and id is used to perform redirects to the required page
    */
    
    public function autoComplete(Request $request){
        if($request->input('term')){
            $elements=getElement("name",$request->input('term'));
            foreach($elements as $key => $element)
            $terms[$key]=array(
                'label'=>$element->name,
                'value'=>$element->name,
                'id'=>$element->_id,
                'category'=>$element->category
            );
            return $terms;
        }
    }

    public function tagComplete(){
        return Entity::distinct()->get(['tags']);
    }

    //json endpoint for the suggest route to provide alternatives matching the category
    public function category(Request $request){
        if($request->input('category')){
            if($request->input('tags')){
                $t=explode(',',$request->tags);
                $elements=Entity::where('category',$request->category)->where('tags','all',$t)->get();
            }   
            else
            $elements=Entity::where('category',$request->category)->get();
            $key=0;
            foreach($elements as $entity){
                foreach($entity->tags as $tag){
                    $tags[$key++]=$tag;
                }
            }
            foreach($elements as $key => $element)
            $terms[$key]=array(
                '_id'=>$element->_id,
                'name'=>$element->name,
                'description'=>$element->description,
                'alternatives'=>$element->alternatives
            );
            return array('terms'=>$terms,'tags'=>array_keys(array_flip($tags)));
        }
        else{
            return Entity::distinct()->get(['category']);
        }
    }

    
    public function index(Request $request)
    {
        // find using keyword and return search view with elements and tags or an error message
        $elements=[];
        if(!empty($request->input('q'))){
          if(strtolower($request->input('q'))==='all'){
              $elements=Entity::all();
          }else
            $elements=getElement("name",$request->input('q'));
        }    
      else{
          if($request->input('tag'))
             $t=explode(',',$request->tag);
             $elements=Entity::where('tags','all',$t)->get();
          }
      if(count($elements)===0){
            $error=array(
                'message'=> 'No match on \''.$request->input('q').'\''.'. Please try again.',
            );
            return view ('home')->with($error);
      }
            $key=0;
            foreach($elements as $entity){
                foreach($entity->tags as $tag){
                    $tags[$key++]=$tag;
                }
            }
            $tags=array_keys(array_flip($tags));
            if($request->input('tag')){
                return array("entities"=>$elements,"tags"=>$tags);
            }
            return view ('search',['entities' => $elements,'tags' => $tags]);
    
    return redirect()->route('home');
    }


    public function show($category,$id)
    {
        //get the id from the search view and return the view with all the data of elements
        // + parse the alternatives into array within a array

        if(isset($id)&&isset($category)){
            $entity=Entity::find($id);
        if(empty($entity)||!$entity->category==$category){
            return redirect()->route('home');
        }
        else{
        if($entity->alternatives){
            foreach($entity->alternatives as $key => $alter){
                $alternative=Entity::find($alter);
                $alternatives[$key]=array(
                    "id"=>$alternative->_id,
                    "name"=>$alternative->name,
                    "description"=>$alternative->description,
                    "category"=>$alternative->category
                );
            }
            return view ('entity',['entity' => $entity,'alternatives'=>$alternatives]);
        }
        else
            return view('entity',['entity'=>$entity]);
        }}
    }
}