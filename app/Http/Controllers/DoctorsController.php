<?php

namespace App\Http\Controllers;

use App\Clinic;
use App\Doctor;
use App\Specialty;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;

class DoctorsController extends Controller
{
    public function show()
    {
        $doctors = Doctor::where('created_at','>','2018/10/29 05:30:00')->where('created_at','<','2019/10/29 08:50:00')->get();
        $specialties = Specialty::all();
        $clinics = Clinic::all();
        return view('admin-pages.doctor',compact('doctors','specialties','clinics'));
    }

    public function store(Request $request)
    {
        $doctor = new Doctor(['name' => $request->name]);
        $doctor->save();
        $doctor->specialties()->attach($request->specialty_id);
        if (isset($request->clinic_id) && $request->clinic_id > 0)
        {
            $doctor->clinics()->attach($request->clinic_id);
            $clinic_specialty = $doctor->clinics()->get();
            $clinic_specialty[0]->specialties()->attach($request->specialty_id);
        }
        return back();
    }

    public function delete(Doctor $doctor)
    {
        $doctor->delete();
        return back();
    }

    public function info(Doctor $doctor)
    {
        $clinics = Clinic::all();
        $specialties = Specialty::all();
        return view('admin-pages.doctor-info',compact('doctor','clinics','specialties'));
    }

    public function insert_info(Request $request)
    {
        $doctor = Doctor::findOrFail($request->doctor);
        if ($request->specialty_id != 0 && !$doctor->specialties->contains($request->specialty_id))
        {
            $doctor->specialties()->attach($request->specialty_id);
            foreach ($doctor->clinics as $clinic)
            {
                if (!$clinic->specialties->contains($request->specialty_id))
                {
                    $clinic->specialties()->attach($request->specialty_id);
                }
            }
        }
        if ($request->clinic_id != 0 && !$doctor->clinics->contains($request->clinic_id))
        {
            $doctor->clinics()->attach($request->clinic_id);
            foreach ($doctor->specialties as $specialty)
            {
                if (!$specialty->clinics->contains($request->clinic_id))
                {
                    $specialty->clinics()->attach($request->clinic_id);
                }
            }
        }

        return back();
    }
}
