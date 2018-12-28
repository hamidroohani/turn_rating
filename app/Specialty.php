<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Prophecy\Doubler\Generator\ClassCodeGenerator;

class Specialty extends Model
{
    protected $fillable = ['title'];
    public function doctors()
    {
        return $this->belongsToMany(Doctor::class);
    }

    public function times()
    {
        return $this->belongsToMany(Time::class);
    }

    public function clinics()
    {
        return $this->belongsToMany(Clinic::class);
    }
}
