<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Throwable;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // VALIDASI INPUT
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:2000'],
        ]);

        try {
            // SIMPAN KE DATABASE
            ContactMessage::create($validated);

            // SUCCESS + KEMBALI KE SECTION CONTACT
            return redirect('/#contact')
                ->with('success', 'Pesan berhasil dikirim. Terima kasih sudah menghubungi saya.');
        } catch (Throwable $e) {

            // LOG ERROR UNTUK DEBUGGING
            Log::error('Contact form error', [
                'error' => $e->getMessage(),
                'data' => $validated,
            ]);

            // ERROR RESPONSE + KEMBALI KE CONTACT SECTION
            return redirect('/#contact')
                ->withInput()
                ->with('error', 'Gagal mengirim pesan. Silakan coba lagi.');
        }
    }
}
