<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;
    protected $fillable=[
        'staffid',
        'name',
        'email',
        'department',
        'mobilenumber',
        'designation',
        'password',
    ];
}
