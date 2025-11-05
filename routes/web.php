<?php

use Illuminate\Support\Facades\Route;
echo 'request got into routes/web.php (to decide route and related controller)<br>';
Route::get('/', function () {
    return view('welcome');
});

Route::resource('courses','App\Http\Controllers\CourseController');