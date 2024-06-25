<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
