<?php

namespace Ecosystem\NotificationBundle\Service;

use Ecosystem\NotificationBundle\Entity\Notification;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class NotificationService
{
    private HttpClientInterface $httpClient;

    public function __construct(private string $notificationUrl) {
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
