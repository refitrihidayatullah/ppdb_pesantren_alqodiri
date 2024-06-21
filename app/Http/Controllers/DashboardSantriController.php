<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardSantriController extends Controller
{
    public function index(): View
    {
        return view('Santri.Dashboard.index');
    }
    public function formPendaftaran(): View
    {
        return view('Santri.FormPendaftaran.index');
    }
}
