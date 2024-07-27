<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'mobile_number',
        'emergency_mobile_number',
        'bank',
        'account_number',
        'email',
        'salary',
        'gender',
        'department',
        'photo',
    ];

}