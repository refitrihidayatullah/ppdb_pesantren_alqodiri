<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
