<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Domain\ValueObject\Vote\Id;
use App\Domain\ValueObject\Vote\AnonymityId;
use App\Domain\ValueObject\Vote\DebateId;
use App\Domain\ValueObject\Vote\VoteType;

class Vote extends Model
{
    use HasFactory;

    protected $fillable = [
        'anonymity_id',
        'debate_id',
        'vote_type'
    ];

    public function anonymity()
    {
        return $this->belongsTo(Anonymity::class, 'anonymity_id');
    }

    public function debate()
    {
        return $this->belongsTo(Debate::class, 'debate_id');
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

    // vote_type
    public function setVoteTypeAttribute($value)
    {
        $this->attributes['vote_type'] = new VoteType($value);
    }
    public function getVoteTypeAttribute($value)
    {
        return $value instanceof VoteType ? $value->value() : $value;
    }
}
