<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentImageSyarat extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_image_syarat';
    protected $guarded = [];

    // delete image
    public static function deleteImageSyaratPendaftaran($id)
    {
        return static::where('id_image_syarat', $id)->delete();
    }
}
