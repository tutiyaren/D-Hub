<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Domain\ValueObject\Comment\Id;
use App\Domain\ValueObject\Comment\AnonymityId;
use App\Domain\ValueObject\Comment\DebateId;
use App\Domain\ValueObject\Comment\Contents;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'anonymity_id',
        'debate_id',
        'contents'
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
