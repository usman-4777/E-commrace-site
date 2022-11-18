<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'gender',
        'skills',
        'email',
        'user_id',
        'company_id'

    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
}
