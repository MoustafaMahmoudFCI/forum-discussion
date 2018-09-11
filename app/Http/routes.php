<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/forums', [
  'uses' => 'ForumsController@index',
  'as' =>'forums'
]);

Route::group(['middleware' => 'auth' ], function () {
   Route::resource('channels','ChannelsController');

    Route::get('/discussion',[
      'uses'=>'DiscussionController@index',
      'as'=>'discussion'
    ]);

    Route::post('/discussion/store',[
      'uses'=>'DiscussionController@store',
      'as'=>'discussion.store'
    ]);

    Route::get('/discussion/{slug}', [
      'uses'=>'DiscussionController@show',
      'as'=>'discussion.show'
    ]);

    Route::post('/discussion/reply/{id}', [
      'uses'=>'DiscussionController@reply',
      'as'=>'discussion.reply'
    ]);

    Route::get('/discussion/edit/{id}',[
      'uses' =>'DiscussionController@edit',
      'as' => 'discussion.edit'
    ]);

    Route::post('/discussion/update/{id}',[
      'uses' =>'DiscussionController@update',
      'as' => 'discussion.update'
    ]);

    Route::get('/reply/like/{id}', [
      'uses' => 'RepliesController@like',
      'as' => 'reply.like'
    ]);

    Route::get('/reply/unlike/{id}', [
      'uses' => 'RepliesController@unlike',
      'as' => 'reply.unlike'
    ]);

    Route::get('/discussion/reply/best_answer/{id}',[
      'uses' => 'DiscussionController@best_answer',
      'as' =>'discussion.best.answer'
    ]);

    Route::get('/discussion/watch/{id}', [
      'uses' => 'WatchersController@watch',
      'as' => 'discussion.watch'
    ]);

    Route::get('/discussion/stop_watch/{id}', [
      'uses' => 'WatchersController@stop_watch',
      'as' => 'discussion.stop_watch'
    ]);

});
