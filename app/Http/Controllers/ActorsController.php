<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actor; 

class ActorsController extends Controller
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
        return view('actor.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $this->validate($request,[
            'name' => 'required|min:3|max:50',
            //'year_of_release' => 'required|date',
            'sex' => 'required|min:4|max:6',
            'date_of_birth' => 'required|date', 
            'bio' => 'required'

        ]);
        
        $id = Actor::create([
                'name' => $request->name, 
                'sex' => $request->sex,
                'date_of_birth' => $request->date_of_birth,
                'bio' => $request->bio
                
            ]);

        return response()->json([
            'id' => $id,
            'name' => $request->name
        ]);

        // return redirect('actor/create')->with('status', 'Actore created successfully!'); 
            
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
