<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
