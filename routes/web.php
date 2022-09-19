<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET,HEAD,PUT,POST,DELETE,PATCH,OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, X-Auth-Token, Origin, Authorization");
Route::options("/{any:.*}", [function (){ 
   return response(["status" => "success"]); 
  }
 ]
);

$router->get('/', function () use ($router) {
    // To check database connection
    // try {
    //     DB::connection()->getPDO();
    //     echo DB::connection()->getDatabaseName();
    //     } catch (\Exception $e) {
    //     echo 'None';
    // }
    // echo '<pre/>';
    return $router->app->version();
});

$router->group(['prefix' => 'api/v1'], function() use ($router) {
    $router->get('/tasks', 'Task\GetAllTaskAction@getAll');
    $router->post('/tasks', 'Task\AddTaskAction@addNewTask');
    $router->put('/tasks/{id}', 'Task\CompleteTaskAction@completeTask');
    $router->delete('/tasks/{id}', 'Task\DeleteTaskAction@delete');
});