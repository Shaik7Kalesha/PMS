<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'title', 'description', 'date', 'eta', 'student_id', 'member_id'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function member()
    {
        return $this->belongsTo(Member::class);  // Assuming you have a Member model
    }
}