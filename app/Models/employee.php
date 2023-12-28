<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    use HasFactory;

    public $table = 'employee';
    protected $fillable = [
        'employee_id',
        'joining_date',
        'name',
        'email',
        'mobile',
        'job_title',
        'gender',
        'password',
        'status',
    ];
}
