<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Student;
use Carbon\Carbon;

class Attendence extends Model
{
    use HasFactory;
    // Define the relationship with Student
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
    protected $casts = [
        'date' => 'datetime',
    ];
}

