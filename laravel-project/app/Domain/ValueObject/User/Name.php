<?php
namespace App\Domain\ValueObject\User;
use Exception;

final class Name
{
    const INVALID_MESSAGE = 'ユーザー名は255文字以下でお願いします!';

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
        return mb_strlen($value) > 255;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
