<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
