<?php

namespace App\Http\Controllers;

use App\Clinic;
use App\Specialty;
use App\Time;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    public function show()
    {
        $clinics = Clinic::all();
        return view('pages.welcome',compact('clinics'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Validation\ValidationException
     */
    public function search(Request $request)
    {
        $this->validate($request,[
            'clinic_id' => 'required'
        ]);
        $clinics = Clinic::all();
        if ($request->specialty && $request->doctor)
        {
            $times = Time::where('clinic',$request->clinic_id)->where('specialty',$request->specialty)->where('doctor_id',$request->doctor)->paginate(15);
        }elseif ($request->specialty && !$request->doctor)
        {
            $times = Time::where('clinic',$request->clinic_id)->where('specialty',$request->specialty)->paginate(15);
        }else{
            $times = Time::where('clinic',$request->clinic_id)->paginate(15);
        }
        $clinic_s = Clinic::findOrFail($request->clinic_id);
        return view('pages.welcome',compact('times','clinics','clinic_s'));
    }

    public function first_ajax(Request $request)
    {
        $clinics = Clinic::findOrFail($request->clinic_id);
        $specialties = $clinics->specialties()->get();
        return $specialties;
    }

    public function second_ajax(Request $request)
    {
        $specialties = Specialty::findOrFail($request->specialty_id);
        $doctors = $specialties->doctors()->get();
        return $doctors;
    }
}
