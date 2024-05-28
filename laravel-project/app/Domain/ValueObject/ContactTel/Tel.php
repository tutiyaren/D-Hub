<?php
namespace App\Domain\ValueObject\ContactTel;
use Exception;

final class Tel
{
    const EMAIL_REGULAR_EXPRESSIONS = "/^\d{2,4}-\d{2,4}-\d{3,4}$/";
    const INVALID_MESSAGE = '電話番号の形式が正しくありません';

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
        return !preg_match(self::EMAIL_REGULAR_EXPRESSIONS, $value);
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
