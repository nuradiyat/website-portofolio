<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WhatsAppService
{
    public function sendMessage(string $target, string $message): bool
    {
        $token = config('services.fonnte.token');

        if (!$token || !$target) {
            Log::warning('WhatsApp not sent because token or target is missing.', [
                'token_exists' => !empty($token),
                'target' => $target,
            ]);

            return false;
        }

        try {
            $response = Http::timeout(30)
                ->withHeaders([
                    'Authorization' => $token,
                ])
                ->asForm()
                ->post('https://api.fonnte.com/send', [
                    'target' => $target,
                    'message' => $message,
                    'countryCode' => '62',
                ]);

            Log::info('Fonnte response', [
                'target' => $target,
                'status' => $response->status(),
                'body' => $response->json() ?? $response->body(),
            ]);

            if (!$response->successful()) {
                Log::error('Failed to send WhatsApp notification.', [
                    'status' => $response->status(),
                    'body' => $response->body(),
                ]);

                return false;
            }

            return true;
        } catch (\Throwable $e) {
            Log::error('WhatsApp service exception.', [
                'message' => $e->getMessage(),
                'target' => $target,
            ]);

            return false;
        }
    }
}