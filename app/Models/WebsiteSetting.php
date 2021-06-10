<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteSetting extends Model
{
    use HasFactory;
    protected $fillable=[
        'logo',
        'address_eng',
        'address_nep',
        'phone_eng',
        'phone_nep',
        'email',


    ];
}
