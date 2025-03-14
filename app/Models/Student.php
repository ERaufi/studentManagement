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
}
