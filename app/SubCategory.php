<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable = ['category_id', 'sub_category_name', 'sub_category_description', 'sub_main_image'];

}
