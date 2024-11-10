<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentAlurPendaftaran extends Model
{
    use HasFactory;
    protected $table = 'content_alur_pendaftarans';
    protected $primaryKey = 'id_alur_pendaftaran';

    protected $guarded = [];

    // insert alur pendaftaran
    public static function insertAlurPendaftaran(array $data = [])
    {
        return static::create($data);
    }
    // get all data alur pendaftaran
    public static function getAllDataAlurPendaftaran()
    {
        return static::all();
    }
    // get data alur pendaftaran by id
    public static function getDataAlurPendaftaranById($id)
    {
        return static::where('id_alur_pendaftaran', $id)->first();
    }
    // update alur pendaftaran
    public static function updateAlurPendaftaran(array $data, $id)
    {
        return static::where('id_alur_pendaftaran', $id)->update($data);
    }
    // delete alur pendaftaran
    public static function deleteAlurPendaftaran($id)
    {
        return static::where('id_alur_pendaftaran', $id)->delete();
    }
}
