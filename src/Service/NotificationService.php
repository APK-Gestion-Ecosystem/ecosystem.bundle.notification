<?php

namespace Ecosystem\NotificationBundle\Service;

use Ecosystem\NotificationBundle\Entity\Notification;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class NotificationService
{
    private HttpClientInterface $httpClient;

    public function __construct() {
        $this->httpClient = HttpClient::create([
            'headers' => [
                'Content-Type: application/json',
            ]
        ]);
    }

    public function notify(Notification $notification): bool {
        $url = 'https://65y4wqpn2tgqahyze4qlklkziy0fgbsr.lambda-url.eu-west-1.on.aws';

        $response = $this->httpClient->request('POST', $url, ['body' => json_encode($notification)]);

        return $response->getStatusCode() === 200;
    }
}
