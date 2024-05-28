<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Domain\ValueObject\Debate\Id;
use App\Domain\ValueObject\Debate\AnonymityId;
use App\Domain\ValueObject\Debate\GenreId;
use App\Domain\ValueObject\Debate\Title;
use App\Domain\ValueObject\Debate\Contents;

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

    // id
    public function setIdAttribute($value)
    {
        $this->attributes['id'] = new Id($value);
    }
    public function getIdAttribute($value)
    {
        return $value instanceof Id ? $value->value() : $value;
    }

    // anonymity_id
    public function setAnonymityIdAttribute($value)
    {
        $this->attributes['anonymity_id'] = new AnonymityId($value);
    }
    public function getAnonymityIdAttribute($value)
    {
        return $value instanceof AnonymityId ? $value->value() : $value;
    }

    // genre_id
    public function setGenreIdAttribute($value)
    {
        $this->attributes['genre_id'] = new GenreId($value);
    }
    public function getGenreIdAttribute($value)
    {
        return $value instanceof GenreId ? $value->value() : $value;
    }

    // title
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = new Title($value);
    }
    public function getTitleAttribute($value)
    {
        return $value instanceof Title ? $value->value() : $value;
    }

    // contents
    public function setContentsAttribute($value)
    {
        $this->attributes['contents'] = new Contents($value);
    }
    public function getContentsAttribute($value)
    {
        return $value instanceof Contents ? $value->value() : $value;
    }
}
