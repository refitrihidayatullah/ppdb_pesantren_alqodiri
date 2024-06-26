<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlamatCalonSantri extends Model
{
    use HasFactory;
    protected $table = 'alamat_calon_santris';
    protected $primaryKey = 'id_alamat';

    protected $fillable = [
        'dusun_santri',
        'user_id',
        'provinsi_id',
        'kabupaten_id',
        'kecamatan_id',
        'kelurahan_id',
    ];


    // insert data alamat santri
    public static function insertAlamatCalonSantri(array $data = [])
    {
        return static::create($data);
    }
}
