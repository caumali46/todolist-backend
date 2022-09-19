<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Http\Resources\TaskResource;

class AddTaskAction extends BaseActionTask
{
    public function addNewTask(Request $request)
    { 
        try {
            $validatedData = $this->validate($request, [
                'description' => 'required|string'
            ]);
            $item = Task::create($validatedData);
            return new TaskResource($item);

        } catch(\Exception $e) {
          return response()->json([ "code"=> 500, 'message' => $e->getMessage()], 500);
        }
    } 
}
