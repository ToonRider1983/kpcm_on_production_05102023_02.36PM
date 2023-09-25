<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Industrialzone extends Model
{
    use HasFactory;
    protected $table = 'industrialzones';
    protected $primaryKey = 'id';
    protected $fillable = 
    [
		'industrialzone_name', 
		'country_id', 
    'created_by',
    'updated_by' ,
    ];

   
    public function setKeyName($value)
    {
        $this->primaryKey = $value;
        return $this;
    }
   
}
