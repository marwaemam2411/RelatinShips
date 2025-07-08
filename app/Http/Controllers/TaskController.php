<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $task=Task::all();
        return response()->json($task,200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        $task=task::create($request->validated());
      return response()->json($task,200);
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $task=task::find($id);
          return response()->json($task,200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreTaskRequest $request, $id)
    {
        $task=task::findOrfail($id);
      $task->update($request->only('title', 'description', 'priority'));

          return response()->json($task,200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)


    {
            $task=task::findOrfail($id);
            $task->delete();
    }
    public function gettaskuser($id){

      $user=Task::findOrfail($id)->user;
      return response()->json($user,200);


    }
    public function addcategorisetotask(Request $request,$taskid){

$task=Task::findOrfail($taskid);
$task->categories()->attach($request->category_id);

      return response()->json('category attached successful',200);

    }
}
