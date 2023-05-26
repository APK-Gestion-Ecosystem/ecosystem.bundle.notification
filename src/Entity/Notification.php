<?php

namespace Ecosystem\NotificationBundle\Entity;

class Notification implements \JsonSerializable
{
    private string $code;
    private array $to;
    private array $variables = [];
    private array $attachments = [];
    private ?string $locale = null;

    public function getCode(): string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getTo(): string
    {
        return $this->to;
    }

    public function setTo(array $to): self
    {
        $this->to = $to;

        return $this;
    }

    public function getVariables(): array
    {
        return $this->variables;
    }

    public function setVariables(array $variables): self
    {
        $this->variables = $variables;

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

    public function __construct(string $code, array $to)
    {
        $this->code = $code;
        $this->to = $to;
    }

    public static function create(string $code, array $to): self
    {
        return new self($code, $to);
    }

    public function jsonSerialize() {
        return [
          'code' => $this->code,
          'to' => $this->to,
          'variables' => $this->variables,
          'attachments' => $this->attachments,
          'locale' => $this->locale
        ];
    }
}
