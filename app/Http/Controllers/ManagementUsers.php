<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Validators\ValidatorRules;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class ManagementUsers extends Controller
{
    /**
     * func menampilkdam data users :view
     */

    public function index(): View
    {
        // get data panitia[admin,superadmin]
        $dataAllPanitia = User::getAllPanitia();
        // array level user
        $statusUser = [
            'calonsiswa', 'admin', 'superadmin'
        ];

        //get data alluser
        $dataAllUsers = User::getAllUsers();
        return view('Admin.ManagementUsers.index', compact('dataAllUsers', 'statusUser', 'dataAllPanitia'));
    }


    /**
     * func tambah data user :redirectResponse
     */

    public function store(Request $request): RedirectResponse
    {
        try {
            $validation = ValidatorRules::tambahUserRules($request->all());
            if ($validation->fails()) {
                return redirect()->back()->withErrors($validation)->with('message', 'failed')->withInput();
            }
            $password1 = $request->password;
            $password2 = $request->password_confirm;

            if ($password1 === $password2) {
                $data = $request->all();
                $data = $request->except('password_confirm');
                $data['password'] = Hash::make($password1);
                User::registerUser($data);
                return redirect('/users')->with('message', 'success');
            }
            return redirect('/users')->with('message', 'failed');
        } catch (\Exception $e) {
            return redirect('/users')->with('failed', 'Terjadi kesalahan' . $e->getMessage());
        }
    }


    /**
     * func update data user :redirectResponse
     */

    public function update(Request $request, string $id)
    {
        try {
            $validation = ValidatorRules::updateUserRules($request->all());
            if ($validation->fails()) {
                return redirect()->back()->withErrors($validation)->with('message', 'failed')->withInput();
            }

            // $data = $request->except('_token', '_method');
            $data = [
                'name' => $request->updateName,
                'email' => $request->updateEmail,
                'no_hp' => $request->updateNo_hp,
                'level' => $request->updateLevel,
            ];
            User::updateUser($data, $id);
            return redirect('/users')->with('message', 'success');
        } catch (\Exception $e) {
            return redirect('/users')->with('failed', 'Terjadi Kesalahan ');
        }
    }
    public function destroy($id)
    {
        try {
            User::deleteUser($id);
            return redirect('/users')->with('message', 'success');
        } catch (\Exception $e) {
            return redirect('/users')->with('failed', 'Terjadi Kesalahan');
        }
    }
}
