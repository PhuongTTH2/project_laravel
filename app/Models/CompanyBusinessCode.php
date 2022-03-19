<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyBusinessCode extends Model
{
    use HasFactory;
    protected $table = 'company_business_codes';
    protected $fillable = ['name', 'order_num'];

}
