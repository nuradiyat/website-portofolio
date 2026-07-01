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
        return view('home', [
            'profile' => Profile::first(),
            'skills' => Skill::orderBy('category')->get(),
            'projects' => Project::latest()->take(6)->get(),
            'certificates' => Certificate::latest()->take(6)->get(),
            'experiences' => Experience::latest()->get(),
            'testimonials' => Testimonial::latest()->take(6)->get(),
            'socialMedia' => SocialMedia::orderBy('display_order')->get(),

            'totalProjects' => Project::count(),
            'totalCertificates' => Certificate::count(),
            'totalExperiences' => Experience::count(),
        ]);
    }
}
