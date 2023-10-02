<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Customer extends Model
{
    use HasFactory, Sortable;

    protected $table = 'customers';
    protected $primaryKey = 'id';
    protected $fillable = 
    [
		    'customer_cd',
			'customer_name1',
			'customer_name2',
			'country_id',
			'province_id',
			'zip',
			'address1',
			'address2',
			'industrialzone_id',
			'telephone',
			'remarks',
			// 'factory_cd',
            'created_by',
            'updated_by',
    ];
    public $sortable = 
    [
        'customer_cd',
        'customer_name1',
        'customer_name2'
    ];
    public function setKeyName($value)
    {
        $this->primaryKey = $value;
        return $this;
    }

}
