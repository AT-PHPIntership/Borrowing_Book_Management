<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';

    protected $fillable = [
        'username', 'password', 'fullname', 'gender', 'birthday', 'phone', 'address', 'image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get borrow from User.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function borrows()
    {
        return $this->hasMany('App/Borrow');
    }
}
