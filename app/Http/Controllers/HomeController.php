<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        // l_1_9
        dump($_ENV['DB_HOST']);
        dump(env('DB_HOST', 'localhost'));
        dump($_ENV);
        dump(config());
        dump(config('app.timezone'));
        dump(config('database.connections.mysql.database'));
        return view('home', ['res' => 5, 'name' => 'John']);
    }

    public function test()
    {
        return __METHOD__;
    }
}
