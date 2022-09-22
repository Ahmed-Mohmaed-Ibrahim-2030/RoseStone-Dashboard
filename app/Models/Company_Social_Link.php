<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company_Social_Link extends Model
{
    use HasFactory;
    protected $fillable=['site_name',
        'url',
        'company_id'];
}
