<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producer; 
class ProducersController extends Controller
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
        return view('producer.create'); 
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
            //'movie_id' => 'required',
            'sex' => 'required|min:4|max:6',
            'date_of_birth' => 'required|date', 
            'bio' => 'required'

        ]);
        
            $id = Producer::create([
                'name' => $request->name, 
                'movie_id'=>$request->movie_id,
                'sex' => $request->sex,
                'date_of_birth' => $request->date_of_birth,
                'bio' => $request->bio
                
            ]);

            return response()->json([
                'id' => $id,
                'name' => $request->name
            ]);

            // return redirect('producer/create')->with('status', 'Producer created successfully!'); 
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
        $producer = Producer::findOrFail($id); 

        return view('producer.edit')->with('producer', $producer); 
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
        $this->validate($request,[
            'name' => 'required|min:3|max:50',
            'movie_id' => 'required',
            'sex' => 'required|min:4|max:6',
            'date_of_birth' => 'required|date', 
            'bio' => 'required'

        ]);

        $producer = Producer::findOrFail($id); 
        $producer->name = $request->name; 
        $producer->sex = $request->sex; 
        $producer->date_of_birth = $request->date_of_birth; 
        $producer->bio = $request->bio; 

        $producer->save(); 

        return redirect('producer/create')->with('status', 'Producer Updated successfully!'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Producer::destroy($id)->with('status', 'Producer Deleted successfully!'); 
    }
}
