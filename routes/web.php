<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return 'PinoyFreeCoder';
// });

// Route::permanentRedirect('/welcome', '/');


// Route::get('/users', function(Request $request) {
//     dd($request);
//     return null;
// });


// Route::get('/get-text', function () {
//     return response('Hello', 200);
// });


/**
 * Using URL Parameters
 */
// Route::get('user/{id}/{groupname}', function ($id,$groupname) {
//     $data = array(
//         'id'        => $id,
//         'groupname' => $groupname,
//     );

//     return response()->json($data);
// });

// Route::get('/users', [UserController::class, 'index'])->name('login');

// Route::get('/user/{id}', [UserController::class, 'show']);

Route::get('/', [StudentController::class, 'index'])->middleware('auth');
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login/process', [UserController::class, 'process']);
Route::get('/register', [UserController::class, 'register']);
Route::post('/store', [UserController::class, 'store']);
Route::post('/logout', [UserController::class, 'logout']);
