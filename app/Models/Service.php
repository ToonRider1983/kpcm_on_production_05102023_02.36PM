<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        
           'service_dt',
           'service_performer',
           'customer_pic',
           'running_hours',
           'panel_version',

   ];

  
}
