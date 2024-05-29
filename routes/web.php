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

$router->group(['prefix' => 'api/v1/'], function () use ($router) {
    $router->get('loans',  ['uses' => 'LoanController@getAll']);
    // $router->get('loans', 'LoanController@all');
  
    $router->get('loans/{id}', ['uses' => 'LoanController@getId']);
  
    // $router->post('loans', 'LoanController@createLoan');
    $router->post('loans', ['uses' => 'LoanController@postLoan']);
  
    $router->delete('loans/{id}', ['uses' => 'LoanController@delete']);
  
    $router->put('loans/{id}', ['uses' => 'LoanController@update']);
  });