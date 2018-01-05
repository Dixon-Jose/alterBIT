<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entity;

class entityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
      if($request->input('q')){
        $elements=Entity::where('name','like','%'.strtolower($request->input("q")).'%')->get();
        
        if(count($elements)===0){
            $error=array(
                'message'=> 'No match on \''.$request->input('q').'\''.'. Please try again.',
                'q'=>$request->input('q')
            );
            return view ('home')->with($error);
        }
      return view ('search',['entities' => $elements]);
    }
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if($id==0)
        return view ('entity');
        else{
        $entity=Entity::find($id);
        foreach($entity->alternates as $key => $alter){
            $alternative=Entity::find($alter);
            $alternatives[$key]=array(
                "id"=>$alternative->_id,
                "name"=>$alternative->name,
                "description"=>$alternative->description
            );
        }
        return view ('entity',['entity' => $entity,'alternatives'=>$alternatives]);
        }
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
