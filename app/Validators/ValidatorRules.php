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


    // validator register/tambah user panitia --admin first
    public static function tambahUserPanitiaRules(array $data = [])
    {
        return Validator::make(
            $data,
            [
                'panitiaName' => 'required',
                'panitiaEmail' => 'required|unique:users,email',
                'panitiaNo_hp' => 'required|numeric|regex:/^[0-9]{10,15}$/|unique:Users,no_hp',
                'panitiaLevel' => 'required',
                'panitiaPassword' => 'required',
                'panitiaPassword_confirm' => 'required|same:panitiaPassword',
            ],
            [
                'panitiaName.required' => 'nama lengkap harus diisi',
                'panitiaEmail.required' => 'email harus diisi',
                'panitiaEmail.unique' => 'email sudah terdaftar',
                'panitiaNo_hp.required' => 'no hp harus diisi',
                'panitiaNo_hp.unique' => 'no hp sudah terdaftar',
                'panitiaNo_hp.numeric' => 'no hp harus numeric',
                'panitiaNo_hp.regex' => 'no hp minimal 10 angka',
                'panitiaLevel.required' => ' status harus diisi',
                'panitiaPassword.required' => 'password harus diisi',
                'panitiaPassword_confirm.required' => 'password harus diisi',
                'panitiaPassword_confirm.same' => 'password tidak sama',
            ]
        );
    }
    // validator register/tambah user panitia --admin end

    // validator register/tambah user putra --admin first
    public static function tambahUserPutraRules(array $data = [])
    {
        return Validator::make(
            $data,
            [
                'putraName' => 'required',
                'putraEmail' => 'required|unique:users,email',
                'putraNo_hp' => 'required|numeric|regex:/^[0-9]{10,15}$/|unique:Users,no_hp',
                'putraLevel' => 'required',
                'putraPassword' => 'required',
                'putraPassword_confirm' => 'required|same:putraPassword',
            ],
            [
                'putraName.required' => 'nama lengkap harus diisi',
                'putraEmail.required' => 'email harus diisi',
                'putraEmail.unique' => 'email sudah terdaftar',
                'putraNo_hp.required' => 'no hp harus diisi',
                'putraNo_hp.unique' => 'no hp sudah terdaftar',
                'putraNo_hp.numeric' => 'no hp harus numeric',
                'putraNo_hp.regex' => 'no hp minimal 10 angka',
                'putraLevel.required' => ' status harus diisi',
                'putraPassword.required' => 'password harus diisi',
                'putraPassword_confirm.required' => 'password harus diisi',
                'putraPassword_confirm.same' => 'password tidak sama',
            ]
        );
    }
    // validator register/tambah user putra --admin end


    // validator register/tambah user putri --admin first
    public static function tambahUserPutriRules(array $data = [])
    {
        return Validator::make(
            $data,
            [
                'putriName' => 'required',
                'putriEmail' => 'required|unique:users,email',
                'putriNo_hp' => 'required|numeric|regex:/^[0-9]{10,15}$/|unique:Users,no_hp',
                'putriLevel' => 'required',
                'putriPassword' => 'required',
                'putriPassword_confirm' => 'required|same:putriPassword',
            ],
            [
                'putriName.required' => 'nama lengkap harus diisi',
                'putriEmail.required' => 'email harus diisi',
                'putriEmail.unique' => 'email sudah terdaftar',
                'putriNo_hp.required' => 'no hp harus diisi',
                'putriNo_hp.unique' => 'no hp sudah terdaftar',
                'putriNo_hp.numeric' => 'no hp harus numeric',
                'putriNo_hp.regex' => 'no hp minimal 10 angka',
                'putriLevel.required' => ' status harus diisi',
                'putriPassword.required' => 'password harus diisi',
                'putriPassword_confirm.required' => 'password harus diisi',
                'putriPassword_confirm.same' => 'password tidak sama',
            ]
        );
    }
    // validator register/tambah user putra --admin end



    // validator edit/update user --admin first
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
                'updateEmail.required' => 'email harus diisi',
                'updateNo_hp.required' => 'no hp harus diisi',
                'updateLevel.required' => ' status harus diisi',
            ]
        );
    }
    // validator edit/update user --admin end

    // validator edit/update user panitia --admin first
    public static function updateUserPanitiaRules(array $data = [])
    {
        return Validator::make(
            $data,
            [
                'updatePanitiaName' => 'required',
                'updatePanitiaEmail' => 'required',
                'updatePanitiaNo_hp' => 'required',
                'updatePanitiaLevel' => 'required',
            ],
            [
                'updatePanitiaName.required' => 'nama lengkap harus diisi',
                'updatePanitiaEmail.required' => 'email harus diisi',
                'updatePanitiaNo_hp.required' => 'no hp harus diisi',
                'updatePanitiaLevel.required' => ' status harus diisi',
            ]
        );
    }
    // validator edit/update user panitia --admin end

    // validator edit/update user putra --admin first
    public static function updateUserPutraRules(array $data = [])
    {
        return Validator::make(
            $data,
            [
                'updatePutraName' => 'required',
                'updatePutraEmail' => 'required',
                'updatePutraNo_hp' => 'required',
                'updatePutraLevel' => 'required',
            ],
            [
                'updatePutraName.required' => 'nama lengkap harus diisi',
                'updatePutraEmail.required' => 'email harus diisi',
                'updatePutraNo_hp.required' => 'no hp harus diisi',
                'updatePutraLevel.required' => ' status harus diisi',
            ]
        );
    }
    // validator edit/update user putra --admin end
    // validator edit/update user putri --admin first
    public static function updateUserPutriRules(array $data = [])
    {
        return Validator::make(
            $data,
            [
                'updatePutriName' => 'required',
                'updatePutriEmail' => 'required',
                'updatePutriNo_hp' => 'required',
                'updatePutriLevel' => 'required',
            ],
            [
                'updatePutriName.required' => 'nama lengkap harus diisi',
                'updatePutriEmail.required' => 'email harus diisi',
                'updatePutriNo_hp.required' => 'no hp harus diisi',
                'updatePutriLevel.required' => ' status harus diisi',
            ]
        );
    }
    // validator edit/update user putra --admin end

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


    // validator formulir pendaftaran santri --client first
    public static function formulirRules(array $data = [])
    {
        return Validator::make(
            $data,
            [
                'nama_lengkap_santri' => 'required',
                'jenis_kelamin_santri' => 'required',
                'tanggal_masuk_santri' => 'required',
                'tempat_lahir_santri' => 'required',
                'tanggal_lahir_santri' => 'required',
                'provinsi' => 'required',
                'kabupaten' => 'required',
                'kecamatan' => 'required',
                'kelurahan' => 'required',
                'jenjang_pendidikan' => 'required',
                'nama_ayah' => 'required',
                'pekerjaan_ayah' => 'required',
                'nama_ibu' => 'required',
                'pekerjaan_ibu' => 'required',
                'no_telp_ortu' => 'required',
                'informasi_ppdb' => 'required',
            ],
            [
                'nama_lengkap_santri.required' => 'nama santri harus diisi',
                'jenis_kelamin_santri.required' => 'jenis kelamin harus diisi',
                'tanggal_masuk_santri.required' => 'tanggal masuk santri harus diisi',
                'tempat_lahir_santri.required' => 'tempat lahir santri harus diisi',
                'tanggal_lahir_santri.required' => 'tanggal lahir santri harus diisi',
                'provinsi.required' => 'provinsi harus diisi',
                'kabupaten.required' => 'kabupaten harus diisi',
                'kecamatan.required' => 'kecamatan harus diisi',
                'kelurahan.required' => 'kelurahan harus diisi',
                'jenjang_pendidikan.required' => 'jenjang pendidikan harus diisi',
                'nama_ayah.required' => 'nama ayah harus diisi',
                'pekerjaan_ayah.required' => 'pekerjaan ayah harus diisi',
                'nama_ibu.required' => 'nama ibu harus diisi',
                'pekerjaan_ibu.required' => 'pekerjaan ibu harus diisi',
                'no_telp_ortu.required' => 'no telp orang tua harus diisi',
                'informasi_ppdb.required' => 'informasi ppdb harus diisi',
            ]
        );
    }
    // validator formulir pendaftaran santri --client end

    // validator update formulir pendaftaran santri --client first
    public static function updateFormulirRules(array $data = [])
    {
        return Validator::make(
            $data,
            [
                'update_nama_lengkap_santri' => 'required',
                'update_jenis_kelamin_santri' => 'required',
                'update_tanggal_masuk_santri' => 'required',
                'update_tempat_lahir_santri' => 'required',
                'update_tanggal_lahir_santri' => 'required',
                'update_provinsi' => 'required',
                'update_kabupaten' => 'required',
                'update_kecamatan' => 'required',
                'update_kelurahan' => 'required',
                'update_jenjang_pendidikan' => 'required',
                'update_nama_ayah' => 'required',
                'update_pekerjaan_ayah' => 'required',
                'update_nama_ibu' => 'required',
                'update_pekerjaan_ibu' => 'required',
                'update_no_telp_ortu' => 'required',
                'update_informasi_ppdb' => 'required',
            ],
            [
                'update_nama_lengkap_santri.required' => 'nama santri harus diisi',
                'update_jenis_kelamin_santri.required' => 'jenis kelamin harus diisi',
                'update_tanggal_masuk_santri.required' => 'tanggal masuk santri harus diisi',
                'update_tempat_lahir_santri.required' => 'tempat lahir santri harus diisi',
                'update_tanggal_lahir_santri.required' => 'tanggal lahir santri harus diisi',
                'update_provinsi.required' => 'provinsi harus diisi',
                'update_kabupaten.required' => 'kabupaten harus diisi',
                'update_kecamatan.required' => 'kecamatan harus diisi',
                'update_kelurahan.required' => 'kelurahan harus diisi',
                'update_jenjang_pendidikan.required' => 'jenjang pendidikan harus diisi',
                'update_nama_ayah.required' => 'nama ayah harus diisi',
                'update_pekerjaan_ayah.required' => 'pekerjaan ayah harus diisi',
                'update_nama_ibu.required' => 'nama ibu harus diisi',
                'update_pekerjaan_ibu.required' => 'pekerjaan ibu harus diisi',
                'update_no_telp_ortu.required' => 'no telp orang tua harus diisi',
                'update_informasi_ppdb.required' => 'informasi ppdb harus diisi',
            ]
        );
    }
    // validator update formulir pendaftaran santri --client end
}
