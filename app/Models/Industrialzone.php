<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Industrialzone extends Model
{
    use HasFactory , Sortable;
    protected $table = 'industrialzones';
    protected $primaryKey = 'id';
    protected $fillable = 
    [
		'industrialzone_name', 
		'country_id', 
    'created_by',
    'updated_by' ,
    ];
    public $sortable = ['id','updated_at'];

   
    public function setKeyName($value)
    {
        $this->primaryKey = $value;
        return $this;
    }
   
}
