<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
