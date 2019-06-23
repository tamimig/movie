<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\Producer; 
use App\Actor; 
use DB; 

class MoviesController extends Controller
{
    // protect moviescontroller with authenticated users 
    public function __construct()
        {

             $this->middleware('auth');
        }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
          $movies= Movie::with('actors')->get();
          $producer = Producer::with('movies')->get(); 
           
        return view('movie.index', compact('movies','producer')); 
         
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('movie.create'); 
    }

    public function screen_add()
    {
        return view('movie.screen_add')->with('producers', Producer::all())
                                    -> with('actors', Actor::all()); 
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all()); 
        $this->validate($request,[
            'name' => 'required|min:3|max:50',
            //'producer_id' => 'required', 
            'year_of_release' => 'required|date',
            'plot' => 'required',
            'image' => 'required'

        ]);

        if($request->hasFile('image')){
            Movie::create([
                'name' => $request->name, 
                'producer_id' => $request->producer_id,
                'year_of_release' => $request->year_of_release,
                'plot' => $request->plot,
                'image' => $request->file('image')->store('images', 'public')
            ]);
            
        }



        return redirect('movie/create')->with('status', 'Movie created successfully!'); 

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie = Movie::findOrFail($id); 

        return view('movie.show')->with('movie', $movie); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movie = Movie::findOrFail($id); 

        return view('movie.edit')->with('movie', $movie); 
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
            //'producer_id' => 'required', 
            'year_of_release' => 'required|date',
            'plot' => 'required',
            'image' => 'required'

        ]);
        $movie = Movie::findOrFail($id);
        if($request->hasFile('image')){
            $movie->name = $request->name;
            $movie->producer_id = $request->producer_id;
            $movie->year_of_release = $request->year_of_release;
            $movie->plot = $request->plot;
            $movie->image = $request->file('image')->store('images', 'public');
            
        }

        $movie->save();

         return redirect('movie')->with('status', 'Movie Updated successfully!');
 


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie= Movie::findOrFail($id);

        $movie->delete(); 

         return redirect('movie')->with('status', 'Movie Deleted successfully!');
    }
}
