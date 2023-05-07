<?php

use App\Models\{
    Course,
    Permission,
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

Route::get('/many-to-many', function(){
    // dd(Permission::create(['name' => 'menu_03']));

    $user = User::with('permissions')->find(1);

    $permission = Permission::find(1);
    // $user->permissions()->save($permission);
    // $user->permissions()->saveMany([
    //     Permission::find(1),
    //     Permission::find(2),
    //     Permission::find(3),
    // ]);

    // Deleta todas com valores diferentes da nova permissão
    // Adiciona uma nova permissão
    // Não duplica valores, caso nova permissão já exista
    // $user->permissions()->sync([1,2,3]);
    // $user->permissions()->sync($permission);

    // Duplica valores
    // $user->permissions()->attach(1);

    // Remove permissão
    $user->permissions()->detach(1);

    $user->refresh();

    dd($user->permissions);
});

Route::get('/one-to-many', function(){

    // $course = Course::create([
    //     'name' => 'Curso de Laravel'
    // ]);

    $course = Course::with('modules.lessons')->first();

    echo $course->name;
    echo '<br>';

    foreach($course->modules as $module){
        echo "Módulo {$module->name} <br>";

        foreach($module->lessons as $lesson){
            echo "Aula {$lesson->name} <br>";
        }
    }

    $data = [
        'name' => 'Módulo x2'
    ];

    // $course->modules()->create($data);

    $modules = $course->modules;

    dd($modules);
});

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
