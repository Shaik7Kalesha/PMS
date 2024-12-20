<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;
    protected $fillable=[
        'bio_id',
        'designation',
        'reason',
        'date',
    ];
}
