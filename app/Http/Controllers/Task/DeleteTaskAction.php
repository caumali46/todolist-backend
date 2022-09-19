<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Http\Resources\TaskResource;

class DeleteTaskAction extends Controller
{
    public function deleteTask(Request $request, $id)
    { 
        try {
            $item = Task::findOrFail($id);
            $item->delete();
            return response()->json('', 200);
            
        } catch(\Exception $e) {
          return response()->json([ "code"=> 500, 'message' => $e->getMessage()], 500);
        }
    } 
}
