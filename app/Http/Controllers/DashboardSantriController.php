<?php

namespace App\Http\Controllers;

use App\Validators\ValidatorRules;
use Illuminate\Cache\RedisStore;
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
    public function storePendaftaran(Request $request)
    {
        $validation = ValidatorRules::formulirRules($request->all());
        if ($validation->fails()) {
            return redirect('/form-pendaftaran')->withErrors($validation)->with('message', 'failed')->withInput();
        }
        return 'hello';
    }
    public function provinsi(): View
    {
        return view('Santri.FormPendaftaran.provinsi');
    }
}
