<?php
namespace App\Domain\ValueObject\Genre;

use Exception;

final class Name
{
    const INVALID_MESSAGE = 'カテゴリ名は20文字以内でお願いします';

    private $value;

    public function __construct(string $value)
    {
        if ($this->isInvalid($value)) {
            throw new Exception(self::INVALID_MESSAGE);
        }
        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }

    private function isInvalid(string $value): bool
    {
        return mb_strlen($value) > 20;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
