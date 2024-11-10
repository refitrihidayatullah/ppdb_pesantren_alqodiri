<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StatusValidasi extends Model
{
    use HasFactory;
    protected $table = 'status_validasis';
    protected $primaryKey = 'id_status_validasi';

    protected $fillable = [
        'user_id',
        'nama_status_validasi',

    ];



    // created status validasi saat registrasi calon santri --AuthenticateController
    public static function createStatusValidasi(array $data = [])
    {
        return static::create($data);
    }
    // update status validasi saat edit allusers --managementUsers
    public static function updateStatusValidasi(array $data = [], $id)
    {
        return static::where('user_id', $id)->update($data);
    }

    // update status validasi edit putra --management validasi
    public static function updateStatusValidasiPutra(array $data, $id)
    {
        return static::where('user_id', $id)->update($data);
    }

    // update status validasi edit putra --management validasi
    public static function updateStatusValidasiPutri(array $data, $id)
    {
        return static::where('user_id', $id)->update($data);
    }


    // update status validasi saat user mengisi form pendaftaran --form pendaftaran
    public static function updateStatusValidasiForm(array $data = [], $id)
    {
        return static::where('user_id', $id)->update($data);
    }

    // relasi first
    // relasi user dan statusValidasi --managementDataUser
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id_user');
    }
    // relasi end


}
