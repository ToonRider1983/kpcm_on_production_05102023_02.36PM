<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Project extends Model
{
    use HasFactory, Sortable;
    
    protected $table = 'projects';
    protected $primaryKey = 'id';
    protected $fillable = 
    [
		'parent_id', 
    	'distributor_id', 
    	'pic_id', 
    	'customer_id', 
        'customer_name',
        // set customer search name (2018-11-14)
        //'customer_search_name', 
    	'country_id', 
    	'industrialzone_id', 
    	'address1', 
    	'address2', 
    	'route1', 
    	'route2', 
    	'route3',
		'machinemodel1_id', 
    	'machinemodel2_id', 
    	'machinemodel3_id',
		'machinemodel1_qty', 
    	'machinemodel2_qty', 
    	'machinemodel3_qty',
    	'compatitor1',
    	'compatitor2',
    	'progress', 
    	'possibility', 
    	'expected_order_dt', 
    	'delivery_due_dt', 
    	'result', 
    	'reason', 
    	'remarks1', 
    	'remarks2', 
		'created_by',
		'updated_by' ,
    ];
    public function setKeyName($value)
    {
        $this->primaryKey = $value;
        return $this;
    } 
	public $sortable = [
		'id','parent_id','distributor_id','customer_name','updated_at'
	];

    
}


