@extends('layouts.app')

@section('content')
<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    <div class="row justify-content-center">
          <form style="margin: 30px" method="post" action="{{route('movie.update',$movie->id)}}" enctype="multipart/form-data">
            @csrf
            
            @method('PUT')

    
    <div class="form-group">
        <label for="name"> Movie Name</label>
        <input type="text" class="form-control" name="name" value="{{$movie->name}}" />
    </div>

    <div class="form-group">
        <label for="name"> Movie Year of Release</label>
        <input type="date" class="form-control" name="year_of_release" value="{{$movie->year_of_release}}"/>
    </div>

    <div class="form-group">
        <label for="name"> Movie Plot</label>
        <input type="text" class="form-control" name="plot" value="{{$movie->plot}} "/>
    </div>

    <div class="form-group">
        <label for="movie">Movie Image </label>
       
        <input type="file" class="form-control" name="image"  />
    </div>

      <div class="form-group text-center">
        <button type="submit" class= "form-group  btn btn-primary">Update</button> 
    </div>
    
</form>


    </div>
</div>


@endsection

