<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Machine extends Model
{
    use HasFactory, Sortable;
    protected $table = 'machines';
    protected $primaryKey = 'id';
    protected $fillable = 
    [
        'serial', 
        'factory_type', 
        'compressor_type', 
        'customer_machine_no', 
//         'machinemodel_id', 
        'machine_cd', 
//     	'ik_type_cd', 
    	'kcth_order_cd', 
    	'ksl_order_cd', 
    	'kma_order_cd', 
    	'service_factory_id',
    	'customer_id',
    	'testrun_dt', 
    	'dispatch_dt', 
    	'operate_status',
    	'motor',
//     	'program_update_dt',
    	'remarks',
    	'remarks_distributor1',
    	'remarks_distributor2',
		'maintenance_contract',
        'created_by',
        'updated_by',   
       
    ];
    public $sortable = 
    [
        'id'
    ];
    public function setKeyName($value)
    {
        $this->primaryKey = $value;
        return $this;
    }
}
