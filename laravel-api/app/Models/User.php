<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $rememberTokenName = 'token_recuperacao';
    protected $password = 'senha';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nome', 'email', 'senha'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'senha', 'token_recuperacao',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verificado_em' => 'datetime',
    ];

    /**
     * Replace the name of RememberTokenField
     */
    public function getRememberTokenName()
    {
        return 'token_recuperacao';
    }

    public function getPasswordAttribute()
    {
        return $this->attributes['senha'] ;
    }

    public function setPassworAttribute($value)
    {
        $this->attributes['senha'] = $value;
    }

    public function setSenhaAttribute($value)
    {
        $this->attributes['senha'] = bcrypt($value);
    }

    public function getSenhaAttribute()
    {
        return $this->attributes['senha'];
    }
}
