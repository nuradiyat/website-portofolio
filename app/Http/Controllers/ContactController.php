<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessageNotification;
use App\Models\ContactMessage;
use App\Models\SocialMedia;
use App\Services\WhatsAppService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Throwable;

class ContactController extends Controller
{
    public function __construct(
        protected WhatsAppService $whatsAppService
    ) {}

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:2000'],
        ]);

        try {
            // 1. Simpan ke database
            $contactMessage = ContactMessage::create($validated);

            // 2. Ambil target email & whatsapp
            $emailTarget = $this->getEmailFromSocialMedia();
            $whatsappTarget = $this->getWhatsappNumberFromSocialMedia();

            Log::info('Contact notification target detected.', [
                'email_target' => $emailTarget,
                'whatsapp_target' => $whatsappTarget,
                'contact_message_id' => $contactMessage->id,
            ]);

            // 3. Kirim email (dipisah try-catch sendiri)
            if (!empty($emailTarget)) {
                try {
                    Mail::to($emailTarget)->send(new ContactMessageNotification($contactMessage));

                    Log::info('Email contact notification sent.', [
                        'to' => $emailTarget,
                        'contact_message_id' => $contactMessage->id,
                    ]);
                } catch (Throwable $mailException) {
                    Log::error('Failed to send contact email notification.', [
                        'message' => $mailException->getMessage(),
                        'to' => $emailTarget,
                        'contact_message_id' => $contactMessage->id,
                    ]);
                }
            } else {
                Log::warning('Email target not found or invalid from social media.', [
                    'contact_message_id' => $contactMessage->id,
                ]);
            }

            // 4. Kirim WhatsApp (dipisah try-catch sendiri)
            if (!empty($whatsappTarget)) {
                try {
                    $waMessage = $this->buildWhatsappMessage($contactMessage);

                    $waSent = $this->whatsAppService->sendMessage($whatsappTarget, $waMessage);

                    Log::info('WhatsApp notification result.', [
                        'target' => $whatsappTarget,
                        'sent' => $waSent,
                        'contact_message_id' => $contactMessage->id,
                    ]);
                } catch (Throwable $waException) {
                    Log::error('Failed to send WhatsApp notification from controller.', [
                        'message' => $waException->getMessage(),
                        'target' => $whatsappTarget,
                        'contact_message_id' => $contactMessage->id,
                    ]);
                }
            } else {
                Log::warning('WhatsApp target not found from social media.', [
                    'contact_message_id' => $contactMessage->id,
                ]);
            }

            return redirect('/#contact')
                ->with('success', 'Pesan berhasil dikirim. Terima kasih sudah menghubungi saya.');
        } catch (Throwable $e) {
            Log::error('Contact form error', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'data' => $validated,
            ]);

            return redirect('/#contact')
                ->withInput()
                ->with('error', 'Gagal mengirim pesan. Silakan coba lagi.');
        }
    }

    private function getEmailFromSocialMedia(): ?string
    {
        $emailValue = SocialMedia::query()
            ->whereRaw('LOWER(platform) = ?', ['email'])
            ->value('url');

        if (!$emailValue) {
            return null;
        }

        return $this->extractEmail($emailValue);
    }

    private function getWhatsappNumberFromSocialMedia(): ?string
    {
        $whatsappValue = SocialMedia::query()
            ->whereRaw('LOWER(platform) = ?', ['whatsapp'])
            ->value('url');

        if (!$whatsappValue) {
            return null;
        }

        $number = $this->extractWhatsappNumber($whatsappValue);

        return !empty($number) ? $number : null;
    }

    private function extractEmail(string $value): ?string
    {
        $value = trim($value);

        if (str_starts_with(strtolower($value), 'mailto:')) {
            $value = substr($value, 7);
        }

        $value = trim($value);

        return filter_var($value, FILTER_VALIDATE_EMAIL) ? $value : null;
    }

    private function extractWhatsappNumber(string $value): string
    {
        $value = trim($value);

        if (filter_var($value, FILTER_VALIDATE_URL)) {
            $host = parse_url($value, PHP_URL_HOST) ?? '';
            $path = parse_url($value, PHP_URL_PATH) ?? '';
            $query = parse_url($value, PHP_URL_QUERY) ?? '';

            parse_str($query, $queryParams);

            if (str_contains($host, 'wa.me')) {
                return preg_replace('/\D+/', '', trim($path, '/'));
            }

            if (!empty($queryParams['phone'])) {
                return preg_replace('/\D+/', '', $queryParams['phone']);
            }

            return preg_replace('/\D+/', '', $path);
        }

        return preg_replace('/\D+/', '', $value);
    }

    private function buildWhatsappMessage(ContactMessage $contactMessage): string
    {
        return "📩 *Pesan Baru dari Contact Form Website Portfolio*\n\n"
            . "*Nama:* {$contactMessage->name}\n"
            . "*Email:* {$contactMessage->email}\n"
            . "*Subject:* {$contactMessage->subject}\n\n"
            . "*Pesan:*\n{$contactMessage->message}";
    }
}