<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

/*
    Route::get('/', function () {
        $res = 2 + 3;
        $name = 'John';

    //    return view('home', [$res, $name])->with('var', $res);
    //    return view('home', ['var' => $res, 'name' => $name]);
        return view('home', compact('res', 'name'));
    })->name('home');

    Route::get('/l-1-4/1', function () {
        return '<h1>Hello World</h1>';
    });

    Route::get('/l-1-4/2', function () {
        return view('home');
    });

    Route::get('/l-1-4/3', function () {
        $res = 2 + 3;
        $name = 'John';

    //    return view('home', [$res, $name])->with('var', $res);
    //    return view('home', ['var' => $res, 'name' => $name]);
        return view('home', compact('res', 'name'));
    });

    // ABOUT
    Route::get('/l-1-4/4', function () {
          return '<h1>ABOUT PAGE</h1>';
    });
*/

// CONTACTS
/*
    Route::get('/l-1-5/1', function () {
          return view('contact');
    });

    Route::post('/l-1-5/send-email', function () {
        if (!empty($_POST)) {
            dump($_POST);
    //        dd($_POST);
        }
        return 'Send Email';
    });
*/

/*
    Route::match(['post', 'get'], '/l-1-5/1', function () {
        if (!empty($_POST)) {
            dump($_POST);
        }
        return view('contact');
    });
*/

/*
    Route::any('/l-1-5/1', function () {
        if (!empty($_POST)) {
            dump($_POST);
        }
        return view('contact');
    });
*/

/*
    Route::match(['post', 'get', 'put'], '/l-1-5/contact', function () {
        if (!empty($_POST)) {
            dump($_POST);
        }
        return view('contact');
    })->name('contact');

    Route::view('/l-1-5/test', 'test', ['test' => 'Test Data']);
*/

//Route::redirect('/l-1-4/4', '/l-1-5/1');
//Route::redirect('/l-1-4/4', '/l-1-5/1', 301);
//Route::permanentRedirect('/l-1-4/4', '/l-1-5/1');

/*
    Route::get('/l-1-6/{id}', function ($id) {
        return "Post $id";
    });
*/

/*
    Route::get('/l-1-6/{id}/{slug}', function ($id, $slug) {
        return "Post $id | $slug";
    //})->where('id', '[0-9]*');
    })->where(['id' => '[0-9]+', 'slug' => '[a-zA-Z0-9-]+']);
*/

/*
    Route::get('/l-1-6/{id}/{slug}', function ($id, $slug {
        return "Post $id | $slug";
    });
*/

/*
    Route::get('/l-1-6/{id}/{slug?}', function ($id, $slug = null) {
        return "Post $id | $slug";
    })->name('post');

    Route::prefix('/l-1-6/admin')->name('admin.')->group(function () {
        Route::get('/posts', function () {
            return "Posts List";
        });

        Route::get('/post/create', function () {
            return "Post Create";
        });

        Route::get('/post/{id}/edit', function ($id) {
            return "Edit Post $id";
        })->name('post');
    });
*/

Route::fallback(function () {
//    return redirect()->route('home');
    abort(404, 'Oops! Page not found...');
});

// l-1-7
//Route::get('/', [HomeController::class, 'index']);
Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('/create', 'App\Http\Controllers\HomeController@create')->name('posts.create');
Route::post('/', [HomeController::class, 'store'])->name('posts.store');

// l-1-8
//Route::resource('/l-1-8/posts', \App\Http\Controllers\PostController::class, ['parameters' => [
//    'posts' => 'id'
//]]);
//Route::resource('/posts', 'App\Http\Controllers\PostController');
// All keys = post

Route::get('/l_1_9', 'App\Http\Controllers\HomeController@l_1_9');
Route::get('/l_1_11', 'App\Http\Controllers\HomeController@l_1_11');
Route::get('/l_1_12', 'App\Http\Controllers\HomeController@l_1_12');
Route::get('/l_1_13', 'App\Http\Controllers\HomeController@l_1_13');
Route::get('/l_1_14', 'App\Http\Controllers\HomeController@l_1_14');
Route::get('/l_1_15', 'App\Http\Controllers\HomeController@l_1_15');
Route::get('/l_1_16', 'App\Http\Controllers\HomeController@l_1_16');
Route::get('/l_1_18', 'App\Http\Controllers\HomeController@l_1_18');
Route::get('/l_1_23', 'App\Http\Controllers\HomeController@l_1_23');
Route::get('/test', 'App\Http\Controllers\HomeController@test');
Route::get('/test2', 'App\Http\Controllers\Test\TestController@index');
Route::get('/page/about', 'App\Http\Controllers\PageController@show')->name('page.about');
Route::get('/page/{slug}', 'App\Http\Controllers\PageController@show');

//Route::get('/l_1_26/send', 'App\Http\Controllers\ContactController@send');
Route::match(['get', 'post'], '/l_1_26/send', [ContactController::class, 'send'])->name('email.send');

Route::get('/register', [UserController::class, 'create'])->name('register.create');
Route::post('/register', [UserController::class, 'store'])->name('register.store');

