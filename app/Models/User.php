<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

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


    // relasi first

    // relasi user dengan calonsantri
    public function CalonSantris(): HasOne
    {
        return $this->hasOne(CalonSantri::class, 'user_id', 'id_user');
    }


    // relasi end

    // registrasi first

    // function registrasi pembuatan akun
    public static function registerUser(array $data = [])
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

    // management akun end
}
