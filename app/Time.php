<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    protected $fillable = ['from_at','until_at'];
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function specialties()
    {
        return $this->belongsToMany(Specialty::class);
    }

    public function turns()
    {
        return $this->hasMany(Turn::class);
    }
}
