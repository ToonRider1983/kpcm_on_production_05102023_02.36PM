<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinces extends Model
{
    use HasFactory;
    protected $table = 'provinces';
    protected $primaryKey = 'id';
    protected $fillable = [
        'country_id', 
        'province_name', 
        'created_by',
        'updated_by',
    ];
    

    public function setKeyName($value)
    {
        $this->primaryKey = $value;
        return $this;
    }
}
