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
    return $router->app->version();
});


$router->get('/users', 'UserController@getUsers');
$router->post('/users', 'UserController@add');
$router->get('/users/{id}', 'UserController@show');     
$router->delete('/users/{id}', 'UserController@delete');
$router->put('/users/{id}', 'UserController@update');


$router->group(['prefix' => 'api'], function () use ($router) {
    $router->post('/register', 'UserController@add'); // Mao ni ang registration
    $router->post('/login', 'UserController@login');    // Siguroha nga naa kay login function
    $router->get('/users', 'UserController@getUsers');
    // ... uban pa nga routes
});