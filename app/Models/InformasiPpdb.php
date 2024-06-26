<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformasiPpdb extends Model
{
    use HasFactory;

    protected $table = 'informasi_ppdbs';
    protected $primaryKey = 'id_informasi_ppdb';

    protected $fillable = [
        'user_id',
        'name',
    ];

    // insert informasi ppdb
    public static function insertInformasiPpdb(array $data = [])
    {
        return static::create($data);
    }
}
