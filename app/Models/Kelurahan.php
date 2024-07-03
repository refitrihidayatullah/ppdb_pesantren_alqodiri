<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kelurahan extends Model
{
    use HasFactory;
    protected $table = 'kelurahans';
    protected $primaryKey = 'id_kelurahan';
    public $incrementing = false;
    protected $keyType = 'int';

    protected $fillable = [
        'id_kelurahan',
        'kecamatan_id',
        'name',
    ];

    //relasi first
    // relasi kelurahan dengan alamat_calon_santri
    public function kelurahan(): HasOne
    {
        return $this->hasOne(AlamatCalonSantri::class, 'kelurahan_id', 'id_kelurahan');
    }
    // relasi end
}
