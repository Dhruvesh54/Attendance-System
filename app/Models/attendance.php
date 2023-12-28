<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class attendance extends Model
{
    use HasFactory;
    public $table = 'attendance';
    protected $fillable = [
        'employee_id',
        'employee_name',
        'current_date',
        'current_in_time',
        'current_out_time',
    ];
}
