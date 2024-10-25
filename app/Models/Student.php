<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id', 'id');
    }

    protected $fillable=[
        'name',
        'email',
        'department',
        'batch_year',
        'mentor_name',
        'mentor_number',
        'student_number',
        'member_id',
        'project_title',
        'project_description',
    ];


    

}
