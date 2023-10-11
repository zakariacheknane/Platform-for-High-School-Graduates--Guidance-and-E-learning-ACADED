<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\postCoursController;
use App\Http\Controllers\postOrientController;
use App\Http\Controllers\formationController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\blog\FrontController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Students\LessonController;
use App\Http\Controllers\Teachers\CourseController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route:: get('/', 'Homecontroller@index')->name('home');
Route:: get('/contact', 'Homecontroller@contact')->name('contact');
Route:: get('/welcome', 'Homecontroller@welcome')->name('welcome');
Route:: get('/cours', 'Homecontroller@cours')->name('cours');
Route:: get('/orientation', 'Homecontroller@orientation')->name('orientation');
Route:: get('/formation', 'formationController@langue')->name('formation');
Route:: get('/download/{file}', 'postCoursController@download');
Route:: get('/view/{id}', 'postCoursController@view')->name('view');

Route::get('/orientation2/{id}','postOrientController@type');

Route:: get('/orientation/{slug}/afficher', 'postOrientController@show')->name('orientation.show');
Route:: get('/create/orientation', 'postOrientController@create')->name('orientation.create');
Route:: post('/add/orientation', 'postOrientController@store')->name('orientation.store');
Route:: get('/edit/orientation/{slug?}', 'postOrientController@edit')->name('orientation.edit');
Route:: put('/update/orientation/{slug}', 'postOrientController@update')->name('orientation.update');
Route::delete('/delete/orientation/{slug}', 'postOrientController@delete')->name('orientation.delete');
Route::delete('/orientation/destroy/{slug}', 'postOrientController@destroy')->name('orientation.destroy');
Route::get('/orientation/restore/{slug}', 'postOrientController@restore')->name('orientation.restore');



Route::get('/cours2/{id}','postCoursController@type'); 

Route:: get('/cours/{id}/afficher', 'postCoursController@show')->name('cours.show');
Route:: get('/create/cours', 'postCoursController@create')->name('cours.create');
Route:: post('/add/cours', 'postCoursController@store')->name('cours.store');
Route:: post('teacher/add/cours', 'postCoursController@storet')->name('cours.storet');
Route:: get('/edit/cours/{slug}', 'postCoursController@edit')->name('cours.edit');
Route:: put('/update/cours/{slug?}', 'postCoursController@update')->name('cours.update');
Route:: put('teacher/update/cours/{slug?}', 'postCoursController@updatet')->name('cours.updatet');
Route::delete('/delete/cours/{slug}', 'postCoursController@delete')->name('cours.delete');
Route::delete('/cours/destroy/{slug}', 'postCoursController@destroy')->name('cours.destroy');
Route::get('/cours/restore/{slug}', 'postCoursController@restore')->name('cours.restore');



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return redirect('/');
});

Route:: get('/settings/index', 'Admin\UserController@settings')->name('profile.settings');
Route::delete('/student/destroy/{id}', 'Admin\UserController@destroys')->name('student.destroys');
Route::delete('/teacher/destroy/{id}', 'Admin\UserController@destroyt')->name('teacher.destroyt');
Route:: get('/cours/index', 'postCoursController@index')->name('cours.index');
Route:: get('/teachers/index', 'Admin\UserController@teachers')->name('admin.users.teachers');
Route:: get('/students/index', 'Admin\UserController@students')->name('admin.users.students');
Route:: get('/allcourses/index', 'postCoursController@allcours')->name('admin.cours.allcours');
Route:: get('/allorient/index', 'postOrientController@allorient')->name('admin.orientation.allorient');
Route:: get('/allformation/index', 'postCoursController@allformation')->name('admin.langue.allformation');
Route:: get('/mycourses', 'postCoursController@mycourses')->name('teacher.mycourses');

Route::group(['middleware' => 'auth'], function() {
    Route::group(['middleware' => 'role:student', 'prefix' => 'student', 'as' => 'student.'], function() {
        Route::resource('lessons', \App\Http\Controllers\Students\LessonController::class);
    });
   Route::group(['middleware' => 'role:teacher', 'prefix' => 'teacher', 'as' => 'teacher.'], function() {
       Route::resource('courses', \App\Http\Controllers\Teachers\CourseController::class);
   });
    Route::group(['middleware' => 'role:admin', 'prefix' => 'admin', 'as' => 'admin.'], function() {
        Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
    });
});
Route::post('/comment/store', 'CommentController@store')->name('comment.add');
Route::post('/reply/store', 'CommentController@replyStore')->name('reply.add');
Route::delete('/comment/destroy/{id}', 'CommentController@destroy')->name('comment.destroy');
Route:: get('/allcomments/index', 'CommentController@allcomments')->name('admin.comment');



?>