<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
}
