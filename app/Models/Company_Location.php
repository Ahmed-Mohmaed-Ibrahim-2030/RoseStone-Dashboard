<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company_Location extends Model
{
    use HasFactory;
  protected  $fillable=[
        'location',
'branch',
      'company_id',
  ];
}
