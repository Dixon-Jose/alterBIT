<?php

namespace App\Http\Controllers;

use App\Suggestion;
use App\Entity;
use Illuminate\Http\Request;
/**
 * To upload an image to imgur and to return link
 * $payload can be a url or base64 encoded image file
 */
function imgurUpload($payload){
    $client_id=env('IMGUR_CLIENT_ID');
        $curl=curl_init();
        $options=array(
            CURLOPT_URL => 'https://api.imgur.com/3/image',
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTPHEADER => array('Authorization: Client-ID ' . $client_id),
            CURLOPT_POST => 1,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_POSTFIELDS => $payload
        );
        curl_setopt_array($curl,$options);
        
        $imgurResponse=curl_exec($curl);
        curl_close ($curl);
        $output=json_decode($imgurResponse,true);
        return $output['data']['link'];
}

class SuggestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $data=fread(fopen($request->image,"r"),filesize($request->image));
        $payload=array('image'=> base64_encode($data));
        $imgUrl=imgurUpload($payload); 
        dd($imgUrl);
        return view('suggestions',['message' => 'Thanks for your Suggestions!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Suggestion  $suggestion
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        return $request->all();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Suggestion  $suggestion
     * @return \Illuminate\Http\Response
     */
    public function edit(Suggestion $suggestion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Suggestion  $suggestion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Suggestion $suggestion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Suggestion  $suggestion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Suggestion $suggestion)
    {
        //
    }
}
