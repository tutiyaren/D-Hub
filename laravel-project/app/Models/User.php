<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Domain\ValueObject\User\Id;
use App\Domain\ValueObject\User\Name;
use App\Domain\ValueObject\User\Email;
use App\Domain\ValueObject\User\InputPassword;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function contacts()
    {
        $this->hasMany(Contact::class, 'user_id');
    }

    public function anonymity()
    {
        $this->hasOne(Anonymity::class, 'user_id');
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
    // email
    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = new Email($value);
    }
    public function getEmailAttribute($value)
    {
        return $value instanceof Email ? $value->value() : $value;
    }
    // inputPassword
    public function setInputPasswordAttribute($value)
    {
        $this->attributes['password'] = new InputPassword($value);
    }
    public function getInputPasswordAttribute($value)
    {
        return $value instanceof InputPassword ? $value->value() : $value;
    }
}
