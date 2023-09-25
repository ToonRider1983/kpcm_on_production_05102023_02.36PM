<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Machinemodel extends Model
{
        use HasFactory;
        protected $table = 'machinemodels';
        protected $primaryKey = 'id';
        protected $fillable = 
        [
            'machinetype1_id', 
            'machinemodel_name', 
            'origin_country_id',
            'oil_type', 
            'cooler_type',
            'power',
            'inverter_flg',
            'latest_flg',
            'remarks',
            'created_by',
            'updated_by',
            
        ];
        public function setKeyName($value)
        {
            $this->primaryKey = $value;
            return $this;
        }
}
