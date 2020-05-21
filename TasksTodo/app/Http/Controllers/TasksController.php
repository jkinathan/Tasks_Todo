<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Task;
use Auth;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasskT = Task::all();
        $user = Auth::user(); //get currently logged in user
        $tasks = Task::where("user_id",$user->id)->orderBy('created_at','asc')->get();
        // dd($tasskT);
        //get tasks where user_id is equal to the id of the currently logged in user
        return view('tasks')->with(compact('tasks',$tasks));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            ]);
            if ($validator->fails()) {
                return redirect('/')
                ->withInput()
                ->withErrors($validator);
            }
            // Create The Task
            $task = new Task;
            $task->name = $request->name;
            $task->user_id = auth()->id();
            $task->description = $request->description;
            $task->save();
            //or you can use something like this
            // Task::create([
			// 	'name' => request('name');
			// 		]);
        return redirect('/');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ptask = Task::find($id);
        //get task associated with that id
        // dd($ptask);
        $date = date('D-d-M-Y', strtotime($ptask->created_at));
        // ddd($date);
        return view('layouts.tasks_detail',compact('ptask','date'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedAttributes = request()->validate(['name'=>'required','description'=>'required']);
        $tasko = Task::where('id', $id)->update($validatedAttributes);
		return redirect('/tasks/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Task::findOrFail($id)->delete();
        return redirect('/');
    }
}
