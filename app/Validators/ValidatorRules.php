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
                'jenkel' => 'required',
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
                'jenkel.required' => 'jenis kelamin harus diisi',
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
                'jenkel' => 'required',
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
                'jenkel.required' => 'jenis kelamin harus diisi',
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
                'panitiaJenkel' => 'required',
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
                'panitiaJenkel.required' => 'jenis kelamin harus diisi',
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
                'putraJenkel' => 'required',
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
                'putraJenkel.required' => ' jenis kelamin harus diisi',
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
                'putriJenkel' => 'required',
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
                'putriJenkel.required' => 'jenis kelamin harus diisi',
                'putriLevel.required' => 'status harus diisi',
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
                'updateJenkel' => 'required',
                'updateLevel' => 'required',
            ],
            [
                'updateName.required' => 'nama lengkap harus diisis',
                'updateEmail.required' => 'email harus diisi',
                'updateNo_hp.required' => 'no hp harus diisi',
                'updateJenkel.required' => 'jenis kelamin harus diisi',
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
                'updatePanitiaJenkel' => 'required',
                'updatePanitiaLevel' => 'required',
            ],
            [
                'updatePanitiaName.required' => 'nama lengkap harus diisi',
                'updatePanitiaEmail.required' => 'email harus diisi',
                'updatePanitiaNo_hp.required' => 'no hp harus diisi',
                'updatePanitiaJenkel.required' => 'jenis kelamin harus diisi',
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
                'updatePutraJenkel' => 'required',
                'updatePutraLevel' => 'required',
            ],
            [
                'updatePutraName.required' => 'nama lengkap harus diisi',
                'updatePutraEmail.required' => 'email harus diisi',
                'updatePutraNo_hp.required' => 'no hp harus diisi',
                'updatePutraJenkel.required' => 'jenis kelamin harus diisi',
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
                'updatePutriJenkel' => 'required',
                'updatePutriLevel' => 'required',
            ],
            [
                'updatePutriName.required' => 'nama lengkap harus diisi',
                'updatePutriEmail.required' => 'email harus diisi',
                'updatePutriNo_hp.required' => 'no hp harus diisi',
                'updatePutriJenkel.required' => 'jenis kelamin harus diisi',
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


    // validator formulir umum pendaftaran santri --client first
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
                'foto_santri' => 'mimes:jpg,jpeg,png|max:2048',
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
                'foto_santri.mimes' => 'foto santri harus berformat jgp/jpeg/png',
                'foto_santri.max' => 'foto santri berukuran maksimal 2MB',
                'informasi_ppdb.required' => 'informasi ppdb harus diisi',
            ]
        );
    }
    // validator formulir umum pendaftaran santri --client end
    // validator formulir users pendaftaran santri --client first
    public static function formulirUsersRules(array $data = [])
    {
        return Validator::make(
            $data,
            [
                'users_nama_lengkap_santri' => 'required',
                'users_jenis_kelamin_santri' => 'required',
                'users_tanggal_masuk_santri' => 'required',
                'users_tempat_lahir_santri' => 'required',
                'users_tanggal_lahir_santri' => 'required',
                'users_provinsi' => 'required',
                'users_kabupaten' => 'required',
                'users_kecamatan' => 'required',
                'users_kelurahan' => 'required',
                'users_jenjang_pendidikan' => 'required',
                'users_nama_ayah' => 'required',
                'users_pekerjaan_ayah' => 'required',
                'users_nama_ibu' => 'required',
                'users_pekerjaan_ibu' => 'required',
                'users_no_telp_ortu' => 'required',
                'users_foto_santri' => 'mimes:jpg,jpeg,png|max:2048',
                'users_informasi_ppdb' => 'required',
            ],
            [
                'users_nama_lengkap_santri.required' => 'nama santri harus diisi',
                'users_jenis_kelamin_santri.required' => 'jenis kelamin harus diisi',
                'users_tanggal_masuk_santri.required' => 'tanggal masuk santri harus diisi',
                'users_tempat_lahir_santri.required' => 'tempat lahir santri harus diisi',
                'users_tanggal_lahir_santri.required' => 'tanggal lahir santri harus diisi',
                'users_provinsi.required' => 'provinsi harus diisi',
                'users_kabupaten.required' => 'kabupaten harus diisi',
                'users_kecamatan.required' => 'kecamatan harus diisi',
                'users_kelurahan.required' => 'kelurahan harus diisi',
                'users_jenjang_pendidikan.required' => 'jenjang pendidikan harus diisi',
                'users_nama_ayah.required' => 'nama ayah harus diisi',
                'users_pekerjaan_ayah.required' => 'pekerjaan ayah harus diisi',
                'users_nama_ibu.required' => 'nama ibu harus diisi',
                'users_pekerjaan_ibu.required' => 'pekerjaan ibu harus diisi',
                'users_no_telp_ortu.required' => 'no telp orang tua harus diisi',
                'users_foto_santri.mimes' => 'foto santri harus berformat jgp/jpeg/png',
                'users_foto_santri.max' => 'foto santri berukuran maksimal 2MB',
                'users_informasi_ppdb.required' => 'informasi ppdb harus diisi',
            ]
        );
    }
    // validator formulir users pendaftaran santri --client end

    // validator formulir Putra pendaftaran santri --client first
    public static function formulirPutraRules(array $data = [])
    {
        return Validator::make(
            $data,
            [
                'putra_nama_lengkap_santri' => 'required',
                'putra_jenis_kelamin_santri' => 'required',
                'putra_tanggal_masuk_santri' => 'required',
                'putra_tempat_lahir_santri' => 'required',
                'putra_tanggal_lahir_santri' => 'required',
                'putra_provinsi' => 'required',
                'putra_kabupaten' => 'required',
                'putra_kecamatan' => 'required',
                'putra_kelurahan' => 'required',
                'putra_jenjang_pendidikan' => 'required',
                'putra_nama_ayah' => 'required',
                'putra_pekerjaan_ayah' => 'required',
                'putra_nama_ibu' => 'required',
                'putra_pekerjaan_ibu' => 'required',
                'putra_no_telp_ortu' => 'required',
                'putra_foto_santri' => 'mimes:jpg,jpeg,png|max:2048',
                'putra_informasi_ppdb' => 'required',
            ],
            [
                'putra_nama_lengkap_santri.required' => 'nama santri harus diisi',
                'putra_jenis_kelamin_santri.required' => 'jenis kelamin harus diisi',
                'putra_tanggal_masuk_santri.required' => 'tanggal masuk santri harus diisi',
                'putra_tempat_lahir_santri.required' => 'tempat lahir santri harus diisi',
                'putra_tanggal_lahir_santri.required' => 'tanggal lahir santri harus diisi',
                'putra_provinsi.required' => 'provinsi harus diisi',
                'putra_kabupaten.required' => 'kabupaten harus diisi',
                'putra_kecamatan.required' => 'kecamatan harus diisi',
                'putra_kelurahan.required' => 'kelurahan harus diisi',
                'putra_jenjang_pendidikan.required' => 'jenjang pendidikan harus diisi',
                'putra_nama_ayah.required' => 'nama ayah harus diisi',
                'putra_pekerjaan_ayah.required' => 'pekerjaan ayah harus diisi',
                'putra_nama_ibu.required' => 'nama ibu harus diisi',
                'putra_pekerjaan_ibu.required' => 'pekerjaan ibu harus diisi',
                'putra_no_telp_ortu.required' => 'no telp orang tua harus diisi',
                'putra_foto_santri.mimes' => 'foto santri harus berformat jgp/jpeg/png',
                'putra_foto_santri.max' => 'foto santri berukuran maksimal 2MB',
                'putra_informasi_ppdb.required' => 'informasi ppdb harus diisi',
            ]
        );
    }
    // validator formulir Putra pendaftaran santri --client end

    // validator formulir Putri pendaftaran santri --client first
    public static function formulirPutriRules(array $data = [])
    {
        return Validator::make(
            $data,
            [
                'putri_nama_lengkap_santri' => 'required',
                'putri_jenis_kelamin_santri' => 'required',
                'putri_tanggal_masuk_santri' => 'required',
                'putri_tempat_lahir_santri' => 'required',
                'putri_tanggal_lahir_santri' => 'required',
                'putri_provinsi' => 'required',
                'putri_kabupaten' => 'required',
                'putri_kecamatan' => 'required',
                'putri_kelurahan' => 'required',
                'putri_jenjang_pendidikan' => 'required',
                'putri_nama_ayah' => 'required',
                'putri_pekerjaan_ayah' => 'required',
                'putri_nama_ibu' => 'required',
                'putri_pekerjaan_ibu' => 'required',
                'putri_no_telp_ortu' => 'required',
                'putri_foto_santri' => 'mimes:jpg,jpeg,png|max:2048',
                'putri_informasi_ppdb' => 'required',
            ],
            [
                'putri_nama_lengkap_santri.required' => 'nama santri harus diisi',
                'putri_jenis_kelamin_santri.required' => 'jenis kelamin harus diisi',
                'putri_tanggal_masuk_santri.required' => 'tanggal masuk santri harus diisi',
                'putri_tempat_lahir_santri.required' => 'tempat lahir santri harus diisi',
                'putri_tanggal_lahir_santri.required' => 'tanggal lahir santri harus diisi',
                'putri_provinsi.required' => 'provinsi harus diisi',
                'putri_kabupaten.required' => 'kabupaten harus diisi',
                'putri_kecamatan.required' => 'kecamatan harus diisi',
                'putri_kelurahan.required' => 'kelurahan harus diisi',
                'putri_jenjang_pendidikan.required' => 'jenjang pendidikan harus diisi',
                'putri_nama_ayah.required' => 'nama ayah harus diisi',
                'putri_pekerjaan_ayah.required' => 'pekerjaan ayah harus diisi',
                'putri_nama_ibu.required' => 'nama ibu harus diisi',
                'putri_pekerjaan_ibu.required' => 'pekerjaan ibu harus diisi',
                'putri_no_telp_ortu.required' => 'no telp orang tua harus diisi',
                'putri_foto_santri.mimes' => 'foto santri harus berformat jgp/jpeg/png',
                'putri_foto_santri.max' => 'foto santri berukuran maksimal 2MB',
                'putri_informasi_ppdb.required' => 'informasi ppdb harus diisi',
            ]
        );
    }
    // validator formulir Putri pendaftaran santri --client end

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
    // validator update validasi pendaftaran --client end
    public static function updateValidasi(array $data = [])
    {
        return Validator::make($data, [
            'updateStatusValidasi' => 'required|in:in_progress,completed'
        ]);
    }
    // validator update validasi pendaftaran --client end
    // validator update validasi pendaftaran putra --client first
    public static function updateValidasiPutra(array $data = [])
    {
        return Validator::make($data, [
            'updateStatusValidasiPutra' => 'required|in:in_progress,completed'
        ]);
    }
    // validator update validasi pendaftaran putra --client end
    // validator update validasi pendaftaran putri --client first
    public static function updateValidasiPutri(array $data = [])
    {
        return Validator::make($data, [
            'updateStatusValidasiPutri' => 'required|in:in_progress,completed'
        ]);
    }
    // validator update validasi pendaftaran putri --client end


    // validator create  pendaftaran --client first
    public static function tambahGeneral(array $data = [])
    {
        return Validator::make(
            $data,
            [
                'title_web'  => 'required',
                'sub_title_web' => 'required',
                'data_title_web' => 'required',
                'dari_tahun_ajaran_web' => 'required',
                'sampai_tahun_ajaran_web' => 'required',
                'alamat_pondok' => 'required',
                'email_pondok' => 'required',
                'no_telp_pondok' => 'required',
            ],
            [
                'title_web.required'  => 'Title harus diisi',
                'sub_title_web.required' => 'Nama Pondok harus diisi',
                'data_title_web.required' => 'Keterangan Pondok harus diisi',
                'dari_tahun_ajaran_web.required' => 'Tahun Ajaran harus diisi',
                'sampai_tahun_ajaran_web.required' => 'Tahun Ajaran harus diisi',
                'alamat_pondok.required' => 'Alamat Pondok harus diisi',
                'email_pondok.required' => 'Email Pondok harus diisi',
                'no_telp_pondok.required' => 'No Telp Pondok harus diisi',

            ]
        );
    }
    // validator create  pendaftaran --client end
    // validator update  pendaftaran --client end
    public static function updateGeneral(array $data = [])
    {
        return Validator::make(
            $data,
            [
                'update_title_web'  => 'required',
                'update_sub_title_web' => 'required',
                'update_data_title_web' => 'required',
                'update_dari_tahun_ajaran_web' => 'required',
                'update_sampai_tahun_ajaran_web' => 'required',
                'update_alamat_pondok' => 'required',
                'update_email_pondok' => 'required',
                'update_no_telp_pondok' => 'required',
            ],
            [
                'update_title_web.required'  => 'Title harus diisi',
                'update_sub_title_web.required' => 'Nama Pondok harus diisi',
                'update_data_title_web.required' => 'Keterangan Pondok harus diisi',
                'update_dari_tahun_ajaran_web.required' => 'Tahun Ajaran harus diisi',
                'update_sampai_tahun_ajaran_web.required' => 'Tahun Ajaran harus diisi',
                'update_alamat_pondok.required' => 'Alamat Pondok harus diisi',
                'update_email_pondok.required' => 'Email Pondok harus diisi',
                'update_no_telp_pondok.required' => 'No Telp Pondok harus diisi',

            ]
        );
    }
    // validator update  pendaftaran --client end
    // validator tambah alur  pendaftaran --client first
    public static function tambahAlurPendaftaran(array $data = [])
    {
        return Validator::make(
            $data,
            [
                'title_alur_pendaftaran_online' => 'required',
                'sub_title_alur_pendaftaran_online' => 'required',
            ],
            [
                'title_alur_pendaftaran_online.required' => 'Title alur pendaftaran harus diisi',
                'sub_title_alur_pendaftaran_online.required' => 'Keterangan harus diisi',
            ]
        );
    }
    // validator tambah alur  pendaftaran --client end

    // validator tambah syarat  pendaftaran --client first
    public static function tambahSyaratPendaftaran(array $data = [])
    {
        return Validator::make(
            $data,
            [
                'title_syarat_pendaftaran' => 'required',
                'sub_title_syarat_pendaftaran' => 'required',
            ],
            [
                'title_syarat_pendaftaran.required' => 'Title syarat pendaftaran harus diisi',
                'sub_title_syarat_pendaftaran.required' => 'Keterangan harus diisi',
            ]
        );
    }
    // validator tambah syarat  pendaftaran --client end
    // validator tambah alur penyerahan --client first
    public static function tambahAlurPenyerahan(array $data = [])
    {
        return Validator::make(
            $data,
            [
                'title_alur_penyerahan_santri' => 'required',
                'sub_title_alur_penyerahan_santri' => 'required',
            ],
            [
                'title_alur_penyerahan_santri.required' => 'Title alur penyerahan santri harus diisi',
                'sub_title_alur_penyerahan_santri.required' => 'Keterangan harus diisi',
            ]
        );
    }
    // validator tambah alur penyerahan --client end

    // validator update alur  pendaftaran --client first
    public static function updateAlurPendaftaran(array $data = [])
    {
        return Validator::make(
            $data,
            [
                'update_title_alur_pendaftaran_online' => 'required',
                'update_sub_title_alur_pendaftaran_online' => 'required',
            ],
            [
                'update_title_alur_pendaftaran_online.required' => 'Title alur pendaftaran harus diisi',
                'update_sub_title_alur_pendaftaran_online.required' => 'Keterangan harus diisi',
            ]
        );
    }
    // validator update alur  pendaftaran --client end
    // validator update syarat  pendaftaran --client first
    public static function updateSyaratPendaftaran(array $data = [])
    {
        return Validator::make(
            $data,
            [
                'update_title_syarat_pendaftaran' => 'required',
                'update_sub_title_syarat_pendaftaran' => 'required',
            ],
            [
                'update_title_syarat_pendaftaran.required' => 'Title syarat pendaftaran harus diisi',
                'update_sub_title_syarat_pendaftaran.required' => 'Keterangan harus diisi',
            ]
        );
    }
    // validator update syarat  pendaftaran --client end
    // validator update penyerahan  pendaftaran --client first
    public static function updateAlurPenyerahan(array $data = [])
    {
        return Validator::make(
            $data,
            [
                'update_title_alur_penyerahan_santri' => 'required',
                'update_sub_title_alur_penyerahan_santri' => 'required',
            ],
            [
                'update_title_alur_penyerahan_santri.required' => 'Title alur penyerahan santri harus diisi',
                'update_sub_title_alur_penyerahan_santri.required' => 'Keterangan harus diisi',
            ]
        );
    }
    // validator update penyerahan  pendaftaran --client end
}
