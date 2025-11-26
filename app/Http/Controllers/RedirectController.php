<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function __invoke(): mixed
    {
        return redirect()->route(auth()->check() ? "dashboard" : "login");
    }
}
