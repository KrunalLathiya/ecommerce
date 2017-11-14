<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['category_id', 'sub_category_id', 'product_name', 'product_sku_no','product_price', 'product_quantity', 'product_description','product_image', 'options'];

    public function getMainImage($id){
        
    return \DB::table('products')
                ->select('product_quantity', 'id', 'product_name', 'product_image')
                ->where('sub_category_id', '=', $id)
                ->get();
    }
}
