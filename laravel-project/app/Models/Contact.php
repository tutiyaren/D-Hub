<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Domain\ValueObject\Contact\Id;
use App\Domain\ValueObject\Contact\UserId;
use App\Domain\ValueObject\Contact\Title;
use App\Domain\ValueObject\Contact\Contents;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'contents'
    ];

    public function user()
    {
        $this->belongsTo(User::class, 'user_id');
    }

    public function tel()
    {
        return $this->hasOne(ContactTel::class);
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
    // userId
    public function setUserIdAttribute($value)
    {
        $this->attributes['user_id'] = new UserId($value);
    }
    public function getUserIdAttribute($value)
    {
        return $value instanceof UserId ? $value->value() : $value;
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
