<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable=[
        'name_en',
        'name_ar',
        'about_en',
        'vision_en',
        'about_ar',
        'vision_ar',
        'email',
        'web_site_url',
        'preface_en',
        'preface_ar',
    ];
    public function phones(){
       return  $this->hasMany(Company_Phone::class,'company_id','id');
    }
    public function locations(){
       return  $this->hasMany(Company_Location::class,'company_id','id');
    }
    public function social_links(){
       return  $this->hasMany(Company_Social_Link::class,'company_id','id');
    }
}
