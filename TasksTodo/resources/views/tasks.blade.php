@extends('layouts.app')
@section('content')
<!-- Bootstrap Boilerplate... -->

<div class="panel-body">
    <!-- Display Validation Errors -->
    @include('common.errors')
    <!-- New Task Form -->
    {{-- <form action="#" method="POST" class="form-horizontal">
         {{ csrf_field() }} --}}
         <!-- Task Name -->
         <div class="form-group">
             <label for="task" class="col-sm-3 control-label"><h2>Task</h2></label>
             <div class="col-sm-12">
                <input type="text" placeholder="Click the button below to add a new Task" name="name" id="task-name" class="form-control" disabled>
             </div>
         </div>
         <!-- Add Task Button -->
         <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                    <i class="fa fa-plus"></i> Add Task
                </button>
            </div>
         </div>
    {{-- </form> --}}

    <div class="container">
        <!-- Modal -->
        <form method="POST" action="/tasks">
            {{ csrf_field() }}

        <div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" style="color: blue">Adding a Task </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>

              </div>
              <div class="modal-body">
                {{-- <p>Some text in the modal.</p> --}}

                    <input type="text" name="name" id="task-name" class="form-control" placeholder="Please enter a task name"  required>
                    <br>
                        <textarea rows="3" cols="10" class="form-control" placeholder="Please enter a task description" required></textarea>
                    </div>
                    <div class="modal-footer">

                        <input type="submit" value="Add Task" class="btn btn-success"/>
              </div>
            </div>

          </div>
        </div>
        </form>
    </div>

    {{-- @foreach to loop over Tasks --}}
    <!-- Current Tasks -->
    @if (count($tasks) > 0)
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3> <strong>{{  Auth::user()->name }}'s Tasks</strong></h3>
        </div>
        <div class="panel-body">
            <table class="table table-striped task-table">
                <!-- Table Headings -->
                <thead>
                    <th> Tasks</th>
                    <th>&nbsp;</th>
                 </thead>
                 <!-- Table Body -->
                 <tbody>
                    @foreach ($tasks as $task)

                    <tr>
                        <!-- Task Name -->
                        <td class="table-text">
                            <div><a href="#">{{ $task->name }}</a></div>
                        </td>
                        <td>
                            <!-- TODO: Delete Button -->
                            <!-- Delete Button -->
                            <td>
                               <form action="/tasks/{{ $task->id }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button class="btn btn-danger">Delete Task</button>
                               </form>
                            </td>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
</div>
<!-- TODO: Current Tasks -->
@endsection
