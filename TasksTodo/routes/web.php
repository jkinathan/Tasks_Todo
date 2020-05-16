<?php
use Illuminate\Http\Request;
use App\Task;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $tasks = Task::orderBy('created_at','asc')->get();

    return view('tasks',[
        'tasks' => $tasks
    ]);
});

Route::post('/tasks', function (Request $request) {

    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return redirect('/')
            ->withInput()
            ->withErrors($validator);
        }
        // Create The Task
        $task = new Task;
        $task->name = $request->name;
        $task->save();
    return redirect('/');

});

Route::delete('/tasks/{id}', function ($id) {
    
    Task::findOrFail($id)->delete();
    return redirect('/');
});

