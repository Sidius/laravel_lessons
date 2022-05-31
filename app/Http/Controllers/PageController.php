<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function show($slug)
    {
//        return view("pages.$slug");
        return view("pages.show", compact('slug'));
    }
}
