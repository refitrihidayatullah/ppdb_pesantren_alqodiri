<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use PhpOffice\PhpSpreadsheet\Calculation\MathTrig\Arabic;

class OrangTuaCalonSantri extends Model
{
    use HasFactory;
    protected $table = 'orang_tua_calon_santris';
    protected $primaryKey = 'id_alamat';

    protected $fillable = [
        'user_id',
        'nama_ayah',
        'pekerjaan_ayah',
        'nama_ibu',
        'pekerjaan_ibu',
        'no_telp_ortu',
    ];

    // insert data orangtua calon santri
    public static function insertOrangTuaCalonSiswa(array $data = [])
    {
        return static::create($data);
    }
    // update data orangtua calon santri
    public static function updateOrangTuaCalonSiswa(array $data = [], $id)
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
