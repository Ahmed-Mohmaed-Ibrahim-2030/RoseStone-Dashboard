<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    use HasFactory;

    protected $table='categories';
    protected $fillable=[
        'name_en',
        'name_ar',
'image',
        'status',




    ];
    public function subcategory()
    {
        return $this->hasMany(\App\Models\Sub_Category::class, 'category_id');
    }

public  function projects(){
        return $this->hasMany(Project::class,'category_id','id');
}
public  function products(){
        return $this->hasMany(Product::class,'category_id','id');
}
    protected $guarded=['id'];



}
