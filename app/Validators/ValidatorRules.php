<?php

namespace App\Validators;

use Illuminate\Support\Facades\Validator;

class ValidatorRules
{
    // validator register user --client first
    public static function registerRules(array $data = [])
    {
        return Validator::make(
            $data,
            [
                'name' => 'required',
                'email' => 'required|unique:users,email',
                'no_hp' => 'required|numeric|regex:/^[0-9]{10,15}$/|unique:Users',
                'password' => 'required',
                'password_confirm' => 'required|same:password',
            ],
            [
                'name.required' => 'nama lengkap harus diisi',
                'email.required' => 'email harus diisi',
                'email.unique' => 'email sudah terdaftar',
                'no_hp.required' => 'no hp harus diisi',
                'no_hp.unique' => 'no hp sudah terdaftar',
                'no_hp.numeric' => 'no hp harus numeric',
                'no_hp.regex' => 'no hp minimal 10 angka',
                'password.required' => 'password harus diisi',
                'password_confirm.required' => 'password harus diisi',
                'password_confirm.same' => 'password tidak sama',
            ]
        );
    }
    // validator register user --client end
    // validator register/tambah user --admin first
    public static function tambahUserRules(array $data = [])
    {
        return Validator::make(
            $data,
            [
                'name' => 'required',
                'email' => 'required|unique:users,email',
                'no_hp' => 'required|numeric|regex:/^[0-9]{10,15}$/|unique:Users',
                'level' => 'required',
                'password' => 'required',
                'password_confirm' => 'required|same:password',
            ],
            [
                'name.required' => 'nama lengkap harus diisi',
                'email.required' => 'email harus diisi',
                'email.unique' => 'email sudah terdaftar',
                'no_hp.required' => 'no hp harus diisi',
                'no_hp.unique' => 'no hp sudah terdaftar',
                'no_hp.numeric' => 'no hp harus numeric',
                'no_hp.regex' => 'no hp minimal 10 angka',
                'level.required' => ' status harus diisi',
                'password.required' => 'password harus diisi',
                'password_confirm.required' => 'password harus diisi',
                'password_confirm.same' => 'password tidak sama',
            ]
        );
    }
    // validator register/tambah user --admin end


    // validator register/tambah user --admin first
    public static function updateUserRules(array $data = [])
    {
        return Validator::make(
            $data,
            [
                'updateName' => 'required',
                'updateEmail' => 'required',
                'updateNo_hp' => 'required',
                'updateLevel' => 'required',
            ],
            [
                'updateName.required' => 'nama lengkap harus diisis',
                'updatEmail.required' => 'email harus diisi',
                'updateNo_hp.required' => 'no hp harus diisi',
                'updateLevel.required' => ' status harus diisi',
            ]
        );
    }
    // validator register/tambah user --admin end

    // validator login --client first
    public static function loginRules(array $data = [])
    {
        return Validator::make(
            $data,
            [
                'login' => 'required',
                'password' => 'required'
            ],
            [
                'login.required' => 'email / no hp harus diisi',
                'password.required' => 'password harus diisi',
            ]
        );
    }
    // validator login --client end
}
