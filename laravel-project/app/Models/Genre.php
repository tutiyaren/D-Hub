<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Domain\ValueObject\Genre\Id;
use App\Domain\ValueObject\Genre\Name;

class Genre extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function debates()
    {
        return $this->hasMany(Debate::class, 'genre_id');
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

    // name
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = new Name($value);
    }
    public function getNameAttribute($value)
    {
        return $value instanceof Name ? $value->value() : $value;
    }
}
