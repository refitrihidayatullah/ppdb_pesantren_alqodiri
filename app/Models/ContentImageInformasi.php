<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentImageInformasi extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_image_informasi';
    protected $fillable = ['image_informasi'];

    // delete image
    public static function deleteImageInformasiPelayanan($id)
    {
        return static::where('id_image_informasi', $id)->delete();
    }
}
