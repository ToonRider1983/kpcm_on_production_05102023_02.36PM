<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;


class Company extends Model
{
    use HasFactory , Sortable;


    protected $dates = ['deleted_at'];
    public $sortable = ['id','company_name','updated_at'];

    protected $table = 'companies';
    protected $primaryKey = 'id';
    protected $fillable = 
    [
        'company_type', 
		'country_id', 
		'belongto_id', 
		'smap_cd',
        'company_name', 
		'company_short_name', 
        'address1', 
		'address2', 
		'telephone',
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
