<?php

namespace App\Http\Controllers;

use App\Mail\RegisterMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TestController extends Controller
{
    public function index()
    {
        Mail::to('adam.pm77@gmail.com')->send(new RegisterMail('adam pm', 'Test'));
    }
}
