<?php
namespace App\Domain\ValueObject\Vote;
use InvalidArgumentException;

final class VoteType
{
    const INVALID_MESSAGE = 'agreeまたはdisagreeで入力してください';
    private $value;
    private const ALLOWED_TYPES = ['agree', 'disagree'];

    public function __construct(string $value)
    {
        if (!in_array($value, self::ALLOWED_TYPES)) {
            throw new InvalidArgumentException(self::INVALID_MESSAGE);
        }
        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
