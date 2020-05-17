@extends('layouts.app')
@section('content')
<!-- Bootstrap Boilerplate... -->

<div class="panel-body">
    <!-- Display Validation Errors -->
    @include('common.errors')

         <div class="form-group">
             <label for="task" class="col-sm-3 control-label"><h2>Task Details</h2></label>
             <div class="col-sm-12">
                <input type="text" placeholder="Click the button below to add a new Task" name="name" id="task-name" class="form-control" disabled>
             </div>
         </div>

    <!-- Current Tasks -->

    <div class="panel panel-default">
        <div class="jumbotron">
        <div class="panel-heading">
            <h3> <strong>{{  Auth::user()->name }}'s Tasks</strong></h3>
        </div>
        <div class="panel-body">

                <h3>Task Name: </h3>{{ $ptask->name }}
                <br>
                <h5>Task Description :</h5> {{ $ptask->description }}

        </div>
    </div>
    </div>
</div>
<!-- TODO: Current Tasks -->
@endsection
