<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactTel extends Model
{
    use HasFactory;

    protected $fillable = [
        'contact_id',
        'tel'
    ];

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
}
