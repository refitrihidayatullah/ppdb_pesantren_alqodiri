<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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



    // relasi first
    // relasi alamat calon santri dan provinsi
    public function alamatCalonSantri(): BelongsTo
    {
        return $this->belongsTo(Provinsi::class, 'provinsi_id', 'id_provinsi');
    }
    // relasi end
}
