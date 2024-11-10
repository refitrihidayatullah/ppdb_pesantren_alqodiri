<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentWeb extends Model
{
    use HasFactory;
    protected $table = 'content_webs';
    protected $primaryKey = 'id_content';

    protected $guarded = [];

    // get alldata general
    public static function getAllDataGeneral()
    {
        return static::all();
    }
    // get general byid
    public static function getDataGeneralById($id)
    {
        return static::where('id_content', $id)->first();
    }
    // insert general
    public static function insertGeneral(array $data = [])
    {
        return static::create($data);
    }
    // update general
    public static function updateGeneral(array $data = [], $id)
    {
        return static::where('id_content', $id)->update($data);
    }
    //destroy general
    public static function deleteGeneral($id)
    {
        return static::where('id_content', $id)->delete();
    }
}
