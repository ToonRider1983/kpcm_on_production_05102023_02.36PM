<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MstCountries;

class Machinetype extends Model
{
    use HasFactory;
    protected $table = 'machinetype1s';
    protected $primaryKey = 'id';
    protected $fillable = 
    [
		'machinetype1_name', 
        'created_by',
        'updated_by' ,
        
		 	
    ];


    public function country()
    {
        return $this -> hasMany (MstCountries::class, 'countrycode' , 'countrycode');
    }
    
    public function setKeyName($value)
    {
        $this->primaryKey = $value;
        return $this;
    }
}
