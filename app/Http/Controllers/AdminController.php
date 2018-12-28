<?php

namespace App\Http\Controllers;

use App\Clinic;
use App\Doctor;
use App\Specialty;
use App\Time;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function show()
    {
        $doctors = Doctor::count();
        $clinics = Clinic::count();
        $times = Time::count();
        $specialties = Specialty::count();
        return view('admin-pages.index',compact('doctors','clinics','specialties','times'));
    }
}
