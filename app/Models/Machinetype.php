<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Machinetype extends Model
{
    use HasFactory, Sortable;
    public $sortable = ['id','updated_at'];
    protected $table = 'machinetype1s';
    protected $primaryKey = 'id';
    protected $fillable = 
    [
		'machinetype1_name', 
        'created_by',
        'updated_by' ,
        
		 	
    ];

    
    public function setKeyName($value)
    {
        $this->primaryKey = $value;
        return $this;
    }
}
