<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'teacher_id',
    ];

    public function details() {
        return $this->hasMany(StudentDetail::class, 'student_id');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
