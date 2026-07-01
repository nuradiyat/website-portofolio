<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\SocialMedia;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact', [
            'socialMedia' => SocialMedia::orderBy('display_order')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string'],
        ]);

        ContactMessage::create($validated);

        return back()->with('success', 'Pesan berhasil dikirim.');
    }
}
