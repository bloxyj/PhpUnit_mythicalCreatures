<?php

declare(strict_types=1);

namespace MythicalCreatures;

class Lovisa
{
    private string $title;
    private array $characteristics;

    public function __construct(string $title, array $characteristics = ['brilliant'])
    {
        $this->title = $title;
        $this->characteristics = $characteristics;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getCharacteristics(): array
    {
        return $this->characteristics;
    }

    public function isBrilliant(): bool
    {
        return in_array('brilliant', $this->characteristics, true);
    }

    public function isKind(): bool
    {
        return in_array('kind', $this->characteristics, true);
    }

    public function say(string $message): string
    {
        return "**;* {$message} **;*";
    }
}
