<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HeaderTop extends Model
{
    protected $fillable = ['notice', 
                           'offer', 
                           'mail', 
                           'facebook',
                            'twitter', 
                            'instagram', 
                            'pinterest', 
                            'phno', 
                            'address'];
}
