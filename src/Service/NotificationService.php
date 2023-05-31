<?php

namespace Ecosystem\NotificationBundle\Service;

use Ecosystem\NotificationBundle\Entity\Notification;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class NotificationService
{
    private HttpClientInterface $httpClient;
    private string $notificationUrl;

    public function __construct(string $notificationUrl) {
        $this->notificationUrl = $notificationUrl;
        $this->httpClient = HttpClient::create([
            'headers' => [
                'Content-Type: application/json',
            ]
        ]);
    }

    public function notify(Notification $notification): bool {
        $response = $this->httpClient->request('POST', $this->notificationUrl, ['body' => json_encode($notification)]);

        return $response->getStatusCode() === 200;
    }
}
