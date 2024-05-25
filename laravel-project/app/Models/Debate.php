<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Debate extends Model
{
    use HasFactory;

    protected $fillable = [
        'anonymity_id',
        'genre_id',
        'title',
        'contents'
    ];

    public function anonymity()
    {
        return $this->belongsTo(Anonymity::class, 'anonymity_id');
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class, 'genre_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'debate_id');
    }

    public function favorites_debates()
    {
        return $this->hasMany(Favorite_Debate::class, 'anonymity_id');
    }

    public function votes()
    {
        return $this->hasMany(Vote::class, 'debate_id');
    }

    public function scopeTitleSearch($query, $keyword)
    {
        if (!empty($keyword)) {
            $query->where('title', 'like', '%' . $keyword . '%');
        }
    }

    public function generateRoute()
    {
        switch ($this->genre_id) {
            case 1:
                return route('politics.show', $this->id);
            case 2:
                return route('economy.show', $this->id);
            case 3:
                return route('international.show', $this->id);
            case 4:
                return route('social.show', $this->id);
            default:
                return route('mypage.index');
        }
    }
}
