<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory;
    use SoftDeletes;
    //

    // protected $hidden = [
    //     'name',
    //     'age'
    // ];

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
