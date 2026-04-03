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


// Kani nga routes, maski kinsa ka, basta naay internet, maka-access.
$router->group(['prefix' => 'api'], function () use ($router) {
    $router->post('/register', 'UserController@add');
    $router->post('/login', 'UserController@login');
});

// KANI NGA ROUTES, KINAHANGLAN NA OG TOKEN (Dapat naay auth middleware)
$router->group(['prefix' => 'api', 'middleware' => 'auth'], function () use ($router) {
    $router->get('/users', 'UserController@getUsers');
    $router->get('/users/{id}', 'UserController@show');
    $router->delete('/users/{id}', 'UserController@delete');
    $router->put('/users/{id}', 'UserController@update');
});