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

    <div class="text-center">
       <h2>Adding Movies</h2> 
    </div>
        
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

                <div class="form-group">
                    <label for="actor_name">Select Actor</label>
                    <select name="actor_id" id="actor" class="form-control">
                        @foreach($actors as $actor)
                            <option value="{{$actor->id}}">{{$actor->name}}</option>
                        @endforeach
                    </select>
                    <a style="color: blue; cursor: pointer" data-toggle="modal" data-target="#actorModal">Add New Actor</a>
                </div>
                <div class="form-group">
                    <label for="producer_name">Select Producer</label>
                    <select name="producer_id" id="producer" class="form-control">
                        @foreach($producers as $producer)
                            <option value="{{$producer->id}}">{{$producer->name}}</option>
                        @endforeach
                    </select>  
                    <a style="color: blue; cursor: pointer" data-toggle="modal" data-target="#producerModal">Add New Producer</a>
                </div>
                  <div class="form-group text-center">
                    <button type="submit" class= "form-group  btn btn-primary">Create</button>
                    <a href="/movie" class= "form-group  btn btn-default">Cancel</a> 
                </div>
                
            </form>
    </div>
</div>

<!-- Add actor -->
<div class="modal fade" id="actorModal" tabindex="-1" role="dialog" aria-labelledby="actorModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="actorModalLabel">Add Actor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formActor">
            <div class="form-group">
                <label for="name">Actor Name</label>
                    <input type="text" class="form-control" name="name"/>
                </div>

                <div class="form-group">
                    <label for="name">Actor Gender </label>
                    <input type="text" class="form-control" name="sex"/>
                </div>

                <div class="form-group">
                    <label for="date_of_birth">Actor Date of Birth</label>
                    <input type="date" class="form-control" name="date_of_birth" >
                    
                </div>

                <div class="form-group">
                    <label for="bio">Actor bio </label>
                    <input type="text" class="form-control" name="bio"/>
                </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button id="btnAddActor" type="button" class="btn btn-primary">Add</button>
      </div>
    </div>
  </div>
</div>


<!-- Add producer -->
<div class="modal fade" id="producerModal" tabindex="-1" role="dialog" aria-labelledby="producerModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="producerModalLabel">Add Producer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <div class="modal-body">
        <form id="formProducer">
            <div class="form-group">
                <label for="Producer Name"> Producer Name</label>
                <input type="text" class="form-control" name="name"/>
            </div>

            <div class="form-group">
                <label for="sex"> Producer Gender </label>
                <input type="text" class="form-control" name="sex"/>
            </div>

            <div class="form-group">
                <label for="date_of_birth"> Producer Date of Birth</label>
                <input type="date" class="form-control" name="date_of_birth" >
                
            </div>

            <div class="form-group">
                <label for="bio">Producer bio </label>
                <input type="text" class="form-control" name="bio"/>
            </div>
        </form>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button id="btnAddProducer" type="button" class="btn btn-primary">Add</button>
      </div>
    </div>
  </div>
</div>
@endsection






@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $("#btnAddActor").on("click", function(){
          const data = $('#formActor').serializeArray();
          $.ajax({
              url: '/actor',
              headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
              method: 'POST',
              data,
              success: function(result) {
                $('#actor').append($('<option>', {
                    value: result.id,
                    text: result.name
                }));
                $("#actorModal .close").click()
            }});
        });

        $("#btnAddProducer").on("click", function(){
          const data = $('#formProducer').serializeArray();
          $.ajax({
              url: '/producer',
              headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
              method: 'POST',
              data,
              success: function(result) {
                $('#producer').append($('<option>', {
                    value: result.id,
                    text: result.name
                }));
                $("#producerModal .close").click()
            }});
        });
    });
</script>
@stop