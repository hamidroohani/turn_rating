<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = ['name'];
    public function clinics()
    {
        return $this->belongsToMany(Clinic::class);
    }

    public function specialties()
    {
        return $this->belongsToMany(Specialty::class);
    }

    public function times()
    {
        return $this->belongsToMany(Time::class);
    }

    public function days()
    {
        return $this->belongsToMany(Day::class);
    }
}
