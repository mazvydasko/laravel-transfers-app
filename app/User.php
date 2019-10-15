<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'bonus', 'unique_acc_number', 'acc_balance'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function findUserByAccNumber($number)
    {
        return User::where('unique_acc_number', $number)->first();
    }

    public function sent()
    {
        return $this->hasMany('App\Transfer', 'sender_id', 'id')->orderBy('created_at', 'desc');
    }

    public function received()
    {
        return $this->hasMany('App\Transfer', 'receiver_id', 'id')->orderBy('created_at', 'desc');
    }

    public function getUserBalance() {
        return $this->acc_balance . ' EUR';
    }
}
