<?php

namespace App\Http\Controllers;

use App\Models\Experience;

class ExperienceController extends Controller
{
    public function index()
    {
        return view('experiences', [
            'experiences' => Experience::latest()->get(),
        ]);
    }
}
