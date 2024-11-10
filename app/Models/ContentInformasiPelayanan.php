<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentInformasiPelayanan extends Model
{
    use HasFactory;
    protected $table = 'content_informasi_pelayanans';
    protected $primaryKey = 'id_informasi_pelayanan';

    protected $guarded = [];

    // tambah data informasi pelayanan
    public static function insertInformasiPelayanan(array $data = [])
    {
        return static::create($data);
    }
    // get all data informasi pelayanan
    public static function getAllDataInformasiPelayanan(array $data = [])
    {
        return static::all();
    }
    // get data informasi pelayanan by id
    public static function getDataInformasiPelayananById($id)
    {
        return static::where('id_informasi_pelayanan', $id)->first();
    }
    // update data informasi pelayanan
    public static function updateInformasiPelayanan(array $data = [], $id)
    {
        return static::where('id_informasi_pelayanan', $id)->update($data);
    }
    //delete data informasi pelayanan
    public static function deleteInformasiPelayanan($id)
    {
        return static::where('id_informasi_pelayanan', $id)->delete();
    }
}
