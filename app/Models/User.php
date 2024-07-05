<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\StatusValidasi;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'users';
    protected $primaryKey = 'id_user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'no_hp',
        'level',
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];




    // registrasi first

    // function registrasi pembuatan akun
    public static function registerUser(array $data = [])
    {
        return static::create($data);
    }
    // function registrasi pembuatan akun
    public static function registerUserPanitia(array $data = [])
    {
        return static::create($data);
    }

    // function registrasi pembuatan akun putra
    public static function registerUserPutra(array $data = [])
    {
        return static::create($data);
    }

    // registrasi end

    // management akun first
    // function mengambil semua data users
    public static function getAllUsers()
    {
        return static::select('id_user', 'name', 'email', 'no_hp', 'level', 'created_at', 'updated_at')->orderBy('created_at', 'desc')->get();
    }
    // function mengambil dataUserById
    public static function getUserById($id)
    {
        return static::where('id_user', $id)->first();
    }

    // function mengambil semua data panitia[admin,superadmin]
    public static function getAllPanitia()
    {
        return static::where('level', 'admin')->orWhere('level', 'superadmin')->select('id_user', 'name', 'email', 'no_hp', 'level', 'created_at', 'updated_at')->orderBy('created_at', 'desc')->get();
    }

    // function update data users
    public static function updateUser(array $data = [], $id)
    {
        return static::where('id_user', $id)->update($data);
    }

    // function update data users panitia
    public static function updateUserPanitia(array $data = [], $id)
    {
        return static::where('id_user', $id)->update($data);
    }

    // function update data users putra
    public static function updateUserPutra(array $data = [], $id)
    {
        return static::where('id_user', $id)->update($data);
    }

    // function delete data users
    public static function deleteUser($id)
    {
        return static::where('id_user', $id)->delete();
    }
    // function delete data users panitia
    public static function deleteUserPanitia($id)
    {
        return static::where('id_user', $id)->delete();
    }
    // management akun end


    // formulir pendaftaran first
    public static function userWithoutIdInCalonSantri()
    {
        return static::where('level', '!=', 'superadmin')
            ->where('level', '!=', 'admin')
            ->whereDoesntHave('CalonSantris')
            ->get();
    }


    // relasi first

    // relasi user dengan calonsantri
    public function CalonSantris(): HasOne
    {
        return $this->hasOne(CalonSantri::class, 'user_id', 'id_user');
    }
    // relasi user dengan statusValidasi --managementDataUsers
    public function StatusValidasi(): HasOne
    {
        return $this->hasOne(StatusValidasi::class, 'user_id', 'id_user');
    }
    // relasi user dengan alamatCalonSantri
    public function AlamatCalonSantri(): HasOne
    {
        return $this->hasOne(AlamatCalonSantri::class, 'user_id', 'id_user');
    }

    // relasi user dengan informasi ppdb
    public function InformasiPpdb(): HasOne
    {
        return $this->hasOne(InformasiPpdb::class, 'user_id', 'id_user');
    }
    // relasi user dengan orangtuacalonsantri
    public function OrangTuaCalonSantri(): HasOne
    {
        return $this->hasOne(OrangTuaCalonSantri::class, 'user_id', 'id_user');
    }
    // relasi end
}
