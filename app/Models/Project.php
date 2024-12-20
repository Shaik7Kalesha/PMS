<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'source',
        'description',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
