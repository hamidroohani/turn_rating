<?php

namespace App\Http\Controllers;

use App\Specialty;
use Illuminate\Http\Request;

class SpecialtiesController extends Controller
{
    public function show()
    {
        $specialties = Specialty::all();
        return view('admin-pages.specialty',compact('specialties'));
    }

    public function store(Request $request)
    {
        $specialty = new Specialty(['title' => $request->title]);
        $specialty->save();
        return back();
    }

    public function edit(Specialty $specialty,Request $request)
    {
        $specialty->title = $request->title;
        $specialty->update();
        return back();
    }
}
