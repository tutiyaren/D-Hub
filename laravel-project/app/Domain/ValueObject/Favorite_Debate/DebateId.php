<?php
namespace App\Domain\ValueObject\Favorite_Debate;

final class DebateId
{
    private $value;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public function value(): int
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
