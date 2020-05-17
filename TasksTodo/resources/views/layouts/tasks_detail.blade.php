@extends('layouts.app')
@section('content')
<!-- Bootstrap Boilerplate... -->

<div class="panel-body">
    <!-- Display Validation Errors -->
    @include('common.errors')
<br>
         <div class="form-group">
             <label for="task" class="col-sm-3 control-label"><h2>Task Details</h2></label>

         </div>

    <!-- Current Tasks -->

    <div class="panel panel-default">
        <div class="jumbotron">
        <div class="panel-heading">
            <h3> <strong style="color: blue">{{  Auth::user()->name }}'s Task</strong></h3>
        </div>
        <form action="/tasks/{{ $ptask->id }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
        <div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" style="color: blue">Editing a Task </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>

              </div>
              <div class="modal-body">
                {{-- <p>Some text in the modal.</p> --}}

                    <input type="text" name="name" id="task-name" class="form-control" value="{{ $ptask->name }}"  required>
                    <br>

                        <textarea rows="3" cols="10" name="description" class="form-control" value="{{ $ptask->description }}" required> {{ $ptask->description }}</textarea>
                    </div>
                    <div class="modal-footer">

                        <input type="submit" value="Edit Task" class="btn btn-warning"/>
              </div>
            </div>

          </div>
        </div>
        </form>
    <div class="card text-center">

        <div class="card-header alert-primary">
            {{ $ptask->name }}
        </div>
        <div class="card-body">
        <h5 class="card-title">Task Description</h5>
        <p class="card-text">{{ $ptask->description }}.</p>
        <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#myModal">Edit Task</a>
        </div>
        <div class="card-footer text-muted alert-primary">
            Created on: {{ $date }}
        </div>
    </div>

    </div>
    </div>
</div>
<!-- TODO: Current Tasks -->
@endsection
