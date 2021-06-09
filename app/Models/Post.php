<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable=[
        'category_id',
        'subcategory_id',
        'district_id',
        'subdistrict_id',
        'user_id',
        'title_eng',
        'title_nep',
        'image',
        'details_eng',
        'details_nep',
        'tags_eng',
        'tags_nep',
        'headline',
        'first_section',
        'first_section_thumbnail',
        'bigthumbnail',
        'post_date',
        'post_month',

    ];

    public function category(){
        return $this->hasOne('App\Models\Category','id','category_id');
    }

    public function subcategory(){
        return $this->hasOne('App\Models\SubCategory','id','subcategory_id');
    }
    public function district(){
        return $this->hasOne('App\Models\District','id','district_id');
    }
    public function subdistrict(){
        return $this->hasOne('App\Models\SubDistrict','id','subdistrict_id');
    }
    public function users(){
        return $this->hasOne('App\Models\User','id','user_id');
    }

}
