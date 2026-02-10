<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    public function patient()
    {
        return $this->hasMany(Record::class);
    }

};


