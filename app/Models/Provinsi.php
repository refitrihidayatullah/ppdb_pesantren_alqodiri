<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Provinsi extends Model
{
    use HasFactory;

    protected $table = 'provinsis';
    protected $primaryKey = 'id_provinsi';
    public $incrementing = false;
    protected $keyType = 'int';

    protected $fillable = [
        'id_provinsi',
        'name',
    ];

    public static function getDataProvinsi()
    {
        return static::all();
    }



    // relasi first
    // relasi provinsi dengan alamat_calon_santri
    public function provinsi(): HasOne
    {
        return $this->hasOne(AlamatCalonSantri::class, 'provinsi_id', 'id_provinsi');
    }
    // relasi end
}
