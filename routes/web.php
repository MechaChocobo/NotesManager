<?php

use Illuminate\Http\Request;
use App\Note;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\UsersController;
use Illuminate\Database\Eloquent\Collection;

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


$app->get('/', ['as' => 'loginPage', function () use ($app) {
    return view('login');
}]);

$app->post('/login', ['uses' => 'UsersController@login']);
$app->post('/logout', ['uses' => 'UsersController@logout']);


$app->get('/notes',  ['uses' => 'NotesController@fetchNotes']);
$app->post('/notes',  [
		'as' => 'notes',
		'uses' => 'NotesController@fetchNotes'	
	]);

$app->get('/addNote', ['uses' => 'NotesController@addNote']);
$app->get('/saveNote', ['uses' => 'NotesController@saveNote']);
$app->get('/deleteNote', ['uses' => 'NotesController@deleteNote']);
