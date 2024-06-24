<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
