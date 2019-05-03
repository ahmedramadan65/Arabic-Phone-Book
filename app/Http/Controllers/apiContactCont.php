<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ContactResource;
use Illuminate\Support\Facades\Auth;
use App\Contact;
use App\User;
use DB;

class apiContactCont extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct() {
        $this->middleware('auth:api');
    }
    
    public function index()
    {
        return Contact::all();
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
        //this my search in api
        header('Content-Type:application/json; charset=utf-8');
        $contacts = DB::select( DB::raw("SELECT * FROM `contacts` WHERE `user_id` = '".auth()->id()."' AND
        ( `name` LIKE '%".$id."%' OR `phone` LIKE '%".$id."%')"));
        if(empty($contacts)){
            return json_encode(["status"=>"01","message"=>"no contacts"]);
            exit();}
        return response()->json($contacts, 200, [], JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
        exit();    
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
