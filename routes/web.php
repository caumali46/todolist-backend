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


$router->get('/', function () use ($router) {
    try {
        DB::connection()->getPDO();
        echo DB::connection()->getDatabaseName();
        } catch (\Exception $e) {
        echo 'None';
    }
    echo '<pre/>';
    return $router->app->version();
});

$router->group(['prefix' => 'api/v1'], function() use ($router) {
    $router->get('/tasks', 'Task\GetAllTaskAction@getAll');
});