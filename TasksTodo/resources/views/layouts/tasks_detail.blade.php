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
    <div class="card text-center">
        <div class="card-header alert-primary">
            {{ $ptask->name }}
        </div>
        <div class="card-body">
        <h5 class="card-title">Task Description</h5>
        <p class="card-text">{{ $ptask->description }}.</p>
        <a href="#" class="btn btn-warning">Edit Task</a>
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
