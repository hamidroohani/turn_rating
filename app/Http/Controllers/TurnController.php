<?php

namespace App\Http\Controllers;

use App\Clinic;
use App\Doctor;
use App\Time;
use App\Turn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class TurnController extends Controller
{
    public function form(Time $time)
    {
        if ($time->sick_num > 0)
        {
            return view('pages.form',compact('time'));
        }else{
            return back();
        }

    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $time = Time::findOrFail($request->id);
        if ($time->sick_num > 0)
        {
            //check that one person has one turn
            $meli_codes = Turn::where('meli_code',$request->meli_code)->get();
            foreach ($meli_codes as $meli_code)
            {
                if (isset($meli_code->time_id) && $meli_code->time_id == $request->id)
                {
                    $this->validate($request,[
                        'meli_code' => 'unique:turns',
                    ],[
                         'کد ملی شما قبلا ثبت شده است'
                    ]);
                }
            }


            //other validate
            $this->validate($request,[
               'firstname' => 'required|min:3|max:15|alpha',
               'lastname' => 'required',
               'meli_code' => 'required|regex:/[0-9]{10}/',
               'mobile_num' => 'required|regex:/(09)[0-9]{9}/',
               'bime' => 'required',
            ],[
                'firstname.required' => 'فیلد نام اجباری است',
                'firstname.min' => 'نام نامعتبر است',
                'firstname.max' => 'نام نامعتبر است',
                'lastname.required' => 'فیلد نام خانوادگی اجباری است',
                'meli_code.required' => 'فیلد کد ملی اجباری است',
                'meli_code.regex' => 'کد ملی نامعتبر است',
                'mobile_num.required' => 'فیلد شماره موبایل الزامی است',
                'mobile_num.regex' => 'شماره موبایل نامعتبر است',

            ]);

            $deleted_turn = Turn::where('meli_code','حذف شد')->get();
            if (isset($deleted_turn[0]->meli_code) && $deleted_turn[0]->time_id == $request->id)
            {
                $turn = $deleted_turn[0];
                $turn->firstname = $request->firstname;
                $turn->lastname = $request->lastname;
                $turn->firstname = $request->firstname;
                $turn->meli_code = $request->meli_code;
                $turn->father = $request->father;
                $turn->mobile_num = $request->mobile_num;
                $turn->phone_num = $request->phone_num;
                $turn->bime = $request->bime;
                $turn->trace_code = rand(100000,900000);
                $turn->update();
                $clinic = Clinic::findOrFail($turn->time->clinic);
                $doctor = Doctor::findOrFail($turn->time->doctor_id);

            }else {
                $x = $time->sick_num * $time->ave_time * 60;
                $y = strtotime($time->until) - ($x);


                $turn = new Turn();
                $turn->time_id = $time->id;
                $turn->firstname = $request->firstname;
                $turn->lastname = $request->lastname;
                $turn->firstname = $request->firstname;
                $turn->meli_code = $request->meli_code;
                $turn->father = $request->father;
                $turn->mobile_num = $request->mobile_num;
                $turn->phone_num = $request->phone_num;
                $turn->bime = $request->bime;
                $turn->time_s = date("H:i", $y);
                $turn->trace_code = rand(100000,900000);
                $turn->save();
                $clinic = Clinic::findOrFail($turn->time->clinic);
                $doctor = Doctor::findOrFail($turn->time->doctor_id);
            }
            $time->sick_num = $time->sick_num - 1 ;
            $time->update();

            return view('pages.turn_info',['turn' => $turn,'clinic' => $clinic,'doctor' => $doctor]);
        }else{
            Session::flash("dang_msg" , "متاسفانه نوبت خالی وجود ندارد");
            return redirect('/');
        }


    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     * @throws \Illuminate\Validation\ValidationException
     */
    public function found(Request $request)
    {
        $this->validate($request,[
           'meli_code' => 'required|regex:/[0-9]{10}/'
        ],[
            'کد ملی نا معتبر است!!'
        ]);
        $turn = Turn::where('meli_code',$request->meli_code)->get();
        if (!isset($turn[0]))
        {
            Session::flash("dang_msg" , "نوبتی به این کد ملی اختصاص داده نشده!");
            return redirect('/');
        }
        $clinic = Clinic::findOrFail($turn[0]->time->clinic);
        $doctor = Doctor::findOrFail($turn[0]->time->doctor_id);
        return view('pages.turn_info',['turn' => $turn[0],'clinic' => $clinic,'doctor' => $doctor]);
    }

    public function delete(Turn $turn)
    {
        if ($turn->meli_code == "حذف شد")
        {
            return back();
        }
        $time = Time::findOrFail($turn->time_id);
        $time->sick_num++;
        $time->update();
        $turn->firstname = "حذف شد";
        $turn->lastname = "حذف شد";
        $turn->meli_code = "حذف شد";
        $turn->update();
//        $turn->delete();
//        $turns = Turn::where('time_id',$time->id)->get();

//        $x = $time->ave_time * 60;
//        $y = strtotime($time->from);
//        $z = $y - $x;
//        foreach ($turns as $turn)
//        {
//            $z = $z + $x;
//            $turn->time_s = date("H:i",$z);
//            $turn->update();
//        }
        return back();
    }


}
