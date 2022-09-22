<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company_Phone extends Model
{
    use HasFactory;
    protected $fillable=['phone',

        'company_id'];
}
