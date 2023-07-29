<?php

use App\Http\Controllers\classroomsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TopicsController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Route::view('/', 'welcome');
// Classroom
// Route::get('/classrooms', [classroomsController::class, 'index'])
//     ->name('classrooms.index');

// Route::get('/classrooms/create', [classroomsController::class, 'create'])
//     ->name('classrooms.create');

// Route::post('/classrooms', [classroomsController::class, 'store'])
//     ->name('classrooms.store');

// Route::get('/classrooms/{classroom}', [classroomsController::class, 'show'])
//     ->name('classrooms.show')
//     ->where('classrooms', '/d+');
// // Route::get('/classrooms/{classroom:code}', [classroomsController::class, 'show'])
// // ->name('classrooms.show')
// // ->where('classrooms', '/d+');  //لتحديد الحقل يلي هيجي بالاستدعاء

// Route::get('/classrooms/{classroom}/edit', [classroomsController::class, 'edit'])
//     ->name('classrooms.edit')
//     ->where('classrooms', '/d+');

// Route::put('/classrooms/{classroom}', [classroomsController::class, 'update'])
//     ->name('classrooms.update')
//     ->where('classrooms', '/d+');

// Route::delete('/classrooms/{classroom}', [classroomsController::class, 'destroy'])
//     ->name('classrooms.destroy');


Route::resource('/classrooms', classroomsController::class)
    ->names([
        // 'index' => 'classrooms/index',
        // 'create' => 'classrooms/create',
    ])
    // ->parameters([
    //     '{classroom}' => '{classroom:code}',
    // ])
    ->where(['classroom' => '/d+',]); //بعرفلي كل resource يلي تم استخدامها
//بقدر استدعي اكتر من ريسورس بنفس الجملة
Route::resources([
    'topics' => TopicsController::class,
    'classrooms' => classroomsController::class,
], [
    'middleware' => ['auth'],
]);


// Topics

// Route::get('/topics', [TopicsController::class, 'index'])
//     ->name('topics.index');

// Route::get('/topics/create', [TopicsController::class, 'create'])
//     ->name('topics.create');

// Route::post('/topics', [TopicsController::class, 'store'])
//     ->name('topics.store');

// Route::get('/topics/{topic}', [TopicsController::class, 'show'])
//     ->name('topics.show')
//     ->where('topics', '/d+');
// // Route::get('/topics/{topic:code}', [TopicsController::class, 'show'])
// // ->name('topics.show')
// // ->where('topics', '/d+');  //لتحديد الحقل يلي هيجي بالاستدعاء

// Route::get('/topics/{topic}/edit', [TopicsController::class, 'edit'])
//     ->name('topics.edit')
//     ->where('topics', '/d+');

// Route::put('/topics/{topic}', [TopicsController::class, 'update'])
//     ->name('topics.update')
//     ->where('topics', '/d+');

// Route::delete('/topics/{topic}', [TopicsController::class, 'destroy'])
//     ->name('topics.destroy');


Route::get('/loginn', [LoginController::class, 'create'])
    ->name('loginm')
    ->middleware('guest');
Route::post('/login', [LoginController::class, 'store'])
    ->middleware('guest');

// Route::middleware(['auth'])->group(function(){
//     Route::prefix('/topics/trashed')
// ->as('topics')
// ->controller(TopicsController::class)
//     // ->group(function(){
// Route::get('/topics/trashed' ,[TopicsController::class, 'trashed'])->name('topics.trashed');
// Route::put('/topics/trashed/{topic}' ,[TopicsController::class,'restore'])->name('topics.restore');
// Route::delete('/topics/trashed/{topic}' , [TopicsController::class,'forceDelete'])->name('topics.force-delete');
//     });
// });

require __DIR__ . '/auth.php';
