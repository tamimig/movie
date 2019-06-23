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
            <form style="margin: 30px" method="post" action="{{route('movie.store')}}" enctype="multipart/form-data">
                @csrf
                
                <div class="form-group">
                    <label for="name"> Movie Name</label>
                    <input type="text" class="form-control" name="name"/>
                </div>

                <div class="form-group">
                    <label for="name"> Movie Year of Release</label>
                    <input type="date" class="form-control" name="year_of_release"/>
                </div>

                <div class="form-group">
                    <label for="name"> Movie Plot</label>
                    <textarea class="form-control" name="plot" cols="5" rows="5"></textarea>
                   
                </div>

                <div class="form-group">
                    <label for="movie">Movie Image </label>
                    <input type="file" class="form-control" name="image"/>
                </div>

                  <div class="form-group text-center">
                    <button type="submit" class= "form-group  btn btn-primary">Save</button> 
                </div>
                
            </form>


    </div>
</div>
@endsection