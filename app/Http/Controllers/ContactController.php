<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

// php artisan make:controller ContactController
class ContactController extends Controller
{
    public function send()
    {
        Mail::to(['pavelroma24@gmail.com', 'RomanetsEntr@yandex.by'])->send(new TestMail());
        return view('send');
    }
}
