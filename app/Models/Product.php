<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable=[
        'name_en',
        'name_ar',
        'price',
        'status',
        'details_en',
        'details_ar',
        'category_id',
        'code',
        'expected_time',
        'user_id'
    ]
    ;
    public function images(){
        return $this->hasMany(Product_Image::class,'product_id','id');
    }
public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
}public function user(){
        return $this->belongsTo(User::class,'user_id','id');
}
}
