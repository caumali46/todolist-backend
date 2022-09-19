<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Http\Resources\TaskResource;

class GetAllTaskAction extends BaseActionTask
{
  public function getAll() {
    try {

      $data =  TaskResource::collection(Task::all());
      return response()->json([ "code"=> 200, "data" => $data ]);

    } catch(\Exception $e) {

      return response()->json([ "code"=> 500, 'message' => $e->getMessage()], 500);
    }
  } 
}
