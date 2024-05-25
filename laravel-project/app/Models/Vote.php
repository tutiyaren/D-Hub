<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
