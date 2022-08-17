<?php

namespace App\Http\Controllers;
use App\Notifications\WelcomeNoticification;
use Illuminate\Support\Facades\Notification;
use App\Models\user;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $user=user::first();
        Notification::send($user, new WelcomeNoticification);
        dd('done');
        return view("welcome");
    }
}
