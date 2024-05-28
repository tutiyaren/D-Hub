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
}
