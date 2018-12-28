<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\Specialty;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $doctors = Doctor::all();
        return view('admin-pages.list',compact('doctors'));
    }

    public function show($id)
    {
        $specialties = Specialty::findOrFail($id);
        return view('admin-pages.detail',compact('specialties'));
    }
}
