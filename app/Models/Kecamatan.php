<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kecamatan extends Model
{
    use HasFactory;
    protected $table = 'kecamatans';
    protected $primaryKey = 'id_kecamatan';
    public $incrementing = false;
    protected $keyType = 'int';

    protected $fillable = [
        'id_kecamatan',
        'kabupaten_id',
        'name',
    ];

    // relasi first
    // relasi kecamatan dengan alamat_calon_santri
    public function kecamatan(): HasOne
    {
        return $this->hasOne(AlamatCalonSantri::class, 'kecamatan_id', 'id_kecamatan');
    }
    // relasi end
}
