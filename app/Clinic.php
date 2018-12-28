<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    protected $fillable = ['title'];
    public function doctors()
    {
        return $this->belongsToMany(Doctor::class);
    }

    public function specialties()
    {
        return $this->belongsToMany(Specialty::class);
    }
}
