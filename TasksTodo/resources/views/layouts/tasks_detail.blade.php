@extends('layouts.app')
@section('content')
<!-- Bootstrap Boilerplate... -->

<div class="panel-body">
    <!-- Display Validation Errors -->
    @include('common.errors')

         <div class="form-group">
             <label for="task" class="col-sm-3 control-label"><h2>Task Details</h2></label>
             <div class="col-sm-12">
                <input type="text" placeholder="View the Detailed view of the task below is where we can edit a task" name="name" id="task-name" class="form-control" disabled>
             </div>
         </div>

    <!-- Current Tasks -->

    <div class="panel panel-default">
        <div class="jumbotron">
        <div class="panel-heading">
            <h3> <strong style="color: blue">{{  Auth::user()->name }}'s Tasks</strong></h3>
        </div>
    <div class="card text-center">
        <div class="card-header">
            {{ $ptask->name }}
        </div>
        <div class="card-body">
        <h5 class="card-title">{{ $ptask->name }}</h5>
        <p class="card-text">{{ $ptask->description }}.</p>
        <a href="#" class="btn btn-warning">Edit Task</a>
        </div>
        <div class="card-footer text-muted">
            Created on: {{ $date }}
        </div>
    </div>

    </div>
    </div>
</div>
<!-- TODO: Current Tasks -->
@endsection
