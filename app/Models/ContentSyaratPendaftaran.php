<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentSyaratPendaftaran extends Model
{
    use HasFactory;
    protected $table = 'content_syarat_pendaftarans';
    protected $primaryKey = 'id_syarat_pendaftaran';

    protected $guarded = [];


    // insert data syarat pendaftaran
    public static function insertSyaratPendaftaran(array $data = [])
    {
        return static::create($data);
    }
    // get all data syarat pendaftaran
    public static function getAllDataSyaratPendaftaran()
    {
        return static::all();
    }
    // get data syarat pendaftaran by id
    public static function getDataSyaratPendaftaranById($id)
    {
        return static::where('id_syarat_pendaftaran', $id)->first();
    }
    // update data syarat pendaftaran 
    public static function updateSyaratPendaftaran(array $data = [], $id)
    {
        return static::where('id_syarat_pendaftaran', $id)->update($data);
    }
    //delete data syarat pendaftaran
    public static function deleteSyaratPendaftaran($id)
    {
        return static::where('id_syarat_pendaftaran', $id)->delete();
    }
}
