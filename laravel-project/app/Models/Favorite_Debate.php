<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Domain\ValueObject\Favorite_Debate\Id;
use App\Domain\ValueObject\Favorite_Debate\AnonymityId;
use App\Domain\ValueObject\Favorite_Debate\DebateId;

class Favorite_Debate extends Model
{
    use HasFactory;

    protected $fillable = [
        'anonymity_id',
        'debate_id'
    ];

    public function anonymity()
    {
        return $this->belongsTo(Anonymity::class, 'anonymity_id');
    }

    public function debate()
    {
        return $this->belongsTo(Debate::class, 'debate_id');
    }

    public function scopeTitleSearch($query, $keyword)
    {
        return $query->whereHas('debate', function ($query) use ($keyword) {
            $query->titleSearch($keyword);
        });
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

    // debate_id
    public function setDebateIdAttribute($value)
    {
        $this->attributes['debate_id'] = new DebateId($value);
    }
    public function getDebateIdAttribute($value)
    {
        return $value instanceof DebateId ? $value->value() : $value;
    }
}
