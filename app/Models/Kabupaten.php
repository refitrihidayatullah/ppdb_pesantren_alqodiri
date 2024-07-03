<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kabupaten extends Model
{
    use HasFactory;
    protected $table = 'kabupatens';
    protected $primaryKey = 'id_kabupaten';
    public $incrementing = false;
    protected $keyType = 'int';

    protected $fillable = [
        'id_kabupaten',
        'provinsi_id',
        'name',
    ];

    // relasi first
    // relasi kabupaten dengan alamat_calon_santri
    public function kabupaten(): HasOne
    {
        return $this->hasOne(AlamatCalonSantri::class, 'kabupaten_id', 'id_kabupaten');
    }
    // relasi end
}
