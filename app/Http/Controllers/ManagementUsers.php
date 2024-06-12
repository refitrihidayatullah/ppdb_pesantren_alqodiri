<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ManagementUsers extends Controller
{
    public function index(): View
    {
        dd(Auth::user()->name);
        return view('Admin.ManagementUsers.index');
    }
}
