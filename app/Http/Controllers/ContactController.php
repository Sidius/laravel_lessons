<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

// php artisan make:controller ContactController
class ContactController extends Controller
{
    public function send(Request $request)
    {
        if ($request->method() == 'POST') {
            $body = "<p><b>Имя:</b> {$request->input('name')}</p>";
            $body .= "<p><b>E-mail:</b> {$request->input('email')}</p>";
            $body .= "<p><b>Сообщение:</b><br>".nl2br($request->input('text'))."</p>";
//            Mail::to(['pavelroma24@gmail.com', 'RomanetsEntr@yandex.by'])->send(new TestMail($body));
            Mail::to(['pavelroma24@gmail.com'])->send(new TestMail($body));
            $request->session()->flash('success', 'Сообщение отправлено.');
            return redirect()->route('email.send');
        }

        return view('send');
    }
}
