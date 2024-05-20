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
}
