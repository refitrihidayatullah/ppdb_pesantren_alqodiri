<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Validators\ValidatorRules;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class ManagementUsers extends Controller
{
    /**
     * func menampilkdam data users :view
     */

    public function index(): View
    {
        $statusUser = [
            'calonsiswa', 'admin', 'superadmin'
        ];
        //get data alluser
        $dataAllUsers = User::getAllUsers();
        return view('Admin.ManagementUsers.index', compact('dataAllUsers', 'statusUser'));
    }

    /**
     * Display a listing of the resource.
     */

    public function store(Request $request): RedirectResponse
    {
        try {
            $validation = ValidatorRules::tambahUserRules($request->all());
            if ($validation->fails()) {
                return redirect()->back()->withErrors($validation)->withInput();
            }
            return redirect('/users')->with('success', 'Berhasil menambahkan data user');
        } catch (\Exception $e) {
            return redirect('/users')->with('failed', 'Terjadi kesalahan' . $e->getMessage());
        }
        return redirect('/users')->with('success', 'Data User Berhasil Ditambahkan');
    }
}
