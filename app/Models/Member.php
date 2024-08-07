<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    public function students()
    {
        return $this->hasMany(Student::class, 'member_id', 'bioid');
    }


    protected $fillable=[
        'name',
        'bioid',
        'personalemail',
        'officialemail',
        'employeeid',
        'experience',
        'linkedin',
        'portfolio',
        'mobilenumber',
        'techstack',
        'designation',
        'datofjoining'
    ];
}
