<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
    // update informasi ppdb
    public static function updateInformasiPpdb(array $data = [], $id)
    {
        return static::where('user_id', $id)->update($data);
    }

    // relasi first
    // relasi user dan informasi ppdb
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id_user');
    }
    // relasi end
}
