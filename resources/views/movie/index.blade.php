@extends('layouts.app')

@section('content')

<div class="card card-default">
	<div class="card-header">
		Movies
	</div>

	<div class="card-body">
		<a href="/add" class="btn btn-primary" style="margin-bottom: 10px">Add New Movie </a>

		<table class="table">
			<thead>
				<th>Movies Name</th>
				<th>Year of Release</th>
				<th>Producer Name</th>
				<th>Actors Name</th>
			</thead>
			<tbody>
				@foreach($movies as $movie)

				<tr>
					<td>
						<a href="{{route('movie.show', $movie->id)}}">{{$movie->name}}</a> 
					</td>
					<td>
						{{$movie->year_of_release}}

					</td>
					<td>
						
                           {{$movie->producer['name']}}
                        

					</td>
					
                      
					<td>

					@if(count($movie->actors)>0)
					@foreach($movie->actors as $actor)
					<ul>
						<li value="{{$actor->id}}">
							{{$actor->name}}
						</li> 
					</ul>
					@endforeach 
					@endif

                   
					</td>
					
						
							
						
					
					

				</tr>
@endforeach
			</tbody>
		</table>
	</div>
</div>



@endsection 
