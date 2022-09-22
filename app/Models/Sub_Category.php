<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sub_Category extends Model
{
    use HasFactory;
    protected $table='sub_categories';
    protected $fillable=[
        'name',

        'category_id',
        'status',
        'image',

        'status',
        "category_id"


    ];

    public function category(){
        return $this->hasMany(Category::class,'category_id');
    }
}
