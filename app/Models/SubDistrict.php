<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubDistrict extends Model
{
    use HasFactory;
    protected $fillable=[
        'district_id',
        'subdistrict_eng',
        'subdistrict_nep',

    ];

    public function district(){
        return $this->hasOne('App\Models\District','id','district_id');
    }

    
}
