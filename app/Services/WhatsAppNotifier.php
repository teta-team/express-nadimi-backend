<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Throwable;

/**
 * Sends a best-effort WhatsApp notification to the site administrator.
 *
 * Configure one of the following in .env:
 *   WHATSAPP_DRIVER=meta
 *   WHATSAPP_PHONE_NUMBER_ID=...
 *   WHATSAPP_API_TOKEN=...
 *   WHATSAPP_ADMIN_NUMBER=98914...
 *
 * or a custom gateway:
 *   WHATSAPP_DRIVER=webhook
 *   WHATSAPP_API_URL=https://...
 *   WHATSAPP_API_TOKEN=...
 *   WHATSAPP_ADMIN_NUMBER=...
 *
 * When nothing is configured the notifier silently does nothing, so the
 * public forms keep working without WhatsApp credentials.
 */
class WhatsAppNotifier
{
    public function notify(string $message): bool
    {
        $driver = config('services.whatsapp.driver');
        $admin = config('services.whatsapp.admin_number');

        if (! $driver || ! $admin) {
            return false;
        }

        try {
            return match ($driver) {
                'meta' => $this->sendViaMeta($message, $admin),
                'webhook' => $this->sendViaWebhook($message, $admin),
                default => false,
            };
        } catch (Throwable $exception) {
            report($exception);

            return false;
        }
    }

    protected function sendViaMeta(string $message, string $admin): bool
    {
        $phoneNumberId = config('services.whatsapp.phone_number_id');
        $token = config('services.whatsapp.token');

        if (! $phoneNumberId || ! $token) {
            return false;
        }

        $response = Http::withToken($token)
            ->acceptJson()
            ->post("https://graph.facebook.com/v20.0/{$phoneNumberId}/messages", [
                'messaging_product' => 'whatsapp',
                'to' => $admin,
                'type' => 'text',
                'text' => ['body' => $message],
            ]);

        return $response->successful();
    }

    protected function sendViaWebhook(string $message, string $admin): bool
    {
        $url = config('services.whatsapp.api_url');
        $token = config('services.whatsapp.token');

        if (! $url) {
            return false;
        }

        $response = Http::withToken((string) $token)
            ->acceptJson()
            ->post($url, [
                'to' => $admin,
                'message' => $message,
            ]);

        return $response->successful();
    }
}
