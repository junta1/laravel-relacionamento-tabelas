<?php

use App\Models\{
    User,
};

use Illuminate\Support\Facades\Route;

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

Route::get('/one-to-one', function(){
    $user = User::first();

    $data = [
        'background_color' => '#000',
    ];

    if($user->preference){
        $user->preference()->update($data);
    }

    if(empty($user->preference)){
        $user->preference()->create($data);
    }

    $user->refresh();

    dd($user->preference);
});

Route::get('/', function () {
    return view('welcome');
});
