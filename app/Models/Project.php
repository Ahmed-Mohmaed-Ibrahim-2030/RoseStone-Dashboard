<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable=[
        'name_en',
        'name_ar',

        'status',
        'details_en',
        'details_ar',
        'category_id',
        'code',
        'start_date',
        'end_date',
        'location',
        'user_id'
    ]    ;
    public function images(){
        return $this->hasMany(Project_Image::class,'project_id','id');
    }
    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
