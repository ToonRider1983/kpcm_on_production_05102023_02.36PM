<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Kyslik\ColumnSortable\Sortable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Sortable;
    public $sortable = ['id','company_id','updated_at'];


    /**
    * Get the user_detail record associated with the user.
    */
    public function company()
    {
        return $this->hasOne(App\company::class, 'company_id');
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    
    protected $fillable = [
        'loginid' ,
        'email',
        'password',
        'company_id',
        'user_scope',
        'user_privilege_project' ,
        'user_privilege_service' ,
        'user_privilege_maintain',
        'user_privilege_judge' ,
        'user_privilege_editall',
        'user_name',
        'language_type',
        'reference',
        'created_by',
        'updated_by' ,
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
}
