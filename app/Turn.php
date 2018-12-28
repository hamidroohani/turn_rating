<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turn extends Model
{
    public function time()
    {
        return $this->belongsTo(Time::class);
    }
}
