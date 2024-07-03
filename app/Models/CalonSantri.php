<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CalonSantri extends Model
{
    use HasFactory;
    // jika menggunakan uuid
    // public $incrementing = false;
    // protected $keyType = 'string';
    protected $table = 'calon_santris';
    protected $primaryKey = 'id_santri';

    protected $fillable = [
        'no_induk_santri',
        'user_id',
        'tanggal_daftar',
        'nama_lengkap_santri',
        'tempat_lahir_santri',
        'tanggal_lahir_santri',
        'jenis_kelamin_santri',
        'jenjang_pendidikan',
    ];

    //insert calon santri
    public static function insertCalonSantri(array $data = [])
    {
        return static::create($data);
    }

    // update calon santri
    public static function updateCalonSantri(array $data = [], $id)
    {
        return static::where('user_id', $id)->update($data);
    }


    // relasi user dan calon santri
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id_user');
    }
}
