<?php

use Illuminate\Support\Facades\Route;


Route::get('/', ['as' => 'home.index', 'uses' => 'HomeController@index']);
Route::get('/tweet', ['as' => 'tweet.index', 'uses' => 'HomeController@postTweet']);
