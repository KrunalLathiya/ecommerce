<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FooterTail extends Model
{
    protected $fillable = ['menu_item_name', 'menu_item_description', 'menu_item_main_image'];
}
