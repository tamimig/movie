@extends('layouts.app')

@section('content')
@if(Auth::check() && Auth::user()->user_type!=='admin')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    Welcome {{Auth::user()->name}}! 
                </div>
                
                <a href="{{route('movie.index')}}"><h4>Click Here to List all Latest Movies</h4></a>
            </div>
        </div>
        </div>
            @endif
    </div>
        @if(Auth::check() && Auth::user()->user_type=='admin')
        <div class="container">
            
        <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin Panel</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    Welcome {{Auth::user()->name}}! 
                </div>
                
            </div>
        </div>
       
        
        
        
                <div class="mainbox"><h4>What Admin Can Do!</h4>

                <div>

                    <a href="{{route('movie.create')}}">Create Movie</a><br>
                    <a href="{{route('actor.create')}}">Create Actor</a><br>
                    <a href="{{route('producer.create')}}">Create Producer</a>
                    
            
                </div>
                </div>
            </div>
        </div>
        </div>
        @endif
</div>
         
    



@endsection
