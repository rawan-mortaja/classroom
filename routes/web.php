<?php

use App\Http\Controllers\Admin\TwoFactorAuthenticationController;
use App\Http\Controllers\Api\V1\ClassroomsController as V1ClassroomsController;
use App\Http\Controllers\CheckoutsController;
use App\Http\Controllers\ClassroomPeopleController;
use App\Http\Controllers\classroomsController;
use App\Http\Controllers\ClassworksController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\JoinClassroomController;
use App\Http\Controllers\LinkCopyContorller;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\SubscriptonsController;
use App\Http\Controllers\TopicsController;
use App\Http\Controllers\Webhooks\Stripecontroller;
use App\Http\Middleware\ApplyUserPreferences;
use App\Models\classwork;
use App\Models\Submission;
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

Route::get('/admin/2fa', [TwoFactorAuthenticationController::class, 'create']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/classrooms/trashed', [classroomsController::class, 'trashed'])
    ->name('classrooms.trashed');
Route::put('/classrooms/trashed/{classroom}', [classroomsController::class, 'restore'])
    ->name('classrooms.restore');
Route::delete('/classrooms/trashed/{classroom}', [classroomsController::class, 'forcedelete'])
    ->name('classrooms.forcedelete');


Route::get('plans', [PlanController::class, 'index'])
    ->name('plans');

Route::middleware(['auth:web,admin', ApplyUserPreferences::class])->group(function () {


    Route::get('subscriptions/{subscription}/pay', [PaymentsController::class, 'create'])
        ->name('checkout');

    Route::post('Subscriptions', [SubscriptonsController::class, 'store'])
        ->name('subscriptions.store');

    Route::post('payments', [PaymentsController::class, 'store'])
        ->name('payments.store');

    Route::get('payments/{subscription}/success', [PaymentsController::class, 'seccess'])
        ->name('paymnets.seccess');

    Route::get('payments/{subscription}/cancel', [PaymentsController::class, 'cancel'])
        ->name('paymnets.cancel');

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

    Route::get('/calssrooms/{classroom}/chat', [classroomsController::class, 'chat'])
    ->name('classrooms.chat');

    Route::resources([
        'topics' => TopicsController::class,
        'classrooms' => classroomsController::class,
        'classrooms.classworks' => ClassworksController::class,
    ]);

    Route::get('/classrooms/{classroom}/people', [ClassroomPeopleController::class, 'index'])
        ->name('classrooms.people');

    Route::delete('/classrooms/{classroom}/people', [ClassroomPeopleController::class, 'destroy'])
        ->name('classrooms.people.destroy');



    Route::post('comments', [CommentController::class, 'store'])
        ->name('comments.store');



    Route::post('classworks/{classwork}/submissions', [SubmissionController::class, 'store'])
        ->name('submission.store');
    // ->middleware('can:create , APP\Model\classwork');

    Route::get('submissions/{submission}/file', [SubmissionController::class, 'file'])
        ->name('submission.file');
});

Route::post('/payments/srtipe/webhook', Stripecontroller::class);





// require __DIR__ . '/auth.php';
