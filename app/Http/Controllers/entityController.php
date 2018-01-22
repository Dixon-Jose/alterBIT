<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entity;

class entityController extends Controller
{
    public function autoComplete(Request $request){
        if($request->input('term')){
            $elements=Entity::where('name','like','%'.strtolower($request->input("term")).'%')->get();
            foreach($elements as $key => $element)
            $terms[$key]=array(
                'label'=>$element->name,
                'value'=>$element->name,
                'id'=>$element->_id
            );
            return $terms;
        }
    }
    public function index(Request $request)
    {
        // find using keyword and return search view or an error message
      if($request->input('q')){
          if(strtolower($request->input('q'))==='all'){
              $elements=Entity::all();
          }else
        $elements=Entity::where('name','like','%'.strtolower($request->input("q")).'%')->get();}
      else{
          if($request->input('tag'))
              $elements=Entity::where('tags',strtolower($request->input("tag")))->get();
          }
        if(count($elements)===0){
            $error=array(
                'message'=> 'No match on \''.$request->input('q').'\''.'. Please try again.',
                'q'=>$request->input('q')
            );
            return view ('home')->with($error);
        }
      return view ('search',['entities' => $elements]);
    
    return view('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    public function show($id)
    {
        //get the id from the search view and return the view with all the data of elemetents
        // + parse the alternatives into array within a array

        if(isset($id)){
        $entity=Entity::find($id);
        if(empty($entity)){
            return view('home');
        }else{
        foreach($entity->alternatives as $key => $alter){
            $alternative=Entity::find($alter);
            $alternatives[$key]=array(
                "id"=>$alternative->_id,
                "name"=>$alternative->name,
                "description"=>$alternative->description
            );
        }
        return view ('entity',['entity' => $entity,'alternatives'=>$alternatives]);
        }}
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
