public function index()
{
$skills = Skill::all();

$projects = Project::latest()
->take(6)
->get();

$certificates = Certificate::latest()
->take(6)
->get();

$experiences = Experience::latest()
->take(6)
->get();

$testimonials = Testimonial::latest()
->take(6)
->get();

return view('home', compact(
'skills',
'projects',
'certificates',
'experiences',
'testimonials'
));
}