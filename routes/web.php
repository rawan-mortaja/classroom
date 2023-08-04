<?php

use App\Http\Controllers\classroomsController;
use App\Http\Controllers\ClassworksController;
use App\Http\Controllers\JoinClassroomController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TopicsController;
use App\Models\Classroom;
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
})->name('home');

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


// Route::resource('/classrooms', classroomsController::class)
//     ->names([
//         // 'index' => 'classrooms/index',
//         // 'create' => 'classrooms/create',
//     ])
//     // ->parameters([
//     //     '{classroom}' => '{classroom:code}',
//     // ])
//     ->where(['classroom' => '/d+',]); //بعرفلي كل resource يلي تم استخدامها
//بقدر استدعي اكتر من ريسورس بنفس الجملة




Route::get('/classrooms/trashed', [classroomsController::class, 'trashed'])
    ->name('classrooms.trashed');
Route::put('/classrooms/trashed/{classroom}', [classroomsController::class, 'restore'])
    ->name('classrooms.restore');
Route::delete('/classrooms/trashed/{classroom}', [classroomsController::class, 'forcedelete'])
    ->name('classrooms.forcedelete');


Route::middleware(['auth'])->group(function () {
    Route::prefix('/topics/trashed')
        ->as('topics')
        ->controller(TopicsController::class)
        ->group(function () {
            Route::get('/', 'trashed')
                ->name('trashed');
            Route::put('/{topic}', 'restore')
                ->name('restore');
            Route::delete('/{topic}', 'forceDelete')
                ->name('force-delete');
        });

    Route::get('/classrooms/{classroom}/join', [JoinClassroomController::class, 'create'])
        ->middleware('signed')
        ->name('classrooms.join');
    Route::post('/classrooms/{classroom}/join', [JoinClassroomController::class, 'store']);



    Route::resources([
        'topics' => TopicsController::class,
        'classrooms' => classroomsController::class,
        'classrooms.classworks' => ClassworksController::class,
    ]);


    // Route::resource('classrooms.classworks' , ClassworksController::class)
    // ->shallow();

    // Route::get('classrooms/{classroom}/Classworks');
});

// Route::get('/topics/trashed', [TopicsController::class, 'trashed'])
//     ->name('topics.trashed');
// Route::put('/topics/trashed/{topic}', [TopicsController::class, 'restore'])
//     ->name('topics.restore');
// Route::delete('/topics/trashed/{topic}', [TopicsController::class, 'force-delete'])
//     ->name('topics.force-delete');





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


// Route::get('/loginn', [LoginController::class, 'create'])
//     ->name('loginm')
//     ->middleware('guest');
// Route::post('/login', [LoginController::class, 'store'])
//     ->middleware('guest');








require __DIR__ . '/auth.php';
