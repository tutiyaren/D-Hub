<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Domain\ValueObject\Anonymity\Id;
use App\Domain\ValueObject\Anonymity\UserId;
use App\Domain\ValueObject\Anonymity\Nickname;

class Anonymity extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nickname'
    ];

    public function user()
    {
        $this->belongsTo(User::class, 'user_id');
    }

    public function debates()
    {
        return $this->hasMany(Debate::class, 'anonymity_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'anonymity_id');
    }

    public function favorites_debates()
    {
        return $this->hasMany(Favorite_Debate::class, 'anonymity_id');
    }

    public function votes()
    {
        return $this->hasMany(Vote::class, 'debate_id');
    }

    public static function getByUserId($userId)
    {
        return self::where('user_id', $userId)->first();
    }

    // id
    public function setIdAttribute($value)
    {
        $this->attributes['id'] = new Id($value);
    }
    public function getIdAttribute($value)
    {
        return $value instanceof Id ? $value->value() : $value;
    }

    // userId
    public function setUserIdAttribute($value)
    {
        $this->attributes['user_id'] = new UserId($value);
    }
    public function getUserIdAttribute($value)
    {
        return $value instanceof UserId ? $value->value() : $value;
    }

    // nickname
    public function setNicknameAttribute($value)
    {
        $this->attributes['nickname'] = new Nickname($value);
    }
    public function getNicknameAttribute($value)
    {
        return $value instanceof Nickname ? $value->value() : $value;
    }
}
