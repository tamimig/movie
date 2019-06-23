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
            <form style="margin: 30px" method="post" action="{{route('actor.store')}}">
                @csrf
                
                <div class="form-group">
                    <label for="name"> Actor Name</label>
                    <input type="text" class="form-control" name="name"/>
                </div>

                <div class="form-group">
                    <label for="name"> Actor Gender </label>
                    <input type="text" class="form-control" name="sex"/>
                </div>

                <div class="form-group">
                    <label for="date_of_birth"> Actor Date of Birth</label>
                    <input type="date" class="form-control" name="date_of_birth" >
                   
                </div>

                <div class="form-group">
                    <label for="bio">Actor bio </label>
                    <input type="text" class="form-control" name="bio"/>
                </div>

                  <div class="form-group text-center">
                    <button type="submit" class= "form-group  btn btn-primary">Save</button> 
                </div>
                
            </form>


    </div>
</div>
@endsection