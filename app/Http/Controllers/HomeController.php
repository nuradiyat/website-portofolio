<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Experience;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Skill;
use App\Models\SocialMedia;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        $skills = Skill::all();

        $projects = Project::latest()->get();

        $certificates = Certificate::latest()->get();

        $experiences = Experience::latest()->get();

        $testimonials = Testimonial::latest()->get();

        return view('home', [
            'skills' => $skills,
            'projects' => $projects,
            'certificates' => $certificates,
            'experiences' => $experiences,
            'testimonials' => $testimonials,

            'projectCount' => Project::count(),
            'certificateCount' => Certificate::count(),
            'experienceCount' => Experience::count(),
            'skillCount' => Skill::count(),
        ]);
    }
}
