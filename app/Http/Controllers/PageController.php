<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
//    public function show($slug)
    public function show()
    {
        $title = 'About page';
        $hi = '<h1>About Page</h1>';
//        return view("pages.$slug");
        return view("pages.about", compact('title', 'hi'));
    }
}
