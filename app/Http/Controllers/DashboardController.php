<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard(): View
    {
        $totalBelumTerverifikasi = User::with('StatusValidasi')->where('level', 'calonsantri')->whereHas('StatusValidasi', function ($query) {
            $query->where('nama_status_validasi', '!=', 'completed');
        })->count();
        $totalSudahTerverifikasi = User::with('StatusValidasi')->where('level', 'calonsantri')->whereHas('StatusValidasi', function ($query) {
            $query->where('nama_status_validasi', 'completed');
        })->count();
        $totalAdmin = User::where('level', '!=', 'calonsantri')->count();
        $totalAllUsers = User::count();
        // dd($totalBelumTerverifikasi);
        return view('Admin.Dashboard.index', compact('totalBelumTerverifikasi', 'totalSudahTerverifikasi', 'totalAdmin', 'totalAllUsers'));
    }

    // layout main
    // public function layoutAdmin(): View
    // {
    //     $cekStatusPendaftaran = User::with('StatusValidasi')->where('level', 'calonsantri')->where('id_user', Auth::user()->id_user)->first();
    //     $cekStatusPendaftaranSantri = collect($cekStatusPendaftaran)->reduce(function ($carry, $item) {
    //         return $carry->merge(collect($item)->except('password'));
    //     }, collect());
    //     dd($cekStatusPendaftaranSantri);
    //     die;
    //     return view('Layout.main', compact('cekStatusPendaftaranSantri'));
    // }
}
