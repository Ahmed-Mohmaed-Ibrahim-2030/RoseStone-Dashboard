<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable=[
        'title_en',
        'title_ar',
        'body_en',
        'body_ar',
        'image',
        'type',
        'category_id',
        'admin_id'

        ];
    public function user(){
        return   $this->belongsTo(User::class,'admin_id','id');
    }
    public function category(){
        return   $this->belongsTo(Category::class,'category_id','id');
    }
}
