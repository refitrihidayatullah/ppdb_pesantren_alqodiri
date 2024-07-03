<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use App\Models\CalonSantri;
use Illuminate\Http\Request;
use App\Models\StatusValidasi;
use App\Validators\ValidatorRules;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class AuthenticateController extends Controller
{
    public function register(): View
    {
        return view('Auth.register');
    }
    public function register_action(Request $request): RedirectResponse
    {
        try {
            // validasi first
            $validator = ValidatorRules::registerRules($request->all());
            if ($validator->fails()) {
                return redirect('/register')->withErrors($validator)->withInput();
            }
            // validasi end
            DB::beginTransaction();

            $password1 = $request->password;
            $password2 = $request->password_confirm;

            // check password
            if ($password1 === $password2) {
                $data = $request->except('password_confirm');
                // $data['level'] = "superadmin";
                $data['level'] = "calonsantri";
                $data['password'] = Hash::make($password1);
                // insert user
                $user = User::registerUser($data);
                $status = [
                    'nama_status_validasi' => ($data['level'] == "superadmin" || $data['level'] == "admin") ? "accessDenied" : "pending",
                    'user_id' => $user->id_user,
                ];
                // dd([$data, $status]);
                // die;
                // insert status validasi`
                StatusValidasi::createStatusValidasi($status);
                DB::commit();
                return redirect('/login')->with('success', 'Silahkan Login');
            } else {
                DB::rollBack();
                return redirect('/register')->with('failed', 'Terjadi Kesalahan');
            }
        } catch (\Exception $e) {
            return redirect('/register')->with('failed', 'Terjadi Kesalahan' . $e->getMessage());
        }
    }
    public function login(): View
    {
        return view('Auth.login');
    }
    public function login_action(Request $request): RedirectResponse
    {
        $validator = ValidatorRules::loginRules($request->all());
        if ($validator->fails()) {
            return redirect('/login')->withErrors($validator)->withInput();
        }


        $login = request()->input('login');
        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'no_hp';
        request()->merge([$field => $login]);


        // $credentials = [
        //     $field => $login,
        //     'password' => $request->input('password'),
        // ];
        // $credentials = $request->only($credential);
        $credentials = $request->only($field, 'password');
        if (Auth::attempt($credentials)) {
            // Jika sukses, redirect ke dashboard
            $cek_is_login = User::where($field, $login)->select('level')->first();
            if ($cek_is_login) {
                if ($cek_is_login->level == "superadmin" || $cek_is_login->level == "admin") {
                    return redirect('/dashboard')->with('success', 'Selamat Datang ' . Auth::user()->name);
                }
                return redirect('/dashboard-santri')->with('success', 'Selamat Datang ' . Auth::user()->name);
            } else {
                return redirect('/login')->with('failed', 'User not found.');
            }
        } else {
            // Jika gagal, redirect kembali ke login dengan pesan error
            return redirect('/login')->with('failed', 'Username or Password is wrong!');
        }
    }

    public function logout_action(): RedirectResponse
    {
        // dd(Auth::check());
        if (Auth::check()) {
            Auth::logout();
            return redirect('/login')->with('success', 'Anda Berhasil Logout');
        } else {
            return redirect('/dashboard')->with('failed', 'terjadi kesalahan');
        }
    }
};
