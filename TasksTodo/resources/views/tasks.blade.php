@extends('layouts.app')
@section('content')
<!-- Bootstrap Boilerplate... -->

<div class="panel-body">
    <!-- Display Validation Errors -->
    @include('common.errors')
    <!-- New Task Form -->

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
            
                        <textarea rows="3" cols="10" name="description" class="form-control" placeholder="Please enter a task description" required></textarea>
                    </div>
                    <div class="modal-footer">

                        <input type="submit" value="Add Task" class="btn btn-success"/>
              </div>
            </div>

          </div>
        </div>
        </form>
    </div>

    <div class="jumbotron text-center hoverable p-4">

        <!-- Grid row -->
        <div class="row">

          <!-- Grid column -->
          <div class="col-md-4 offset-md-1 mx-2 my-2">

            <!-- Featured image -->
            <div class="view overlay">
              <img src="https://mdbootstrap.com/img/Photos/Others/laptop-sm.jpg" class="img-fluid" alt="Sample image for first version of blog listing">
              <a>
                <div class="mask rgba-white-slight"></div>
              </a>
            </div>

          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-7 text-md-left ml-3 mt-3">

            <!-- Excerpt -->
            <a href="#!" class="green-text">
              <h6 class="h6 pb-1"><i class="fas fa-desktop pr-1"></i>Get Working</h6>
            </a>

            <h4 class="h4 mb-4">Want to get things done?</h4>

            <p class="font-weight-normal">Welcome to Tasks Todo application, a place where you can create all your todo
                activities in one place. We have got you covered here,<br> please click the button below to get started
            </p>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                        <i class="fa fa-plus"></i> Add Task
                    </button>
                </div>
             </div>
          </div>
          <!-- Grid column -->

        </div>
        <!-- Grid row -->

      </div>
      <!-- News jumbotron -->
    {{-- @foreach to loop over Tasks --}}
    <!-- Current Tasks -->
    @if (count($tasks) > 0)
    <div class="panel panel-default jumbotron text-center hoverable p-4">

        <div class="panel-heading">
            <h3> <strong>{{  Auth::user()->name }}'s Tasks</strong></h3>
        </div>
        <div class="panel-body">
            <table class="table table-striped task-table">
                <!-- Table Headings -->

                 <!-- Table Body -->
                 <tbody>
                    @foreach ($tasks as $task)

                    <tr>
                        <!-- Task Name -->
                        <td class="table-text">
                            <div style="font-family: 'Franklin Gothic Medium'">
                                <h4><a href="/tasks/{{ $task->id  }}">{{ $task->name }}</a></h4>
                            </div>
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
