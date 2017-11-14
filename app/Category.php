<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['category_name'];

    /**
     * Get all the subcategories for the website.
     */
    public function subcategories()
    {
        return $this->hasMany('App\SubCategory');
    }
    /**
     * Get all the products for the website.
     */
    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
