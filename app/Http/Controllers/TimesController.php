<?php

namespace App\Http\Controllers;

use App\Clinic;
use App\Day;
use App\Doctor;
use App\Specialty;
use App\Time;
use App\Turn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Morilog\Jalali\Jalalian;

class TimesController extends Controller
{
    public function show()
    {
        $specialties = Specialty::all();
        $times = Time::orderBy("id","DESC")->limit(4)->get();
        $clinics = Clinic::all();
        return view('admin-pages.time',compact('times','specialties','clinics'));
    }

    public function store(Time $time,Request $request)
    {
        $sick_num = (strtotime($request->until) - strtotime($request->from))/60/$request->ave_time;
        $time->doctor_id = $request->name;
        $time->specialty = $request->specialty;
        $time->week_d = $request->week_d;
        $time->day = $request->day;
        $time->clinic = $request->clinic;
        $time->from = ($request->from);
        $time->until = ($request->until);
        $time->ave_time = $request->ave_time;
        $time->sick_num = $sick_num;
        $time->save();
        $time->specialties()->attach($request->specialty);
        return back();

    }

    public function first_ajax(Request $request)
    {
        $doctors = Specialty::findOrFail($request->day_w);
        $doctors = $doctors->doctors;
        return $doctors;
    }

    public function second_ajax(Request $request)
    {
        $clinics = Doctor::findOrFail($request->doc_id);
        $clinics = $clinics->clinics;
        return $clinics;
    }

    public function index()
    {
        $clinics = Clinic::all();
        return view('admin-pages.clientele',compact('clinics'));
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
        if ($request->specialty)
        {
            $times = Time::where('clinic',$request->clinic_id)->where('specialty',$request->specialty)->get();
        }else{
            $times = Time::where('clinic',$request->clinic_id)->get();
        }
        return view('admin-pages.clientele',compact('times','clinics'));
    }

    public function show_clientele($id)
    {
        $clients = Turn::where("time_id",$id)->paginate(15);
        return view('admin-pages.clientele_list',compact('clients'));
    }

    public function fortest(Request $request)
    {
        $clinics = Clinic::all();
        if (isset($request->until))
        {
            $times = Time::where('day','>',$request->from)->where("day" , "<" , $request->until)->get();
        }else{
            $times = Time::where('day','>',$request->from)->get();
        }
        return view('admin-pages.clientele',compact('times','clinics'));
    }

}
