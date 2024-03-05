<?php

namespace Ecosystem\NotificationBundle\Service;

use Ecosystem\NotificationBundle\Entity\Notification;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class NotificationService
{
    private HttpClientInterface $httpClient;

    public function __construct(private string $notificationUrl, private string $signatureKey)
    {
        $this->notificationUrl = $notificationUrl;
        $this->httpClient = HttpClient::create([
            'headers' => [
                'Content-Type: application/json',
            ]
        ]);
    }

    public function notify(Notification $notification): bool
    {
        $body = json_encode($notification);
        $signature = $this->getSignature($body);

        $response = $this->httpClient->request(
            'POST',
            $this->notificationUrl,
            [
                'body' => $body,
                'headers' => ['x-signature' => $signature]
            ]
        );

        return $response->getStatusCode() === 200;
    }

    public function asyncNotify(Notification $notification): void
    {
        $body = json_encode($notification);
        $signature = $this->getSignature($body);

        $this->httpClient->request(
            'POST',
            $this->notificationUrl,
            [
                'body' => $body,
                'headers' => ['x-signature' => $signature]
            ]
        );
    }

    private function getSignature(string $body): string
    {
        return hash_hmac('sha256', $body, $this->signatureKey);
    }
}
