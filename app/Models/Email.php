<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Email extends Model
{
    use HasFactory , Sortable;
    protected $table = 'emails';
    protected $primaryKey = 'id';
    protected $fillable = [
        'country_id', 
        'email_type', 
        'email_subject1',
        'email_subject2', 
        'email_subject3',
        'email_body1',
        'email_body2',
        'email_body3',
        'email_footer',
        'days',
        'created_by',
        'updated_by' ,
        // เพิ่มฟิลด์ที่ต้องการเพิ่มข้อมูลเพิ่มเติมตรงนี้
    ];
    public $sortable = 
    [
        'updated_at'
    ];

    public function setKeyName($value)
    {
        $this->primaryKey = $value;
        return $this;
    }
}

