<?php

namespace dsTaskr\Http\Controllers;

use Illuminate\Http\Request;
use View;

class HomeController extends Controller
{
    public function showWelcome()
    {
        return View::make('home');
    }
}
