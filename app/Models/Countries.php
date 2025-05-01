<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Countries extends Model
{
    //

    public function cities()
    {
        return $this->hasMany(Cities::class, 'country_id');
    }
}
