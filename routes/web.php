<?php

use Illuminate\Support\Facades\Route;
use App\Services\Localization\LocalizationService;

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
Route::get('/foo', function () {
    Artisan::call('storage:link');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'moderator'], function(){
    Route::get('/', 'IndexController')->name('admin.index');

    Route::group(['namespace' => 'Moderator', 'prefix' => 'moderators', 'middleware' => 'admin'], function(){
        Route::get('/', 'IndexController')->name('moderator.index');
        Route::post('/', 'StoreController')->name('moderator.store');
        Route::get('/{moderator}', 'ShowController')->name('moderator.show');
        Route::get('/edit/{moderator}', 'EditController')->name('moderator.edit');
        Route::patch('/{moderator}', 'UpdateController')->name('moderator.update');
        Route::delete('/{moderator}', 'DeleteController')->name('moderator.delete');
    });

    Route::group(['namespace' => 'Type', 'prefix' => 'types'], function(){
        Route::get('/', 'IndexController')->name('type.index');
        Route::get('/{type}', 'ShowController')->name('type.show');
        Route::post('/', 'StoreController')->name('type.create');
        Route::get('/edit/{type}', 'EditController')->name('type.edit');
        Route::patch('/{type}', 'UpdateController')->name('type.update');
        Route::delete('/{type}', 'DeleteController')->name('type.delete');
    });

    Route::group(['namespace' => 'User', 'prefix' => 'users'], function(){
        Route::get('/', 'IndexController')->name('user.index');
        Route::get('/{user}', 'ShowController')->name('user.show');
        Route::get('/edit/{user}', 'EditController')->name('user.edit');
        Route::patch('/{user}', 'UpdateController')->name('user.update');
        Route::delete('/{user}', 'DeleteController')->name('user.delete');
    });

    Route::group(['namespace' => 'Student', 'prefix' => 'students'], function(){
        Route::get('/', 'IndexController')->name('student.index');
        Route::post('/', 'StoreController')->name('student.store');
        Route::get('/{student}', 'ShowController')->name('student.show');
        Route::get('/edit/{student}', 'EditController')->name('student.edit');
        Route::patch('/{student}', 'UpdateController')->name('student.update');
        Route::delete('/{student}', 'DeleteController')->name('student.delete');
        Route::get('/filter/students', 'FilterController')->name('filter.students');
        Route::get('/up/level', 'UpLevelController')->name('upLevel');
        Route::get('/down/level', 'DownLevelController')->name('downLevel');
    });

    Route::group(['namespace' => 'Semester', 'prefix' => 'semesters'], function(){
        Route::get('/', 'IndexController')->name('semester.index');
        Route::get('/{semester}', 'ShowController')->name('semester.show');
        Route::post('/', 'StoreController')->name('semester.store');
        Route::get('/edit/{semester}', 'EditController')->name('semester.edit');
        Route::patch('/{semester}', 'UpdateController')->name('semester.update');
        Route::delete('/{semester}', 'DeleteController')->name('semester.delete');
        Route::get('/semester/filter', 'FilterController')->name('filter.semester');
    });

    Route::group(['namespace' => 'Teacher', 'prefix' => 'tachers'], function(){
        Route::get('/', 'IndexController')->name('teacher.index');
        Route::get('/{teacher}', 'ShowController')->name('teacher.show');
        Route::post('/', 'StoreController')->name('teacher.store');
        Route::get('/edit/{teacher}', 'EditController')->name('teacher.edit');
        Route::patch('/{teacher}', 'UpdateController')->name('teacher.update');
        Route::delete('/{teacher}', 'DeleteController')->name('teacher.delete');
    });
    Route::group(['namespace' => 'Lesson', 'prefix' => 'lessons'], function(){
        Route::get('/', 'IndexController')->name('lesson.index');
        Route::get('/{lesson}', 'ShowController')->name('lesson.show');
        Route::post('/', 'StoreController')->name('lesson.store');
        Route::get('/edit/{lesson}', 'EditController')->name('lesson.edit');
        Route::patch('/{lesson}', 'UpdateController')->name('lesson.update');
        Route::delete('/{lesson}', 'DeleteController')->name('lesson.delete');
        Route::get('/download/{lessonfile}', 'DownloadController')->name('file.download');
        Route::post('/addfile/{lesson}', 'AddFileController')->name('lesson.addfile');
        Route::get('/filter/lesson', 'FilterController')->name('filter.lesson');
        Route::get('/filter/semesters', 'FilterSemesterController')->name('lesson.filter.semester');
    });
    Route::group(['namespace' => 'Event', 'prefix' => 'events'], function(){
        Route::get('/', 'IndexController')->name('event.index');
        Route::get('/{event}', 'ShowController')->name('event.show');
        Route::post('/', 'StoreController')->name('event.store');
        Route::get('/edit/{event}', 'EditController')->name('event.edit');
        Route::patch('/{event}', 'UpdateController')->name('event.update');
        Route::delete('/{event}', 'DeleteController')->name('event.delete');
        Route::post('/upload', 'UploadController')->name('upload');
    });
    Route::group(['namespace' => 'Feedback', 'prefix' => 'feedback'], function(){
        Route::get('/', 'IndexController')->name('feedback.index');
        Route::get('/{feedback}', 'ShowController')->name('feedback.show');
        Route::delete('/{feedback}', 'DeleteController')->name('feedback.delete');
    });
    Route::group(['namespace' => 'Application', 'prefix' => 'applications'], function(){
        Route::get('/', 'PendingController')->name('application.pending');
        Route::get('/canceled', 'CanceledController')->name('application.canceled');
        Route::get('/accepted', 'AcceptedController')->name('application.accepted');
        Route::get('/{application}', 'ShowController')->name('application.show');
        Route::delete('/{application}', 'DeleteController')->name('application.delete');
        Route::get('/cancel/{application}', 'CancelApplicationController')->name('application.cancel');
        Route::get('/accept/{application}', 'AcceptController')->name('application.accept');
    });
    Route::group(['namespace' => 'Test', 'prefix' => 'test'], function(){
        Route::get('/', 'IndexController')->name('test.index');
        Route::post('/', 'StoreController')->name('test.store');
        Route::get('/{test}', 'ShowController')->name('test.show');
        Route::get('/edit/{test}', 'EditController')->name('test.edit');
        Route::patch('/{test}', 'UpdateController')->name('test.update');
        Route::post('/add/question/{test}', 'AddQuestionController')->name('test.add.question');
        Route::patch('/change/question/{question}', 'ChangeQuestionController')->name('test.change.question');
        Route::delete('/{test}', 'DeleteController')->name('test.delete');
        Route::delete('/delete/question/{question}', 'DeleteQuestionController')->name('test.question.delete');
        Route::post('/give/access/{test}', 'GiveAccessController')->name('test.give.access');
        Route::get('/close/access/for/test', 'TimerController')->name('test.timer');
    });
});

Route::group(
    [
        'prefix' => LocalizationService::locale(),
        'middleware' => 'setLocale'
    ],
    function(){

    Route::group(['namespace' => 'Student', 'prefix' => 'profil'], function(){
        Route::get('/', 'ProfilController')->name('profil');
        Route::get('/user_items', 'ItemsController')->name('user_items');
        Route::get('/semester', 'SemesterController')->name('semester');
        Route::get('/items_detail/{lesson}', 'ItemDetailsController')->name('items_details');
        Route::post('/test/result/{test}', 'TestResultController')->name('test.result');
        Route::patch('/update/{user}', 'UpdateController')->name('update.user');
    });

    Route::group(['namespace' => 'Auth', 'prefix' => 'user'], function(){
        Route::get('/register', 'RegisterUserController')->name('user.register');
        Route::post('/register', 'StoreUserController')->name('user.store');
    });
    Route::group(['namespace' => 'Main'], function(){
        Route::get('/', 'IndexController')->name('index');
        Route::get('/contact', 'ContactController')->name('contact');
        Route::get('/study', 'StudyController')->name('study');
        Route::get('/about', 'AboutController')->name('about');
        Route::get('/application', 'ApplicationController@index')->name('application');
        Route::get('/teachers', 'TeacherController')->name('teacher');
        Route::get('/event', 'EventController')->name('event');
        Route::get('/distance_learn', 'DistanceLearnController')->name('distance_learn');
        Route::get('/news_details/{event}', 'NewsDetailsController')->name('news_details');
        Route::post('/user/register', 'RegisterController')->name('main.register');
        Route::post('/feedback', 'FeedbackController')->name('feedback');
        Route::get('/tax', 'TaxController')->name('tax');
        Route::get('/devouring', 'DevouringController')->name('devouring');
        Route::get('/pozh', 'PozhController')->name('pozh');
        Route::group(['namespace' => 'Male', 'prefix' => 'male'], function(){
            Route::get('/', 'IndexController')->name('male');
            Route::post('/{user}', 'ApplicationController')->name('male.application');
        });
        Route::group(['namespace' => 'Woman', 'prefix' => 'woman'], function(){
            Route::get('/', 'IndexController')->name('woman');
            Route::get('/test/{test_access}', 'TestController')->name('woman.test.form');
            Route::post('/{user}', 'ApplicationController')->name('woman.application');
        });
        Route::get('/ourItems', 'OurItemsController')->name('our.items');
        Route::get('/how', 'HowToProceedController')->name('how.to.proceed');
    });

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
