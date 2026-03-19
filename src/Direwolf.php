<?php

declare(strict_types=1);

namespace MythicalCreatures;

class Direwolf
{
    private string $name;
    private string $home;
    private string $size;
    /**
     * @var Stark[]
     */
    private array $starksToProtect = [];

    public function __construct(string $name, string $home = 'Beyond the Wall', string $size = 'Massive')
    {
        $this->name = $name;
        $this->home = $home;
        $this->size = $size;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getHome(): string
    {
        return $this->home;
    }

    public function getSize(): string
    {
        return $this->size;
    }

    public function getStarksToProtect(): array
    {
        return array_values($this->starksToProtect);
    }

    public function protects(Stark $stark): void
    {
        if ($this->home === $stark->getLocation() && count($this->starksToProtect) < 2) {
            $this->starksToProtect[] = $stark;
            $stark->setSafe(true);
        }
    }

    public function huntsWhiteWalkers(): bool
    {
        return count($this->starksToProtect) === 0;
    }

    public function leaves(Stark $stark): Stark
    {
        foreach ($this->starksToProtect as $index => $protectedStark) {
            if ($protectedStark === $stark) {
                unset($this->starksToProtect[$index]);
                $stark->setSafe(false);
                break;
            }
        }
        return $stark;
    }
}
