<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    // protected $table = 'companys';
    protected $fillable = [
        'company_code',
        'company_name',
        'company_site_name',
        'auth_type_id',
        'broadcaster_id',
        'can_use_gyokyomaster',
        'company_business_code',
        'company_type_code',
        'issuable_number_user_id',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

}
