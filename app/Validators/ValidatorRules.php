<?php

namespace App\Validators;

use Illuminate\Support\Facades\Validator;

class ValidatorRules
{
    public static function registerRules(array $data = [])
    {
        return Validator::make(
            $data,
            [
                'name' => 'required',
                'email' => 'required|unique:users,email',
                'no_hp' => 'required|numeric|regex:/^[0-9]{10,15}$/|unique:Users,no_hp',
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
                'no_hp.regex' => 'no hp harus numeric',
                'password.required' => 'password harus diisi',
                'password_confirm.required' => 'password harus diisi',
                'password_confirm.same' => 'password tidak sama',
            ]
        );
    }


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
}
