<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;
class Country extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'id',
        'country_name', 
    	'country_short_name', 
        'created_by',
        'updated_by' ,
    ];

    public function company()
    {
        //return $this -> hasMany (mst_companies::class, 'countrycode' , 'countrycode');
        return $this -> belongsTo(Company::class);
    }    
}
