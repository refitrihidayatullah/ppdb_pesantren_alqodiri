<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    //update data alamat santri
    public static function updateAlamatCalonSantri(array $data = [], $id)
    {
        return static::where('user_id', $id)->update($data);
    }



    // relasi first
    // relasi alamat calon santri dan provinsi
    public function alamatProvinsi(): BelongsTo
    {
        return $this->belongsTo(Provinsi::class, 'provinsi_id', 'id_provinsi');
    }
    // relasi alamat calon santri dan kabupaten
    public function alamatKabupaten(): BelongsTo
    {
        return $this->belongsTo(Kabupaten::class, 'kabupaten_id', 'id_kabupaten');
    }
    // relasi alamat calon santri dan kecamatan
    public function alamatKecamatan(): BelongsTo
    {
        return $this->belongsTo(Kecamatan::class, 'kecamatan_id', 'id_kecamatan');
    }
    // relasi alamat calon santri dan kelurahan
    public function alamatKelurahan(): BelongsTo
    {
        return $this->belongsTo(Kelurahan::class, 'kelurahan_id', 'id_kelurahan');
    }
    // relasi user dan statusValidasi --managementDataUser
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id_user');
    }
    // relasi end
}
