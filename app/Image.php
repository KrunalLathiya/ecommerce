<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['product_id','image_name', 'sub_category_id'];

    public static function getImages($id)
    {
        return  \DB::table('images')
                    ->select('image_name', 'id')
                    ->where('product_id', '=', $id)
                    ->get();
        
    }

}
