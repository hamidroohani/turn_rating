<?php

namespace App\Http\Controllers;

use App\Clinic;
use Illuminate\Http\Request;

class ClinicsController extends Controller
{
    public function show()
    {
        $clinics = Clinic::all();
        return view('admin-pages.clinic',compact('clinics'));
    }

    public function store(Request $request)
    {
        $clinic = new Clinic(['title' => $request->title]);
        $clinic->save();
        return back();
    }

    public function edit(Clinic $clinic,Request $request)
    {
        $clinic->title = $request->title;
        $clinic->update();
        return back();
    }
}
