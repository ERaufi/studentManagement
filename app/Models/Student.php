<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory;
    //

    public function scopeMale($query, $age = 25)
    {
        return $query->where('gender', 'm')
            ->where('age', $age)
        ;
    }

    public function scopeFemale($query, $age = 25)
    {
        $query->where('gender', 'f')
            ->where('age', $age)
        ;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function className()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }

    public function subjects()
    {
        return $this->belongsToMany(Subjects::class, 'grades', 'student_id', 'subject_id')
            ->withPivot('grade')
            ->withTimestamps()
        ;
    }

    public function teacher()
    {
        return $this->hasOneThrough(
            Teachers::class,
            Classes::class,
            'id',
            'id',
            'class_id',
            'teacher_id'
        );
    }

    public function images()
    {
        return $this->morphMany(Images::class, 'imageable');
    }

    public function grades()
    {
        return $this->hasMany(Grades::class, 'student_id');
    }
}
