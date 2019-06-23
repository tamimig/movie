@extends('layouts.app')

@section('content')

<div class="card card-default">
	<div class="card-header">
		<h3 class="text-center"> Movies Details </h3>
	</div>

	<div class="card-body">
		<table class="table">
			<thead>
				<th>Movies Name</th>
				<th>Year of Release</th>
				<th>Plot</th>
				<th>Image</th>
			</thead>
			<tbody>
				
					
				<tr>
					<td>
						{{$movie->name}} 
					</td>
					<td>
						{{$movie->year_of_release}}

					</td>
					<td>
						{{$movie->plot}}
					</td>
					<td>
						<img src="{{asset($movie->image)}}">
					</td>
				</tr>

				
			</tbody>
		</table>
	</div>
	<div style="margin-left: 20px;" >
		<a href="{{route('movie.edit',$movie->id)}}" class="btn btn-info"> Edit </a> 
	</div>
	
	
	
	
	<!-- Button trigger modal -->
	<div style="margin:20px;">
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$movie->id}}">
  Delete
</button></div>

<!-- Modal -->
<div class="modal fade" id="exampleModal{{$movie->id}}"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Do you want to delete?
      </div>
      <div class="modal-footer">
      	<form action="{{route('movie.destroy',$movie->id)}}" method="post">
		@csrf
		@method('DELETE')
		<button class="btn btn-danger" type="submit">Yes</button>
		
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!--Modal end-->
</div>

	
@endsection 
