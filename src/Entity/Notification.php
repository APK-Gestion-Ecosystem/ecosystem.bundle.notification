<?php

namespace Ecosystem\NotificationBundle\Entity;

class Notification implements \JsonSerializable
{
    private string $code;
    private array $to = [];
    private array $cc = [];
    private array $bcc = [];
    private array $params = [];
    private array $attachments = [];
    private ?string $locale = null;
    private array $parkingNotification = [];

    public function getCode(): string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getTo(): array
    {
        return $this->to;
    }

    public function setTo(array $to): self
    {
        $this->to = $to;

        return $this;
    }

    public function getCc(): array
    {
        return $this->cc;
    }

    public function setCc(array $cc): self
    {
        $this->cc = $cc;

        return $this;
    }

    public function getBcc(): array
    {
        return $this->bcc;
    }

    public function setBcc(array $bcc): self
    {
        $this->bcc = $bcc;

        return $this;
    }

    public function getParams(): array
    {
        return $this->params;
    }

    public function setParams(array $params): self
    {
        $this->params = $params;

        return $this;
    }

    public function getAttachments(): array
    {
        return $this->attachments;
    }

    public function setAttachments(array $attachments): self
    {
        $this->attachments = $attachments;

        return $this;
    }

    public function getLocale(): ?string
    {
        return $this->locale;
    }

    public function setLocale(string $locale): self
    {
        $this->locale = $locale;

        return $this;
    }

    public function getParkingNotification(): ?array
    {
        return $this->parkingNotification;
    }

    public function setParkingNotification(?array $parkingNotification): Notification
    {
        $this->parkingNotification = $parkingNotification;
        return $this;
    }

    public function __construct(string $code)
    {
        $this->code = $code;
    }

    public static function create(string $code): self
    {
        return new self($code);
    }

    public function jsonSerialize() {
        return [
            'code' => $this->code,
            'to' => $this->to,
            'cc' => $this->cc,
            'bcc' => $this->bcc,
            'params' => $this->params,
            'attachments' => $this->attachments,
            'locale' => $this->locale,
            'parking' => $this->parkingNotification
        ];
    }
}
