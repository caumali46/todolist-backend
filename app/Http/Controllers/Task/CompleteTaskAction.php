<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Http\Resources\TaskResource;

class CompleteTaskAction extends Controller
{
    public function completeTask(Request $request, $id) {
        try {
            $task = Task::find($id);
            $task->is_completed = $request->is_completed;
            $task->save();
            return response()->json($task);

        } catch(\Exception $e) {
          return response()->json([ "code"=> 500, 'message' => $e->getMessage()], 500);
        }
    } 
}
