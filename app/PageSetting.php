<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PageSetting extends Model
{
    protected $fillable = ['page_name', 'page_main_image', 'page_content'];
}
