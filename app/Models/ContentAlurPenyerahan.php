<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentAlurPenyerahan extends Model
{
    use HasFactory;
    protected $table = 'content_alur_penyerahans';
    protected $primaryKey = 'id_alur_penyerahan';

    protected $guarded = [];

    // insert data alur penyerahan
    public static function insertAlurPenyerahan(array $data = [])
    {
        return static::create($data);
    }
    //get all data alur penyerahan
    public static function getAllDataAlurPenyerahan()
    {
        return static::all();
    }
    // get data alur penyerahan by id
    public static function getDataAlurPenyerahanById($id)
    {
        return static::where('id_alur_penyerahan', $id)->first();
    }
    // update data alur penyerahan
    public static function updateAlurPenyerahan(array $data = [], $id)
    {
        return static::where('id_alur_penyerahan', $id)->update($data);
    }
    // delete data alur penyerahan
    public static function deleteAlurPenyerahan($id)
    {
        return static::where('id_alur_penyerahan', $id)->delete();
    }
}
